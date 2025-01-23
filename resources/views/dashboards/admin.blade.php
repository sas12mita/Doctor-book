<x-app-layout>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
          /* Basic Reset */
          * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: Arial, sans-serif;
                background-color: #f7fafc;
            }

            /* Sidebar Styles */
            .sidebar {
                width: 250px;
                background-color: #2d3748;
                color: white;
                min-height: 100vh;
                padding-top: 20px;
            }

            .sidebar ul {
                list-style-type: none;
            }

            .sidebar ul li {
                padding: 10px;
            }

            .sidebar a {
                display: flex;
                align-items: center;
                padding: 10px;
                color: white;
                text-decoration: none;
                transition: background-color 0.3s;
            }

            .sidebar a:hover {
                background-color: #4a5568;
            }

            .sidebar i {
                margin-right: 10px;
            }
    </style>
</head>

<body class="bg-gray-100">
<div class="flex">
            <!-- Sidebar -->
            <aside class="sidebar">
                <nav>
                    <ul>
                        <li>
                            <a href="{{route('dashboards.admin')}}" class="flex items-center py-2 px-4 hover:bg-gray-700">
                                <i class="fas fa-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li><a href="{{route('doctors.index')}}" class="flex items-center py-2 px-4 hover:bg-gray-700">
                                <i class="fas fa-users"></i>
                                <span>Doctor</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('patients.index')}}" class="flex items-center py-2 px-4 hover:bg-gray-700">
                                <i class="fas fa-users"></i>
                                <span>Patient</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('specializations.index')}}" class="flex items-center py-2 px-4 hover:bg-gray-700">
                                <i class="fa-solid fa-graduation-cap"></i>
                                <span>Specialization</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('schedules.index')}}" class="flex items-center py-2 px-4 hover:bg-gray-700">
                                <i class="fas fa-calendar"></i>
                                <span>Schedule</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('appointments.index')}}" class="flex items-center py-2 px-4 hover:bg-gray-700">
                                <i class="fa-solid fa-calendar"></i>
                                <span>Appointment</span>
                            </a>
                        </li>
                    </ul>
           </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Welcome, Admin</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold text-gray-800">Total Doctor</h3>
                    <p class="text-2xl font-semibold text-green-600 mt-2">{{$doctorCount}}</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold text-gray-800">Total Patient </h3>
                    <p class="text-2xl font-semibold text-blue-600 mt-2">{{$patientCount}}</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold text-gray-800">Total Appointment</h3>
                    <p class="text-2xl font-semibold text-red-600 mt-2">{{$appointmentCount}}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold text-gray-800">Total Schedule</h3>
                    <p class="text-2xl font-semibold text-red-600 mt-2">{{$scheduleCount}}</p>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
</x-app-layout>
