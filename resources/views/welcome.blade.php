<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barber Shop - Premium Grooming Services</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <style>
        /* Tailwind CSS styles */
        /* You can add custom styles here if necessary */
    </style>
    @endif

    <!-- Add your script to handle the form submission -->
    <script>
        async function bookAppointment(event) {
            event.preventDefault(); // Prevent the default form submission

            // Get form data
            const formData = new FormData(event.target);

            const data = {
                user_id: formData.get('user_id'),
                product_id: formData.get('product_id'),
                title: formData.get('title'),
                description: formData.get('description'),
                appointment_date: formData.get('appointment_date'),
            };

            try {
                const response = await fetch('/api/appointments', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(data),
                });

                if (response.ok) {
                    const result = await response.json();
                    alert('Appointment successfully booked!');
                    // Optionally reset the form after successful booking
                    document.getElementById('appointment-form').reset();
                } else {
                    const error = await response.json();
                    alert('Error: ' + error.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('There was an issue booking the appointment.');
            }
        }
    </script>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50 text-black">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <!-- Background Image -->
        <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="Barber Shop Background" />

        <!-- Main Content -->
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <!-- Header -->
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <!-- Logo -->
                    <div class="flex lg:justify-center lg:col-start-2">
                        <!-- Your logo here -->
                    </div>
                </header>

                <!-- Navigation -->
                @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Dashboard
                    </a>
                    @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Admin Login
                    </a>
                    @endauth
                </nav>
                @endif
                </header>

                <!-- Hero Section -->
                <section class="text-center py-16">
                    <h1 class="text-4xl font-bold text-black dark:text-white">
                        Welcome to <span class="text-[#FF2D20]">Premium Barber Shop</span>
                    </h1>
                    <p class="mt-4 text-lg text-black/70 dark:text-white/70">
                        Your go-to destination for premium grooming services. Book your appointment today!
                    </p>
                    <a href="#" class="mt-8 inline-block rounded-md bg-[#FF2D20] px-6 py-3 text-white transition hover:bg-[#FF2D20]/90 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#FF2D20]" id="book-now-btn">
                        Book Now
                    </a>
                </section>

                <!-- Appointment Booking Form -->
                <section id="appointment-section" class="hidden" style="color: black !important;">
                    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
                        <h2 class="text-2xl font-semibold text-center mb-6">Book an Appointment</h2>
                        <form id="appointment-form" onsubmit="bookAppointment(event)">

                            <!-- Product selection -->
                            <label for="product_id" class="block mb-2">Product</label>
                            <select name="product_id" id="product_id" class="block w-full p-2 mb-4 border border-gray-300 rounded" required>
                                <option value="" disabled selected>Loading products...</option>
                            </select>

                            <!-- Title -->
                            <label for="title" class="block mb-2">Title</label>
                            <input type="text" name="title" id="title" class="block w-full p-2 mb-4 border border-gray-300 rounded" required>

                            <!-- Description -->
                            <label for="description" class="block mb-2">Description</label>
                            <textarea name="description" id="description" class="block w-full p-2 mb-4 border border-gray-300 rounded"></textarea>

                            <!-- Appointment Date -->
                            <label for="appointment_date" class="block mb-2">Appointment Date</label>
                            <input type="datetime-local" name="appointment_date" id="appointment_date" class="block w-full p-2 mb-4 border border-gray-300 rounded" required>

                            <button type="submit" class="w-full bg-[#FF2D20] text-white py-3 rounded-md mt-4">Book Appointment</button>
                        </form>
                    </div>
                </section>


                <!-- Footer -->
                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    © Copyrights 2025 - Barber Shop. All rights reserved.
                </footer>
            </div>
        </div>
    </div>

    <!-- Show form when "Book Now" button is clicked -->
    <script>
        document.getElementById('book-now-btn').addEventListener('click', function() {
            document.getElementById('appointment-section').classList.remove('hidden');
            window.scrollTo(0, document.body.scrollHeight);
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Function to fetch products from the API
            function fetchProducts() {
                fetch('/api/products') // Change to your correct API endpoint
                    .then(response => response.json())
                    .then(data => {
                        // Get the product dropdown element
                        const productSelect = document.getElementById('product_id');

                        // Clear the current loading message
                        productSelect.innerHTML = '<option value="" disabled selected>Select a product</option>';

                        // Loop through the products and create option elements
                        data.forEach(product => {
                            const option = document.createElement('option');
                            option.value = product.id; // Product ID from the API
                            option.textContent = product.name; // Product name from the API
                            productSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching products:', error);
                    });
            }

            // Call the function to fetch products when the page loads
            fetchProducts();
        });
    </script>
</body>

</html>