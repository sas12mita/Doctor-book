<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white min-h-screen">
            <nav class="py-6">
                <ul>
                    <li>
                        <a href="" class="flex items-center py-2 px-4 hover:bg-gray-700">
                            <i class="fas fa-home"></i>
                            <span style="margin-left:10px">Dashboard</span>
                        </a>
                    </li>
                    <li><a href="{{route('doctors.index')}}" class="flex items-center py-2 px-4 hover:bg-gray-700">
                            <i class="fas fa-users mr-2"></i>
                            <span class="ml-2">Doctor</span> <!-- Use Tailwind's ml-2 for left margin -->
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-700">
                            <i class="fas fa-users mr-2"></i>
                            <span style="margin-left:10px">Patient</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-700">
                            <i class="fa-solid fa-graduation-cap"></i>
                            <span style="margin-left:10px">Specilization</span> </a>
                    </li>
                    <li>
                        <a href="{{route('schedules.index')}}" class="flex items-center py-2 px-4 hover:bg-gray-700">
                            <i class="fas fa-calendar mr-2"></i>
                            <span style="margin-left:10px">Schedule</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-700">
                            <i class="fa-solid fa-calendar"></i>
                            <span style="margin-left:10px">Appointment</span>
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
                    <h3 class="text-lg font-bold text-gray-800">Total Users</h3>
                    <p class="text-2xl font-semibold text-green-600 mt-2">1,234</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold text-gray-800">Total Sales</h3>
                    <p class="text-2xl font-semibold text-blue-600 mt-2">$12,345</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold text-gray-800">Pending Tasks</h3>
                    <p class="text-2xl font-semibold text-red-600 mt-2">8</p>
                </div>
            </div>
        </main>
    </div>
</body>

</html>