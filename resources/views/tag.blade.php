@extends('layouts.app')
@section('body')
    {!! Form::open(['url' => route('createTag')]) !!}
    <div class="form-group">
        {!! Form::label('Tag Name','',["class"=>"label label-default"]) !!}
        {!! Form::text('Name', '', ["class"=>"form-control", 'placeholder'=>'Tag Name'] ) !!}
    </div>
    <div>
        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection