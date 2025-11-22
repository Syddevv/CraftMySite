<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    
    <!-- Revenue -->
    <div class="bg-white p-6 rounded-2xl shadow-lg shadow-gray-100 border border-gray-100 hover:border-green-100 transition-all group">
        <div class="flex justify-between items-start mb-4">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-green-100 to-green-50 text-green-600 flex items-center justify-center text-xl shadow-inner group-hover:scale-110 transition-transform">
                $
            </div>
            <span class="flex items-center text-xs font-bold text-green-600 bg-green-50 px-2 py-1 rounded-full">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                Sales
            </span>
        </div>
        <div>
            <p class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-1">Total Revenue</p>
            <h3 class="text-3xl font-bold text-gray-800"><?php echo $stats[
                'revenue'
            ]; ?></h3>
            <p class="text-gray-400 text-xs mt-2">For this month</p>
        </div>
    </div>

    <!-- Orders -->
    <div class="bg-white p-6 rounded-2xl shadow-lg shadow-gray-100 border border-gray-100 hover:border-blue-100 transition-all group">
        <div class="flex justify-between items-start mb-4">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-100 to-blue-50 text-blue-600 flex items-center justify-center text-xl shadow-inner group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            </div>
            <span class="flex items-center text-xs font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded-full">
                New
            </span>
        </div>
        <div>
            <p class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-1">Active Orders</p>
            <h3 class="text-3xl font-bold text-gray-800"><?php echo $stats[
                'active_orders'
            ]; ?></h3>
            <p class="text-gray-400 text-xs mt-2">Pending processing</p>
        </div>
    </div>

    <!-- Queries -->
    <div class="bg-white p-6 rounded-2xl shadow-lg shadow-gray-100 border border-gray-100 hover:border-orange-100 transition-all group">
        <div class="flex justify-between items-start mb-4">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-orange-100 to-orange-50 text-orange-600 flex items-center justify-center text-xl shadow-inner group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
            </div>
            <?php if ($stats['pending_queries'] > 0): ?>
            <span class="flex items-center text-xs font-bold text-orange-600 bg-orange-50 px-2 py-1 rounded-full animate-pulse">
                Action Needed
            </span>
            <?php endif; ?>
        </div>
        <div>
            <p class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-1">New Queries</p>
            <h3 class="text-3xl font-bold text-gray-800"><?php echo $stats[
                'pending_queries'
            ]; ?></h3>
            <p class="text-gray-400 text-xs mt-2">Requires response</p>
        </div>
    </div>

    <!-- Products -->
    <div class="bg-white p-6 rounded-2xl shadow-lg shadow-gray-100 border border-gray-100 hover:border-purple-100 transition-all group">
        <div class="flex justify-between items-start mb-4">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-100 to-purple-50 text-purple-600 flex items-center justify-center text-xl shadow-inner group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </div>
            <a href="?view=add_product" class="flex items-center text-xs font-bold text-purple-600 bg-purple-50 px-2 py-1 rounded-full hover:bg-purple-100 transition-colors">
                + Add
            </a>
        </div>
        <div>
            <p class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-1">Total Products</p>
            <h3 class="text-3xl font-bold text-gray-800"><?php echo $stats[
                'total_products'
            ]; ?></h3>
            <p class="text-gray-400 text-xs mt-2">Active templates</p>
        </div>
    </div>
</div>

<!-- Optional: Quick Action or Chart Area Placeholder to fill empty space -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 bg-white p-8 rounded-2xl shadow-sm border border-gray-100 h-64 flex flex-col items-center justify-center text-center">
        <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4 text-gray-300">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
        </div>
        <h4 class="text-lg font-bold text-gray-400">Sales Analytics</h4>
        <p class="text-sm text-gray-400">Chart visualization coming soon</p>
    </div>
    
    <div class="bg-brand-dark text-white p-8 rounded-2xl shadow-lg flex flex-col justify-between relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-5 rounded-full -mr-10 -mt-10"></div>
        <div class="relative z-10">
            <h4 class="font-bold text-lg mb-2">Admin Status</h4>
            <p class="text-gray-400 text-sm mb-6">System is running smoothly.</p>
            <div class="flex items-center gap-2 text-sm">
                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                Online
            </div>
        </div>
    </div>
</div>