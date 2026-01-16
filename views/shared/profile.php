<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
    <div class="text-center mb-8">
        <div class="w-24 h-24 bg-blue-600 rounded-full mx-auto flex items-center justify-center text-white text-3xl font-bold mb-4 shadow-lg border-4 border-white">
            JD
        </div>
        <h2 class="text-2xl font-bold text-gray-800">John Doe</h2>
        <span class="inline-block mt-2 px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold uppercase tracking-wider">
            Administrateur
        </span>
    </div>

    <form class="space-y-6" onsubmit="return false;">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Adresse Email</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                    <i class="fas fa-envelope"></i>
                </span>
                <input type="text" value="john.doe@exemple.com" disabled 
                    class="block w-full pl-10 bg-gray-50 border border-gray-200 rounded-xl p-2.5 text-gray-500 cursor-not-allowed">
            </div>
            <p class="mt-1 text-xs text-gray-400 italic text-right">L'email ne peut pas être modifié.</p>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Nouveau mot de passe</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                    <i class="fas fa-lock"></i>
                </span>
                <input type="password" placeholder="••••••••" 
                    class="block w-full pl-10 border border-gray-300 rounded-xl p-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none">
            </div>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full bg-slate-900 text-white py-3 rounded-xl font-bold hover:bg-slate-800 transform active:scale-[0.98] transition-all shadow-md">
                Mettre à jour mes informations
            </button>
        </div>
    </form>
</div>