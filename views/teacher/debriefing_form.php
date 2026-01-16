<?php $title = "Évaluation Pédagogique"; include 'views/layout/header.php'; ?>

<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
    <div class="p-8 bg-slate-900 text-white">
        <h2 class="text-2xl font-bold">Session de Débriefing</h2>
        <p class="text-slate-400 text-sm mt-1">Évaluation des compétences acquises durant le brief.</p>
    </div>

    <form action="index.php?action=submit_evaluation" method="POST" class="p-8 space-y-8">
        <div class="flex gap-6 p-4 bg-blue-50 rounded-xl border border-blue-100">
            <div class="flex-1">
                <label class="block text-xs font-black text-blue-900 uppercase mb-1">Apprenant</label>
                <p class="font-bold text-lg"><?php echo $student['full_name']; ?></p>
            </div>
            <div class="flex-1">
                <label class="block text-xs font-black text-blue-900 uppercase mb-1">Brief Concerné</label>
                <p class="font-bold text-lg"><?php echo $brief['titre']; ?></p>
            </div>
        </div>

        <?php foreach ($brief_competences as $c): ?>
        <div class="space-y-4">
            <h4 class="font-bold text-gray-700 flex items-center">
                <span class="w-8 h-8 flex items-center justify-center bg-gray-100 rounded-full mr-3 text-sm"><?php echo $c['code']; ?></span>
                <?php echo $c['libelle']; ?>
            </h4>
            
            <div class="grid grid-cols-3 gap-4">
                <?php $niveaux = ['IMITER', 'S_ADAPTER', 'TRANSPOSER']; 
                foreach ($niveaux as $n): ?>
                <label class="cursor-pointer">
                    <input type="radio" name="eval[<?php echo $c['id']; ?>]" value="<?php echo $n; ?>" class="peer sr-only" required>
                    <div class="p-3 text-center border-2 rounded-xl peer-checked:border-blue-600 peer-checked:bg-blue-50 transition-all hover:bg-gray-50">
                        <span class="text-xs font-bold text-gray-400 peer-checked:text-blue-600"><?php echo $n; ?></span>
                    </div>
                </label>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>

        <div class="pt-6 border-t">
            <label class="block text-sm font-bold text-gray-700 mb-2">Commentaires pédagogiques</label>
            <textarea name="feedback" rows="4" class="w-full border-gray-300 rounded-xl p-3 bg-gray-50 focus:ring-2 focus:ring-blue-500 border" placeholder="Qu'est-ce que l'apprenant a bien réussi ? Que doit-il améliorer ?"></textarea>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-4 rounded-xl font-bold text-lg hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all">
            Valider le débriefing
        </button>
    </form>
</div>

<?php include 'views/layout/footer.php'; ?>