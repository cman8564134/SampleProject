@extends('layouts.app')
@section('body')
    <h1> All forms </h1>
    @if(count($Forms)>0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
            </tr>
            </thead>
            <tbody>
            @foreach($Forms as $f)
                <tr>
                    <th scope="row">{{$f->id}}</th>
                    <td>{{$f->email}}</td>
                    <td>{{$f->password}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection