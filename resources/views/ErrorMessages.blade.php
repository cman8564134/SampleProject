@if(count($errors->all()))
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@elseif(Session::has('FormStatus'))
    <div class="alert alert-success">
        {{Session::get('FormStatus')}}
    </div>
@endif