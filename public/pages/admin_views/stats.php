<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <!-- Revenue -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 flex items-center gap-4">
        <div class="w-12 h-12 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xl">$</div>
        <div>
            <p class="text-gray-500 text-sm">Total Revenue</p>
            <h3 class="text-2xl font-bold text-gray-800"><?php echo $stats[
                'revenue'
            ]; ?></h3>
        </div>
    </div>

    <!-- Orders -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 flex items-center gap-4">
        <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
        </div>
        <div>
            <p class="text-gray-500 text-sm">Active Orders</p>
            <h3 class="text-2xl font-bold text-gray-800"><?php echo $stats[
                'active_orders'
            ]; ?></h3>
        </div>
    </div>

    <!-- Queries -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 flex items-center gap-4">
        <div class="w-12 h-12 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
        </div>
        <div>
            <p class="text-gray-500 text-sm">New Queries</p>
            <h3 class="text-2xl font-bold text-gray-800"><?php echo $stats[
                'pending_queries'
            ]; ?></h3>
        </div>
    </div>

    <!-- Products -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 flex items-center gap-4">
        <div class="w-12 h-12 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </div>
        <div>
            <p class="text-gray-500 text-sm">Total Products</p>
            <h3 class="text-2xl font-bold text-gray-800"><?php echo $stats[
                'total_products'
            ]; ?></h3>
        </div>
    </div>
</div>

<div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200 text-center py-20">
    <div class="text-gray-300 mb-4">
        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
    </div>
    <h3 class="text-xl font-bold text-gray-600">System Activity</h3>
    <p class="text-gray-400">Recent admin logs and system notifications will appear here.</p>
</div>