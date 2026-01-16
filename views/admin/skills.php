<?php $title = "Référentiel Compétences"; include 'views/layout/header.php'; ?>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-slate-50 border-b border-gray-100">
            <tr>
                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Code</th>
                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Libellé de la compétence</th>
                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase text-center">Niveaux requis</th>
                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            <?php foreach ($competences as $comp): ?>
            <tr class="hover:bg-blue-50/30 transition-colors">
                <td class="px-6 py-4 font-mono text-blue-600 font-bold"><?php echo $comp['code']; ?></td>
                <td class="px-6 py-4 text-sm text-gray-700 font-medium"><?php echo htmlspecialchars($comp['libelle']); ?></td>
                <td class="px-6 py-4">
                    <div class="flex justify-center gap-1">
                        <span class="text-[10px] bg-gray-200 px-1 rounded">I</span>
                        <span class="text-[10px] bg-gray-200 px-1 rounded">A</span>
                        <span class="text-[10px] bg-gray-200 px-1 rounded">T</span>
                    </div>
                </td>
                <td class="px-6 py-4 text-right">
                    <button class="text-gray-400 hover:text-indigo-600"><i class="fas fa-pen-square text-lg"></i></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'views/layout/footer.php'; ?>