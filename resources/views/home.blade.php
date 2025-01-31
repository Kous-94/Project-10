<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="{{ asset('Logo.png') }}" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prince Kapsalon</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-black text-yellow-500">
    
    <!-- Navbar + Logo -->
    <nav class="bg-black text-yellow-500 py-4 px-6 flex justify-between items-center">
        <div class="flex items-center">
        <img src="{{ asset('Logo.png') }}" alt="Barber Shop Logo" class="h-20 mr-4">
        <h1 class="text-xl font-bold">Prince Kapsalon</h1>
        </div>
        <ul class="flex space-x-6">
            <li><a href="#" class="hover:underline">Afspraak maken</a></li>
            <li><a href="#about" class="hover:underline">Prince Kapsalon</a></li>
            <li><a href="#Openingstijden" class="hover:underline">Openingstijden</a></li>
            <li><a href="#Prijzen" class="hover:underline">Prijzen</a></li>
            <li><a href="#contact" class="hover:underline">Contact</a></li>
        </ul>
    </nav>
    
    <!-- Start Section -->
    <section class="text-center py-20 bg-black text-yellow-500">
        <h1 class="text-4xl font-bold">Welkom bij onze Kapperszaak</h1>
        <p class="mt-4">PProfessionele knipbeurten & verzorgingsdiensten.</p>
    </section>
    
    <!-- About Section -->

    <section id="about" class="py-10 px-6 text-center bg-gray-900 text-yellow-500 max-w-md mx-auto">
    
        <h2 class="text-3xl font-semibold">Over Ons</h2>
       
        <p class="mt-4">Welkom bij onze kapperszaak in Rotterdam! Sinds 2005 bieden wij hoogwaardige haarverzorging en styling, met een focus op kwaliteit, service en vakmanschap.

Wij luisteren naar jouw wensen en helpen je de perfecte look te creëren, of het nu gaat om een knipbeurt, haarkleuring of een complete make-over. Onze ervaren kappers volgen de nieuwste trends en technieken om jou het beste resultaat te geven.

Naast knippen en stylen bieden we haarbehandelingen, kleuradvies en hoogwaardige haarverzorgingsproducten. Onze salon staat bekend om de gezellige sfeer en persoonlijke aandacht.

Of je nu een vaste klant bent of voor het eerst langskomt, je bent van harte welkom. Laat je verwennen en ga stralend de deur uit!
     </section>
        
    <!-- Prijzen Section -->
    <section id="Prijzen" class="py-10 px-6 text-center bg-gray-900 text-yellow-500">
        <h2 class="text-3xl font-semibold">Prijzen</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="bg-black p-4 shadow-lg border border-yellow-500">
                <h3 class="text-xl font-bold">Product 1</h3>
                <p>High-quality hair gel</p>
            </div>
            <div class="bg-black p-4 shadow-lg border border-yellow-500">
                <h3 class="text-xl font-bold">Product 2</h3>
                <p>Premium beard oil</p>
            </div>
            <div class="bg-black p-4 shadow-lg border border-yellow-500">
                <h3 class="text-xl font-bold">Product 3</h3>
                <p>Strong-hold pomade</p>
            </div>
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
    <footer id="contact" class="bg-black text-yellow-500 text-center py-6">
        <p>&copy; 2025 Prince Kapsalon | Contact: (+31)6 12345678 | Address: Prins Alexanderlaan 55, 3067 GB Rotterdam</p>
        <p>&copy; 2025 - Oday Alkabra And Kousae Albouni</p>
    </footer>

</body>
</html>
