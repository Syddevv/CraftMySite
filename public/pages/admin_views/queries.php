<?php
// Mock Data
$queries = [
    [
        'id' => 1,
        'name' => 'Alice Brown',
        'email' => 'alice@example.com',
        'subject' => 'Customization Question',
        'msg' => 'Do you offer custom logo design if I buy the SaaS template?',
        'date' => '2 mins ago',
        'status' => 'New',
    ],
    [
        'id' => 2,
        'name' => 'Mark Wilson',
        'email' => 'mark@test.com',
        'subject' => 'Pricing Inquiry',
        'msg' => 'Is there a discount for bulk orders?',
        'date' => '1 hour ago',
        'status' => 'Read',
    ],
]; ?>

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Customer Queries</h1>
    <p class="text-gray-500">Messages from the contact form.</p>
</div>

<div class="grid grid-cols-1 gap-4">
    <?php foreach ($queries as $q): ?>
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-all cursor-pointer group">
        <div class="flex justify-between items-start mb-2">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 font-bold">
                    <?php echo substr($q['name'], 0, 1); ?>
                </div>
                <div>
                    <h4 class="font-bold text-gray-800"><?php echo $q[
                        'name'
                    ]; ?></h4>
                    <p class="text-xs text-gray-400"><?php echo $q[
                        'email'
                    ]; ?></p>
                </div>
            </div>
            <span class="text-xs text-gray-400"><?php echo $q['date']; ?></span>
        </div>
        
        <div class="ml-13 pl-13">
            <h5 class="font-semibold text-gray-700 mb-1"><?php echo $q[
                'subject'
            ]; ?></h5>
            <p class="text-gray-500 text-sm line-clamp-2"><?php echo $q[
                'msg'
            ]; ?></p>
        </div>

        <div class="mt-4 pt-4 border-t border-gray-50 flex justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
            <button class="text-sm text-gray-500 hover:text-gray-700">Mark Read</button>
            <a href="mailto:<?php echo $q[
                'email'
            ]; ?>" class="px-4 py-1.5 bg-brand-primary text-white text-sm font-bold rounded-lg hover:bg-blue-600">Reply</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>