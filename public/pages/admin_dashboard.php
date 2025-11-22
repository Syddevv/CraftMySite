<?php
// 1. Load Database Configuration FIRST
require_once 'google-config.php';

// --- SECURITY CHECK ---
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit();
}

// Mock Admin Data
$admin_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Admin';

// Determine current view
$view = isset($_GET['view']) ? $_GET['view'] : 'stats';

// --- FETCH REAL ADMIN STATS ---

// 1. Total Revenue (Sum of Completed Orders)
$sql_revenue =
    "SELECT SUM(total_price) as total FROM orders WHERE status = 'Completed'";
$res_revenue = $conn->query($sql_revenue);
$revenue_raw = $res_revenue->fetch_assoc()['total'] ?? 0;

// 2. Active Orders (Pending or In Progress)
$sql_active_orders =
    "SELECT COUNT(*) as count FROM orders WHERE status IN ('Pending', 'In Progress')";
$res_active_orders = $conn->query($sql_active_orders);
$active_orders_count = $res_active_orders->fetch_assoc()['count'];

// 3. New Queries (Status = New)
$sql_new_queries = "SELECT COUNT(*) as count FROM queries WHERE status = 'New'";
$res_new_queries = $conn->query($sql_new_queries);
$new_queries_count = $res_new_queries->fetch_assoc()['count'];

// 4. Total Products (Active)
$sql_products_count =
    "SELECT COUNT(*) as count FROM products WHERE status = 'Active'";
$res_products_count = $conn->query($sql_products_count);
$total_products_count = $res_products_count->fetch_assoc()['count'];

// Package into stats array
$stats = [
    'revenue' => '$' . number_format($revenue_raw, 2),
    'active_orders' => $active_orders_count,
    'pending_queries' => $new_queries_count,
    'total_products' => $total_products_count,
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - CraftMySite</title>
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
<body class="bg-gray-100 font-sans antialiased flex h-screen overflow-hidden">

    <!-- ADMIN SIDEBAR -->
    <aside class="w-64 bg-gray-900 text-white hidden md:flex flex-col flex-shrink-0 transition-all duration-300">
        <div class="p-6 flex items-center gap-3 border-b border-gray-800">
            <div class="w-8 h-8 flex items-center justify-center bg-red-500 rounded-lg font-bold text-white">A</div>
            <span class="text-xl font-bold tracking-wide">Admin Panel</span>
        </div>

        <nav class="flex-1 px-4 space-y-2 mt-6">
            <a href="?view=stats" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?php echo $view ===
            'stats'
                ? 'bg-gray-800 text-white shadow-lg border-l-4 border-brand-primary'
                : 'text-gray-400 hover:bg-gray-800 hover:text-white'; ?>">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
                Dashboard
            </a>
            <a href="?view=products" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?php echo $view ===
            'products'
                ? 'bg-gray-800 text-white shadow-lg border-l-4 border-brand-primary'
                : 'text-gray-400 hover:bg-gray-800 hover:text-white'; ?>">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 01-2-2M5 11V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                Products
            </a>
            <a href="?view=orders" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?php echo $view ===
            'orders'
                ? 'bg-gray-800 text-white shadow-lg border-l-4 border-brand-primary'
                : 'text-gray-400 hover:bg-gray-800 hover:text-white'; ?>">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                Orders
            </a>
            <a href="?view=queries" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?php echo $view ===
            'queries'
                ? 'bg-gray-800 text-white shadow-lg border-l-4 border-brand-primary'
                : 'text-gray-400 hover:bg-gray-800 hover:text-white'; ?>">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                Queries
            </a>
        </nav>

        <div class="p-4 border-t border-gray-800">
            <a href="logout.php" class="flex items-center gap-3 px-4 py-2 text-red-400 hover:bg-red-500/10 hover:text-red-300 rounded-xl transition-all w-full">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Sign Out
            </a>
        </div>
    </aside>

    <!-- MAIN CONTENT AREA -->
    <div class="flex-1 flex flex-col h-full overflow-hidden relative">
        
        <!-- Admin Header -->
        <header class="bg-white border-b border-gray-200 h-20 flex items-center justify-between px-8 flex-shrink-0 z-10">
            <h2 class="text-2xl font-bold text-gray-800 capitalize"><?php echo ucwords(
                str_replace('_', ' ', $view),
            ); ?> Management</h2>
            
            <div class="flex items-center gap-4">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-bold text-gray-800"><?php echo htmlspecialchars(
                        $admin_name,
                    ); ?></p>
                    <p class="text-xs text-gray-500">Administrator</p>
                </div>
                <div class="w-10 h-10 rounded-full bg-gray-900 text-white flex items-center justify-center font-bold">A</div>
            </div>
        </header>

        <!-- View Loader -->
        <main class="flex-1 overflow-y-auto p-8 bg-gray-100">
            <?php
            $allowed_views = [
                'stats',
                'products',
                'orders',
                'queries',
                'add_product',
                'edit_product',
                'order_details',
            ];

            if (in_array($view, $allowed_views)) {
                include "admin_views/{$view}.php";
            } else {
                include 'admin_views/stats.php';
            }
            ?>
        </main>
    </div>

</body>
</html>