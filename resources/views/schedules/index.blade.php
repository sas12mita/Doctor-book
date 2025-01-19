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
                padding-left: 20px;
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                border-bottom: 3px solid #ddd;
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
                gap: 16px;
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
                            <a href="" class="flex items-center py-2 px-4 hover:bg-gray-700">
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
                            <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-700">
                                <i class="fas fa-users"></i>
                                <span>Patient</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-700">
                                <i class="fa-solid fa-graduation-cap"></i>
                                <span>Specialization</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-700">
                                <i class="fas fa-calendar"></i>
                                <span>Schedule</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-700">
                                <i class="fa-solid fa-calendar"></i>
                                <span>Appointment</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="main-content">
                <h2>Schedules List</h2>
                <div class="action-btns">
                    <a href="{{route('schedules.create')}}" class="action-btn" style="background-color:green">Add Schedule</a>
                </div>
                <!-- Schedules Table (Static Data) -->
                <table>
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Doctor Name</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($schedules as $schedule)
                        <tr>
                            <td>{{ $loop->iteration }}</td> <!-- Serial number -->
                            <td>{{ $schedule->doctor->user->name }}</td> <!-- Assuming doctor has a related user -->
                            <td>{{ $schedule->date }}</td>
                            <td>{{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}</td> <!-- Format time -->
                            <td>{{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}</td> <!-- Format time -->
                            <td>
                                <a href="{{route('schedules.edit',$schedule->id)}}" style="display: inline; padding:5px;background-color:green; color:white">Edit</a>

                                <!-- Delete Button -->
                                <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display: inline; padding:5px;background-color:red; color:white">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this doctor?')">Delete</button>
                                </form>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" style="color:red; text-align:center;">No Schedule Found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </main>
        </div>

    </body>

    </html>
</x-app-layout>