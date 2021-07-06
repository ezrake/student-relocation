@extends('layouts.app')

@section('content')
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                </div>
                <!-- line break -->
                <div class="col-md-8 order-md-1 ">
                    <h4 class="mb-3">Edit</h4>
                    <form action="{{ route('rentals.update', $rental->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <div class="input-group">
                                <input type="text" name="name" class="form-control" id="name" value="{{ $rental->name }}"
                                    required />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Location</label>
                            <input type="text" name="location" class="form-control" id="location"
                                value="{{ $rental->location->location }}" />
                        </div>

                        <div class="mb-3">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" value="{{ $rental->description }}"
                                id="description" />
                        </div>

                        <button class="btn btn-primary btn-lg btn-block" type="submit">
                            Update
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
