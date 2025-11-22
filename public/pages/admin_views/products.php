<?php
// 1. HANDLE DELETION LOGIC
if (
    isset($_GET['action']) &&
    $_GET['action'] === 'delete' &&
    isset($_GET['id'])
) {
    $delete_id = (int) $_GET['id'];

    $del_sql = "DELETE FROM products WHERE id = $delete_id";
    if ($conn->query($del_sql) === true) {
        echo "<script>alert('Product deleted successfully'); window.location.href='?view=products';</script>";
    } else {
        echo "<script>alert('Error deleting product');</script>";
    }
}

// 2. FETCH PRODUCTS
$sql = 'SELECT * FROM products ORDER BY created_at DESC';
$result = $conn->query($sql);
?>

<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Template Products</h1>
        <p class="text-gray-500">Manage the templates visible in the marketplace.</p>
    </div>
    <a href="?view=add_product" class="px-4 py-2 bg-brand-primary text-white font-bold rounded-lg shadow-lg hover:bg-blue-600 transition-all flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Add New Product
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 border-b border-gray-200 text-gray-500 text-xs uppercase font-semibold">
            <tr>
                <th class="px-6 py-4">ID</th>
                <th class="px-6 py-4">Product Name</th>
                <th class="px-6 py-4">Price</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-gray-500">#<?php echo $row[
                        'id'
                    ]; ?></td>
                    <td class="px-6 py-4 font-bold text-gray-800"><?php echo htmlspecialchars(
                        $row['name'],
                    ); ?></td>
                    <td class="px-6 py-4 text-brand-primary font-bold">$<?php echo $row[
                        'price'
                    ]; ?></td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo $row[
                            'status'
                        ] == 'Active'
                            ? 'bg-green-100 text-green-800'
                            : 'bg-gray-100 text-gray-800'; ?>">
                            <?php echo $row['status']; ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <!-- EDIT BUTTON -->
                        <a href="?view=edit_product&id=<?php echo $row[
                            'id'
                        ]; ?>" class="text-blue-500 hover:text-blue-700 font-medium transition-colors">Edit</a>
                        
                        <!-- DELETE BUTTON (With Confirmation) -->
                        <a href="?view=products&action=delete&id=<?php echo $row[
                            'id'
                        ]; ?>" 
                           onclick="return confirm('Are you sure you want to delete this product? This action cannot be undone.');" 
                           class="text-red-400 hover:text-red-600 font-medium transition-colors">
                           Delete
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5" class="px-6 py-8 text-center text-gray-500">No products found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>