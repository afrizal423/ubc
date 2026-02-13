<div class="space-y-6">
    <div class="flex flex-wrap gap-4 items-center justify-between bg-white dark:bg-[#1a1310] p-4 rounded-2xl border border-slate-200 dark:border-primary/10">
        <div class="flex-1 min-w-[300px]">
            <h2 class="text-xl font-bold text-slate-900 dark:text-white">Gallery Management</h2>
            <p class="text-sm text-slate-500">Manage community photos and moments</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-xl font-bold flex items-center gap-2 transition-all shadow-lg shadow-primary/20" onclick="document.getElementById('addModal').classList.remove('hidden')">
                <span class="material-symbols-outlined text-lg">add_photo_alternate</span>
                Upload New Image
            </button>
        </div>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php foreach ($gallery as $g): ?>
        <div class="group relative bg-white dark:bg-card-dark rounded-2xl border border-slate-200 dark:border-border-dark overflow-hidden shadow-sm hover:border-primary transition-all">
            <div class="aspect-video overflow-hidden">
                <img src="<?php echo base_url('assets/uploads/'.$g->image); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
            </div>
            <div class="p-4">
                <h4 class="font-bold text-slate-900 dark:text-white truncate"><?php echo $g->title; ?></h4>
                <p class="text-[10px] text-slate-500 uppercase font-bold mt-1"><?php echo date('d M Y', strtotime($g->created_at)); ?></p>
            </div>
            <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity">
                <a href="<?php echo base_url('admin/delete_gallery/'.$g->id); ?>" class="bg-rose-500 text-white p-2 rounded-lg shadow-lg hover:bg-rose-600" onclick="return confirm('Are you sure?')">
                    <span class="material-symbols-outlined text-sm">delete</span>
                </a>
            </div>
        </div>
        <?php endforeach; ?>

        <?php if (empty($gallery)): ?>
        <div class="col-span-full py-20 text-center bg-white dark:bg-card-dark rounded-2xl border border-dashed border-slate-300 dark:border-border-dark">
            <span class="material-symbols-outlined text-6xl text-slate-300 dark:text-slate-700 mb-4">image_not_supported</span>
            <p class="text-slate-500">No images in gallery yet.</p>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Modal Simple Implementation -->
<div id="addModal" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-card-dark border border-border-dark w-full max-w-md rounded-2xl p-8 shadow-2xl">
        <h3 class="text-xl font-bold text-white mb-6">Upload Image</h3>
        <?php echo form_open_multipart('admin/save_gallery', ['class' => 'space-y-4']); ?>
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Title</label>
                <input type="text" name="title" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all" placeholder="Moment title..." required>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Description</label>
                <textarea name="description" class="w-full bg-background-dark border border-border-dark rounded-xl px-4 py-3 text-white outline-none focus:border-primary transition-all h-24 resize-none" placeholder="Short description..."></textarea>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Image File</label>
                <input type="file" name="image" class="w-full text-slate-400 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-primary file:text-white hover:file:bg-primary/90" required>
            </div>
            <div class="flex gap-3 pt-4">
                <button type="button" class="flex-1 py-3 rounded-xl border border-border-dark text-slate-400 font-bold hover:bg-white/5 transition-all" onclick="document.getElementById('addModal').classList.add('hidden')">Cancel</button>
                <button type="submit" class="flex-1 py-3 rounded-xl bg-primary text-white font-bold hover:bg-primary/90 shadow-lg shadow-primary/20 transition-all">Upload</button>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
