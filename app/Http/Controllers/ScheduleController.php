<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Specialization;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctor::all();
        return view('schedules.create', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date|after:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'availability' => 'required|in:available,unavailable',
        ]);



        // Check for overlapping schedules for the same doctor
        $overlapExists = Schedule::where('doctor_id', $request->doctor_id)
            ->where('date', $request->date)
            ->where(function ($query) use ($request) {
                $query->where('start_time', '<', $request->end_time)
                    ->where('end_time', '>', $request->start_time);
            })
            ->exists();

        if ($overlapExists) {
            return redirect()->back()->withErrors(['error' => 'The schedule overlaps with an existing schedule for this doctor.']);
        }

        // Create the new schedule
        Schedule::create([
            'doctor_id' => $request->doctor_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'availability' => $request->availability,
        ]);

        return redirect()->route('schedules.index');
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
    public function edit(string $id)
    {

        $schedule = Schedule::findOrFail($id);
        $doctors = Doctor::all();
        return view('schedules.edit', compact('schedule', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'availability' => 'required|in:available,unavailable',
        ]);

        $schedule = Schedule::findOrFail($id);

        $schedule->update($validated);
        return redirect()->route('schedules.index')->with('success', 'Schedule updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $schedule=Schedule::findOrFail($id);
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully!');
    }
}
