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
                <th scope="col">Account Count</th>
            </tr>
            </thead>
            <tbody>
            <!-- links() function is Laravel OOTB function used for pagination via Bootstrap-->
            {{$Forms->links()}}
            @foreach($Forms as $f)
                <tr>
                    <th scope="row">{{$f->id}}</th>
                    <td>{{$f->email}}</td>
                    <td>{{$f->password}}</td>
                    <td>{{count($f->accounts)}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection