<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use View;

class SiteController extends Controller {

  public function getIndex()
  {
    return View::make('admin.site.index');
  }

}