</main>
<!-- Footer -->
<footer class="bg-background-dark border-t border-border-dark py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="flex items-center gap-3">
                <div class="bg-primary p-1.5 rounded-lg">
                    <span class="material-symbols-outlined text-white text-xl">sports_tennis</span>
                </div>
                <h2 class="text-white text-lg font-extrabold tracking-tight uppercase">UBS GOLD <span class="text-primary">Community</span></h2>
            </div>
            <div class="flex gap-8 text-slate-400 text-sm font-medium">
                <a class="hover:text-white transition-colors" href="#">Privacy Policy</a>
                <a class="hover:text-white transition-colors" href="#">Terms of Service</a>
                <a class="hover:text-white transition-colors" href="#">FAQ</a>
            </div>
            <div class="flex gap-4">
                <a class="w-10 h-10 rounded-full border border-border-dark flex items-center justify-center text-slate-400 hover:text-white hover:border-primary hover:bg-primary transition-all" href="#">
                    <span class="material-symbols-outlined text-xl">camera</span>
                </a>
                <a class="w-10 h-10 rounded-full border border-border-dark flex items-center justify-center text-slate-400 hover:text-white hover:border-primary hover:bg-primary transition-all" href="#">
                    <span class="material-symbols-outlined text-xl">share</span>
                </a>
            </div>
        </div>
        <div class="mt-8 pt-8 border-t border-border-dark text-center text-slate-500 text-xs">
            &copy; <?php echo date('Y'); ?> United Badminton Community. All rights reserved. Smash with heart.
        </div>
    </div>
</footer>

<script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('<?php echo base_url('assets/service-worker.js'); ?>');
    }
</script>
</body>
</html>
