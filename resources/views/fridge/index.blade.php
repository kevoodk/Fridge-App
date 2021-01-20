@extends('layouts.app')

@section('content')
<div class="container">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<h1>Welcome to your fridge</h1>
    @if(empty($fridge))
    <p>You have not create a fridge yet.</p>
    @else
    <p>{{$fridge->name}}</p>
    @endif
</div>
@endsection
