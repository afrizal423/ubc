<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?php echo isset($title) ? $title : 'UBS Gold Badminton Community (UBC)'; ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#ec5b13",
                        "accent-blue": "#3b82f6",
                        "accent-green": "#22c55e",
                        "background-light": "#f8f6f6",
                        "background-dark": "#121212",
                        "surface-dark": "#1e1e1e",
                        "border-dark": "#2d2d2d"
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
            scroll-behavior: smooth;
        }
        .hero-gradient {
            background: linear-gradient(135deg, rgba(18, 18, 18, 0.9) 0%, rgba(18, 18, 18, 0.6) 100%);
        }
        .form-input-focus:focus {
            border-color: #ec5b13;
            box-shadow: 0 0 0 2px rgba(236, 91, 19, 0.2);
        }
    </style>
    <link rel="manifest" href="<?php echo base_url('assets/manifest.json'); ?>">
    <meta name="theme-color" content="#ec5b13">
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100">
<!-- Top Navigation Bar -->
<header class="fixed top-0 left-0 right-0 z-50 bg-background-dark/80 backdrop-blur-md border-b border-border-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <div class="flex items-center gap-3">
                <a href="<?php echo base_url(); ?>" class="flex items-center gap-3">
                    <div class="bg-primary p-2 rounded-lg">
                        <span class="material-symbols-outlined text-white text-2xl">sports_tennis</span>
                    </div>
                    <h1 class="text-white text-xl font-extrabold tracking-tight">UBS GOLD <span class="text-primary">Badminton</span></h1>
                </a>
            </div>
            <nav class="hidden md:flex items-center gap-10">
                <a class="text-slate-300 hover:text-primary text-sm font-semibold transition-colors" href="<?php echo base_url(); ?>#hero">Beranda</a>
                <a class="text-slate-300 hover:text-primary text-sm font-semibold transition-colors" href="<?php echo base_url(); ?>#about">Tentang</a>
                <a class="text-slate-300 hover:text-primary text-sm font-semibold transition-colors" href="<?php echo base_url('website/events'); ?>">Agenda</a>
                <a class="text-slate-300 hover:text-primary text-sm font-semibold transition-colors" href="<?php echo base_url('website/transparency'); ?>">Laporan</a>
            </nav>
            <div>
                <a class="bg-primary hover:bg-primary/90 text-white px-6 py-2.5 rounded-lg text-sm font-bold transition-all shadow-lg shadow-primary/20" href="<?php echo base_url(); ?>#register">
                    Gabung Sekarang
                </a>
                <a class="text-slate-300 hover:text-primary text-sm font-semibold ml-4" href="<?php echo base_url('auth/login'); ?>">Login</a>
            </div>
        </div>
    </div>
</header>
<main class="pt-20">
