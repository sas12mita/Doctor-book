<x-app-layout>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
/* 
            body {
                font-family: Arial, sans-serif;
                background-color: #f7fafc;
                display: flex;
            } */

            /* Sidebar */
            .sidebar {
                width: 250px;
                background-color: #2d3748;
                color: white;
                min-height: 100vh;
                padding: 20px 0;
            }

            .sidebar ul {
                list-style-type: none;
            }

            .sidebar ul li {
                margin-bottom: 10px;
            }

            .sidebar a {
                display: flex;
                align-items: center;
                padding: 10px 20px;
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
                flex-grow: 2;
                padding: 20px;
                background-color: #edf2f7;
            }

            .main-header {
                font-size: 1.75rem;
                font-weight: bold;
                color: #2d3748;
                margin-bottom: 20px;
            }

            .content-card {
                background-color: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            /* Table Styles */
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            th,
            td {
                padding: 12px 16px;
                text-align: left;
                border-bottom: 1px solid #e2e8f0;
            }

            th {
                background-color: #4a5568;
                color: white;
            }

            tr:nth-child(even) {
                background-color: #f7fafc;
            }

            tr:hover {
                background-color: #edf2f7;
            }

            /* Action Buttons */
            .action-btns {
                display: flex;
                gap: 10px;
            }

            .action-btn {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 8px 12px;
                border-radius: 6px;
                color: white;
                text-decoration: none;
                font-size: 0.9rem;
                font-weight: bold;
                transition: background-color 0.3s;
            }

            .action-btn.edit {
                background-color:green;
                color:white;
            }

            .action-btn.edit:hover {
                background-color: #2b6cb0;
            }

            .action-btn.delete {
                background-color: #e53e3e;
            }

            .action-btn.delete:hover {
                background-color: #c53030;
            }
        </style>
    </head>

    <body>
        <div class="flex">
            <aside class="sidebar">
                <nav>
                    <ul>
                        <li><a href="{{ route('dashboards.admin') }}"><i class="fas fa-home"></i> Dashboard</a></li>
                        <li><a href="{{ route('doctors.index') }}"><i class="fas fa-users"></i> Doctor</a></li>
                        <li><a href="{{ route('patients.index') }}"><i class="fas fa-users"></i> Patient</a></li>
                        <li><a href="{{ route('specializations.index') }}"><i class="fa-solid fa-graduation-cap"></i> Specialization</a></li>
                        <li><a href="{{ route('schedules.index') }}"><i class="fas fa-calendar"></i> Schedule</a></li>
                        <li><a href="{{ route('appointments.index') }}"><i class="fa-solid fa-calendar"></i> Appointment</a></li>
                    </ul>
                </nav>
            </aside>

            <main class="main-content">
                <div class="main-header">Specializations</div>
                <a href="{{route('specializations.create')}}"><button style="padding:10px;background-color:green;color:white"> Add Specialization</button></a><br>
                <div class="content-card">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($specializations as $specialization)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $specialization->name }}</td>
                                    <td class="action-btns">
                                        <a href="{{ route('specializations.edit', $specialization->id) }}" class="action-btn edit">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('specializations.destroy', $specialization->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="margin: 0;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn delete">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </body>

    </html>
</x-app-layout>
