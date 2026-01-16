<?php $title = "Gestion des Classes"; include 'views/layout/header.php'; ?>

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Classes & Cohortes</h2>
    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-all">
        <i class="fas fa-plus mr-2"></i>Nouvelle Classe
    </button>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($classes as $classe): ?>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-shadow">
        <div class="flex justify-between items-start mb-4">
            <div class="bg-blue-100 text-blue-700 p-3 rounded-lg">
                <i class="fas fa-users text-xl"></i>
            </div>
            <span class="text-xs font-bold text-gray-400">ID: #<?php echo $classe['id']; ?></span>
        </div>
        <h3 class="text-lg font-bold text-gray-800"><?php echo htmlspecialchars($classe['nom']); ?></h3>
        <p class="text-sm text-gray-500 mb-4">Formateur : <span class="font-medium text-gray-700"><?php echo $classe['teacher_name']; ?></span></p>
        
        <div class="flex items-center justify-between pt-4 border-t border-gray-50 text-sm">
            <span class="text-gray-600"><i class="fas fa-user-graduate mr-2"></i><?php echo $classe['student_count']; ?> Apprenants</span>
            <a href="index.php?action=edit_class&id=<?php echo $classe['id']; ?>" class="text-blue-600 hover:underline">Gérer <i class="fas fa-arrow-right ml-1"></i></a>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php include 'views/layout/footer.php'; ?>