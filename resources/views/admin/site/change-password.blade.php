@extends('admin.layouts.master')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Change Password</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>

  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      @include('admin._partials.notifications')

      {!! Form::open(array('class' => 'form-horizontal', 'role' => 'form', 'files' => true)) !!}
        <div class="form-group">
          <label class="col-sm-2 control-label">Old Password</label>
          <div class="col-sm-10">
          {!! Form::password('old_password', array('class'=>'form-control', 'placeholder' => 'Old Pasword')) !!} 
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label">New Password</label>
          <div class="col-sm-10">
            {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'New Password')) !!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label">Confirm New Password</label>
          <div class="col-sm-10">
            {!! Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm New Password')) !!}
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-md-2"></div>
          <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
          </div>
        </div>

      {!! Form::close() !!}
    </div>
    <!-- /.col-lg-12 -->
  </div>
@stop