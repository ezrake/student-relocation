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
                    <form action="/students/{{ $student->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="username">Name</label>
                            <div class="input-group">
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ $student->user->name }}" required />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                value="{{ $student->user->email }}" />
                        </div>

                        {{-- <div class="mb-3">
                            <label for="address">Location</label>
                            <input type="text" name="address" class="form-control" id="address"
                                value="{{ $student->user->location}}" />
                        </div> --}}

                        <div class="mb-3">
                            <label for="institution">Institution</label>
                            <input type="text" name="institution" class="form-control" value="{{ $student->institution }}"
                                id="institution" />
                        </div>

                        <div class="mb-3">
                            <label for="campus">Campus</label>
                            <input type="text" name="campus" class="form-control" value="{{ $student->campus }}"
                                id="campus" />
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
