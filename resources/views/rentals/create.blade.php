@extends('layouts.app')

@section('content')
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                </div>
                <!-- line break -->
                <div class="col-md-8 order-md-1 ">
                    <h4 class="mb-3">Please enter your details to continue</h4>
                    <form action="{{ route('rentals.store') }}" method="POST">
                        @csrf
                        <div class=" mb-3">
                            <label for="address">County</label>
                            <select name="county" class="form-control" id="county">
                                @foreach ($areas as $area => $subcounties)
                                    <option value="{{ $area }}">{{ $area }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class=" mb-3">
                            <label for="address">Sub county</label>
                            <select name="subcounty" class="form-control" id="subcounty"></select>
                        </div>

                        <div class=" mb-3">
                            <label for="address">Location</label>
                            <input type="text" name="location" class="form-control" id="location" />
                        </div>

                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" />
                        </div>

                        <div class="mb-3">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" id="description" />
                        </div>

                        <div class="mb-3">
                            <label for="year">Picture</label>
                            <input type="text" name="picture" class="form-control" id="picture" />
                        </div>

                        <button class=" btn btn-primary btn-lg btn-block" type="submit">
                            Create
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
<script>
    const areas = {!! json_encode($areas->toArray(), JSON_HEX_TAG) !!}

    const load = () => {
        const countyEl = document.getElementById('county')
        countyEl.addEventListener('change', subCounty(areas), false)
    }
    window.onload = load
</script>
