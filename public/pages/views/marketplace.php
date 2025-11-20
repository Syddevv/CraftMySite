<div class="mb-8">
    <h1 class="text-3xl font-bold text-brand-dark mb-2">Marketplace</h1>
    <p class="text-gray-500">Browse our premium templates and kickstart your project.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php foreach ($marketplace_items as $item): ?>
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-xl transition-all duration-300 flex flex-col">
        <div class="relative h-48 overflow-hidden bg-gray-200">
            <img src="<?php echo $item[
                'image'
            ]; ?>" alt="Template" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
        </div>
        <div class="p-6 flex-1 flex flex-col">
            <h3 class="text-xl font-bold text-gray-800 mb-2"><?php echo $item[
                'title'
            ]; ?></h3>
            <p class="text-gray-500 text-sm mb-4 flex-1"><?php echo $item[
                'desc'
            ]; ?></p>
            <div class="flex justify-between items-center pt-4 border-t border-gray-50">
                <span class="text-2xl font-bold text-brand-primary">$<?php echo $item[
                    'price'
                ]; ?></span>
                <a href="?view=product&id=<?php echo $item[
                    'id'
                ]; ?>" class="px-4 py-2 bg-brand-dark text-white rounded-lg hover:bg-brand-primary transition-colors text-sm font-semibold">View Details</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>