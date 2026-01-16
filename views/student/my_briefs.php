<?php $title = "Mes Briefs"; include 'views/layout/header.php'; ?>

<div class="mb-8">
    <h2 class="text-2xl font-bold text-gray-800">Mon Parcours Pédagogique</h2>
    <p class="text-gray-500 text-sm">Consultez l'état de vos briefs et vos évaluations récentes.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($my_briefs as $brief): ?>
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
        <div class="p-6 flex-1">
            <div class="flex justify-between items-start mb-4">
                <span class="text-[10px] font-black px-2 py-1 rounded bg-slate-100 text-slate-600 uppercase">
                    <?php echo $brief['sprint_nom']; ?>
                </span>
                <?php if($brief['is_evaluated']): ?>
                    <span class="flex items-center text-green-600 text-xs font-bold">
                        <i class="fas fa-check-circle mr-1"></i> Évalué
                    </span>
                <?php else: ?>
                    <span class="flex items-center text-orange-500 text-xs font-bold">
                        <i class="fas fa-clock mr-1"></i> En cours
                    </span>
                <?php endif; ?>
            </div>
            <h3 class="font-bold text-gray-800 text-lg mb-2"><?php echo htmlspecialchars($brief['titre']); ?></h3>
            <p class="text-gray-500 text-xs line-clamp-3"><?php echo htmlspecialchars($brief['description']); ?></p>
        </div>
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
            <span class="text-xs text-gray-400 italic">Rendu le <?php echo $brief['date_rendu'] ?? '--/--'; ?></span>
            <a href="index.php?action=view_brief&id=<?php echo $brief['id']; ?>" class="text-blue-600 font-bold text-xs hover:underline">
                Détails <i class="fas fa-chevron-right ml-1"></i>
            </a>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php include 'views/layout/footer.php'; ?>