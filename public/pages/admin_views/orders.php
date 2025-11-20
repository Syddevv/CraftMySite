<?php
// Mock Data
$admin_orders = [
    [
        'id' => 'ORD-001',
        'customer' => 'John Doe',
        'product' => 'E-Commerce Starter',
        'date' => 'Oct 24, 2025',
        'status' => 'In Progress',
        'total' => '$119',
    ],
    [
        'id' => 'ORD-002',
        'customer' => 'Sarah Smith',
        'product' => 'Portfolio Pro',
        'date' => 'Nov 01, 2025',
        'status' => 'Pending',
        'total' => '$29',
    ],
]; ?>

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Order Management</h1>
    <p class="text-gray-500">View and update customer order statuses.</p>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
    <table class="w-full text-left">
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
            <?php foreach ($admin_orders as $order): ?>
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4 font-mono text-brand-primary font-bold text-sm"><?php echo $order[
                    'id'
                ]; ?></td>
                <td class="px-6 py-4 text-gray-800 font-medium"><?php echo $order[
                    'customer'
                ]; ?></td>
                <td class="px-6 py-4 text-gray-600 text-sm"><?php echo $order[
                    'product'
                ]; ?></td>
                <td class="px-6 py-4 text-gray-500 text-sm"><?php echo $order[
                    'date'
                ]; ?></td>
                <td class="px-6 py-4 font-bold text-gray-800"><?php echo $order[
                    'total'
                ]; ?></td>
                <td class="px-6 py-4">
                    <select class="bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-brand-primary focus:border-brand-primary block w-full p-1">
                        <option <?php echo $order['status'] == 'Pending'
                            ? 'selected'
                            : ''; ?>>Pending</option>
                        <option <?php echo $order['status'] == 'In Progress'
                            ? 'selected'
                            : ''; ?>>In Progress</option>
                        <option <?php echo $order['status'] == 'Completed'
                            ? 'selected'
                            : ''; ?>>Completed</option>
                    </select>
                </td>
                <td class="px-6 py-4 text-right">
                    <button class="text-gray-400 hover:text-brand-dark font-medium">Details</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>