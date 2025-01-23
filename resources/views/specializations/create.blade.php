<x-app-layout>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Specialization Form</title>

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
            display: flex;
            flex-direction: column;
        }

        /* Navbar Styles */
       

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: #2d3748;
            color: white;
            min-height: calc(100vh - 60px);
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

        /* Main Content Styles */
        .main-content {
            display: flex;
            flex-grow: 1;
        }

        .form-container {
            flex-grow: 1;
            padding: 40px;
            background-color: #ffffff;
        }

        .form-container h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #4a5568;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbd5e0;
            border-radius: 5px;
            font-size: 1rem;
        }

        button {
            background-color: #2d3748;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #4a5568;
        }
    </style>
</head>

<body>
 

    <div class="main-content">
        <aside class="sidebar">
            <nav>
                <ul>
                    <li>
                        <a href="{{ route('dashboards.admin') }}" class="flex items-center py-2 px-4 hover:bg-gray-700">
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
                        <a href="{{ route('patients.index') }}" class="flex items-center py-2 px-4 hover:bg-gray-700">
                            <i class="fas fa-users"></i>
                            <span>Patient</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('specializations.index') }}" class="flex items-center py-2 px-4 hover:bg-gray-700">
                            <i class="fa-solid fa-graduation-cap"></i>
                            <span>Specialization</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('schedules.index') }}" class="flex items-center py-2 px-4 hover:bg-gray-700">
                            <i class="fas fa-calendar"></i>
                            <span>Schedule</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('appointments.index') }}" class="flex items-center py-2 px-4 hover:bg-gray-700">
                            <i class="fa-solid fa-calendar"></i>
                            <span>Appointment</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="form-container">
            <h2>Add New Specialization</h2>

            <form action="{{ route('specializations.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Specialization Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>
</x-app-layout>
