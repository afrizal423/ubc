<!-- Filters & Controls -->
<div class="space-y-6">
    <div class="flex flex-wrap gap-4 items-center justify-between bg-white dark:bg-[#1a1310] p-4 rounded-2xl border border-slate-200 dark:border-primary/10">
        <div class="flex-1 min-w-[300px]">
            <div class="relative">
                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                <input class="w-full pl-12 pr-4 py-3 bg-slate-50 dark:bg-[#241a15] border-none rounded-xl focus:ring-2 focus:ring-primary/50 dark:text-white placeholder:text-slate-400 transition-all" placeholder="Search members..." type="text"/>
            </div>
        </div>
        <div class="flex gap-3">
            <button class="bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-xl font-bold flex items-center gap-2 transition-all shadow-lg shadow-primary/20" onclick="document.getElementById('addModal').classList.remove('hidden')">
                <span class="material-symbols-outlined text-lg">person_add</span>
                Add Member
            </button>
        </div>
    </div>

    <!-- Table Container -->
    <div class="bg-white dark:bg-[#1a1310] rounded-2xl border border-slate-200 dark:border-primary/10 overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-[#241a15] border-bottom border-slate-200 dark:border-primary/10">
                        <th class="px-6 py-4 text-sm font-bold text-slate-500 dark:text-primary uppercase tracking-wider">Name</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-500 dark:text-primary uppercase tracking-wider">Phone</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-500 dark:text-primary uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-500 dark:text-primary uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-primary/5">
                    <?php foreach ($members as $m): ?>
                    <tr class="hover:bg-primary/5 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="size-10 rounded-full bg-primary/20 border border-primary/20 flex items-center justify-center overflow-hidden">
                                    <img class="w-full h-full object-cover" src="https://ui-avatars.com/api/?name=<?php echo urlencode($m->full_name); ?>&background=ec5b13&color=fff"/>
                                </div>
                                <div>
                                    <div class="font-bold text-slate-900 dark:text-white"><?php echo $m->full_name; ?></div>
                                    <div class="text-xs text-slate-400"><?php echo $m->email; ?></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-500 dark:text-slate-400">
                            <?php echo $m->phone; ?>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <span class="size-2 rounded-full <?php echo ($m->status == 'active') ? 'bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.6)]' : 'bg-slate-500'; ?>"></span>
                                <span class="text-sm font-medium <?php echo ($m->status == 'active') ? 'text-emerald-500' : 'text-slate-500'; ?>">
                                    <?php echo ucfirst($m->status); ?>
                                </span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-primary/10 text-slate-400 hover:text-primary transition-all">
                                    <span class="material-symbols-outlined">edit</span>
                                </button>
                                <a href="<?php echo base_url('admin/delete_member/'.$m->id); ?>" class="p-2 rounded-lg hover:bg-red-50 dark:hover:bg-red-500/10 text-slate-400 hover:text-red-500 transition-all" onclick="return confirm('Are you sure?')">
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
        <h3 class="text-xl font-bold text-white mb-6">Add Member</h3>
        <?php echo form_open('admin/save_member', ['class' => 'space-y-4']); ?>
            <input type="hidden" name="id" id="edit_id">
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Full Name</label>
                <input type="text" name="full_name" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all" placeholder="John Doe" required>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Email</label>
                <input type="email" name="email" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all" placeholder="john@example.com">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Phone</label>
                <input type="text" name="phone" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all" placeholder="0812...">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Address</label>
                <textarea name="address" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all h-20 resize-none"></textarea>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Status</label>
                <select name="status" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="flex gap-3 pt-4">
                <button type="button" class="flex-1 py-3 rounded-xl border border-border-dark text-slate-400 font-bold hover:bg-white/5 transition-all" onclick="document.getElementById('addModal').classList.add('hidden')">Cancel</button>
                <button type="submit" class="flex-1 py-3 rounded-xl bg-primary text-white font-bold hover:bg-primary/90 shadow-lg shadow-primary/20 transition-all">Save Member</button>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
