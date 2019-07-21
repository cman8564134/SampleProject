@extends('layouts.app')
@section('body')
    <h1>Search for specific form</h1>

    {!! Form::open(['url' => route('formSearch')]) !!}
    <div class="form-group">
        {!! Form::label('email','',["class"=>"label label-default"]) !!}
        {!! Form::text('email', '', ["class"=>"form-control", 'placeholder'=>'Email Address','type'=>'email'] ) !!}
    </div>
    <div>
        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection