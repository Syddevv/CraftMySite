<?php
// No need to require config here anymore!
// $conn is inherited from admin_dashboard.php

// Fetch products from database
$sql = 'SELECT * FROM products ORDER BY created_at DESC';
$result = $conn->query($sql);

$admin_products = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $admin_products[] = [
            'id' => $row['id'],
            'title' => $row['name'],
            'price' => $row['price'],
            'sales' => rand(10, 200), // Mock sales count for now
            'status' => $row['status'],
        ];
    }
}
?>

<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Template Products</h1>
        <p class="text-gray-500">Manage the templates visible in the marketplace.</p>
    </div>
    <button class="px-4 py-2 bg-brand-primary text-white font-bold rounded-lg shadow-lg hover:bg-blue-600 transition-all flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Add New Product
    </button>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 border-b border-gray-200 text-gray-500 text-xs uppercase font-semibold">
            <tr>
                <th class="px-6 py-4">ID</th>
                <th class="px-6 py-4">Product Name</th>
                <th class="px-6 py-4">Price</th>
                <th class="px-6 py-4">Total Sales</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            <?php if (empty($admin_products)): ?>
                <tr><td colspan="6" class="px-6 py-4 text-center text-gray-500">No products found in database.</td></tr>
            <?php else: ?>
                <?php foreach ($admin_products as $prod): ?>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-gray-500">#<?php echo $prod[
                        'id'
                    ]; ?></td>
                    <td class="px-6 py-4 font-bold text-gray-800"><?php echo $prod[
                        'title'
                    ]; ?></td>
                    <td class="px-6 py-4 text-brand-primary font-bold">$<?php echo $prod[
                        'price'
                    ]; ?></td>
                    <td class="px-6 py-4 text-gray-600"><?php echo $prod[
                        'sales'
                    ]; ?></td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo $prod[
                            'status'
                        ] == 'Active'
                            ? 'bg-green-100 text-green-800'
                            : 'bg-gray-100 text-gray-800'; ?>">
                            <?php echo $prod['status']; ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <button class="text-blue-500 hover:text-blue-700 font-medium">Edit</button>
                        <button class="text-red-400 hover:text-red-600 font-medium">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>