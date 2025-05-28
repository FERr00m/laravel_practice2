<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EmployerController extends Controller
{
    public function create()
    {
        //dd(auth()->user()->employer);

        Gate::authorize('create', Employer::class);


        return view('employer.create');
    }
    public function store(Request $request)
    {
        Gate::authorize('create', Employer::class);

        auth()->user()->employer()->create(
            $request->validate([
                'company_name' => 'required|string|min:2|max:255|unique:employers,company_name'
            ])
        );

        return redirect()->route('works.index')->with('success', 'Your employer account was created!');
    }

}
