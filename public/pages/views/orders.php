<div class="mb-8">
    <h1 class="text-3xl font-bold text-brand-dark mb-2">My Orders</h1>
    <p class="text-gray-500">Track the status of your purchased templates.</p>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-50 border-b border-gray-100 text-gray-500 uppercase text-xs font-bold">
            <tr>
                <th class="px-6 py-4">Order ID</th>
                <th class="px-6 py-4">Template</th>
                <th class="px-6 py-4">Date</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            <?php if (empty($my_orders)): ?>
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-500">No orders found.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($my_orders as $order): ?>
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4 font-mono text-sm text-brand-primary font-bold"><?php echo $order[
                        'id'
                    ]; ?></td>
                    <td class="px-6 py-4 font-medium text-gray-800"><?php echo $order[
                        'template'
                    ]; ?></td>
                    <td class="px-6 py-4 text-gray-500 text-sm"><?php echo $order[
                        'date'
                    ]; ?></td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-<?php echo $order[
                            'color'
                        ]; ?>-100 text-<?php echo $order['color']; ?>-600">
                            <span class="w-2 h-2 rounded-full bg-<?php echo $order[
                                'color'
                            ]; ?>-500 mr-2"></span>
                            <?php echo $order['status']; ?>
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <button class="text-sm text-gray-400 hover:text-brand-dark font-medium">View Details</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>