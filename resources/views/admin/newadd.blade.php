@extends('layouts_admin.master_new')

@section('content')

      <div class="row">
            <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Add Membership</strong>
                      </div>

                        {!! Form::open(array('url' => 'admin/store', 'method' => 'POST')) !!}
                        <ul>
                            @foreach ($errors->all() as $message)
                            <li>{{$message}}</li>
                            @endforeach
                        </ul>
                        <div class="form-group">
                            {{Form::label('firstname','First Name')}}
                            {{Form::text('firstname', null,array('class' => 'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('lastname','Last Name')}}
                            {{Form::text('lastname', null,array('class' => 'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('email','Email')}}
                            {{Form::text('email', null,array('class' => 'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('phone','Phone')}}
                            {{Form::text('phone', null,array('class' => 'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('address','Address')}}
                            {{Form::textarea('address', null,array('class' => 'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('username','Username')}}
                            {{Form::text('username', null,array('class' => 'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('country','Country')}}
                            {{Form::text('country', null,array('class' => 'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('state','State')}}
                            {{Form::text('state', null,array('class' => 'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('password','Password')}}
                            {{Form::password('password',array('class' => 'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('password_confirmation','Password Confirm')}}
                            {{Form::password('password_confirmation',array('class' => 'form-control'))}}
                        </div>
                        <div class="form-group">
                          {{Form::submit('Register', array('class' => 'btn btn-primary'))}}
                        </div>
                        {{ Form::close() }}
                       
                    </div>
              </div>
        </div>
@endsection                    