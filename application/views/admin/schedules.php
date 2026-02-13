<div class="space-y-6">
    <div class="flex flex-wrap gap-4 items-center justify-between bg-white dark:bg-[#1a1310] p-4 rounded-2xl border border-slate-200 dark:border-primary/10">
        <div class="flex-1 min-w-[300px]">
            <div class="relative">
                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                <input class="w-full pl-12 pr-4 py-3 bg-slate-50 dark:bg-[#241a15] border-none rounded-xl focus:ring-2 focus:ring-primary/50 dark:text-white placeholder:text-slate-400 transition-all" placeholder="Search schedules..." type="text"/>
            </div>
        </div>
        <div class="flex gap-3">
            <button class="bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-xl font-bold flex items-center gap-2 transition-all shadow-lg shadow-primary/20" onclick="document.getElementById('addModal').classList.remove('hidden')">
                <span class="material-symbols-outlined text-lg">more_time</span>
                Add Schedule
            </button>
        </div>
    </div>

    <!-- Table Container -->
    <div class="bg-white dark:bg-[#1a1310] rounded-2xl border border-slate-200 dark:border-primary/10 overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-[#241a15] border-bottom border-slate-200 dark:border-primary/10">
                        <th class="px-6 py-4 text-sm font-bold text-slate-500 dark:text-primary uppercase tracking-wider">Day</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-500 dark:text-primary uppercase tracking-wider">Time</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-500 dark:text-primary uppercase tracking-wider">Location</th>
                        <th class="px-6 py-4 text-sm font-bold text-slate-500 dark:text-primary uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-primary/5">
                    <?php foreach ($schedules as $s): ?>
                    <tr class="hover:bg-primary/5 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-bold text-slate-900 dark:text-white"><?php echo $s->day_of_week; ?></div>
                            <div class="text-[10px] text-primary font-bold uppercase"><?php echo $s->title; ?></div>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-700 dark:text-slate-300">
                            <?php echo date('H:i', strtotime($s->start_time)); ?> - <?php echo date('H:i', strtotime($s->end_time)); ?>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-500 dark:text-slate-400">
                            <?php echo $s->location; ?>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="<?php echo base_url('admin/delete_schedule/'.$s->id); ?>" class="p-2 rounded-lg hover:bg-red-50 dark:hover:bg-red-500/10 text-slate-400 hover:text-red-500 transition-all" onclick="return confirm('Are you sure?')">
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
        <h3 class="text-xl font-bold text-white mb-6">Add Schedule</h3>
        <?php echo form_open('admin/save_schedule', ['class' => 'space-y-4']); ?>
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Session Title</label>
                <input type="text" name="title" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all" placeholder="e.g. Morning Session" required>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Day of Week</label>
                <select name="day_of_week" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all">
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Start Time</label>
                    <input type="time" name="start_time" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all" required>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase mb-2">End Time</label>
                    <input type="time" name="end_time" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all" required>
                </div>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Location</label>
                <input type="text" name="location" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all" placeholder="e.g. Court A" required>
            </div>
            <div class="flex gap-3 pt-4">
                <button type="button" class="flex-1 py-3 rounded-xl border border-border-dark text-slate-400 font-bold hover:bg-white/5 transition-all" onclick="document.getElementById('addModal').classList.add('hidden')">Cancel</button>
                <button type="submit" class="flex-1 py-3 rounded-xl bg-primary text-white font-bold hover:bg-primary/90 shadow-lg shadow-primary/20 transition-all">Save</button>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
