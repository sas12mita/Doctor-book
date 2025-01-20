<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Services\TimeSlotService;
use id;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    private $timeSlotService;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role=="admin")
        {

        }
        elseif(Auth::user()->role=="patient")
        {
            
        }
        elseif(Auth::user()->role=="doctor")
        {

        }else{
            return false;
        }
    }
    public function __construct(TimeSlotService $timeSlotService)
    {
        $this->timeSlotService = $timeSlotService;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
{
    $schedule_id = $request->query('schedule_id');
    $doctor_id = $request->query('doctor_id');
    $schedule = Schedule::findOrFail($schedule_id);
    $doctor = Doctor::findOrFail($doctor_id);
    $allSlots = $this->timeSlotService->generateTimeSlots($schedule->start_time, $schedule->end_time);

    
    $unbookedSlots = array_filter($allSlots, function ($slot) use ($schedule) {
        return !Appointment::where('schedule_id', $schedule->id)
            ->where('start_time', $slot)
            ->exists();
    });

    // Pass the schedule, doctor, and available slots to the view
    return view('appointments.create', compact('schedule', 'doctor', 'unbookedSlots'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
            // Validate the incoming request
            $validated = $request->validate([
                'schedule_id' => 'required|exists:schedules,id',
                'start_time' => 'required|date_format:H:i', // Validate as time in "HH:MM" format
                'doctor_id' => 'required|exists:doctors,id',
                'patient_id' => 'required|exists:patients,id',
            ]);
            $appointment = new Appointment();
            $appointment->schedule_id = $validated['schedule_id'];
            $appointment->start_time = $request->start_time;
            $appointment->doctor_id = $validated['doctor_id'];
            $appointment->patient_id = $validated['patient_id'];
            $appointment->status = 'pending'; // You can set an initial status
            $appointment->save();
    
            // Redirect with a success message
            return redirect()->route('appointments.index')->with('success', 'Appointment booked successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
