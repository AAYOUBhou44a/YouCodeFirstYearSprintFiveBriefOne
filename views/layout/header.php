<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduBrief - Système de Débriefing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 flex h-screen overflow-hidden">

    <aside class="w-64 bg-slate-900 text-white flex flex-col shadow-xl z-20">
        <div class="h-20 flex items-center justify-center border-b border-slate-800">
            <div class="bg-blue-600 p-2 rounded-lg mr-2 shadow-lg shadow-blue-900/20">
                <i class="fas fa-graduation-cap text-white"></i>
            </div>
            <h1 class="text-xl font-bold tracking-tight">EduBrief</h1>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto custom-scrollbar">
            <a href="/debriefing" class="flex items-center px-4 py-3 text-white bg-slate-800 rounded-xl transition-all mb-4">
                <i class="fas fa-th-large w-6 text-sm"></i> 
                <span class="font-semibold text-sm">Dashboard</span>
            </a>

            <div class="pt-2 pb-2 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] pl-4">Administration</div>
            <a href="/debriefing/classes" class="flex items-center px-4 py-2 text-gray-400 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all group">
                <i class="fas fa-users w-6 text-xs group-hover:text-blue-400"></i> <span class="text-sm">Classes</span>
            </a>
            <a href="/debriefing/skills" class="flex items-center px-4 py-2 text-gray-400 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all group">
                <i class="fas fa-list-check w-6 text-xs group-hover:text-blue-400"></i> <span class="text-sm">Compétences</span>
            </a>
            <a href="/debriefing/sprints" class="flex items-center px-4 py-2 text-gray-400 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all group">
                <i class="fas fa-sync w-6 text-xs group-hover:text-blue-400"></i> <span class="text-sm">Sprints</span>
            </a>

            <div class="pt-6 pb-2 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] pl-4">Pédagogie</div>
            <a href="/debriefing/briefs_list" class="flex items-center px-4 py-2 text-gray-400 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all group">
                <i class="fas fa-file-invoice w-6 text-xs group-hover:text-indigo-400"></i> <span class="text-sm">Catalogue Briefs</span>
            </a>
            <a href="/debriefing/student_history" class="flex items-center px-4 py-2 text-gray-400 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all group">
                <i class="fas fa-history w-6 text-xs group-hover:text-indigo-400"></i> <span class="text-sm">Suivi Élèves</span>
            </a>

            <div class="pt-6 pb-2 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] pl-4">Mon Espace</div>
            <a href="/debriefing/my_briefs" class="flex items-center px-4 py-2 text-gray-400 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all group">
                <i class="fas fa-tasks w-6 text-xs group-hover:text-emerald-400"></i> <span class="text-sm">Mes Projets</span>
            </a>
            <a href="/debriefing/my_progress" class="flex items-center px-4 py-2 text-gray-400 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all group">
                <i class="fas fa-chart-pie w-6 text-xs group-hover:text-emerald-400"></i> <span class="text-sm">Ma Progression</span>
            </a>
        </nav>

        <div class="p-4 border-t border-slate-800 bg-slate-900/50">
            <div class="flex items-center gap-3 p-2 rounded-xl bg-slate-800/40 border border-slate-700/30">
                <div class="w-10 h-10 rounded-lg bg-blue-600 flex items-center justify-center font-bold text-white shadow-lg text-sm">
                    JD
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold text-white truncate">John Doe</p>
                    <p class="text-[10px] text-blue-400 font-bold uppercase tracking-wider">Super Admin</p>
                </div>
                <a href="/debriefing/logout" class="text-slate-500 hover:text-red-400 transition-colors p-1">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8 z-10">
            <div class="flex items-center gap-4">
                <button class="md:hidden text-gray-600"><i class="fas fa-bars"></i></button>
                <h2 class="text-lg font-bold text-gray-800 tracking-tight">Aperçu Global du Système</h2>
            </div>
            
            <div class="flex items-center gap-6">
                <div class="hidden md:flex flex-col items-end">
                    <span class="text-[10px] font-black text-gray-400 uppercase">Aujourd'hui</span>
                    <span class="text-xs font-bold text-gray-700">Vendredi, 16 Janv. 2026</span>
                </div>
                <div class="h-8 w-[1px] bg-gray-100 hidden md:block"></div>
                <div class="flex items-center gap-3">
                    <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-blue-600 transition-colors">
                        <i class="far fa-bell"></i>
                    </button>
                    <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-blue-600 transition-colors">
                        <i class="far fa-question-circle"></i>
                    </button>
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-8 bg-[#f8fafc]">