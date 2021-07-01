@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card  border-dark mb-3 mt-4">
            <div class="card-header">
                {{ $student->user->name }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Basic Information</h5>
                <p class="card-text">
                    <span>Email: {{ $student->user->email }}</span><br>
                    <span>Location: {{ $student->location->location }}</span><br>
                    <span>Institution: {{ $student->institution }}</span><br>
                    <span>Campus: {{ $student->campus }}</span><br>
                    <span>Year: {{ $student->year }}</span><br>
                </p>
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
            </div>
            <div class="card-footer text-right">
                <form action="/students/{{ $student->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-lg btn-block" type="submit">
                        Delete My Account
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection()
