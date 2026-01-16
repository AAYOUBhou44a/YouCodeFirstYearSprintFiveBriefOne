<?php $title = "Mes Briefs"; include 'views/layout/header.php'; ?>

<div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
    <aside class="lg:col-span-1">
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
            <h3 class="font-bold text-gray-800 mb-4 border-b pb-2">Filtres</h3>
            <label class="text-xs font-bold text-gray-400 uppercase">Par Sprint</label>
            <div class="mt-2 space-y-2">
                <label class="flex items-center text-sm"><input type="checkbox" class="mr-2"> Sprint 1</label>
                <label class="flex items-center text-sm"><input type="checkbox" class="mr-2"> Sprint 2</label>
            </div>
        </div>
    </aside>

    <div class="lg:col-span-3 grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php foreach ($briefs as $brief): ?>
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-center mb-3">
                    <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-indigo-100 text-indigo-700 uppercase"><?php echo $brief['type']; ?></span>
                    <span class="text-gray-400 text-xs"><i class="far fa-clock"></i> <?php echo $brief['duree']; ?>h</span>
                </div>
                <h3 class="font-bold text-gray-800 mb-2"><?php echo htmlspecialchars($brief['titre']); ?></h3>
                <p class="text-sm text-gray-500 line-clamp-2 mb-4"><?php echo htmlspecialchars($brief['description']); ?></p>
            </div>
            <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-50">
                <span class="text-xs font-semibold text-blue-600"><?php echo count($brief['competences']); ?> Compétences</span>
                <a href="index.php?action=debrief&id=<?php echo $brief['id']; ?>" class="bg-slate-800 text-white text-xs px-3 py-2 rounded-lg hover:bg-blue-600 transition-colors">Débriefer</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>