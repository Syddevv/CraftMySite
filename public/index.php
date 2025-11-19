<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP + Tailwind</title>
    <link href="./assets/css/styles.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg text-center">
        <h1 class="text-4xl font-bold text-blue-600 mb-4">
            It Works!
        </h1>
        <p class="text-gray-700 text-lg">
            <?php echo "PHP is serving this text dynamically."; ?>
        </p>
        <button class="mt-6 px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 transition">
            Tailwind Button
        </button>
    </div>
</body>
</html>