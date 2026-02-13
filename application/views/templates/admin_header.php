<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?php echo $title; ?> - UBS Gold Admin</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#ec5b13",
                        "background-light": "#f8f6f6",
                        "background-dark": "#120d0b",
                        "card-dark": "#1e1612",
                        "border-dark": "#2d201a",
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
            font-family: 'Public Sans', sans-serif;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .active-nav {
            background-color: #ec5b13;
            color: white !important;
        }
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #120d0b;
        }
        ::-webkit-scrollbar-thumb {
            background: #2d201a;
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 antialiased">
<div class="flex min-h-screen overflow-hidden">
    <!-- Sidebar Navigation -->
    <aside class="w-64 flex-shrink-0 bg-background-light dark:bg-card-dark border-r border-slate-200 dark:border-border-dark hidden md:flex flex-col h-screen sticky top-0">
        <div class="p-6 flex items-center gap-3">
            <div class="bg-primary p-2 rounded-lg text-white">
                <span class="material-symbols-outlined">shield_person</span>
            </div>
            <div>
                <h1 class="text-lg font-bold leading-tight dark:text-white">UBS GOLD Admin</h1>
                <p class="text-xs text-slate-500 dark:text-slate-400">Management Panel</p>
            </div>
        </div>
        <nav class="flex-1 px-4 space-y-1">
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl <?php echo ($this->uri->segment(2) == 'dashboard') ? 'active-nav' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-primary/10 transition-colors'; ?>" href="<?php echo base_url('admin/dashboard'); ?>">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="text-sm font-medium">Dashboard</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl <?php echo ($this->uri->segment(2) == 'members') ? 'active-nav' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-primary/10 transition-colors'; ?>" href="<?php echo base_url('admin/members'); ?>">
                <span class="material-symbols-outlined">group</span>
                <span class="text-sm font-medium">Members</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl <?php echo ($this->uri->segment(2) == 'financial') ? 'active-nav' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-primary/10 transition-colors'; ?>" href="<?php echo base_url('admin/financial'); ?>">
                <span class="material-symbols-outlined">account_balance_wallet</span>
                <span class="text-sm font-medium">Finance</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl <?php echo ($this->uri->segment(2) == 'events') ? 'active-nav' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-primary/10 transition-colors'; ?>" href="<?php echo base_url('admin/events'); ?>">
                <span class="material-symbols-outlined">calendar_today</span>
                <span class="text-sm font-medium">Events</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl <?php echo ($this->uri->segment(2) == 'schedules') ? 'active-nav' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-primary/10 transition-colors'; ?>" href="<?php echo base_url('admin/schedules'); ?>">
                <span class="material-symbols-outlined">schedule</span>
                <span class="text-sm font-medium">Schedules</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl <?php echo ($this->uri->segment(2) == 'attendance') ? 'active-nav' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-primary/10 transition-colors'; ?>" href="<?php echo base_url('admin/attendance'); ?>">
                <span class="material-symbols-outlined">check_circle</span>
                <span class="text-sm font-medium">Attendance</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl <?php echo ($this->uri->segment(2) == 'leaderboard') ? 'active-nav' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-primary/10 transition-colors'; ?>" href="<?php echo base_url('admin/leaderboard'); ?>">
                <span class="material-symbols-outlined">trophy</span>
                <span class="text-sm font-medium">Leaderboard</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl <?php echo ($this->uri->segment(2) == 'gallery') ? 'active-nav' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-primary/10 transition-colors'; ?>" href="<?php echo base_url('admin/gallery'); ?>">
                <span class="material-symbols-outlined">images</span>
                <span class="text-sm font-medium">Gallery</span>
            </a>
        </nav>
        <div class="p-4 mt-auto border-t border-slate-200 dark:border-border-dark">
            <a href="<?php echo base_url('auth/logout'); ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 transition-colors">
                <span class="material-symbols-outlined">logout</span>
                <span class="text-sm font-medium">Log Out</span>
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-screen overflow-y-auto overflow-x-hidden relative">
        <!-- Top Header -->
        <header class="sticky top-0 z-10 flex items-center justify-between px-8 py-4 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-md border-b border-slate-200 dark:border-border-dark">
            <div class="flex items-center gap-4">
                <button class="md:hidden p-2 text-slate-600 dark:text-slate-400">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <div>
                    <h2 class="text-xl font-bold dark:text-white"><?php echo $title; ?></h2>
                    <p class="text-sm text-slate-500">Welcome back, <?php echo $this->session->userdata('username'); ?></p>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="hidden lg:flex items-center bg-slate-100 dark:bg-card-dark border border-slate-200 dark:border-border-dark rounded-xl px-4 py-2 w-80">
                    <span class="material-symbols-outlined text-slate-400 text-lg">search</span>
                    <input class="bg-transparent border-none focus:ring-0 text-sm w-full dark:text-white placeholder:text-slate-500" placeholder="Search..." type="text"/>
                </div>
                <div class="flex items-center gap-3">
                    <button class="p-2.5 rounded-xl bg-slate-100 dark:bg-card-dark text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-border-dark hover:text-primary transition-colors relative">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                </div>
                <div class="h-8 w-px bg-slate-200 dark:bg-border-dark"></div>
                <div class="flex items-center gap-3 pl-2">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold dark:text-white leading-none mb-1"><?php echo $this->session->userdata('username'); ?></p>
                        <p class="text-[10px] text-primary uppercase font-bold tracking-tighter"><?php echo ucfirst($this->session->userdata('role')); ?></p>
                    </div>
                    <div class="h-10 w-10 rounded-full bg-slate-200 dark:bg-card-dark border-2 border-primary/20 bg-cover bg-center overflow-hidden" style="background-image: url('https://ui-avatars.com/api/?name=<?php echo $this->session->userdata('username'); ?>&background=ec5b13&color=fff')"></div>
                </div>
            </div>
        </header>
        
        <div class="p-8 space-y-8 max-w-[1600px] mx-auto w-full">
