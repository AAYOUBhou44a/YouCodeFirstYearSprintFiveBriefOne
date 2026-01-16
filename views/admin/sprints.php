<?php $title = "Gestion des Sprints"; include 'views/layout/header.php'; ?>

<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Planification des Sprints</h2>
        <select class="border-gray-300 rounded-lg text-sm p-2 focus:ring-blue-500 border">
            <option>Sélectionner une classe...</option>
            </select>
    </div>

    <div class="space-y-4">
        <?php foreach ($sprints as $sprint): ?>
        <div class="bg-white border-l-4 border-indigo-500 rounded-r-xl shadow-sm p-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="text-center bg-gray-50 px-3 py-1 rounded border">
                    <span class="block text-xs text-gray-400 font-bold uppercase">Ordre</span>
                    <span class="text-xl font-black text-indigo-600"><?php echo $sprint['ordre']; ?></span>
                </div>
                <div>
                    <h4 class="font-bold text-gray-800"><?php echo htmlspecialchars($sprint['nom']); ?></h4>
                    <p class="text-xs text-gray-500 italic">Durée estimée : <?php echo $sprint['duree']; ?> semaines</p>
                </div>
            </div>
            <div class="flex gap-2">
                <button class="p-2 text-gray-400 hover:text-blue-600"><i class="fas fa-edit"></i></button>
                <button class="p-2 text-gray-400 hover:text-red-500"><i class="fas fa-trash"></i></button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>