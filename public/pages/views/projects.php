<div class="mb-8">
    <h1 class="text-3xl font-bold text-brand-dark mb-2">Active Projects</h1>
    <p class="text-gray-500">Your customized websites ready for launch.</p>
</div>

<div class="grid grid-cols-1 gap-6">
    <?php if (empty($my_projects)): ?>
        <div class="text-center py-20 bg-white rounded-2xl border-2 border-dashed border-gray-200">
            <div class="text-gray-300 mb-4">
                <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
            <h3 class="text-lg font-bold text-gray-600">No active projects yet</h3>
            <p class="text-gray-400 mb-6">Purchase a template to get started.</p>
            <a href="?view=marketplace" class="px-6 py-2 bg-brand-primary text-white rounded-lg font-bold hover:bg-brand-secondary transition">Go to Marketplace</a>
        </div>
    <?php else: ?>
        <?php foreach ($my_projects as $project): ?>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center text-2xl">🚀</div>
                <div>
                    <h3 class="text-xl font-bold text-brand-dark"><?php echo $project[
                        'name'
                    ]; ?></h3>
                    <p class="text-gray-500 text-sm">Based on: <?php echo $project[
                        'template'
                    ]; ?> • Completed: <?php echo $project[
     'completed_date'
 ]; ?></p>
                </div>
            </div>
            <div class="flex gap-3 w-full md:w-auto">
                <a href="<?php echo $project[
                    'url'
                ]; ?>" target="_blank" class="flex-1 md:flex-none text-center px-6 py-3 bg-brand-primary text-white font-bold rounded-xl hover:bg-brand-secondary transition-colors shadow-lg shadow-brand-primary/20">
                    View Live Site
                </a>
                <button class="px-4 py-3 border border-gray-200 text-gray-600 font-bold rounded-xl hover:bg-gray-50 transition-colors">
                    Settings
                </button>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>