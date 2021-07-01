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
                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf
                        <div class=" mb-3">
                            <label for="address">County</label>
                            <select name="county" class="form-control" id="county" onchange="subCounty(event)">
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
                            <label for="institution">Institution</label>
                            <input type="text" name="institution" class="form-control" id="institution" />
                        </div>

                        <div class="mb-3">
                            <label for="campus">Campus</label>
                            <input type="text" name="campus" class="form-control" id="campus" />
                        </div>

                        <div class="mb-3">
                            <label for="year">Year</label>
                            <input type="number" name="year" class="form-control" id="year" min=1 max=7 />
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
    function subCounty(e) {
        let subcountyEl = document.getElementById("subcounty");
        while (subcountyEl.options.length > 0) {
            subcountyEl.remove(0);
        }

        let county = e.target.value
        let areas = {!! json_encode($areas->toArray(), JSON_HEX_TAG) !!}
        let subCounties = areas[county].subcounties

        Object.keys(subCounties).forEach(
            key => {
                let opt = new Option(subCounties[key], key);
                subcountyEl.appendChild(opt)
            })
    }
</script>
