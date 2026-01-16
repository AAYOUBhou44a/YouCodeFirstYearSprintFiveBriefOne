<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'EduBrief - Système de Débriefing'; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 flex h-screen overflow-hidden">

    <aside class="w-64 bg-slate-900 text-white flex flex-col shadow-xl z-20">
        <div class="h-20 flex items-center justify-center border-b border-slate-800">
            <div class="bg-blue-600 p-2 rounded-lg mr-2">
                <i class="fas fa-graduation-cap text-white"></i>
            </div>
            <h1 class="text-xl font-bold tracking-tight">EduBrief</h1>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="/debriefing" class="flex items-center px-4 py-3 text-gray-300 hover:bg-slate-800 hover:text-white rounded-xl transition-all">
                <i class="fas fa-th-large w-6 text-sm"></i> Dashboard
            </a>

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <div class="pt-4 pb-2 text-[10px] font-black text-slate-500 uppercase tracking-widest">Administration</div>
                <a href="/debriefing/views/admin/classes" class="flex items-center px-4 py-2 text-gray-300 hover:text-white rounded-lg">
                    <i class="fas fa-users w-6 text-xs"></i> Classes
                </a>
                <a href="/debriefing/views/admin/skills" class="flex items-center px-4 py-2 text-gray-300 hover:text-white rounded-lg">
                    <i class="fas fa-list-check w-6 text-xs"></i> Compétences
                </a>
                <a href="/debriefing/views/admin/sprints" class="flex items-center px-4 py-2 text-gray-300 hover:text-white rounded-lg">
                    <i class="fas fa-sync w-6 text-xs"></i> Sprints
                </a>
            <?php endif; ?>

            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'teacher' || $_SESSION['role'] === 'admin')): ?>
                <div class="pt-4 pb-2 text-[10px] font-black text-slate-500 uppercase tracking-widest">Pédagogie</div>
                <a href="/debriefing/views/teacher/briefs_list" class="flex items-center px-4 py-2 text-gray-300 hover:text-white rounded-lg">
                    <i class="fas fa-file-invoice w-6 text-xs"></i> Mes Briefs
                </a>
                <a href="/debriefing/views/teacher/student_history" class="flex items-center px-4 py-2 text-gray-300 hover:text-white rounded-lg">
                    <i class="fas fa-history w-6 text-xs"></i> Suivi Élèves
                </a>
            <?php endif; ?>

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'student'): ?>
                <div class="pt-4 pb-2 text-[10px] font-black text-slate-500 uppercase tracking-widest">Mon Espace</div>
                <a href="/debriefing/views/student/my_briefs" class="flex items-center px-4 py-2 text-gray-300 hover:text-white rounded-lg">
                    <i class="fas fa-tasks w-6 text-xs"></i> Mes Projets
                </a>
                <a href="/debriefing/views/student/my_progress" class="flex items-center px-4 py-2 text-gray-300 hover:text-white rounded-lg">
                    <i class="fas fa-chart-pie w-6 text-xs"></i> Ma Progression
                </a>
            <?php endif; ?>
        </nav>

        <div class="p-4 border-t border-slate-800 bg-slate-900">
            <div class="flex items-center gap-3 p-2 rounded-lg bg-slate-800/50">
                <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center font-bold text-white shadow-lg">
                    <?php echo strtoupper(substr($_SESSION['username'] ?? 'U', 0, 1)); ?>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold truncate"><?php echo $_SESSION['username'] ?? 'Utilisateur'; ?></p>
                    <p class="text-[10px] text-gray-400 uppercase tracking-tighter"><?php echo $_SESSION['role'] ?? 'Rôle'; ?></p>
                </div>
                <a href="/debriefing/views/shared/login" class="text-gray-500 hover:text-red-400">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8 z-10">
            <h2 class="text-lg font-semibold text-gray-800 tracking-tight">
                <?php echo $header_title ?? 'Dashboard'; ?>
            </h2>
            <div class="flex items-center gap-4 text-gray-400">
                <span class="text-xs font-medium text-gray-400"><?php echo date('d M Y'); ?></span>
                <div class="h-4 w-[1px] bg-gray-200"></div>
                <button class="hover:text-blue-600 transition-colors"><i class="far fa-bell"></i></button>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-8 bg-[#f8fafc]">