@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: right">
        <form method="get" class="m-3" action="/students">
            <div>
                <input type="text" name="search" class="form-control ds-input" placeholder="Search students" />
            </div>
        </form>
    </div>
    <div class="card-group row-cols-4 mx-1">
        @foreach ($students as $student)
            <div class="col-l-6">
                <div class="card border-primary bg-light my-1" style="width: 18rem;">
                    <div class="card-header">
                        {{ $student->name }}
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <span>Institution: {{ $student->institution }}</span> <br>
                            <span>Campus: {{ $student->campus }}</span>
                        </p>
                        <a href="/students/{{ $student->id }}" class=" btn btn-primary">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mx-auto">
        {{ $students->links() }}
    </div>
@endsection
