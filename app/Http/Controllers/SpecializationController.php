<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\Specificity;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
     public function index()
     {
         $specializations = Specialization::all();
         return view('specializations.index', compact('specializations'));
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('specializations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Specialization::create([
            'name' => $request->input('name'),
        ]);
        return redirect()->route('specializations.index')->with('success', 'Specialization created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $specialization=Specialization::findOrFail($id);
        return view('specializations.edit', compact('specialization'));
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $specialization=Specialization::findOrFail($id);
        $specialization->update($request->all());
    return redirect()->route('specializations.index')->with('success', 'Post updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $specialization=Specialization::findOrFail($id);
        $specialization->delete();
        return redirect()->route('specializations.index')->with('success', 'Post deleted successfully.');
    }
}
