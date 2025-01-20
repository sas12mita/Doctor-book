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

            .main-content {
                margin-left: 25px;
                padding: 20px;
                width: calc(100% - 250px);
                box-sizing: border-box;
            }

            h2 {
                font-size: 1.25rem;
                font-weight: 600;
                color: #2d3748;
                margin-bottom: 20px;
            }

            .form-container {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 900px;
                margin: 0 auto;
            }

            .form-row {
                display: flex;
                gap: 20px;
                margin-bottom: 15px;
            }

            .form-group {
                flex: 1;
            }

            .form-group label {
                font-weight: bold;
                color: #2d3748;
                margin-bottom: 8px;
                display: block;
            }

            .form-group input,
            select {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 5px;
                font-size: 16px;
                color: #2d3748;
                background-color: #f7fafc;
            }

            .form-group input:focus {
                border-color: #4a5568;
                outline: none;
            }

            .form-group button {
                background-color: #48bb78;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .form-group button:hover {
                background-color: #38a169;
            }

            /* Sidebar and content flex */
            .flex {
                display: flex;
            }
        </style>

    </head>

    <body>

        <div class="flex">


            <!-- Main Content -->
            <main class="main-content">
                <div class="form-container">
                    <!-- doctors/show.blade.php -->

                    <div style="max-width: 800px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                        <h2 style="text-align: center; margin-bottom: 20px;">Book an Appointment with for {{ $doctor->specialization->name }}</h2>
                        <form action="{{ route('appointments.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
                            @csrf

                            <!-- Doctor Name (Displayed) -->
                            <div>
                                <label for="doctor_name" style="font-weight: bold;">Doctor</label>
                                <input type="text" id="doctor_id" value="{{ $doctor->user->name }}" readonly style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                <!-- Hidden input for doctor_id -->
                                <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                            </div>

                            <!-- Display Schedule Date -->
                            <div>
                                <label for="schedule_date" style="font-weight: bold;">Schedule Date</label>
                                <input type="text" id="schedule_date"
                                    value="{{ \Carbon\Carbon::parse($schedule->date)->format('F d, Y') }}"
                                    readonly style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                <!-- Hidden input for schedule_id -->
                                <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                            </div>


                            <!-- Time Slots -->
                            <div>
                                <label for="time_slot" style="font-weight: bold;">Available Time Slots</label>
                                <select name="start_time" id="time_slot" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                    @foreach ($unbookedSlots as $slot)
                                    <option value="{{ $slot }}">{{ $slot }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Hidden Patient ID -->
                            <input type="hidden" name="patient_id" value="{{ Auth::user()->patient->id }}">
                            <!-- Submit Button -->
                            <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">
                                Book Appointment
                            </button>
                        </form>
                    </div>


                </div>
            </main>
        </div>

    </body>

    </html>
</x-app-layout>