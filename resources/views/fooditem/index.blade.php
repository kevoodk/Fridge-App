@extends('layouts.app')

@section('content')
<div class="container">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<h1>Fixed Table header</h1>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>Name:</th>
                    <th>Cat:</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
            @foreach($foods as $foodItem)
                <tr>
                    <td>{{$foodItem['id']}}</td>
                    <td>{{$foodItem['fname']}}</td>
                    <td>{{$foodItem['cat']}}</td>
                    <td><a href="{{ url('/fooditem', $foodItem['id']) }}">
                        Show
                        </a>
                    </td>
                    <td><a href="{{ url('/fooditem/edit', $foodItem['id']) }}">
                        Edit
                        </a>
                    </td>
                    <td>
                        <form action="{{ url('/fooditem/destroy', $foodItem['id']) }}" method="POST">
                        @csrf
                        @method('PATCH')
                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
      </tbody>
    </table>
</div>
@endsection
