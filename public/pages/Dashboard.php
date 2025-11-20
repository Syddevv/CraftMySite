<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_email'])) {
    header('Location: register.php');
    exit();
}

$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Client';
$user_email = $_SESSION['user_email'];

// --- MOCK DATA (Available to all views) ---
// In a real app, you might move this to a separate 'data.php' file
$marketplace_items = [
    1 => [
        'id' => 1,
        'title' => 'Modern SaaS',
        'price' => 49,
        'image' =>
            'https://via.placeholder.com/600x400/6c63ff/ffffff?text=SaaS+Main',
        'gallery' => [
            'https://via.placeholder.com/600x400/6c63ff/ffffff?text=SaaS+1',
            'https://via.placeholder.com/600x400/6c63ff/ffffff?text=SaaS+2',
        ],
        'desc' => 'High-converting landing page for startups.',
        'timeline' => '3-5 Days',
        'features' => ['Responsive', 'Dark Mode'],
        'customization_options' => [['name' => 'Logo', 'price' => 50]],
    ],
    2 => [
        'id' => 2,
        'title' => 'Portfolio Pro',
        'price' => 29,
        'image' =>
            'https://via.placeholder.com/600x400/48b1f7/ffffff?text=Portfolio',
        'gallery' => [],
        'desc' => 'Showcase your work.',
        'timeline' => '2-3 Days',
        'features' => ['Gallery', 'Contact Form'],
        'customization_options' => [['name' => 'Colors', 'price' => 20]],
    ],
    3 => [
        'id' => 3,
        'title' => 'E-Commerce Starter',
        'price' => 59,
        'image' =>
            'https://via.placeholder.com/600x400/22223b/ffffff?text=Store',
        'gallery' => [],
        'desc' => 'Start selling online.',
        'timeline' => '5-7 Days',
        'features' => ['Cart', 'Search'],
        'customization_options' => [['name' => 'Uploads', 'price' => 60]],
    ],
];

$my_orders = [
    [
        'id' => '#ORD-001',
        'template' => 'E-Commerce Starter',
        'date' => 'Oct 24, 2025',
        'status' => 'In Creation',
        'color' => 'blue',
    ],
    [
        'id' => '#ORD-002',
        'template' => 'Portfolio Pro',
        'date' => 'Nov 01, 2025',
        'status' => 'Pending Review',
        'color' => 'yellow',
    ],
];

$my_projects = [
    [
        'name' => 'My Personal Brand Site',
        'template' => 'Portfolio Pro',
        'url' => 'https://portfolio.craftmysite.com',
        'completed_date' => 'Sep 15, 2025',
    ],
];

// Determine current view
$view = isset($_GET['view']) ? $_GET['view'] : 'marketplace';
$product_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$active_product = isset($marketplace_items[$product_id])
    ? $marketplace_items[$product_id]
    : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CraftMySite</title>
    <link rel="stylesheet" href="../assets/css/styles.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              brand: {
                primary: '#6c63ff',
                secondary: '#48b1f7',
                dark: '#22223b',
                light: '#f3f4f6'
              }
            }
          }
        }
      }
    </script>
</head>
<body class="bg-gray-50 font-sans antialiased flex h-screen overflow-hidden">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-brand-dark text-white hidden md:flex flex-col flex-shrink-0">
        <div class="p-6 flex items-center gap-3">
            <div class="w-8 h-8 flex items-center justify-center bg-brand-primary rounded-lg font-bold text-white">C</div>
            <span class="text-xl font-bold">CraftMySite</span>
        </div>

        <nav class="flex-1 px-4 space-y-2 mt-6">
            <a href="?view=marketplace" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?php echo $view ===
                'marketplace' || $view === 'product'
                ? 'bg-brand-primary text-white shadow-lg'
                : 'text-gray-400 hover:bg-white/10 hover:text-white'; ?>">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                Marketplace
            </a>
            <a href="?view=orders" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?php echo $view ===
            'orders'
                ? 'bg-brand-primary text-white shadow-lg'
                : 'text-gray-400 hover:bg-white/10 hover:text-white'; ?>">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                Orders
            </a>
            <a href="?view=projects" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?php echo $view ===
            'projects'
                ? 'bg-brand-primary text-white shadow-lg'
                : 'text-gray-400 hover:bg-white/10 hover:text-white'; ?>">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                Projects
            </a>
        </nav>

        <div class="p-4 border-t border-white/10">
            <a href="logout.php" class="flex items-center gap-3 px-4 py-2 text-red-400 hover:bg-red-500/10 hover:text-red-300 rounded-xl transition-all w-full">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Sign Out
            </a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col h-full overflow-hidden relative">
        
        <!-- Header (Generic for all views) -->
        <header class="bg-white border-b border-gray-200 h-20 flex items-center justify-between px-8 flex-shrink-0">
            <button class="md:hidden text-gray-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button>
            <h2 class="text-2xl font-bold text-brand-dark capitalize hidden md:block">
                <?php echo $view === 'product'
                    ? 'Product Details'
                    : ucfirst($view); ?>
            </h2>
            <div class="flex items-center gap-4">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-bold text-gray-800"><?php echo htmlspecialchars(
                        $user_name,
                    ); ?></p>
                    <p class="text-xs text-gray-500"><?php echo htmlspecialchars(
                        $user_email,
                    ); ?></p>
                </div>
                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-brand-primary to-brand-secondary p-[2px]">
                    <div class="w-full h-full rounded-full bg-white flex items-center justify-center">
                        <span class="font-bold text-brand-primary"><?php echo substr(
                            $user_name,
                            0,
                            1,
                        ); ?></span>
                    </div>
                </div>
            </div>
        </header>

        <!-- DYNAMIC CONTENT -->
        <main class="flex-1 overflow-y-auto p-8">
            <?php
            // Whitelist allowed views for security
            $allowed_views = ['marketplace', 'orders', 'projects', 'product'];

            if (in_array($view, $allowed_views)) {
                // Include the specific file based on 'view' parameter
                include "views/{$view}.php";
            } else {
                // Default fallback
                include 'views/marketplace.php';
            }
            ?>
        </main>
    </div>
</body>
</html>