<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Planification des Sprints</h2>
            <p class="text-sm text-gray-500">Organisez les étapes pédagogiques de la formation.</p>
        </div>
        <select class="border-gray-300 rounded-lg text-sm p-2 focus:ring-blue-500 border bg-white shadow-sm cursor-pointer">
            <option>Sélectionner une classe...</option>
            <option>Développement Web Fullstack</option>
            <option>Application Mobile</option>
        </select>
    </div>

    <div class="space-y-4">
        
        <div class="bg-white border-l-4 border-indigo-500 rounded-r-xl shadow-sm p-4 flex items-center justify-between hover:shadow-md transition-shadow">
            <div class="flex items-center gap-4">
                <div class="text-center bg-gray-50 px-3 py-1 rounded border">
                    <span class="block text-[10px] text-gray-400 font-bold uppercase">Ordre</span>
                    <span class="text-xl font-black text-indigo-600">1</span>
                </div>
                <div>
                    <h4 class="font-bold text-gray-800">Bases du Web : HTML, CSS & Git</h4>
                    <p class="text-xs text-gray-500 italic">Durée estimée : 2 semaines</p>
                </div>
            </div>
            <div class="flex gap-2">
                <button class="p-2 text-gray-400 hover:text-blue-600 transition-colors" title="Modifier"><i class="fas fa-edit"></i></button>
                <button class="p-2 text-gray-400 hover:text-red-500 transition-colors" title="Supprimer"><i class="fas fa-trash"></i></button>
            </div>
        </div>

        <div class="bg-white border-l-4 border-indigo-500 rounded-r-xl shadow-sm p-4 flex items-center justify-between hover:shadow-md transition-shadow">
            <div class="flex items-center gap-4">
                <div class="text-center bg-gray-50 px-3 py-1 rounded border">
                    <span class="block text-[10px] text-gray-400 font-bold uppercase">Ordre</span>
                    <span class="text-xl font-black text-indigo-600">2</span>
                </div>
                <div>
                    <h4 class="font-bold text-gray-800">JavaScript Moderne & Manipulation du DOM</h4>
                    <p class="text-xs text-gray-500 italic">Durée estimée : 3 semaines</p>
                </div>
            </div>
            <div class="flex gap-2">
                <button class="p-2 text-gray-400 hover:text-blue-600 transition-colors"><i class="fas fa-edit"></i></button>
                <button class="p-2 text-gray-400 hover:text-red-500 transition-colors"><i class="fas fa-trash"></i></button>
            </div>
        </div>

        <div class="bg-white border-l-4 border-indigo-500 rounded-r-xl shadow-sm p-4 flex items-center justify-between hover:shadow-md transition-shadow">
            <div class="flex items-center gap-4">
                <div class="text-center bg-gray-50 px-3 py-1 rounded border">
                    <span class="block text-[10px] text-gray-400 font-bold uppercase">Ordre</span>
                    <span class="text-xl font-black text-indigo-600">3</span>
                </div>
                <div>
                    <h4 class="font-bold text-gray-800">PHP Fondamentaux & POO</h4>
                    <p class="text-xs text-gray-500 italic">Durée estimée : 4 semaines</p>
                </div>
            </div>
            <div class="flex gap-2">
                <button class="p-2 text-gray-400 hover:text-blue-600 transition-colors"><i class="fas fa-edit"></i></button>
                <button class="p-2 text-gray-400 hover:text-red-500 transition-colors"><i class="fas fa-trash"></i></button>
            </div>
        </div>

    </div>

    <div class="mt-8 text-center">
        <button class="inline-flex items-center px-6 py-3 border border-dashed border-gray-300 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-indigo-600 hover:border-indigo-300 transition-all">
            <i class="fas fa-plus-circle mr-2"></i> Ajouter un nouveau sprint à la planification
        </button>
    </div>
</div>