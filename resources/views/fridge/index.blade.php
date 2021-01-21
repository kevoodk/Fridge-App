@extends('layouts.app')

@section('content')
<div class="container">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<h1>Welcome to your fridge</h1>
    <p>You have not create a fridge yet.</p>
        <a href="{{url('fridge/create')}}" class="btn btn-primary">Create one here</a>
        @foreach($fridge as $myFridge)
            <p>{{$myFridge->name}}</p>
        @endforeach
        <p>Your fridge looks empty.</p>
        <a href="#" class="btn btn-primary">Start filling it now</a>

</div>
@endsection
