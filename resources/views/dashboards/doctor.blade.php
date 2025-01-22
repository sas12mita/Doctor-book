<x-app-layout>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex">
        
<aside class="w-64 bg-gray-800 text-white min-h-screen">
    <nav class="py-6">
        <ul>
            <li>
                <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-700">
                    <i class="fas fa-home"></i>
                    <span class="ml-2">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('doctors.index')}}" class="flex items-center py-2 px-4 hover:bg-gray-700">
                    <i class="fas fa-users"></i>
                    <span class="ml-2">Doctors</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-700">
                    <i class="fas fa-users"></i>
                    <span class="ml-2">Patients</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-700">
                    <i class="fas fa-graduation-cap"></i>
                    <span class="ml-2">Specializations</span>
                </a>
            </li>
            <li>
                <a href="{{route('schedules.index')}}" class="flex items-center py-2 px-4 hover:bg-gray-700">
                    <i class="fas fa-calendar"></i>
                    <span class="ml-2">Schedules</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-700">
                    <i class="fas fa-calendar-alt"></i>
                    <span class="ml-2">Appointments</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>

<!-- Main Content -->
<main class="flex-1 p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Appointments</h2>
    <div class="space-y-6">
        <div class="max-w-3xl mx-auto space-y-4">
          @forelse($appointments as $appointment)
            <div class="flex items-center justify-between bg-white p-4 rounded-lg shadow hover:shadow-lg transition duration-300">
                <!-- Left Section -->
                <div class="flex items-center space-x-4">
                    <div class="text-center bg-blue-500 text-white w-12 h-12 flex items-center justify-center rounded-full">
                        <i class="fas fa-calendar-check text-xl"></i>
                    </div>
                    <div>
                        <p class="text-lx">
                            {{\Carbon\Carbon::parse($appointment->schedule->date)->format('F j, Y')}}
                        </p>
                        <p class="text-sm text-gray-500">
                            <strong>Day:</strong> {{\Carbon\Carbon::parse($appointment->schedule->date)->format('l')}}
                        </p>

                        <p class="text-sm text-gray-600">
                            <strong>Patient's Name:</strong> {{$appointment->patient->user->name}}
                        </p>
                    </div>
                </div>

                <!-- Right Section -->
                <div class="text-right">
                    <p class="text-sm text-gray-500">
                        <strong>Time:</strong> {{\Carbon\Carbon::parse($appointment->start_time)->format('h:i A')}}
                    </p>
                    <p> @if($appointment->status == 'pending')
                        <span style="color:red">{{$appointment->status}}</span>
                        @elseif($appointment->status == 'booked')
                        <span style="color:blue">{{$appointment->status}}</span>
                        @endif
                    </p>
                </div>
            </div>
            <br>
            @empty
            <span style="font-size: 14px; color: #888;">No slots available</span>
            @endforelse

        </div>
      

</main>
</div>
</body>

</html>
</x-app-layout> 