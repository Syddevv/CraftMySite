<?php if ($active_product): ?>
    <!-- Back Button -->
    <a href="?view=marketplace" class="inline-flex items-center text-gray-500 hover:text-brand-primary mb-6 font-medium transition-colors">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Back to Marketplace
    </a>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left Column: Images & Description -->
        <div class="lg:col-span-2 space-y-8">
            
            <!-- Main Image -->
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100">
                <img src="<?php echo $active_product[
                    'image'
                ]; ?>" alt="Main Preview" class="w-full h-auto object-cover">
            </div>

            <!-- Gallery Grid -->
            <?php if (!empty($active_product['gallery'])): ?>
            <div class="grid grid-cols-3 gap-4">
                <?php foreach ($active_product['gallery'] as $img): ?>
                    <div class="rounded-xl overflow-hidden h-24 cursor-pointer border-2 border-transparent hover:border-brand-primary transition-all">
                        <img src="<?php echo $img; ?>" class="w-full h-full object-cover">
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <!-- Description & Features -->
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-brand-dark mb-4">About this Template</h3>
                <p class="text-gray-600 leading-relaxed mb-6"><?php echo $active_product[
                    'desc'
                ]; ?></p>
                
                <h4 class="font-bold text-gray-800 mb-3">Key Features:</h4>
                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    <?php foreach ($active_product['features'] as $feature): ?>
                    <li class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <?php echo $feature; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- Right Column: Pricing & Customization -->
        <div class="lg:col-span-1">
            <div class="bg-white p-6 rounded-3xl shadow-lg border border-brand-primary/10 sticky top-6">
                <h2 class="text-3xl font-bold text-brand-dark mb-2"><?php echo $active_product[
                    'title'
                ]; ?></h2>
                <div class="flex items-center gap-2 mb-6">
                    <span class="text-4xl font-bold text-brand-primary">$<?php echo $active_product[
                        'price'
                    ]; ?></span>
                    <span class="text-gray-400 text-sm font-medium">/ base price</span>
                </div>

                <div class="p-4 bg-blue-50 rounded-xl mb-6 flex items-start gap-3">
                    <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <div>
                        <p class="font-bold text-brand-dark text-sm">Estimated Production Time</p>
                        <p class="text-brand-primary text-sm"><?php echo $active_product[
                            'timeline'
                        ]; ?></p>
                    </div>
                </div>

                <!-- Customization Form -->
                <form>
                    <h4 class="font-bold text-gray-800 mb-3">Customize Your Order</h4>
                    <div class="space-y-3 mb-6">
                        <?php foreach (
                            $active_product['customization_options']
                            as $opt
                        ): ?>
                        <label class="flex items-center justify-between p-3 border border-gray-200 rounded-xl cursor-pointer hover:border-brand-primary transition-colors">
                            <div class="flex items-center">
                                <input type="checkbox" class="w-5 h-5 text-brand-primary rounded focus:ring-brand-primary border-gray-300">
                                <span class="ml-3 text-gray-700 text-sm font-medium"><?php echo $opt[
                                    'name'
                                ]; ?></span>
                            </div>
                            <span class="text-gray-500 text-sm">+$<?php echo $opt[
                                'price'
                            ]; ?></span>
                        </label>
                        <?php endforeach; ?>
                    </div>

                    <button type="button" class="w-full py-4 bg-brand-primary text-white font-bold rounded-xl shadow-lg shadow-brand-primary/30 hover:bg-brand-secondary transition-all transform hover:-translate-y-0.5">
                        Add to Order
                    </button>
                </form>
                
                <p class="text-xs text-center text-gray-400 mt-4">Secure payment powered by Stripe</p>
            </div>
        </div>
    </div>
    
<?php else: ?>
    <div class="text-center py-20">
        <h2 class="text-2xl font-bold text-gray-800">Product not found</h2>
        <a href="?view=marketplace" class="text-brand-primary hover:underline mt-4 block">Return to Marketplace</a>
    </div>
<?php endif; ?>
