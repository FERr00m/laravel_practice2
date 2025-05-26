<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class WorkApplicationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Work $work)
    {
        Gate::authorize('apply', $work);
        return view('work_application.create', ['work' => $work]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Work $work, Request $request)
    {
        Gate::authorize('apply', $work);
        $work->workApplications()->create([
            'user_id' => $request->user()->id,
            ...$request->validate([
                'expected_salary' => 'required|min:1|max:1000000'
            ])
        ]);

        return redirect()->route('works.show', $work)
            ->with('success', 'Work application submitted!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
