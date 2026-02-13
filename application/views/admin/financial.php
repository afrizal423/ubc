<div class="space-y-6">
    <div class="flex flex-wrap gap-4 items-center justify-between bg-white dark:bg-[#1a1310] p-4 rounded-2xl border border-slate-200 dark:border-primary/10">
        <div class="flex-1 min-w-[300px]">
            <div class="relative">
                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                <input class="w-full pl-12 pr-4 py-3 bg-slate-50 dark:bg-[#241a15] border-none rounded-xl focus:ring-2 focus:ring-primary/50 dark:text-white placeholder:text-slate-400 transition-all" placeholder="Search transactions..." type="text"/>
            </div>
        </div>
        <div class="flex gap-3">
            <a href="<?php echo base_url('admin/export_financial'); ?>" class="bg-emerald-500/10 hover:bg-emerald-500/20 text-emerald-500 px-6 py-3 rounded-xl font-bold flex items-center gap-2 transition-all border border-emerald-500/20">
                <span class="material-symbols-outlined text-lg">download</span>
                Export Excel
            </a>
            <button class="bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-xl font-bold flex items-center gap-2 transition-all shadow-lg shadow-primary/20" onclick="document.getElementById('addModal').classList.remove('hidden')">
                <span class="material-symbols-outlined text-lg">add_card</span>
                Add Transaction
            </button>
        </div>
    </div>

    <!-- Table Container -->
    <div class="bg-white dark:bg-[#1a1310] rounded-2xl border border-slate-200 dark:border-primary/10 overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-[#241a15] border-bottom border-slate-200 dark:border-primary/10">
                        <th class="px-6 py-4 text-sm font-bold text-slate-500 dark:text-primary uppercase tracking-wider">Date</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-500 dark:text-primary uppercase tracking-wider">Description</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-500 dark:text-primary uppercase tracking-wider">Type</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-500 dark:text-primary uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-500 dark:text-primary uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-primary/5">
                    <?php foreach ($reports as $r): ?>
                    <tr class="hover:bg-primary/5 transition-colors">
                        <td class="px-6 py-4 text-sm font-medium text-slate-700 dark:text-slate-300">
                            <?php echo date('d M Y', strtotime($r->report_date)); ?>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-bold text-slate-900 dark:text-white"><?php echo $r->title; ?></div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase <?php echo ($r->type == 'income') ? 'bg-emerald-500/10 text-emerald-500' : 'bg-rose-500/10 text-rose-500'; ?>">
                                <?php echo $r->type; ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm font-black <?php echo ($r->type == 'income') ? 'text-emerald-500' : 'text-rose-500'; ?>">
                            <?php echo ($r->type == 'income' ? '+' : '-') . ' Rp ' . number_format($r->amount, 0, ',', '.'); ?>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="<?php echo base_url('admin/delete_financial/'.$r->id); ?>" class="p-2 rounded-lg hover:bg-red-50 dark:hover:bg-red-500/10 text-slate-400 hover:text-red-500 transition-all" onclick="return confirm('Are you sure?')">
                                    <span class="material-symbols-outlined">delete</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Simple Implementation -->
<div id="addModal" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-card-dark border border-border-dark w-full max-w-md rounded-2xl p-8 shadow-2xl">
        <h3 class="text-xl font-bold text-white mb-6">Add Transaction</h3>
        <?php echo form_open('admin/save_financial', ['class' => 'space-y-4']); ?>
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Title / Description</label>
                <input type="text" name="title" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all" required>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Type</label>
                <select name="type" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all">
                    <option value="income">Income (Pemasukan)</option>
                    <option value="expense">Expense (Pengeluaran)</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Amount (Rp)</label>
                <input type="number" name="amount" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all" required>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Date</label>
                <input type="date" name="report_date" value="<?php echo date('Y-m-d'); ?>" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all" required>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Note (Optional)</label>
                <textarea name="description" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all h-20 resize-none"></textarea>
            </div>
            <div class="flex gap-3 pt-4">
                <button type="button" class="flex-1 py-3 rounded-xl border border-border-dark text-slate-400 font-bold hover:bg-white/5 transition-all" onclick="document.getElementById('addModal').classList.add('hidden')">Cancel</button>
                <button type="submit" class="flex-1 py-3 rounded-xl bg-primary text-white font-bold hover:bg-primary/90 shadow-lg shadow-primary/20 transition-all">Save Transaction</button>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
