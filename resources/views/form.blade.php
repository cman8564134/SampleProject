@extends('layouts.app')
@section('body')
    {!! Form::open(['url' => route('formSubmit')]) !!}
    <div class="form-group">
    {!! Form::label('email','',["class"=>"label label-default"]) !!}
    {!! Form::text('email', '', ["class"=>"form-control", 'placeholder'=>'Email Address','type'=>'email'] ) !!}
    </div>
    <div class="form-group">
    {!! Form::label('password','', ["class"=>"label label-default"]) !!}
    {!! Form::password('password',["class"=>"form-control", 'placeholder'=>'Password'] ) !!}
    </div>
    <div>
        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection