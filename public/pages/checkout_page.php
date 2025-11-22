<?php
session_start();
require_once 'google-config.php'; // DB Connection

// 1. Security Check
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit();
}

// 2. Get Product Details
if (!isset($_GET['product_id'])) {
    header('Location: dashboard.php');
    exit();
}

$product_id = (int) $_GET['product_id'];
$user_id = $_SESSION['user_id']; // Ensure login.php sets this!

// Fetch Product
$sql = "SELECT * FROM products WHERE id = $product_id";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    die('Product not found');
}
$product = $result->fetch_assoc();

// --- FIX: DEFINE PRICES HERE ---
// Since these aren't in the DB table yet, we map the names to prices manually
$pricing_map = [
    'Logo Design' => 50.0,
    'Content Upload' => 30.0,
    'Color Scheme Change' => 20.0,
];

// Get Selected Customizations
$selected_customizations = isset($_GET['customizations'])
    ? $_GET['customizations']
    : [];

// Calculate Total
$base_price = $product['price'];
$total_price = $base_price;
$added_items = []; // Store details for display

foreach ($selected_customizations as $item_name) {
    // Check if the item exists in our price map
    if (isset($pricing_map[$item_name])) {
        $price = $pricing_map[$item_name];
        $total_price += $price;

        // Save for display in the summary box
        $added_items[] = [
            'name' => $item_name,
            'price' => $price,
        ];
    }
}

// 3. Handle Order Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_number = 'ORD-' . strtoupper(uniqid());
    $status = 'Pending';
    $notes = $conn->real_escape_string($_POST['notes']);

    // Serialize customizations for storage
    $custom_json = json_encode([
        'options' => $added_items, // Save the items with their prices
        'user_notes' => $notes,
    ]);

    $insert_sql = "INSERT INTO orders (user_id, product_id, order_number, status, total_price, customization_details) 
                   VALUES ('$user_id', '$product_id', '$order_number', '$status', '$total_price', '$custom_json')";

    if ($conn->query($insert_sql) === true) {
        // Success! Redirect to dashboard orders view
        header('Location: dashboard.php?view=orders&success=1');
        exit();
    } else {
        $error = 'Error placing order: ' . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout - CraftMySite</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: { colors: { brand: { primary: '#6c63ff', secondary: '#48b1f7', dark: '#22223b' } } }
        }
      }
    </script>
</head>
<body class="bg-gray-50 font-sans antialiased min-h-screen flex items-center justify-center p-6">

    <div class="max-w-4xl w-full bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row">
        
        <!-- Order Summary (Left) -->
        <div class="md:w-1/2 p-8 bg-gray-50 border-r border-gray-100">
            <h2 class="text-xl font-bold text-brand-dark mb-6">Order Summary</h2>
            
            <div class="flex items-center gap-4 mb-6">
                <?php
                $imgs = json_decode($product['images'], true);
                $thumb = !empty($imgs)
                    ? $imgs[0]
                    : 'https://via.placeholder.com/100';
                ?>
                <img src="<?php echo $thumb; ?>" class="w-20 h-20 rounded-lg object-cover border border-gray-200">
                <div>
                    <h3 class="font-bold text-gray-800"><?php echo $product[
                        'name'
                    ]; ?></h3>
                    <p class="text-sm text-gray-500"><?php echo $product[
                        'timeline'
                    ]; ?></p>
                </div>
            </div>

            <div class="space-y-3 border-t border-gray-200 pt-4 mb-6">
                <!-- Base Price -->
                <div class="flex justify-between text-sm text-gray-600">
                    <span>Base Price</span>
                    <span>$<?php echo number_format($base_price, 2); ?></span>
                </div>

                <!-- Customizations -->
                <?php if (!empty($added_items)): ?>
                    <?php foreach ($added_items as $item): ?>
                    <div class="flex justify-between text-sm text-brand-primary font-medium">
                        <span>+ <?php echo htmlspecialchars(
                            $item['name'],
                        ); ?></span>
                        <span>$<?php echo number_format(
                            $item['price'],
                            2,
                        ); ?></span>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <!-- Total -->
                <div class="flex justify-between text-lg font-bold text-brand-dark pt-4 border-t border-gray-200">
                    <span>Total</span>
                    <span>$<?php echo number_format($total_price, 2); ?></span>
                </div>
            </div>

            <a href="dashboard.php?view=product&id=<?php echo $product_id; ?>" class="text-sm text-gray-400 hover:text-brand-primary">← Cancel and go back</a>
        </div>

        <!-- Checkout Form (Right) -->
        <div class="md:w-1/2 p-8">
            <h2 class="text-2xl font-bold text-brand-dark mb-2">Finalize Details</h2>
            <p class="text-gray-500 mb-6">Please provide any specific instructions for your project.</p>

            <form action="" method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Project Requirements / Notes</label>
                    <textarea name="notes" rows="4" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-primary outline-none bg-gray-50" placeholder="Describe your vision, color preferences, or link to examples..."></textarea>
                </div>

                <!-- Fake Payment Field -->
                <div class="p-4 border border-gray-200 rounded-xl bg-gray-50 opacity-75">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-bold text-sm text-gray-600">Payment Method</span>
                        <span class="text-xs bg-green-100 text-green-600 px-2 py-1 rounded">Secure</span>
                    </div>
                    <div class="flex gap-2">
                        <div class="h-8 w-12 bg-gray-300 rounded"></div>
                        <div class="text-sm text-gray-400 flex items-center">**** 4242</div>
                    </div>
                </div>

                <button type="submit" class="w-full py-4 bg-brand-primary text-white font-bold rounded-xl shadow-lg hover:bg-brand-secondary transition-all">
                    Confirm & Pay $<?php echo number_format($total_price, 2); ?>
                </button>
            </form>
        </div>

    </div>

</body>
</html>