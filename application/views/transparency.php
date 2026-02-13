<!-- Hero Section -->
<section class="relative overflow-hidden rounded-3xl bg-surface-dark border border-border-dark p-8 md:p-16 text-center mt-8 mx-4 sm:mx-8">
    <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(circle at 2px 2px, #ec5b13 1px, transparent 0); background-size: 32px 32px;"></div>
    <div class="relative z-10 space-y-4">
        <span class="inline-block py-1 px-3 rounded-full bg-primary/20 text-primary text-xs font-bold uppercase tracking-widest">Community Transparency</span>
        <h1 class="text-4xl md:text-6xl font-black tracking-tight leading-tight text-white">
            Transparency &amp; <br/><span class="text-primary">Community Reports</span>
        </h1>
        <p class="text-gray-400 max-w-2xl mx-auto text-lg">
            Komitmen kami untuk pengelolaan komunitas yang terbuka dan profesional. Lihat semua data keuangan dan aktivitas secara real-time.
        </p>
    </div>
</section>

<!-- Financial Summary Grid -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-6">
    <div class="flex items-center gap-2 px-1">
        <span class="material-symbols-outlined text-accent-blue">account_balance_wallet</span>
        <h2 class="text-2xl font-bold text-white">Financial Summary</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php 
            $income = array_sum(array_column(array_filter($reports, function($r){ return $r->type == 'income'; }), 'amount'));
            $expense = array_sum(array_column(array_filter($reports, function($r){ return $r->type == 'expense'; }), 'amount'));
            $balance = $income - $expense;
        ?>
        <!-- Card 1 -->
        <div class="bg-surface-dark p-6 rounded-2xl border border-border-dark custom-shadow group hover:border-primary/50 transition-colors">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-primary/10 rounded-xl group-hover:bg-primary/20 transition-colors">
                    <span class="material-symbols-outlined text-primary text-3xl">savings</span>
                </div>
            </div>
            <p class="text-gray-400 text-sm font-medium uppercase tracking-wider">Total Saldo</p>
            <h3 class="text-3xl font-black mt-1 text-white">Rp <?php echo number_format($balance, 0, ',', '.'); ?></h3>
        </div>
        <!-- Card 2 -->
        <div class="bg-surface-dark p-6 rounded-2xl border border-border-dark custom-shadow group hover:border-accent-green/50 transition-colors">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-accent-green/10 rounded-xl group-hover:bg-accent-green/20 transition-colors">
                    <span class="material-symbols-outlined text-accent-green text-3xl">payments</span>
                </div>
            </div>
            <p class="text-gray-400 text-sm font-medium uppercase tracking-wider">Total Pemasukan</p>
            <h3 class="text-3xl font-black mt-1 text-white">Rp <?php echo number_format($income, 0, ',', '.'); ?></h3>
        </div>
        <!-- Card 3 -->
        <div class="bg-surface-dark p-6 rounded-2xl border border-border-dark custom-shadow group hover:border-red-500/50 transition-colors">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-red-500/10 rounded-xl group-hover:bg-red-500/20 transition-colors">
                    <span class="material-symbols-outlined text-red-500 text-3xl">shopping_cart_checkout</span>
                </div>
            </div>
            <p class="text-gray-400 text-sm font-medium uppercase tracking-wider">Total Pengeluaran</p>
            <h3 class="text-3xl font-black mt-1 text-white">Rp <?php echo number_format($expense, 0, ',', '.'); ?></h3>
        </div>
    </div>
</section>

<!-- Financial Report Table -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-6">
    <div class="flex items-center justify-between px-1">
        <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-primary">analytics</span>
            <h2 class="text-2xl font-bold text-white">Financial History</h2>
        </div>
    </div>
    <div class="bg-surface-dark rounded-2xl border border-border-dark overflow-hidden custom-shadow">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-border-dark/50 text-gray-400 text-xs uppercase tracking-widest font-bold">
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4">Keterangan</th>
                        <th class="px-6 py-4">Tipe</th>
                        <th class="px-6 py-4 text-right">Jumlah</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border-dark">
                    <?php foreach ($reports as $r): ?>
                    <tr class="hover:bg-white/5 transition-colors cursor-default">
                        <td class="px-6 py-5 text-gray-400"><?php echo date('d M Y', strtotime($r->report_date)); ?></td>
                        <td class="px-6 py-5 font-bold text-white"><?php echo $r->title; ?></td>
                        <td class="px-6 py-5">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase <?php echo ($r->type == 'income') ? 'bg-accent-green/10 text-accent-green' : 'bg-red-500/10 text-red-500'; ?>">
                                <?php echo $r->type; ?>
                            </span>
                        </td>
                        <td class="px-6 py-5 text-right font-black <?php echo ($r->type == 'income') ? 'text-accent-green' : 'text-red-500'; ?>">
                            <?php echo ($r->type == 'income' ? '+' : '-') . ' Rp ' . number_format($r->amount, 0, ',', '.'); ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
