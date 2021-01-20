@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add food items</h2>
            </div>
            <div class="pull-right">
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($foodItems as $foodItem)
            <tr>
                <td>{{ $foodItem->fname }}</td>
                <td>{{ date_format($foodItem->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ url('/fooditem/destroy', $foodItem->id) }}" method="POST">

                        <a href="{{ url('/fooditem', $foodItem->id) }}" title="show">
                            Show
                        </a>

                        <a href="{{ url('/fooditem/edit', $foodItem->id) }}">
                            Edit

                        </a>

                        @csrf
                        @method('PATCH')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            Delete

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
