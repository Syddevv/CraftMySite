<?php
// 1. CHECK ID
if (!isset($_GET['id'])) {
    echo 'Order ID not found.';
    exit();
}
$order_id = (int) $_GET['id'];

// 2. HANDLE STATUS UPDATE FROM DETAILS PAGE
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['action']) &&
    $_POST['action'] === 'update_status'
) {
    $new_status = $conn->real_escape_string($_POST['status']);
    $update_sql = "UPDATE orders SET status = '$new_status' WHERE id = $order_id";
    if ($conn->query($update_sql) === true) {
        echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4'>Status updated successfully!</div>";
    }
}

// 3. FETCH FULL DETAILS (Join Users + Products)
// FIXED: Changed 'p.image' to 'p.images' to match the new database structure
$sql = "SELECT o.*, 
               u.name as customer_name, u.email as customer_email,
               p.name as product_name, p.images as product_images, p.timeline
        FROM orders o
        JOIN users u ON o.user_id = u.id
        JOIN products p ON o.product_id = p.id
        WHERE o.id = $order_id";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0):

    $order = $result->fetch_assoc();

    // Parse Customization JSON
    $custom_data = json_decode($order['customization_details'], true);
    $options = isset($custom_data['options']) ? $custom_data['options'] : [];
    $notes = isset($custom_data['user_notes'])
        ? $custom_data['user_notes']
        : 'No notes provided.';

    // Product Image Logic
    // Decode the JSON array from 'images' column and pick the first one
    $prod_img = 'https://via.placeholder.com/100'; // Default fallback

    if (!empty($order['product_images'])) {
        $decoded_img = json_decode($order['product_images'], true);
        if (is_array($decoded_img) && count($decoded_img) > 0) {
            $prod_img = $decoded_img[0]; // Use the first image
        } else {
            // Handle legacy/single image strings if any exist
            $prod_img = $order['product_images'];
        }
    }
    ?>

<div class="max-w-5xl mx-auto">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <a href="?view=orders" class="text-gray-500 hover:text-brand-primary mb-2 inline-block text-sm">← Back to Orders</a>
            <h1 class="text-2xl font-bold text-gray-800">Order Details: <span class="font-mono text-brand-primary"><?php echo $order[
                'order_number'
            ]; ?></span></h1>
        </div>
        
        <!-- Quick Status Action -->
        <form action="" method="POST" class="flex items-center gap-2">
            <input type="hidden" name="action" value="update_status">
            <select name="status" class="border-2 border-gray-200 rounded-lg px-3 py-2 text-sm font-bold focus:border-brand-primary outline-none">
                <option value="Pending" <?php echo $order['status'] == 'Pending'
                    ? 'selected'
                    : ''; ?>>Pending</option>
                <option value="In Progress" <?php echo $order['status'] ==
                'In Progress'
                    ? 'selected'
                    : ''; ?>>In Progress</option>
                <option value="Completed" <?php echo $order['status'] ==
                'Completed'
                    ? 'selected'
                    : ''; ?>>Completed</option>
                <option value="Cancelled" <?php echo $order['status'] ==
                'Cancelled'
                    ? 'selected'
                    : ''; ?>>Cancelled</option>
            </select>
            <button type="submit" class="bg-brand-primary text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-blue-600 transition-colors">Update</button>
        </form>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- LEFT COLUMN: Order Specifics -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Product Card -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 flex gap-4 items-start">
                <img src="<?php echo $prod_img; ?>" class="w-24 h-24 object-cover rounded-lg border border-gray-100">
                <div>
                    <h3 class="text-lg font-bold text-gray-800"><?php echo htmlspecialchars(
                        $order['product_name'],
                    ); ?></h3>
                    <p class="text-sm text-gray-500 mb-2">Standard Delivery: <?php echo $order[
                        'timeline'
                    ]; ?></p>
                    <span class="inline-block bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded">Template ID: #<?php echo $order[
                        'product_id'
                    ]; ?></span>
                </div>
            </div>

            <!-- Customization Requirements -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
                <h3 class="text-lg font-bold text-gray-800 mb-4 border-b border-gray-100 pb-2">Client Requirements</h3>
                
                <div class="mb-4">
                    <h4 class="text-xs uppercase font-bold text-gray-400 mb-2">Selected Add-ons</h4>
                    <?php if (!empty($options)): ?>
                        <div class="flex flex-wrap gap-2">
                        <?php foreach ($options as $opt): ?>
                            <span class="bg-blue-50 text-brand-primary px-3 py-1 rounded-lg text-sm font-medium">
                                + <?php echo htmlspecialchars(
                                    $opt['name'],
                                ); ?> ($<?php echo $opt['price']; ?>)
                            </span>
                        <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-sm text-gray-500 italic">No add-ons selected.</p>
                    <?php endif; ?>
                </div>

                <div>
                    <h4 class="text-xs uppercase font-bold text-gray-400 mb-2">Notes / Instructions</h4>
                    <div class="bg-gray-50 p-4 rounded-xl text-gray-700 text-sm leading-relaxed border border-gray-100 whitespace-pre-wrap"><?php echo htmlspecialchars(
                        $notes,
                    ); ?></div>
                </div>
            </div>

        </div>

        <!-- RIGHT COLUMN: Customer & Financials -->
        <div class="space-y-6">
            
            <!-- Customer Info -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Customer Info</h3>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-brand-dark text-white flex items-center justify-center font-bold">
                        <?php echo substr($order['customer_name'], 0, 1); ?>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800"><?php echo htmlspecialchars(
                            $order['customer_name'],
                        ); ?></p>
                        <p class="text-xs text-gray-500">Customer ID: #<?php echo $order[
                            'user_id'
                        ]; ?></p>
                    </div>
                </div>
                <div class="space-y-2 text-sm">
                    <div class="flex items-center gap-2 text-gray-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <a href="mailto:<?php echo $order[
                            'customer_email'
                        ]; ?>" class="hover:text-brand-primary"><?php echo $order[
    'customer_email'
]; ?></a>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <a href="mailto:<?php echo $order[
                        'customer_email'
                    ]; ?>?subject=Update regarding Order #<?php echo $order[
    'order_number'
]; ?>" class="block w-full text-center py-2 border border-gray-300 rounded-lg text-gray-600 font-bold text-sm hover:bg-gray-50">Email Customer</a>
                </div>
            </div>

            <!-- Financials -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Payment</h3>
                <div class="flex justify-between items-center mb-2 text-sm text-gray-600">
                    <span>Status</span>
                    <span class="text-green-600 font-bold bg-green-50 px-2 py-0.5 rounded">Paid</span>
                </div>
                <div class="flex justify-between items-center text-sm text-gray-600 border-b border-gray-100 pb-4 mb-4">
                    <span>Method</span>
                    <span>Secure Card</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="font-bold text-gray-800">Total</span>
                    <span class="text-2xl font-bold text-brand-primary">$<?php echo number_format(
                        $order['total_price'],
                        2,
                    ); ?></span>
                </div>
            </div>

        </div>

    </div>
</div>

<?php
else:
     ?>
    <div class="text-center py-20">
        <h2 class="text-2xl font-bold text-gray-800">Order not found</h2>
        <a href="?view=orders" class="text-brand-primary hover:underline mt-4 block">Return to Orders</a>
    </div>
<?php
endif; ?>
