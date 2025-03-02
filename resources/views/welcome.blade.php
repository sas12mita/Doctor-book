<x-app-layout>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Doctor Appointment System</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            footer {
                background-color: #0077ff;
                color: #fff;
            }

            footer p {
                margin: 0;
            }

            .service-card:hover {
                transform: scale(1.05);
                transition: 0.3s;
            }
        </style>
    </head>

    <body class="bg-blue-50">

        <!-- Header -->
        
        <!-- Hero Section -->
        <section class="bg-white flex items-center justify-center">
            <div class="pl-3 container mx-auto flex flex-col lg:flex-row items-center">
                <!-- Left Side: Text Content -->
                <div class="lg:w-1/2 text-center lg:text-left">
                    <a href="#" class="inline-block bg-blue-200 py-3 px-6 rounded-lg hover:bg-green-500 transition duration-300">List of Doctors</a>
                    <br><br>
                    <h1 class="text-4xl font-bold text-blue-700">Your Partner In Health and<br> Wellness</h1>
                    <p class="text-lg text-gray-600 mt-4">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                </div>

                <!-- Right Side: Image -->
                <div class="lg:w-1/2 mt-8 lg:mt-0">
                    <img src="https://plus.unsplash.com/premium_photo-1733317206347-e6eeea03bf41?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8ZG9jdG9yJTIwYW5kJTIwaG9zcGl0YWx8ZW58MHx8MHx8fDA%3D" alt="Healthcare Image" class="w-full h-auto rounded-lg shadow-lg">
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="py-12 bg-blue-50" id="service">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold text-blue-700 mb-6">Our Healthcare Services</h2>
                <p class="text-gray-600 mb-8">Explore a wide range of specialized healthcare services designed for you.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="service-card bg-white p-6 rounded-lg shadow hover:shadow-lg">
                        <i class="fas fa-ambulance fa-3x text-blue-600 mb-4"></i>
                        <h4 class="text-xl font-semibold text-gray-800">Emergency Care</h4>
                        <p class="text-gray-600 mt-2">24/7 emergency support and care for urgent needs.</p>
                    </div>
                    <div class="service-card bg-white p-6 rounded-lg shadow hover:shadow-lg">
                        <i class="fas fa-heartbeat fa-3x text-blue-600 mb-4"></i>
                        <h4 class="text-xl font-semibold text-gray-800">Cardiology</h4>
                        <p class="text-gray-600 mt-2">Advanced heart care services with expert cardiologists.</p>
                    </div>
                    <div class="service-card bg-white p-6 rounded-lg shadow hover:shadow-lg">
                        <i class="fas fa-brain fa-3x text-blue-600 mb-4"></i>
                        <h4 class="text-xl font-semibold text-gray-800">Neurology</h4>
                        <p class="text-gray-600 mt-2">Comprehensive care for neurological disorders.</p>
                    </div>
                    <div class="service-card bg-white p-6 rounded-lg shadow hover:shadow-lg">
                        <i class="fas fa-user-md fa-3x text-blue-600 mb-4"></i>
                        <h4 class="text-xl font-semibold text-gray-800">Primary Care</h4>
                        <p class="text-gray-600 mt-2">Personalized treatment plans for routine check-ups.</p>
                    </div>
                </div>
            </div>
        </section>
 <!-- About Us Section -->
 <section class="py-12 bg-white" id="about">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold text-blue-700 mb-6">About Us</h2>
                <p class="text-gray-600 mb-8">At HealthCare+, we are committed to providing exceptional healthcare services tailored to your needs. With a team of experienced professionals and state-of-the-art facilities, we strive to deliver excellence in every aspect of care.</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-blue-50 p-6 rounded-lg shadow">
                        <i class="fas fa-user-md fa-3x text-blue-600 mb-4"></i>
                        <h4 class="text-xl font-semibold text-gray-800">Expert Team</h4>
                        <p class="text-gray-600 mt-2">Highly qualified doctors and medical staff.</p>
                    </div>
                    <div class="bg-blue-50 p-6 rounded-lg shadow">
                        <i class="fas fa-hospital-alt fa-3x text-blue-600 mb-4"></i>
                        <h4 class="text-xl font-semibold text-gray-800">Advanced Facilities</h4>
                        <p class="text-gray-600 mt-2">Modern equipment and state-of-the-art facilities.</p>
                    </div>
                    <div class="bg-blue-50 p-6 rounded-lg shadow">
                        <i class="fas fa-hand-holding-heart fa-3x text-blue-600 mb-4"></i>
                        <h4 class="text-xl font-semibold text-gray-800">Compassionate Care</h4>
                        <p class="text-gray-600 mt-2">Personalized treatment and patient-centered approach.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Us Section -->
        <section class="py-16 bg-gradient-to-br from-blue-50 to-blue-100" id="contact">
            <div class="container mx-auto px-6 lg:px-20">
                <h2 class="text-4xl font-extrabold text-blue-800 mb-8 text-center">Contact Us</h2>
                <p class="text-lg text-gray-700 mb-12 text-center max-w-2xl mx-auto">Have questions or need support? Drop us a message or reach out using the information below!</p>
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 items-center">
                    <div class="lg:col-span-2 bg-white p-8 rounded-xl shadow-lg">
                        <h4 class="text-2xl font-semibold text-blue-800 mb-6">Get in Touch</h4>
                        <p class="text-gray-700 mb-4">
                            <strong>Address:</strong><br>
                            123 Healthcare Lane, Cityville, Healthstate 45678
                        </p>
                        <p class="text-gray-700 mb-4">
                            <strong>Phone:</strong><br>
                            <a href="tel:+1234567890" class="text-blue-600 hover:text-blue-800 transition">+1 (234) 567-890</a>
                        </p>
                        <p class="text-gray-700">
                            <strong>Email:</strong><br>
                            <a href="mailto:support@healthcareplus.com" class="text-blue-600 hover:text-blue-800 transition">support@healthcareplus.com</a>
                        </p>
                        <div class="mt-8">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYCd2_e8oeH9n9oZamvoUjpzLHFSn0E6I36g&s" alt="Contact Illustration" class="rounded-lg shadow-lg">
                        </div>
                    </div>
                    <div class="lg:col-span-3 bg-white p-8 rounded-xl shadow-lg">
                        <h4 class="text-2xl font-semibold text-blue-800 mb-6">Send Us a Message</h4>
                        <form action="#" method="POST">
                            <div class="mb-6">
                                <label for="name" class="block text-gray-700 font-medium">Your Name</label>
                                <input type="text" id="name" name="name" class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your name" required>
                            </div>
                            <div class="mb-6">
                                <label for="email" class="block text-gray-700 font-medium">Your Email</label>
                                <input type="email" id="email" name="email" class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-6">
                                <label for="message" class="block text-gray-700 font-medium">Your Message</label>
                                <textarea id="message" name="message" rows="5" class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your message" required></textarea>
                            </div>
                            <button type="submit" class="w-full bg-blue-600 text-white font-medium py-3 rounded-lg hover:bg-blue-700 transition">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-4">
            <div class="container mx-auto text-center">
                <p>&copy; 2024 HealthCare+. All rights reserved.</p>
            </div>
        </footer>

    </body>
    </html>
</x-app-layout>
