<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
    <!-- Total Members -->
    <div class="bg-white dark:bg-card-dark p-6 rounded-xl border border-slate-200 dark:border-border-dark shadow-sm group">
        <div class="flex justify-between items-start mb-4">
            <div class="bg-blue-500/10 p-3 rounded-lg text-blue-500 group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined">group</span>
            </div>
            <span class="text-xs font-bold text-green-500 bg-green-500/10 px-2 py-1 rounded-md flex items-center gap-1">
                <span class="material-symbols-outlined text-xs">trending_up</span> 12%
            </span>
        </div>
        <p class="text-slate-500 text-sm font-medium mb-1">Total Members</p>
        <h3 class="text-2xl font-bold dark:text-white"><?php echo $stats['total_members']; ?></h3>
    </div>
    <!-- Total Saldo -->
    <div class="bg-white dark:bg-card-dark p-6 rounded-xl border border-primary/20 dark:border-primary/20 shadow-sm relative overflow-hidden group">
        <div class="absolute -right-4 -bottom-4 opacity-5 group-hover:opacity-10 transition-opacity">
            <span class="material-symbols-outlined text-[120px] text-primary">payments</span>
        </div>
        <div class="flex justify-between items-start mb-4">
            <div class="bg-primary/10 p-3 rounded-lg text-primary">
                <span class="material-symbols-outlined">payments</span>
            </div>
            <span class="text-xs font-bold text-green-500 bg-green-500/10 px-2 py-1 rounded-md flex items-center gap-1">
                <span class="material-symbols-outlined text-xs">trending_up</span> 8.4%
            </span>
        </div>
        <p class="text-slate-500 text-sm font-medium mb-1">Total Saldo</p>
        <h3 class="text-2xl font-bold dark:text-white">Rp <?php echo number_format($stats['total_saldo'], 0, ',', '.'); ?></h3>
    </div>
    <!-- Upcoming Events -->
    <div class="bg-white dark:bg-card-dark p-6 rounded-xl border border-slate-200 dark:border-border-dark shadow-sm group">
        <div class="flex justify-between items-start mb-4">
            <div class="bg-purple-500/10 p-3 rounded-lg text-purple-500 group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined">event_available</span>
            </div>
        </div>
        <p class="text-slate-500 text-sm font-medium mb-1">Upcoming Events</p>
        <h3 class="text-2xl font-bold dark:text-white"><?php echo $stats['upcoming_events']; ?></h3>
    </div>
    <!-- Active Members -->
    <div class="bg-white dark:bg-card-dark p-6 rounded-xl border border-slate-200 dark:border-border-dark shadow-sm group">
        <div class="flex justify-between items-start mb-4">
            <div class="bg-orange-500/10 p-3 rounded-lg text-orange-500 group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined">person_pin_circle</span>
            </div>
            <div class="flex items-center gap-1 text-slate-500 text-xs">
                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span> Live
            </div>
        </div>
        <p class="text-slate-500 text-sm font-medium mb-1">Active Members</p>
        <h3 class="text-2xl font-bold dark:text-white"><?php echo $stats['active_members']; ?></h3>
    </div>
</div>

<!-- Chart Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Financial Overview -->
    <div class="bg-white dark:bg-card-dark p-6 rounded-xl border border-slate-200 dark:border-border-dark shadow-sm">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h4 class="text-lg font-bold dark:text-white">Financial Overview</h4>
                <p class="text-sm text-slate-500">Monthly income and expenses</p>
            </div>
        </div>
        <div class="h-80">
            <canvas id="financialChart"></canvas>
        </div>
    </div>
    <!-- Attendance Ranking -->
    <div class="bg-white dark:bg-card-dark p-6 rounded-xl border border-slate-200 dark:border-border-dark shadow-sm">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h4 class="text-lg font-bold dark:text-white">Attendance Ranking</h4>
                <p class="text-sm text-slate-500">Member participation levels</p>
            </div>
        </div>
        <div class="h-80">
            <canvas id="attendanceChart"></canvas>
        </div>
    </div>
</div>
