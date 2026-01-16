<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
    <div class="p-8 bg-slate-900 text-white">
        <h2 class="text-2xl font-bold">Session de Débriefing</h2>
        <p class="text-slate-400 text-sm mt-1">Évaluation des compétences acquises durant le brief.</p>
    </div>

    <form action="#" method="POST" class="p-8 space-y-8" onsubmit="return false;">
        
        <div class="flex flex-col md:flex-row gap-6 p-4 bg-blue-50 rounded-xl border border-blue-100">
            <div class="flex-1">
                <label class="block text-[10px] font-black text-blue-900 uppercase mb-1 tracking-widest">Apprenant</label>
                <p class="font-bold text-lg text-blue-800">Yassine Elalami</p>
            </div>
            <div class="flex-1 md:border-l border-blue-100 md:pl-6">
                <label class="block text-[10px] font-black text-blue-900 uppercase mb-1 tracking-widest">Brief Concerné</label>
                <p class="font-bold text-lg text-blue-800">Portfolio Dynamique en PHP</p>
            </div>
        </div>

        <div class="space-y-4">
            <h4 class="font-bold text-gray-700 flex items-center">
                <span class="w-8 h-8 flex items-center justify-center bg-blue-600 text-white rounded-full mr-3 text-sm font-black shadow-sm">C1</span>
                Maquetter une application
            </h4>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <label class="cursor-pointer group">
                    <input type="radio" name="skill_1" value="IMITER" class="peer sr-only" required>
                    <div class="p-4 text-center border-2 rounded-2xl peer-checked:border-blue-600 peer-checked:bg-blue-50 transition-all hover:bg-gray-50 border-gray-100">
                        <span class="block text-xs font-black text-gray-400 group-hover:text-gray-600 peer-checked:text-blue-600 uppercase">Imiter</span>
                    </div>
                </label>
                <label class="cursor-pointer group">
                    <input type="radio" name="skill_1" value="S_ADAPTER" class="peer sr-only">
                    <div class="p-4 text-center border-2 rounded-2xl peer-checked:border-blue-600 peer-checked:bg-blue-50 transition-all hover:bg-gray-50 border-gray-100">
                        <span class="block text-xs font-black text-gray-400 group-hover:text-gray-600 peer-checked:text-blue-600 uppercase">S'adapter</span>
                    </div>
                </label>
                <label class="cursor-pointer group">
                    <input type="radio" name="skill_1" value="TRANSPOSER" class="peer sr-only">
                    <div class="p-4 text-center border-2 rounded-2xl peer-checked:border-blue-600 peer-checked:bg-blue-50 transition-all hover:bg-gray-50 border-gray-100">
                        <span class="block text-xs font-black text-gray-400 group-hover:text-gray-600 peer-checked:text-blue-600 uppercase">Transposer</span>
                    </div>
                </label>
            </div>
        </div>

        <div class="pt-6 border-t border-gray-100">
            <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center">
                <i class="far fa-comment-alt mr-2 text-blue-500"></i> Commentaires pédagogiques
            </label>
            <textarea name="feedback" rows="4" class="w-full border-gray-200 rounded-2xl p-4 bg-gray-50 focus:ring-2 focus:ring-blue-500 border focus:bg-white transition-all outline-none" placeholder="Observations sur le travail de l'apprenant..."></textarea>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-4 rounded-2xl font-bold text-lg hover:bg-blue-700 shadow-lg shadow-blue-200 transform active:scale-[0.99] transition-all">
            Valider le débriefing
        </button>
    </form>
</div>