@extends('layouts.app')
@section('body')
    <h1>Form Edit</h1>
    @if(!isset($SpecificForm))
        <div class="alert alert-primary" role="alert">
            No forms found!
        </div>
    @else
        {{--store the array value into a local variable for easier management --}}
        <input name="returnedForm" type="hidden" value="{{$TheOnlyForm = $SpecificForm[0]}}">
    <div>
        <form action="{{route('formEdit')}}" method="post">
            @csrf
            <div class="form-group">
                <input name="EditFormID" type="hidden" value="{{$TheOnlyForm->id}}">

                <label for="exampleLabel">Account Counts: {{count($TheOnlyForm->accounts)}}</label>
                <br>

                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="EditFormEmail" aria-describedby="emailHelp" placeholder="Enter email" value="{{$TheOnlyForm->email}}">

                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="EditFormPassword" placeholder="Password">

                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" class="form-control" name="EditFormConfirmPassword" placeholder="Confirm Password">

                <div class="custom-checkbox">
                    <label> Tags: </label>
                @foreach ($tags as $tag)
                        <input type="checkbox" name="tags[]" value="{{$tag->id}}" {{$TheOnlyForm->tags()->where('tag_id',$tag->id)->first() ? 'checked' : '' }}>{{$tag->Name}}
                @endforeach
                </div>
            </div>
            <button type="submit" name="action" class="btn btn-primary" value="Edit">Save</button>
            <button type="submit" name="action" class="btn btn-primary" value="SoftDelete">Soft Delete</button>
            <button type="submit" name="action" class="btn btn-primary" value="HardDelete">Hard Delete</button>
        </form>
        <form action="{{route('formAddRandomAccount')}}" method="post">
            <input name="EditFormID" type="hidden" value="{{$TheOnlyForm->id}}">
            @csrf
            <button type="submit" name="action" class="btn btn-primary" >Add Random Account</button>
        </form>
    </div>
    @endif
@endsection