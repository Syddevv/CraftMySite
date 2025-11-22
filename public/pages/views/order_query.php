<?php
// 1. Get Order ID & Security Check
$order_id_query = isset($_GET['order_id']) ? (int) $_GET['order_id'] : 0;
$msg_sent = false;
$msg_error = '';

// Fetch order details to confirm ownership and get info
$sql_check = "SELECT order_number, product_id FROM orders WHERE id = $order_id_query AND user_id = $user_id";
$res_check = $conn->query($sql_check);

if ($res_check && $res_check->num_rows > 0) {
    $order_data = $res_check->fetch_assoc();
    $subject_default =
        'Question regarding Order #' . $order_data['order_number'];
} else {
    // If order doesn't exist or belongs to someone else
    echo "<script>window.location.href = '?view=orders';</script>";
    exit();
}

// 2. Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    // User info is already in session variables $user_name, $user_email, $user_id

    $sql_insert = "INSERT INTO queries (user_id, order_id, name, email, subject, message, status) 
                   VALUES ($user_id, $order_id_query, '$user_name', '$user_email', '$subject', '$message', 'New')";

    if ($conn->query($sql_insert) === true) {
        $msg_sent = true;
    } else {
        $msg_error = 'Error sending message: ' . $conn->error;
    }
}
?>

<!-- Header & Back Link -->
<div class="mb-6">
    <a href="?view=order_details&id=<?php echo $order_id_query; ?>" class="inline-flex items-center text-gray-500 hover:text-brand-primary mb-4 font-medium transition-colors">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Back to Order Details
    </a>
    <h1 class="text-3xl font-bold text-brand-dark">Submit a Query</h1>
    <p class="text-gray-500">Get help specifically for <strong>Order #<?php echo $order_data[
        'order_number'
    ]; ?></strong></p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <!-- Left: Form -->
    <div class="lg:col-span-2">
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
            
            <?php if ($msg_sent): ?>
                <div class="text-center py-10">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">✓</div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Message Sent!</h3>
                    <p class="text-gray-500 mb-6">Our support team has received your query regarding Order #<?php echo $order_data[
                        'order_number'
                    ]; ?>. We'll get back to you shortly.</p>
                    <a href="?view=orders" class="px-6 py-3 bg-brand-primary text-white rounded-xl font-bold hover:bg-brand-secondary transition-colors">Return to Orders</a>
                </div>
            <?php else: ?>
            
                <?php if ($msg_error): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6"><?php echo $msg_error; ?></div>
                <?php endif; ?>

                <form action="" method="POST" class="space-y-6">
                    <!-- Read-only Context -->
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Name</label>
                            <input type="text" value="<?php echo htmlspecialchars(
                                $user_name,
                            ); ?>" disabled class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-500">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                            <input type="text" value="<?php echo htmlspecialchars(
                                $user_email,
                            ); ?>" disabled class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-500">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-brand-dark mb-2">Subject</label>
                        <input type="text" name="subject" required value="<?php echo htmlspecialchars(
                            $subject_default,
                        ); ?>" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 outline-none transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-brand-dark mb-2">Message</label>
                        <textarea name="message" required rows="6" placeholder="Describe your issue or question about this order..." class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 outline-none transition-all"></textarea>
                    </div>

                    <button type="submit" class="w-full py-4 bg-brand-primary text-white font-bold rounded-xl shadow-lg hover:bg-brand-secondary transition-all transform hover:-translate-y-0.5">
                        Send Support Request
                    </button>
                </form>

            <?php endif; ?>
        </div>
    </div>

    <!-- Right: Info Sidebar -->
    <div class="lg:col-span-1 space-y-6">
        <div class="bg-blue-50 p-6 rounded-3xl border border-blue-100">
            <h3 class="font-bold text-blue-800 mb-2">Support Policy</h3>
            <p class="text-sm text-blue-600 mb-4">We prioritize queries related to active orders. Our team typically responds within 24 hours.</p>
            <ul class="space-y-2 text-sm text-blue-700">
                <li class="flex items-center"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Technical Issues</li>
                <li class="flex items-center"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Customization Requests</li>
                <li class="flex items-center"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Billing Inquiries</li>
            </ul>
        </div>
    </div>

</div>