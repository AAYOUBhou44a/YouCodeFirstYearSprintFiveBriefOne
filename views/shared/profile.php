<?php $title = "Mon Profil"; include 'views/layout/header.php'; ?>

<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
    <div class="text-center mb-8">
        <div class="w-24 h-24 bg-blue-600 rounded-full mx-auto flex items-center justify-center text-white text-3xl font-bold mb-4">
            <?php echo strtoupper(substr($_SESSION['username'], 0, 1)); ?>
        </div>
        <h2 class="text-2xl font-bold text-gray-800"><?php echo $_SESSION['username']; ?></h2>
        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold uppercase"><?php echo $_SESSION['role']; ?></span>
    </div>

    <form class="space-y-6">
        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="text" value="<?php echo $_SESSION['email']; ?>" disabled class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-md p-2 text-gray-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
            <input type="password" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <button type="submit" class="w-full bg-slate-800 text-white py-2 rounded-lg font-bold hover:bg-slate-900 transition-colors">
            Mettre à jour mes informations
        </button>
    </form>
</div>

<?php include 'views/layout/footer.php'; ?>