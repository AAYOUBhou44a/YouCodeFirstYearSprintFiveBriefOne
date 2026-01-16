<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - EduBrief</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 h-screen flex items-center justify-center p-4">
    <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-md">
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 text-white rounded-2xl mb-4 shadow-lg shadow-blue-500/50">
                <i class="fas fa-graduation-cap text-3xl"></i>
            </div>
            <h1 class="text-3xl font-black text-slate-800">EduBrief</h1>
            <p class="text-slate-400 mt-2">Accédez à votre espace pédagogique</p>
        </div>

        <form action="index.php?action=login_process" method="POST" class="space-y-6">
            <div>
                <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all">
            </div>
            <div>
                <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">Mot de passe</label>
                <input type="password" name="password" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-4 rounded-xl font-bold hover:bg-blue-700 shadow-xl shadow-blue-500/30 transition-all transform hover:-translate-y-1">
                Se connecter
            </button>
        </form>
    </div>
</body>
</html>