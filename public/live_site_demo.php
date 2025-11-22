<?php
$project_name = isset($_GET['name'])
    ? htmlspecialchars($_GET['name'])
    : 'My Awesome Website';
$template = isset($_GET['template'])
    ? htmlspecialchars($_GET['template'])
    : 'Business Template';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $project_name; ?> - Live Demo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans text-gray-800">

    <!-- Fake Nav -->
    <nav class="bg-white shadow-sm py-4">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <div class="text-2xl font-bold text-gray-900"><?php echo $project_name; ?></div>
            <div class="space-x-6 hidden md:block">
                <a href="#" class="text-gray-600 hover:text-blue-600">Home</a>
                <a href="#" class="text-gray-600 hover:text-blue-600">About</a>
                <a href="#" class="text-gray-600 hover:text-blue-600">Services</a>
                <a href="#" class="text-gray-600 hover:text-blue-600">Contact</a>
            </div>
            <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Get Started</a>
        </div>
    </nav>

    <!-- Hero -->
    <section class="bg-gray-50 py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-5xl font-bold text-gray-900 mb-6">Welcome to <?php echo $project_name; ?></h1>
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                This is a live demonstration of your customized <strong><?php echo $template; ?></strong>. 
                Everything is fully functional and ready for your customers.
            </p>
            <div class="flex justify-center gap-4">
                <button class="bg-gray-900 text-white px-8 py-3 rounded-xl text-lg">Our Products</button>
                <button class="bg-white text-gray-900 border border-gray-300 px-8 py-3 rounded-xl text-lg">Learn More</button>
            </div>
        </div>
    </section>

    <!-- Content Grid -->
    <section class="py-20">
        <div class="container mx-auto px-6 grid md:grid-cols-3 gap-8">
            <div class="p-6 border rounded-xl">
                <div class="w-12 h-12 bg-blue-100 rounded-lg mb-4"></div>
                <h3 class="text-xl font-bold mb-2">Feature One</h3>
                <p class="text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="p-6 border rounded-xl">
                <div class="w-12 h-12 bg-green-100 rounded-lg mb-4"></div>
                <h3 class="text-xl font-bold mb-2">Feature Two</h3>
                <p class="text-gray-500">Sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
            </div>
            <div class="p-6 border rounded-xl">
                <div class="w-12 h-12 bg-purple-100 rounded-lg mb-4"></div>
                <h3 class="text-xl font-bold mb-2">Feature Three</h3>
                <p class="text-gray-500">Ut enim ad minim veniam, quis nostrud exercitation.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 text-center">
        <p>&copy; 2025 <?php echo $project_name; ?>. All rights reserved.</p>
        <p class="text-gray-500 text-sm mt-2">Powered by CraftMySite</p>
    </footer>

</body>
</html>