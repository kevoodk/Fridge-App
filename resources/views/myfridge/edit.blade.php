@extends('layouts.app')

@section('content')
    <form method="POST" action="{{url('/myfridge/update', $fridgeFood['id'])}}">
        @csrf
        <input type="text" value="{{$foodItem->fname}}" name="fname" />
        <input type="submit" class="btn btn-primary"/>
    </form>
@endsection