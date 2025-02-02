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
        <img id="background" class="absolute -left-20 top-0 max-w-[877px]"
            src="https://laravel.com/assets/img/welcome/background.svg" alt="Barber Shop Background" />


        <!-- Main Content -->
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <!-- Header -->
                <header class="grid grid-cols-12 items-center gap-2 py-10 lg:grid-cols-12">
                    <nav class="text-yellow-500 py-4 px-6 flex justify-between items-center">
                        <div class="flex items-center">
                            <img src="{{ asset('/img/logo.png') }}" alt="Barber Shop Logo" class="h-20 mr-4 bg-black">
                            <h1 class="text-xl font-bold">Prince Kapsalon</h1>
                        </div>
                        <ul class="flex space-x-6">
                            <li><a href="#Openingstijden" class="hover:underline">Openingstijden</a></li>
                            <li><a href="#Prijzen" class="hover:underline">Prijzen</a></li>
                            <li>
                                <!-- Navigation -->
                                @if (Route::has('login'))
                                    <nav class="-mx-3 flex flex-1 justify-end">
                                        @auth
                                            <a href="{{ url('/dashboard') }}"
                                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                                Dashboard
                                            </a>
                                        @else
                                            <a href="{{ route('login') }}"
                                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                                Admin Login
                                            </a>
                                        @endauth
                                    </nav>
                                @endif
                            </li>
                        </ul>
                    </nav>
                </header>

                <!-- Hero Section -->
                <section class="text-center py-16">
                    <h1 class="text-4xl font-bold text-black dark:text-white">
                        Welkom bij onze <span class="text-[#FF2D20]">Kapperszaak</span>
                    </h1>
                    <p class="mt-4 text-lg text-black/70 dark:text-white/70">
                        Professionele knipbeurten & verzorgingsdiensten
                    </p>
                    <button id="book-now-btn" onclick="openModal()" class="bg-[#FF2D20] text-white px-4 py-2 rounded-md mt-4">
                        Book Now
                    </button>

                </section>
                <!-- Modal Overlay -->
                <div id="appointment-modal"
                    class="fixed inset-0 bg-black text-black bg-opacity-50 hidden flex items-center justify-center z-50">
                    <!-- Modal Container -->
                    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full relative">
                        <!-- Close Button -->
                        <button onclick="closeModal()"
                            class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-xl">&times;</button>

                        <!-- Modal Content -->
                        <h2 class="text-2xl font-semibold text-center mb-6">Book an Appointment</h2>
                        <form id="appointment-form" onsubmit="bookAppointment(event)">

                            <!-- Product selection -->
                            <label for="product_id" class="block mb-2">Product</label>
                            <select name="product_id" id="product_id"
                                class="block w-full p-2 mb-4 border border-gray-300 rounded" required>
                                <option value="" disabled selected>Loading products...</option>
                            </select>

                            <!-- Title -->
                            <label for="title" class="block mb-2">Title</label>
                            <input type="text" name="title" id="title"
                                class="block w-full p-2 mb-4 border border-gray-300 rounded" required>

                            <!-- Description -->
                            <label for="description" class="block mb-2">Description</label>
                            <textarea name="description" id="description"
                                class="block w-full p-2 mb-4 border border-gray-300 rounded"></textarea>

                            <!-- Appointment Date -->
                            <label for="appointment_date" class="block mb-2">Appointment Date</label>
                            <input type="datetime-local" name="appointment_date" id="appointment_date"
                                class="block w-full p-2 mb-4 border border-gray-300 rounded" required>

                            <!-- Submit Button -->
                            <button type="submit" class="w-full bg-[#FF2D20] text-white py-3 rounded-md mt-4">Book
                                Appointment</button>
                        </form>
                    </div>
                </div>
                <!-- JavaScript for Modal Control -->

                <!-- Over Ons/about Section -->
                <section id="about" class="py-10 px-6 text-center bg-gray-900">

                    <h2 class="text-3xl">Over Ons</h2>

                    <p class="mt-2">Welkom bij onze kapperszaak in Rotterdam! Sinds 2005 bieden wij hoogwaardige
                        haarverzorging en styling, met een focus op kwaliteit, service en vakmanschap.

                        Wij luisteren naar jouw wensen en helpen je de perfecte look te creëren, of het nu gaat om een
                        knipbeurt, haarkleuring of een complete make-over. Onze ervaren kappers volgen de nieuwste
                        trends en technieken om jou het beste resultaat te geven.

                        Naast knippen en stylen bieden we haarbehandelingen, kleuradvies en hoogwaardige
                        haarverzorgingsproducten. Onze salon staat bekend om de gezellige sfeer en persoonlijke
                        aandacht.

                        Of je nu een vaste klant bent of voor het eerst langskomt, je bent van harte welkom. Laat je
                        verwennen en ga stralend de deur uit!
                </section>

                <!-- Prijzen Section -->
                <section id="Prijzen" class="py-10 px-6 text-center bg-gray-900 text-yellow-500">
                    <h2 class="text-3xl font-semibold">Prijzen</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                        <div class="bg-black p-4 shadow-lg border border-yellow-500">
                            <h3 class="text-xl font-bold">Knippen</h3>
                            <p>€40,-</p>
                        </div>
                        <div class="bg-black p-4 shadow-lg border border-yellow-500">
                            <h3 class="text-xl font-bold">Scheren</h3>
                            <p>€35,-</p>
                        </div>
                        <div class="bg-black p-4 shadow-lg border border-yellow-500">
                            <h3 class="text-xl font-bold">Baardtrim</h3>
                            <p>€22,-</p>
                        </div>
                        <div class="bg-black p-4 shadow-lg border border-yellow-500">
                            <h3 class="text-xl font-bold">Baardtrim deluxe</h3>
                            <p>€33,-</p>
                        </div>
                        <div class="bg-black p-4 shadow-lg border border-yellow-500">
                            <h3 class="text-xl font-bold">Tondeuse coup</h3>
                            <p>€25,-</p>
                        </div>
                </section>

                <section id="Combinaties" class="py-10 px-6 text-center bg-gray-900 text-yellow-500">
                    <h2 class="text-3xl font-semibold">Combinaties</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6"></div>
                    <div class="bg-black p-4 shadow-lg border border-yellow-500">
                        <h3 class="text-xl font-bold">Knippen + baardtrim</h3>
                        <p>€49,-</p>
                    </div>
                    <div class="bg-black p-4 shadow-lg border border-yellow-500">
                        <h3 class="text-xl font-bold">Knippen + baardtrim deluxe</h3>
                        <p>€61,-</p>
                    </div>
                </section>

                <!-- Openingstijden Section -->
                <section id="Openingstijden" class="py-10 px-6 text-center bg-black text-yellow-500">
                    <h2 class="text-3xl font-semibold">Openingstijden</h2>
                    <div class="container mx-auto text-center">
                        <h2 class="text-2xl font-bold mb-6">---------------</h2>
                        <ul class="list-none space-y-4 text-lg">
                            <li>
                                <span class="font-semibold">Maandag:</span> 11:00 - 19:00
                            </li>
                            <li>
                                <span class="font-semibold">Dinsdag:</span> 09:30 tot 18:00
                            </li>
                            <li>
                                <span class="font-semibold">Woensdag:</span> 10:00 tot 16:30
                            </li>
                            <li>
                                <span class="font-semibold">Donderdag:</span> 10:00 tot 16:30
                            </li>
                            <li>
                                <span class="font-semibold">Vrijdag:</span> 11:00 tot 21:30
                            </li>
                            <li>
                                <span class="font-semibold">Zaterdag:</span> 09:00 tot 18:00
                            </li>
                            <li>
                                <span class="font-semibold">Zondag:</span> Gesloten
                            </li>
                        </ul>
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
        document.getElementById('book-now-btn').addEventListener('click', function () {
            document.getElementById('appointment-section').classList.remove('hidden');
            window.scrollTo(0, document.body.scrollHeight);
        });

        document.addEventListener("DOMContentLoaded", function () {
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

    <script>
        function openModal() {
            document.getElementById('appointment-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('appointment-modal').classList.add('hidden');
        }

        // Close modal when clicking outside the form
        window.addEventListener('click', function (event) {
            const modal = document.getElementById('appointment-modal');
            if (event.target === modal) {
                closeModal();
            }
        });
    </script>
</body>

</html>