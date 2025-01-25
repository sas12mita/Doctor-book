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

            /* Main Content */
            .main-content {
                margin-left: 10px;
                padding: 2px;
            }

            h2 {
                font-size: 1.25rem;
                font-weight: 600;
                color: #2d3748;
                margin-bottom: 20px;
            }

            /* Table Styles */
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            th,
            td {
                padding: 6px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            th {
                background-color: #4a5568;
                color: white;
            }

            tr:hover {
                background-color: #edf2f7;
            }

            /* Action buttons container */
            .action-btns {
                display: flex;
                gap: 10px;
                /* Space between buttons */
            }

            .action-btn {
                color: white;
                padding: 5px 10px;
                border-radius: 5px;
                text-decoration: none;
                transition: background-color 0.3s;
            }

            .action-btn:hover {
                background-color: #4a5568;
            }
        </style>

    </head>

    <body>

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
            <main class="main-content">
                <h2>Appointment List</h2>
                <div class="action-btns">
              </div>
                <!-- Doctors Table (Static Data) -->
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient's Name</th>
                            <th>Doctor's Name</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appointment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $appointment->patient->user->name }}</td>
                            <td>{{ $appointment->doctor->user->name }}</td>
                            <td>{{ $appointment->schedule->date }}</td>
                            <td>{{ $appointment->start_time }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('appointments.edit', $appointment->id) }}" style="display: inline; padding:5px;background-color:green; color:white">Edit</a>

                                <!-- Delete Button -->
                                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display: inline; padding:5px;background-color:red; color:white">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this doctor?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" style="color:red">No Appointment Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </main>
        </div>

    </body>

    </html>
</x-app-layout>
