<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Input;
use Redirect;
use Session;
use Sentinel;
use Validator;
use View;
use Hash;

use Illuminate\Support\MessageBag as Bag;

class AuthController extends Controller {

  public function getIndex()
  {
    return view('admin.auth.index');
  }

  public function getLogout()
  {
    Sentinel::logout();

    return Redirect::route('admin.login');
  }

  public function postLogin()
  {
    $rules = array(
      'email'    => 'required|email',
      'password' => 'required|min:5'
    );

    $input = Input::all();
    $v = Validator::make($input, $rules);

    if (!$v->fails()) {
      $credentials = array(
          'email'    => $input['email'],
          'password' => $input['password']
      );

      $user = Sentinel::authenticate($credentials, false);

      if ($user) {
        return Redirect::route('admin.dashboard');
      }

      $error = 'Invalid Username Or Password';

      $errors = with(new Bag)->add('login', $error);

      return Redirect::route('admin.login')
                     ->withErrors($errors)
                     ->withInput();
    }

    return Redirect::route('admin.login')
                   ->withErrors($v)
                   ->withInput();

  }

  public function getChangePassword()
  {
    return view('admin.site.change-password');
  }

  public function postChangePassword()
  {
    $rules = array(
      'old_password' => 'required',
      'password'     => 'required|min:5|confirmed' 
    );

    $input = Input::all();
    $v = Validator::make($input, $rules);

    if ($v->fails()) {
      return Redirect::route('admin.change-password')->withErrors($v)->withInput();
    }

    try {
      $user = Sentinel::getUser();

      $credentials = [
        'email'    => $user->email,
        'password' => $input['old_password'],
      ];

      if (Sentinel::validateCredentials($user, $credentials)) {
        $user->password = Hash::make($input['password']);
        $user->save();

        Session::flash('success', 'You have successfully changed your password');

        return Redirect::route('admin.change-password');
      } 
      else {
        $error = "Invalid old password";
        $errors = with(new bag)->add('password', $error);
        return Redirect::route('admin.change-password')
                       ->withErrors($errors)
                       ->withInput();
      }
    }
    catch (Cartalyst\Sentinel\Users\UserNotFoundException $e) {
      return Redirect::route('admin.logout');
    }
  }
}