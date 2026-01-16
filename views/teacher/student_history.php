<?php $title = "Historique Apprenant"; include 'views/layout/header.php'; ?>

<div class="max-w-5xl mx-auto">
    <div class="flex items-center gap-4 mb-8">
        <img src="https://ui-avatars.com/api/?name=<?php echo $student['nom']; ?>" class="w-16 h-16 rounded-full border-2 border-white shadow-sm">
        <div>
            <h2 class="text-2xl font-bold text-gray-800"><?php echo $student['nom'] . ' ' . $student['prenom']; ?></h2>
            <p class="text-sm text-gray-500">Classe : <?php echo $student['classe_nom']; ?></p>
        </div>
    </div>

    <div class="space-y-6">
        <?php foreach ($history as $eval): ?>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-4 bg-gray-50 border-b flex justify-between items-center">
                <span class="font-bold text-gray-700"><?php echo $eval['brief_titre']; ?></span>
                <span class="text-xs text-gray-400"><?php echo date('d/m/Y', strtotime($eval['date_evaluation'])); ?></span>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <?php foreach ($eval['skills'] as $s): ?>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-sm text-gray-600"><?php echo $s['skill_code']; ?></span>
                        <span class="text-sm font-bold text-blue-600"><?php echo $s['level']; ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="bg-blue-50 p-4 rounded-lg italic text-sm text-blue-800">
                    "<?php echo htmlspecialchars($eval['commentaire']); ?>"
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>