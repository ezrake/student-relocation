<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Location;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $studentsQuery =  DB::table('students')
            ->select(['users.id', 'name', 'institution', 'campus'])
            ->join('users', 'students.user_id', '=', 'users.id');

        if ($request->has('search')) {
            $search = $request->query('search');
            $studentsQuery = DB::table('students')
                ->select(['users.id', 'name', 'institution', 'campus'])
                ->where('name', 'like', '%' . $search . '%')
                ->where('role_id', '=', '1')
                ->join('users', 'students.user_id', '=', 'users.id');
        }

        $students = $studentsQuery->paginate(8)->withQueryString();

        return View('students.index')
            ->with('students', $students);
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

        return view('students.create')
            ->with('areas', $areas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();
        $location = Location::where('location', 'like', $request->location)
            ->first();

        if ($location === null) {
            $location = new Location();
            $location->location = $request->location;
            $location->area_id = $request->subcounty;
            $location->saveOrFail();
        }
        $student->user_id = 440;
        $student->location_id = $location->id;
        $student->institution = $request->institution;
        $student->campus = $request->campus;
        $student->year = $request->year;

        $student->saveOrFail();
        return redirect()->route('students.show', $student->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $student = $student->load(['user', 'location']);
        return view('students.details', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student = $student->load('user');
        $student->user->name = $request->name;
        $student->user->email = $request->email;
        $student->institution = $request->institution;
        $student->campus = $request->campus;

        $student->saveOrFail();
        $student->fresh('user');
        return redirect()->route('students.show', $student->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if ($student->user->delete()) {
            return redirect('/');
        }
        abort(500, 'Internal error, try again later');
    }
}
