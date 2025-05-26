<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\WorkApplication;
use Illuminate\Http\Request;

class MyWorkApplicationController extends Controller
{

    public function index()
    {
        return view('my_work_application.index', [
            'applications' => auth()
                ->user()
                ->workApplications()
                ->with([
                    'work' => fn($query) => $query->withCount('workApplications')->withAvg('workApplications', 'expected_salary'),
                    'work.employer'
                ])
                ->latest()
                ->get()
        ]);
    }


    public function destroy(string $id)
    {
        WorkApplication::destroy($id);

        return redirect()->route('my-work-application.index')->with('success', 'Work canceled!');
    }
}
