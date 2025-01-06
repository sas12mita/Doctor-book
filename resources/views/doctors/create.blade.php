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

            .form-group input, select{
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
                <h2>Add / Edit Doctor</h2>

                <!-- Doctor Form -->
                <div class="form-container">
                    <form action="{{route('doctors.store') }}" method="POST">
                        @csrf
                    <div class="form-row">
                            <div class="form-group">
                                <label for="name">Doctor's Name</label>
                                <input type="text" id="name" name="name"  required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="specialization">Specialization</label>
                                <input type="text" id="specialization" name="specialization" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="qualification" name="qualification" required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required>
                            </div>
                            </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="qualification">Qualification</label>
                                <input type="text" id="qualification" name="qualification"  required>
                            </div>
                            <div class="form-group">
                                <label for="experience">Experience</label>
                                <input type="text" id="experience" name="experience"  required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select id="role" name="role" required>
                                    <option value="doctor">Doctor</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" name="address" required>
                            </div>
                        </div>
                       


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