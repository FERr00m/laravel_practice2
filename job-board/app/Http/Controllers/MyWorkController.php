<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkRequest;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MyWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAnyEmployer', Work::class);

        $works = auth()->user()
            ->employer
            ->works()
            ->with(['employer', 'workApplications', 'workApplications.user'])
            ->get();

        return view('my_work.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Work::class);
        return view('my_work.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkRequest $request)
    {

        Gate::authorize('create', Work::class);
        auth()->user()->employer->works()->create($request->validated());

        return redirect()->route('my-works.index')->with('success', 'Work created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Work $myWork)
    {
        Gate::authorize('update', $myWork);
        return view('my_work.edit', ['work' => $myWork]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WorkRequest $request, Work $myWork)
    {
        Gate::authorize('update', $myWork);
        $myWork->update($request->validated());

        return redirect()->route('my-works.index')->with('success', 'Work update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
