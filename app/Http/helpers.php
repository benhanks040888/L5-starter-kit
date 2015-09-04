<?php

if ( ! function_exists('assets_url'))
{
  /**
   * Get the URL to an asset
   *
   * @param  string  $path
   * @param  bool    $secure
   * @return string
   */
  function assets_url($asset)
  {
    return asset('assets/' . ltrim($asset, '/'));
  }
}

if ( ! function_exists('uploads'))
{
  /**
   * Get the URL to uploads folder
   *
   * @param  string  $path
   * @param  bool    $secure
   * @return string
   */
  function uploads($upload)
  {
    if (file_exists(public_path() . 'uploads/' . $upload)) {
      return 'no image broh';
    }

    return asset('uploads/' . ltrim($upload, '/'));
  }
}

if ( ! function_exists('uploads_path'))
{
  /**
   * Get the URL to uploads_path folder
   *
   * @param  string  $path
   * @param  bool    $secure
   * @return string
   */
  function uploads_path($upload)
  {
    if (file_exists(public_path() . 'uploads/' . $upload)) {
      return 'no image broh';
    }

    return public_path() . '/uploads/' . ltrim($upload, '/');
  }
}


if ( ! function_exists('show_error_page'))
{
  /**
   * Show a production error page for the given status code.
   *
   * @param  int  $statsuCode
   * @return Illuminate\Http\Response
   */
  function show_error_page($statusCode)
  {
    try
    {
      // Firstly we'll try to make a view for the status code. The
      // default theme ships with these views, but just for safety
      // (in-case the theme system is what's causing the error)
      // we also include duplicated views under app/views.
      $string = View::make("errors/{$statusCode}");
    }
    catch (Exception $e)
    {
      // If we got an exception thrown in the process of loading the error
      // view and our status code is not 500, the view probably doesn't
      // exist. So we don't leave the users hanging, we'll attempt to
      // show a 500 error page.
      if ($statusCode != 500)
      {
        return show_error_page(500);
      }

      // However, if we got this far, we'll simply return a string
      // which lets the user know something's horribly wrong.
      // This is basically a worst-case scenario.
      $string = '500 Internal Server Error';
    }

    return Response::make($string, $statusCode);
  }
}

if ( ! function_exists('array_to_object'))
{
  /**
   * Convert array to object
   *
   * @param  array  $array
   * @return object
   */
  function array_to_object($array)
  {
    if (!is_array($array)) {
      return;
    }

    return json_decode(json_encode($array), FALSE);
  }
}

if ( ! function_exists('getRandomString'))
{

  function getRandomString($length = 42)
  {
    // We'll check if the user has OpenSSL installed with PHP. If they do
    // we'll use a better method of getting a random string. Otherwise, we'll
    // fallback to a reasonably reliable method.
    if (function_exists('openssl_random_pseudo_bytes'))
    {
      // We generate twice as many bytes here because we want to ensure we have
      // enough after we base64 encode it to get the length we need because we
      // take out the "/", "+", and "=" characters.
      $bytes = openssl_random_pseudo_bytes($length * 2);

      // We want to stop execution if the key fails because, well, that is bad.
      if ($bytes === false)
      {
        throw new \RuntimeException('Unable to generate random string.');
      }

      return substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, $length);
    }

    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
  }
}


if ( ! function_exists('resizeSelf'))
{
  function resizeSelf($path, $width = 1024)
  {
    $image = Image::make($path)
              ->resize($width, null, function($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
              })
              ->save($path);

    return $image;
  }
}