<?php
// 1. HANDLE STATUS UPDATE
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['action']) &&
    $_POST['action'] === 'update_status'
) {
    $order_id = (int) $_POST['order_id'];
    $new_status = $conn->real_escape_string($_POST['status']);

    $update_sql = "UPDATE orders SET status = '$new_status' WHERE id = $order_id";

    if ($conn->query($update_sql) === true) {
        echo "<script>
                // Optional: Simple toast notification logic via JS could go here
                // For now, we just refresh to show the new status
                window.location.href = '?view=orders'; 
              </script>";
    } else {
        echo "<div class='bg-red-100 text-red-700 p-4 rounded mb-4'>Error updating status: " .
            $conn->error .
            '</div>';
    }
}

// 2. FETCH ORDERS (Join with Users and Products)
$sql = "SELECT o.id, o.order_number, o.total_price, o.status, o.created_at, 
               u.name as customer_name, 
               p.name as product_name 
        FROM orders o
        JOIN users u ON o.user_id = u.id
        JOIN products p ON o.product_id = p.id
        ORDER BY o.created_at DESC";

$result = $conn->query($sql);
?>

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Order Management</h1>
    <p class="text-gray-500">View and update customer order statuses.</p>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50 border-b border-gray-200 text-gray-500 text-xs uppercase font-semibold">
                <tr>
                    <th class="px-6 py-4">Order ID</th>
                    <th class="px-6 py-4">Customer</th>
                    <th class="px-6 py-4">Product</th>
                    <th class="px-6 py-4">Date</th>
                    <th class="px-6 py-4">Total</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr class="hover:bg-gray-50 transition-colors">
                        
                        <!-- ID -->
                        <td class="px-6 py-4">
                            <span class="font-mono text-sm text-brand-primary font-bold">
                                <?php echo htmlspecialchars(
                                    $row['order_number'],
                                ); ?>
                            </span>
                        </td>

                        <!-- Customer -->
                        <td class="px-6 py-4 text-gray-800 font-medium">
                            <?php echo htmlspecialchars(
                                $row['customer_name'],
                            ); ?>
                        </td>

                        <!-- Product -->
                        <td class="px-6 py-4 text-gray-600 text-sm">
                            <?php echo htmlspecialchars(
                                $row['product_name'],
                            ); ?>
                        </td>

                        <!-- Date -->
                        <td class="px-6 py-4 text-gray-500 text-sm whitespace-nowrap">
                            <?php echo date(
                                'M d, Y',
                                strtotime($row['created_at']),
                            ); ?>
                        </td>

                        <!-- Total -->
                        <td class="px-6 py-4 font-bold text-gray-800">
                            $<?php echo number_format(
                                $row['total_price'],
                                2,
                            ); ?>
                        </td>

                        <!-- Status Dropdown -->
                        <td class="px-6 py-4">
                            <form action="" method="POST" class="m-0">
                                <input type="hidden" name="action" value="update_status">
                                <input type="hidden" name="order_id" value="<?php echo $row[
                                    'id'
                                ]; ?>">
                                
                                <?php
                                // Color coding logic for the select box border/text
                                $statusColor = 'border-gray-200 text-gray-700';
                                if ($row['status'] == 'Pending') {
                                    $statusColor =
                                        'border-yellow-200 text-yellow-700 bg-yellow-50';
                                }
                                if ($row['status'] == 'In Progress') {
                                    $statusColor =
                                        'border-blue-200 text-blue-700 bg-blue-50';
                                }
                                if ($row['status'] == 'Completed') {
                                    $statusColor =
                                        'border-green-200 text-green-700 bg-green-50';
                                }
                                if ($row['status'] == 'Cancelled') {
                                    $statusColor =
                                        'border-red-200 text-red-700 bg-red-50';
                                }
                                ?>

                                <select name="status" onchange="this.form.submit()" 
                                        class="text-xs font-bold rounded-lg px-2 py-1 border-2 focus:ring-2 focus:ring-brand-primary outline-none cursor-pointer <?php echo $statusColor; ?>">
                                    <option value="Pending" <?php echo $row[
                                        'status'
                                    ] == 'Pending'
                                        ? 'selected'
                                        : ''; ?>>Pending</option>
                                    <option value="In Progress" <?php echo $row[
                                        'status'
                                    ] == 'In Progress'
                                        ? 'selected'
                                        : ''; ?>>In Progress</option>
                                    <option value="Completed" <?php echo $row[
                                        'status'
                                    ] == 'Completed'
                                        ? 'selected'
                                        : ''; ?>>Completed</option>
                                    <option value="Cancelled" <?php echo $row[
                                        'status'
                                    ] == 'Cancelled'
                                        ? 'selected'
                                        : ''; ?>>Cancelled</option>
                                </select>
                            </form>
                        </td>

                        <!-- Action -->
                            <td class="px-6 py-4 text-right">
                            <!-- UPDATED LINK -->
                            <a href="?view=order_details&id=<?php echo $row[
                                'id'
                            ]; ?>" class="text-blue-500 hover:text-blue-700 font-medium text-sm">Details</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-500">No active orders found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>