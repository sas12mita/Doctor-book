<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Specialization;
use App\Models\User;
use App\Services\TimeSlotService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $doctors = Doctor::all();
    return view('doctors.index', compact('doctors'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $specializations=Specialization::all();
        return view('doctors.create',compact('specializations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Password::defaults()],
        //     'address' => ['required', 'string', 'max:255'],
        //     'phone' => ['required', 'string', 'max:10','min:10'],
        //     'role' => ['required', 'in:patient,doctor,admin'],
        // ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,       
            'address' => $request->address,
            'role' => $request->role, 
        ]);
        event(new Registered($user));
        if($user->role=='doctor')
        {
            Doctor::create([
                'user_id'=>$user->id,
                'specialization_id'=>$request->specialization_id,
                'experience'=>$request->experience,
                'qualification'=>$request->qualification,
            ]);
        }
        return redirect()->route('doctors.index');       
    }

    /**
     * Display the specified resource.
     */
    protected $timeSlotService;

    // Inject the TimeSlotService into the controller
    public function __construct(TimeSlotService $timeSlotService)
    {
        $this->timeSlotService = $timeSlotService;
    }

    public function show(string $id)
{
    $doctor = Doctor::findOrFail($id);

    // Fetch schedules for the doctor
    $schedules = Schedule::where('doctor_id', $id)
        ->where('date', '>=', now()) // Only future schedules
        ->orderBy('date', 'asc')
        ->get();

    // Generate time slots for each schedule
    $timeSlots = [];
    foreach ($schedules as $schedule) {
        $allSlots = $this->timeSlotService->generateTimeSlots($schedule->start_time, $schedule->end_time);

        // Filter out booked slots
        $unbookedSlots = array_filter($allSlots, function ($slot) use ($schedule) {
            return !Appointment::where('schedule_id', $schedule->id)
                ->where('start_time', $slot)
                ->exists();
        });

        // Ensure the filtered result is correct
        $timeSlots[$schedule->id] = array_values($unbookedSlots); // reindex array
    }

    // Pass data to the view
    return view('doctors.show', compact('doctor', 'schedules', 'timeSlots'));
}

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctor=Doctor::findOrFail($id);
        $specializations=Specialization::all();
        return view('doctors.edit',compact('doctor','specializations'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, $id)
        {
            $doctor = Doctor::findOrFail($id);
            $doctor->update($request->all());
            return redirect()->route('doctors.index');
        }
    
        // Remove the specified doctor from the database
        public function destroy($id)
        {
            $doctor = Doctor::findOrFail($id);
            $doctor->delete();
            return redirect()->route('doctors.index');
        }
    }

 


