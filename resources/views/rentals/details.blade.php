@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card  border-dark mb-3 mt-4">
            <img class="card-img-top" src="{{ $rental->pics_uri }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $rental->name }}</h5>
                <p class="card-text">
                    <span>Location: {{ $rental->location->location }}</span><br>
                    <span>Description: {{ $rental->description }}</span><br>
                </p>
                <a href="{{ route('rentals.edit', $rental->id) }}" class="btn btn-primary">Edit</a>
            </div>
            <div class="card-footer text-right">
                <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-lg btn-block" type="submit">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection()
