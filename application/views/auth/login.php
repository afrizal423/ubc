<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>UBC Athletics Admin Portal</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;900&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#ec5b13",
                        "background-light": "#f8f6f6",
                        "background-dark": "#0f0f0f",
                        "card-dark": "#1a1a1a",
                        "neutral-dark": "#2d2d2d"
                    },
                    fontFamily: {
                        "display": ["Public Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: "Public Sans", sans-serif;
        }
        .bg-mesh {
            background-color: #0f0f0f;
            background-image: 
                radial-gradient(at 0% 0%, rgba(236, 91, 19, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(236, 91, 19, 0.1) 0px, transparent 50%);
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark font-display">
<div class="relative min-h-screen flex flex-col items-center justify-center bg-mesh px-4">
    <!-- Header / Logo Area -->
    <div class="mb-8 flex flex-col items-center">
        <div class="w-16 h-16 bg-primary rounded-xl flex items-center justify-center mb-4 shadow-lg shadow-primary/20">
            <span class="material-symbols-outlined text-white text-4xl">sports_score</span>
        </div>
        <h1 class="text-white text-2xl font-black tracking-tight uppercase">UBS GOLD Athletics</h1>
        <p class="text-white/50 text-sm font-medium tracking-widest uppercase mt-1">Administration Portal</p>
    </div>
    <!-- Login Card -->
    <div class="w-full max-w-md bg-card-dark border border-white/10 rounded-xl shadow-2xl overflow-hidden p-8 md:p-10">
        <div class="mb-8">
            <h2 class="text-white text-xl font-bold">Admin Access</h2>
            <p class="text-white/40 text-sm mt-1">Please enter your credentials to continue</p>
        </div>
        
        <?php if ($this->session->flashdata('error')): ?>
        <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 text-red-500 rounded-lg text-sm font-medium">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
        <?php endif; ?>

        <?php echo form_open('auth/login', ['class' => 'space-y-6']); ?>
            <!-- Username Field -->
            <div class="space-y-2">
                <label class="block text-xs font-bold text-white/60 uppercase tracking-wider px-1">Username</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <span class="material-symbols-outlined text-white/30 group-focus-within:text-primary text-xl">person</span>
                    </div>
                    <input class="w-full bg-neutral-dark border-transparent focus:border-primary focus:ring-0 text-white rounded-lg py-4 pl-12 pr-4 transition-all duration-200 placeholder:text-white/20" placeholder="admin" type="text" name="username" required autofocus/>
                </div>
            </div>
            <!-- Password Field -->
            <div class="space-y-2">
                <div class="flex justify-between items-center px-1">
                    <label class="block text-xs font-bold text-white/60 uppercase tracking-wider">Password</label>
                    <a class="text-xs font-semibold text-primary hover:text-primary/80 transition-colors" href="#">Forgot?</a>
                </div>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <span class="material-symbols-outlined text-white/30 group-focus-within:text-primary text-xl">lock</span>
                    </div>
                    <input class="w-full bg-neutral-dark border-transparent focus:border-primary focus:ring-0 text-white rounded-lg py-4 pl-12 pr-12 transition-all duration-200 placeholder:text-white/20" placeholder="••••••••" type="password" name="password" required/>
                </div>
            </div>
            <!-- Remember Me -->
            <div class="flex items-center gap-3 px-1">
                <input class="w-4 h-4 rounded bg-neutral-dark border-white/10 text-primary focus:ring-primary focus:ring-offset-card-dark" id="remember" type="checkbox"/>
                <label class="text-sm text-white/60 select-none" for="remember">Remember this device</label>
            </div>
            <!-- Submit Button -->
            <button class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-4 rounded-lg shadow-lg shadow-primary/20 transition-all active:scale-[0.98] flex items-center justify-center gap-2 uppercase tracking-widest text-sm" type="submit">
                Access Dashboard
                <span class="material-symbols-outlined text-lg">arrow_forward</span>
            </button>
        <?php echo form_close(); ?>
    </div>
    <!-- Footer Actions -->
    <div class="mt-8 flex flex-col items-center gap-4">
        <div class="flex items-center gap-6 text-sm">
            <a class="text-white/40 hover:text-white transition-colors flex items-center gap-1.5" href="<?php echo base_url(); ?>">
                <span class="material-symbols-outlined text-sm">home</span>
                Back to Home
            </a>
            <div class="w-1 h-1 bg-white/20 rounded-full"></div>
            <a class="text-white/40 hover:text-white transition-colors flex items-center gap-1.5" href="#">
                <span class="material-symbols-outlined text-sm">help_outline</span>
                Support Desk
            </a>
        </div>
        <p class="text-white/20 text-xs font-medium">&copy; <?php echo date('Y'); ?> UBS Gold Athletics &amp; Recreation Admin Portal</p>
    </div>
</div>
</body>
</html>
