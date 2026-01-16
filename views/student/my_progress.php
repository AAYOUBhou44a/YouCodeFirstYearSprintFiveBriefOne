<?php $title = "Ma Progression"; include 'views/layout/header.php'; ?>

<div class="max-w-4xl mx-auto">
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">État de mes compétences</h2>
        
        <div class="space-y-10">
            <?php foreach ($skills_progress as $skill): 
                // Calcul de la largeur de la barre selon le niveau
                $width = "0%";
                $color = "bg-gray-200";
                if ($skill['last_level'] == 'IMITER') { $width = "33%"; $color = "bg-orange-400"; }
                elseif ($skill['last_level'] == 'S_ADAPTER') { $width = "66%"; $color = "bg-blue-500"; }
                elseif ($skill['last_level'] == 'TRANSPOSER') { $width = "100%"; $color = "bg-green-500"; }
            ?>
            <div>
                <div class="flex justify-between items-end mb-2">
                    <div>
                        <span class="text-xs font-black text-indigo-600 uppercase"><?php echo $skill['code']; ?></span>
                        <h4 class="font-bold text-gray-700"><?php echo htmlspecialchars($skill['libelle']); ?></h4>
                    </div>
                    <span class="text-sm font-bold <?php echo str_replace('bg-', 'text-', $color); ?>">
                        <?php echo $skill['last_level'] ?? 'NON ÉVALUÉ'; ?>
                    </span>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-3">
                    <div class="<?php echo $color; ?> h-3 rounded-full transition-all duration-1000" style="width: <?php echo $width; ?>"></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>