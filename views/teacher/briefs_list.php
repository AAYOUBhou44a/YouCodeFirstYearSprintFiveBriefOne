<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Catalogue des Briefs</h2>
    <p class="text-sm text-gray-500">Gérez les projets et lancez les sessions de débriefing.</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
    <aside class="lg:col-span-1">
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 sticky top-4">
            <h3 class="font-bold text-gray-800 mb-4 border-b pb-2 flex items-center">
                <i class="fas fa-filter mr-2 text-blue-500"></i> Filtres
            </h3>
            
            <div class="space-y-6">
                <div>
                    <label class="text-xs font-black text-gray-400 uppercase tracking-wider">Par Sprint</label>
                    <div class="mt-3 space-y-2">
                        <label class="flex items-center text-sm text-gray-600 cursor-pointer hover:text-blue-600">
                            <input type="checkbox" class="rounded border-gray-300 text-blue-600 mr-2"> Sprint 1 : Fondamentaux
                        </label>
                        <label class="flex items-center text-sm text-gray-600 cursor-pointer hover:text-blue-600">
                            <input type="checkbox" class="rounded border-gray-300 text-blue-600 mr-2"> Sprint 2 : Front-end
                        </label>
                        <label class="flex items-center text-sm text-gray-600 cursor-pointer hover:text-blue-600">
                            <input type="checkbox" class="rounded border-gray-300 text-blue-600 mr-2"> Sprint 3 : Back-end
                        </label>
                    </div>
                </div>

                <div>
                    <label class="text-xs font-black text-gray-400 uppercase tracking-wider">Type de projet</label>
                    <select class="mt-2 block w-full text-sm border-gray-200 rounded-lg bg-gray-50 p-2">
                        <option>Tous les types</option>
                        <option>Individuel</option>
                        <option>Collectif</option>
                    </select>
                </div>
            </div>
        </div>
    </aside>

    <div class="lg:col-span-3 grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 flex flex-col justify-between hover:border-blue-200 transition-all">
            <div>
                <div class="flex justify-between items-center mb-3">
                    <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-indigo-100 text-indigo-700 uppercase">Individuel</span>
                    <span class="text-gray-400 text-xs"><i class="far fa-clock mr-1"></i> 16h</span>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Portfolio Dynamique en PHP</h3>
                <p class="text-sm text-gray-500 line-clamp-2 mb-4">Transformer un site statique en site dynamique en utilisant PHP et une structure de données simple.</p>
            </div>
            <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-50">
                <span class="text-xs font-semibold text-blue-600"><i class="fas fa-bullseye mr-1"></i> 3 Compétences</span>
                <a href="/debriefing/debriefing_form" class="bg-slate-800 text-white text-xs px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors shadow-sm">Débriefer</a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 flex flex-col justify-between hover:border-blue-200 transition-all">
            <div>
                <div class="flex justify-between items-center mb-3">
                    <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-purple-100 text-purple-700 uppercase">Collectif</span>
                    <span class="text-gray-400 text-xs"><i class="far fa-clock mr-1"></i> 32h</span>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Gestionnaire de Stock NoSQL</h3>
                <p class="text-sm text-gray-500 line-clamp-2 mb-4">Développement en équipe d'une interface de gestion de stock avec intégration d'API.</p>
            </div>
            <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-50">
                <span class="text-xs font-semibold text-blue-600"><i class="fas fa-bullseye mr-1"></i> 5 Compétences</span>
                <a href="/debriefing/teacher/debriefing_form" class="bg-slate-800 text-white text-xs px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors shadow-sm">Débriefer</a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 flex flex-col justify-between hover:border-blue-200 transition-all">
            <div>
                <div class="flex justify-between items-center mb-3">
                    <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-indigo-100 text-indigo-700 uppercase">Individuel</span>
                    <span class="text-gray-400 text-xs"><i class="far fa-clock mr-1"></i> 8h</span>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Algorithmique JavaScript</h3>
                <p class="text-sm text-gray-500 line-clamp-2 mb-4">Série d'exercices logiques pour valider les bases de la manipulation des tableaux et objets.</p>
            </div>
            <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-50">
                <span class="text-xs font-semibold text-blue-600"><i class="fas fa-bullseye mr-1"></i> 2 Compétences</span>
                <a href="/debriefing/teacher/debriefing_form" class="bg-slate-800 text-white text-xs px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors shadow-sm">Débriefer</a>
            </div>
        </div>

    </div>
</div>