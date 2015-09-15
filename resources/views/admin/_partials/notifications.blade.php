@if ($message = Session::get('success'))
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p>{{ $message }}</p>
  </div>
@endif

@if ($message = Session::get('info'))
  <div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p>{{ $message }}</p>
  </div>
@endif

@if ($message = Session::get('error'))
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p>{{ $message }}</p>
  </div>
@endif

@if (count($errors->all()) > 0)
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    @foreach ($errors->all() as $message)
      <p>{{ $message }}</p>
    @endforeach
  </div>
@endif