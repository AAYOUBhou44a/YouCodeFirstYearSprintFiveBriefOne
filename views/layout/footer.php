</main>
        <footer class="h-10 bg-white border-t border-gray-100 flex items-center justify-center">
            <p class="text-[10px] text-gray-400 uppercase tracking-widest font-medium">
                &copy; 2026 EduBrief System - Développé avec PHP & PostgreSQL
            </p>
        </footer>
    </div>

    <script>
        // Exemple : Animation de fondu au chargement des pages
        document.addEventListener('DOMContentLoaded', () => {
            const mainContent = document.querySelector('main');
            mainContent.style.opacity = '0';
            setTimeout(() => {
                mainContent.style.transition = 'opacity 0.5s ease-in-out';
                mainContent.style.opacity = '1';
            }, 50);
        });
    </script>
</body>
</html>