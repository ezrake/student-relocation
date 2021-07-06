<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Location;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rentalsQuery = new Rental();

        if ($request->has('search')) {
            $search = $request->query('search');
            $rentalsQuery = $rentalsQuery->where('name', 'like', "%$search%");
        }

        $rentals = $rentalsQuery->with('location')->paginate(8)
            ->withQueryString();

        return view('rentals.index', ['rentals' => $rentals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::select(
            'county',
            DB::raw('GROUP_CONCAT(id SEPARATOR ",") AS ids'),
            DB::raw('GROUP_CONCAT(sub_county SEPARATOR ",") AS sub_counties')
        )
            ->groupBy('county')
            ->get();

        $areas = $areas->mapWithKeys(function ($area) {
            return [
                $area['county'] => [
                    'subcounties' => array_combine(
                        explode(',', $area['ids']),
                        explode(',', $area['sub_counties'])
                    )
                ]
            ];
        });

        return view('rentals.create', ['areas' => $areas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rental = new Rental();
        $location = Location::where('location', 'like', $request->location)
            ->first();

        if ($location === null) {
            $location = new Location();
            $location->location = $request->location;
            $location->area_id = $request->subcounty;
            $location->saveOrFail();
        }

        $rental->location_id = $location->id;
        $rental->pics_uri = $request->pics_uri;
        $rental->name = $request->name;
        $rental->description = $request->description;

        $rental->saveOrFail();

        return redirect()->route('rentals.show', $rental->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function show(Rental $rental)
    {
        $rental = $rental->load('location');
        return view('rentals.details', ['rental' => $rental]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function edit(Rental $rental)
    {
        $rental = $rental->load('location');
        return view('rentals.edit', ['rental' => $rental]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rental $rental)
    {
        $data = $request->all();
        $location = $rental->location;
        $location = $location->fill($data);
        $rental = $rental->fill($data);

        $rental->saveOrFail();
        $location->saveOrFail();

        return redirect()->route('rentals.show', $rental->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rental $rental)
    {
        if ($rental->delete()) {
            return redirect()->route('rentals.index');
        }
        abort(500, 'Internal error, try again later');
    }
}
