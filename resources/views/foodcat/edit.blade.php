@extends('layouts.app')

@section('content')
    <form method="POST" action="{{url('/foodcat/update', $foodCat->id)}}">
        @csrf
        <input type="text" value="{{$foodCat->name}}" name="name" />
        <input type="submit" class="btn btn-primary"/>
    </form>
@endsection