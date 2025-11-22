<?php
// Get Order ID from URL
$order_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$sql_detail = "SELECT o.*, p.name as product_name, p.timeline, p.images 
               FROM orders o
               JOIN products p ON o.product_id = p.id
               WHERE o.id = $order_id AND o.user_id = $user_id";

$result_detail = $conn->query($sql_detail);

if ($result_detail && $result_detail->num_rows > 0):

    $order = $result_detail->fetch_assoc();

    // Parse Images
    $imgs = json_decode($order['images'], true);
    $thumb = !empty($imgs) ? $imgs[0] : 'https://via.placeholder.com/100';

    // Parse Customizations
    $custom_data = json_decode($order['customization_details'], true);
    $options = isset($custom_data['options']) ? $custom_data['options'] : [];
    $notes = isset($custom_data['user_notes'])
        ? $custom_data['user_notes']
        : '';

    // Determine Color
    $color = 'gray';
    switch ($order['status']) {
        case 'Pending':
            $color = 'yellow';
            break;
        case 'In Progress':
            $color = 'blue';
            break;
        case 'Completed':
            $color = 'green';
            break;
        case 'Cancelled':
            $color = 'red';
            break;
    }
    ?>

<!-- Back Button -->
<a href="?view=orders" class="inline-flex items-center text-gray-500 hover:text-brand-primary mb-6 font-medium transition-colors">
    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
    Back to Orders
</a>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <!-- Left Column: Order Info -->
    <div class="lg:col-span-2 space-y-6">
        
        <!-- Main Status Card -->
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-brand-dark mb-1">Order #<?php echo $order[
                        'order_number'
                    ]; ?></h1>
                    <p class="text-gray-500 text-sm">Placed on <?php echo date(
                        'F j, Y \a\t g:i A',
                        strtotime($order['created_at']),
                    ); ?></p>
                </div>
                <span class="px-4 py-2 rounded-xl text-sm font-bold bg-<?php echo $color; ?>-100 text-<?php echo $color; ?>-700 border border-<?php echo $color; ?>-200">
                    <?php echo $order['status']; ?>
                </span>
            </div>

            <div class="flex gap-4 p-4 bg-gray-50 rounded-2xl border border-gray-100">
                <img src="<?php echo $thumb; ?>" class="w-24 h-24 rounded-xl object-cover border border-gray-200">
                <div>
                    <h3 class="font-bold text-lg text-gray-800"><?php echo $order[
                        'product_name'
                    ]; ?></h3>
                    <p class="text-sm text-brand-primary font-medium">Estimated Production: <?php echo $order[
                        'timeline'
                    ]; ?></p>
                </div>
            </div>
        </div>

        <!-- User Requirements -->
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Your Requirements</h3>
            
            <?php if (!empty($options)): ?>
                <div class="mb-6">
                    <h4 class="text-xs uppercase font-bold text-gray-400 mb-3">Selected Add-ons</h4>
                    <div class="flex flex-wrap gap-2">
                        <?php foreach ($options as $opt): ?>
                            <span class="px-3 py-1 bg-blue-50 text-brand-primary text-sm rounded-lg font-medium">
                                + <?php echo htmlspecialchars($opt['name']); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <div>
                <h4 class="text-xs uppercase font-bold text-gray-400 mb-2">Notes / Instructions</h4>
                <div class="bg-gray-50 p-4 rounded-xl text-gray-600 text-sm leading-relaxed border border-gray-100">
                    <?php echo nl2br(htmlspecialchars($notes)); ?>
                </div>
            </div>
        </div>

    </div>

    <!-- Right Column: Pricing & Support -->
    <div class="lg:col-span-1 space-y-6">
        
        <!-- Payment Summary -->
        <div class="bg-white p-6 rounded-3xl shadow-lg border border-brand-primary/10">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Payment Summary</h3>
            
            <div class="space-y-3 border-b border-gray-100 pb-4 mb-4">
                <?php if (!empty($options)):
                    foreach ($options as $opt): ?>
                    <div class="flex justify-between text-sm text-gray-600">
                        <span><?php echo htmlspecialchars(
                            $opt['name'],
                        ); ?></span>
                        <span>$<?php echo number_format(
                            $opt['price'],
                            2,
                        ); ?></span>
                    </div>
                <?php endforeach;
                endif; ?>
            </div>

            <div class="flex justify-between items-center">
                <span class="text-gray-800 font-bold">Total Paid</span>
                <span class="text-2xl font-bold text-brand-primary">$<?php echo number_format(
                    $order['total_price'],
                    2,
                ); ?></span>
            </div>
        </div>

       <!-- Support Widget -->
        <div class="bg-brand-dark text-white p-6 rounded-3xl text-center">
            <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
            </div>
            <h4 class="font-bold mb-2">Need Help?</h4>
            <p class="text-sm text-gray-400 mb-4">Questions about this order?</p>
            
            <!-- UPDATED LINK: Now points to internal dashboard view -->
            <a href="?view=order_query&order_id=<?php echo $order[
                'id'
            ]; ?>" class="block w-full py-3 bg-brand-primary rounded-xl font-bold hover:bg-brand-secondary transition-colors">Contact Support</a>
        </div>

    </div>
</div>

<?php
else:
     ?>
    <div class="text-center py-20">
        <h2 class="text-2xl font-bold text-gray-800">Order not found</h2>
        <p class="text-gray-500 mt-2">You may have clicked an invalid link or you do not have permission to view this order.</p>
        <a href="?view=orders" class="text-brand-primary hover:underline mt-4 block">Return to Orders</a>
    </div>
<?php
endif; ?>
