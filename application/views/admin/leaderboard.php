<div class="space-y-6">
    <div class="flex flex-wrap gap-4 items-center justify-between bg-white dark:bg-[#1a1310] p-4 rounded-2xl border border-slate-200 dark:border-primary/10">
        <div class="flex-1 min-w-[300px]">
            <div class="relative">
                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                <input class="w-full pl-12 pr-4 py-3 bg-slate-50 dark:bg-[#241a15] border-none rounded-xl focus:ring-2 focus:ring-primary/50 dark:text-white placeholder:text-slate-400 transition-all" placeholder="Search leaderboard..." type="text"/>
            </div>
        </div>
        <div class="flex gap-3">
            <button class="bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-xl font-bold flex items-center gap-2 transition-all shadow-lg shadow-primary/20" onclick="document.getElementById('addModal').classList.remove('hidden')">
                <span class="material-symbols-outlined text-lg">stars</span>
                Update Points
            </button>
        </div>
    </div>

    <!-- Table Container -->
    <div class="bg-white dark:bg-[#1a1310] rounded-2xl border border-slate-200 dark:border-primary/10 overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-[#241a15] border-bottom border-slate-200 dark:border-primary/10">
                        <th class="px-6 py-4 text-sm font-bold text-slate-500 dark:text-primary uppercase tracking-wider w-20">Rank</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-500 dark:text-primary uppercase tracking-wider">Member</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-500 dark:text-primary uppercase tracking-wider">Points</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-500 dark:text-primary uppercase tracking-wider">Win/Loss</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-500 dark:text-primary uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-primary/5">
                    <?php $i = 1; foreach ($leaderboard as $l): ?>
                    <tr class="hover:bg-primary/5 transition-colors <?php echo ($i <= 3) ? 'bg-primary/5' : ''; ?>">
                        <td class="px-6 py-4">
                            <div class="w-8 h-8 rounded-full <?php 
                                echo ($i == 1) ? 'bg-amber-400' : (($i == 2) ? 'bg-slate-300' : (($i == 3) ? 'bg-amber-700' : 'bg-slate-700')); 
                            ?> text-black flex items-center justify-center font-black text-sm">
                                <?php echo $i; ?>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-bold text-slate-900 dark:text-white"><?php echo $l->full_name; ?></div>
                            <div class="text-xs text-slate-400"><?php echo $l->email; ?></div>
                        </td>
                        <td class="px-6 py-4 font-black text-primary">
                            <?php echo number_format($l->points); ?>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-emerald-500 font-bold"><?php echo $l->win; ?>W</span>
                            <span class="text-slate-400 mx-1">/</span>
                            <span class="text-rose-500 font-bold"><?php echo $l->loss; ?>L</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-primary/10 text-slate-400 hover:text-primary transition-all">
                                    <span class="material-symbols-outlined">edit</span>
                                </button>
                                <a href="<?php echo base_url('admin/delete_leaderboard/'.$l->id); ?>" class="p-2 rounded-lg hover:bg-red-50 dark:hover:bg-red-500/10 text-slate-400 hover:text-red-500 transition-all" onclick="return confirm('Are you sure?')">
                                    <span class="material-symbols-outlined">delete</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Simple Implementation -->
<div id="addModal" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-card-dark border border-border-dark w-full max-w-md rounded-2xl p-8 shadow-2xl">
        <h3 class="text-xl font-bold text-white mb-6">Update Leaderboard</h3>
        <?php echo form_open('admin/save_leaderboard', ['class' => 'space-y-4']); ?>
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Member</label>
                <select name="member_id" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all">
                    <?php 
                    $members = $this->db->get('members')->result();
                    foreach ($members as $m): ?>
                    <option value="<?php echo $m->id; ?>"><?php echo $m->full_name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Win</label>
                    <input type="number" name="win" value="0" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Loss</label>
                    <input type="number" name="loss" value="0" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all">
                </div>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Points</label>
                <input type="number" name="points" value="0" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all">
            </div>
            <div class="flex gap-3 pt-4">
                <button type="button" class="flex-1 py-3 rounded-xl border border-border-dark text-slate-400 font-bold hover:bg-white/5 transition-all" onclick="document.getElementById('addModal').classList.add('hidden')">Cancel</button>
                <button type="submit" class="flex-1 py-3 rounded-xl bg-primary text-white font-bold hover:bg-primary/90 shadow-lg shadow-primary/20 transition-all">Save</button>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
