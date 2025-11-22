<?php
// 1. HANDLE ACTIONS (Mark Read / Delete / Replied)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['query_id'])) {
    $id = (int) $_POST['query_id'];
    $action = $_POST['action'];

    if ($action === 'mark_read') {
        $conn->query("UPDATE queries SET status = 'Read' WHERE id = $id");
    } elseif ($action === 'delete') {
        $conn->query("DELETE FROM queries WHERE id = $id");
    } elseif ($action === 'mark_replied') {
        $conn->query("UPDATE queries SET status = 'Replied' WHERE id = $id");
    }

    // Standard Page Refresh
    echo "<script>window.location.href = '?view=queries';</script>";
    exit();
}

// 2. FETCH QUERIES
$sql = 'SELECT * FROM queries ORDER BY created_at DESC';
$result = $conn->query($sql);

// Helper function for "Time Ago"
function time_elapsed_string($datetime, $full = false)
{
    // Set Timezone to match your database/local time
    $timezone = new DateTimeZone('Asia/Manila');
    $now = new DateTime('now', $timezone);
    $ago = new DateTime($datetime, $timezone);
    $diff = $now->diff($ago);

    $weeks = floor($diff->d / 7);
    $days = $diff->d - $weeks * 7;

    $time_data = [
        'y' => $diff->y,
        'm' => $diff->m,
        'w' => $weeks,
        'd' => $days,
        'h' => $diff->h,
        'i' => $diff->i,
        's' => $diff->s,
    ];
    $string = [
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    ];

    foreach ($string as $k => &$v) {
        if ($time_data[$k]) {
            $v = $time_data[$k] . ' ' . $v . ($time_data[$k] > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$string) {
        return 'just now';
    }
    $string = array_slice($string, 0, 1);
    return implode(', ', $string) . ' ago';
}
?>

<div class="mb-6 flex justify-between items-end">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Queries Management</h1>
        <p class="text-gray-500">Messages from the contact form.</p>
    </div>
</div>

<div class="grid grid-cols-1 gap-4">
    <?php if ($result->num_rows > 0): ?>
        <?php while ($q = $result->fetch_assoc()): ?>
            <!-- Determine Status Color/Style -->
            <?php
            $bg_class = 'bg-white';
            $border_class = 'border-gray-200';
            if ($q['status'] == 'New') {
                $bg_class = 'bg-blue-50/50';
                $border_class = 'border-blue-200';
            }
            ?>
            
            <div class="<?php echo $bg_class; ?> p-6 rounded-xl shadow-sm border <?php echo $border_class; ?> hover:shadow-md transition-all relative group">
                
                <!-- Header -->
                <div class="flex justify-between items-start mb-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-gray-100 to-gray-200 text-gray-600 flex items-center justify-center font-bold shadow-inner">
                            <?php echo strtoupper(substr($q['name'], 0, 1)); ?>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800 text-sm"><?php echo htmlspecialchars(
                                $q['name'],
                            ); ?></h4>
                            <a href="mailto:<?php echo $q[
                                'email'
                            ]; ?>" class="text-xs text-brand-primary hover:underline"><?php echo htmlspecialchars(
    $q['email'],
); ?></a>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="text-xs text-gray-400 block"><?php echo time_elapsed_string(
                            $q['created_at'],
                        ); ?></span>
                        <span class="text-[10px] uppercase font-bold tracking-wider 
                            <?php if ($q['status'] == 'New') {
                                echo 'text-blue-500';
                            } elseif ($q['status'] == 'Replied') {
                                echo 'text-green-500';
                            } else {
                                echo 'text-gray-400';
                            } ?>">
                            <?php echo $q['status']; ?>
                        </span>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="ml-13 pl-13">
                    <h5 class="font-semibold text-gray-800 mb-1 text-sm"><?php echo htmlspecialchars(
                        $q['subject'],
                    ); ?></h5>
                    <p class="text-gray-600 text-sm leading-relaxed bg-white/50 p-3 rounded-lg border border-gray-100">
                        <?php echo nl2br(htmlspecialchars($q['message'])); ?>
                    </p>
                    
                    <?php if ($q['order_id']): ?>
                        <a href="?view=order_details&id=<?php echo $q[
                            'order_id'
                        ]; ?>" class="inline-block mt-2 text-xs font-medium bg-gray-100 text-gray-600 px-2 py-1 rounded hover:bg-gray-200">
                            Related to Order ID: #<?php echo $q['order_id']; ?>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Actions Toolbar -->
                <div class="mt-4 pt-4 border-t border-gray-100 flex justify-end gap-3">
                    
                    <!-- Delete Button -->
                    <form method="POST" onsubmit="return confirm('Delete this message?');">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="query_id" value="<?php echo $q[
                            'id'
                        ]; ?>">
                        <button type="submit" class="text-xs text-red-400 hover:text-red-600 font-medium py-2 px-3">Delete</button>
                    </form>

                    <!-- Mark Read Button (Only show if New) -->
                    <?php if ($q['status'] == 'New'): ?>
                    <form method="POST">
                        <input type="hidden" name="action" value="mark_read">
                        <input type="hidden" name="query_id" value="<?php echo $q[
                            'id'
                        ]; ?>">
                        <button type="submit" class="text-xs text-gray-500 hover:text-brand-dark font-medium py-2 px-3">Mark as Read</button>
                    </form>
                    <?php endif; ?>

                    <!-- Mark Replied Button (Manual - Only show if not yet Replied) -->
                    <?php if ($q['status'] != 'Replied'): ?>
                    <form method="POST">
                        <input type="hidden" name="action" value="mark_replied">
                        <input type="hidden" name="query_id" value="<?php echo $q[
                            'id'
                        ]; ?>">
                        <button type="submit" class="text-xs text-green-600 hover:text-green-800 font-bold py-2 px-3">Mark as Replied</button>
                    </form>
                    <?php endif; ?>

                    <!-- Reply Button (Just opens email, does NOT update status automatically) -->
                    <a href="mailto:<?php echo $q[
                        'email'
                    ]; ?>?subject=Re: <?php echo rawurlencode(
    $q['subject'],
); ?>&body=Hi <?php echo rawurlencode(
    $q['name'],
); ?>,%0D%0A%0D%0AThank you for contacting CraftMySite regarding your query: '<?php echo rawurlencode(
    $q['subject'],
); ?>'.%0D%0A%0D%0A[Write your reply here]%0D%0A%0D%0ABest Regards,%0D%0ACraftMySite Team" 
                       class="px-4 py-2 bg-brand-primary text-white text-xs font-bold rounded-lg hover:bg-brand-secondary transition-colors inline-block">
                       Reply via Email
                    </a>

                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="text-center py-20 bg-white rounded-xl border-2 border-dashed border-gray-200">
            <div class="text-gray-300 mb-4">
                <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
            </div>
            <h3 class="text-lg font-bold text-gray-600">Inbox Empty</h3>
            <p class="text-gray-400">No pending customer queries.</p>
        </div>
    <?php endif; ?>
</div>