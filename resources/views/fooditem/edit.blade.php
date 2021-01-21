@extends('layouts.app')

@section('content')
    <form method="POST" action="{{url('/myfridge/update', $fridgeFood->id)}}">
        @csrf
        <input type="date" value="{{$fridgeFood->expire_date}}" name="expire_date" />
        <input type="submit" class="btn btn-primary"/>
    </form>
@endsection