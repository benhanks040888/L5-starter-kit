@extends('admin.layouts.simple')

@section('content')
  <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        @include('admin._partials.notifications')
                        {!! Form::open(array('role' => 'form')) !!}
                            <fieldset>
                                <div class="form-group">
                                {!! Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'E-Mail', 'type' => 'email')) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) !!}
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop