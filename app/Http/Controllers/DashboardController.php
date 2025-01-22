<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        switch ($user->role) {
            case 'admin':
                return redirect()->route('dashboards.admin');
            case 'patient':
                return redirect()->route('dashboards.patient');
            case 'doctor':
                return redirect()->route('dashboards.doctor');
            default:
                return "Unauthorized Access";
            }    
    }
    public function patient()
    {
        $appointments=Appointment::where('patient_id', Auth::user()->patient->id)->get();
 
        return view('dashboards.patient', compact('appointments'));
    }
    public function doctor()
    {
        $appintments=Appointment::where('patient_id',Auth::user()->doctor->id)->get();
        return view('dashboards.patient',compact('appointments'));
    }
    public function admin()
    {
        $doctorCount=Doctor::count();
        $appointmentCount=Appointment::count();
        $patientCount=Patient::count();
        $scheduleCount=Schedule::count();
        return view('dashboards.admin', compact('doctorCount','appointmentCount', 'patientCount', 'scheduleCount'));
    }
}
