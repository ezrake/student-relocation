@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: right">
        <form method="get" class="m-3" action={{ route('rentals.index') }}>
            <div>
                <input type="text" name="search" class="form-control ds-input" placeholder="Search rentals" />
            </div>
        </form>
    </div>
    <div class="card-group row-cols-4 mx-1">
        @foreach ($rentals as $rental)
            <div class="col-l-6">
                <div class="card border-primary bg-light my-1" style="width: 18rem;">
                    <div class="card-header">
                        {{ $rental->name }}
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <span>Location: {{ $rental->location->location }}</span> <br>
                            <span>Description: {{ $rental->description }}</span>
                        </p>
                        <a href="{{ route('rentals.show', $rental->id) }}" class=" btn btn-primary">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mx-auto">
        {{ $rentals->links() }}
    </div>
@endsection
