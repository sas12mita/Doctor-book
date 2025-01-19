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

            /* Sidebar Styles */
            .sidebar {
                width: 250px;
                background-color: #2d3748;
                color: white;
                min-height: 100vh;
                padding-top: 20px;
                position: fixed;
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
                margin-left: 260px;
                padding: 20px;
                width: calc(100% - 260px);
            }

            h2 {
                font-size: 1.5rem;
                font-weight: 600;
                color: #2d3748;
                margin-bottom: 20px;
            }

            .form-container {
                background-color: white;
                border-radius: 8px;
                padding: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .form-row {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
                margin-bottom: 15px;
            }

            .form-group {
                display: flex;
                flex-direction: column;
            }

            .form-group label {
                font-size: 0.9rem;
                color: #4a5568;
                margin-bottom: 5px;
            }

            .form-group input,
            .form-group select {
                padding: 10px;
                border: 1px solid #cbd5e0;
                border-radius: 5px;
                font-size: 0.9rem;
                color: #2d3748;
                outline: none;
            }

            .form-group input:focus,
            .form-group select:focus {
                border-color: #63b3ed;
                box-shadow: 0 0 4px rgba(99, 179, 237, 0.5);
            }

            button {
                background-color: #48bb78;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 1rem;
                font-weight: 600;
                transition: background-color 0.3s;
            }

            button:hover {
                background-color: #38a169;
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
                        <li>
                            <a href="{{ route('doctors.index') }}" class="flex items-center py-2 px-4 hover:bg-gray-700">
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
                <h2>Schedule Form</h2>
                <div class="form-container">
                    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="form-group">
                                <label for="doctor_id">Doctor</label>
                                <select id="doctor_id" name="doctor_id" required>
                                    <option value="" disabled selected>Select Doctor</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}" {{ $doctor->id == $schedule->doctor_id ? 'selected' : '' }}>{{ $doctor->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" id="date" name="date" value="{{ old('date', $schedule->date) }}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="start_time">Start Time</label>
                                <input type="time" id="start_time" name="start_time" value="{{ old('start_time', $schedule->start_time) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="end_time">End Time</label>
                                <input type="time" id="end_time" name="end_time" value="{{ old('end_time', $schedule->end_time) }}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="availability">Availability</label>
                                <select id="availability" name="availability" required>
                                    <option value="available" {{ $schedule->availability == 'available' ? 'selected' : '' }}>Available</option>
                                    <option value="unavailable" {{ $schedule->availability == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                                </select>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger" style="color:red">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </body>

    </html>
</x-app-layout>
