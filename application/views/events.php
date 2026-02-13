<!-- Hero Section -->
<section class="relative h-[60vh] w-full overflow-hidden flex items-center">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-r from-background-dark via-background-dark/60 to-transparent z-10"></div>
        <img alt="Badminton player smash" class="w-full h-full object-cover" data-alt="Intense badminton player hitting a smash shot" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD-lX0Urf7G7SefdokG-7nFpSpPIo044Sp5bnhw1nrR7PqAUVtvkY5PvxvhLGiZazoJY1SfJQzRrQSHiuCBSAK4-roHPQKAD5riEbBAGMqDVAdKJglPaUHUHgZsPReDuE3sm0_P2bfg967xZ30XHQzZ1a-Uj9AbMbU6fV3GzURZdi2RESE9GihfeAGJeX9VXjqst7WwxFugLcngw3RwAZ20HhGQG_zhO7gH4VxcL0d4wRE2_53rts2Mz5JMIY0PaYE8yP0VV8rcI6qY"/>
    </div>
    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full text-center md:text-left">
        <div class="max-w-2xl">
            <span class="inline-block py-1 px-3 rounded-full bg-primary/20 text-primary text-xs font-bold tracking-widest uppercase mb-4">UBS Gold Highlights</span>
            <h2 class="text-5xl md:text-7xl font-black text-white leading-tight mb-6">
                COMMUNITY <br/> <span class="text-primary">EVENTS</span>
            </h2>
            <p class="text-lg text-slate-300 mb-8 max-w-lg mx-auto md:mx-0">
                Discover and participate in the most anticipated badminton events of the season. From tournaments to workshops.
            </p>
        </div>
    </div>
</section>

<!-- Agenda Mendatang Section -->
<section class="py-24 bg-slate-50 dark:bg-surface-dark/30" id="agenda">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h3 class="text-primary font-bold tracking-widest uppercase text-sm mb-2">Upcoming Events</h3>
            <h2 class="text-4xl font-black dark:text-white">Agenda Mendatang</h2>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <?php foreach ($events as $e): ?>
            <!-- Event Card -->
            <div class="bg-white dark:bg-surface-dark rounded-2xl overflow-hidden flex flex-col md:flex-row shadow-2xl border border-primary/5 group">
                <div class="relative w-full md:w-48 h-48 md:h-auto">
                    <?php if ($e->image): ?>
                    <img alt="<?php echo $e->title; ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="<?php echo base_url('assets/uploads/'.$e->image); ?>"/>
                    <?php else: ?>
                    <div class="w-full h-full bg-slate-800 flex items-center justify-center">
                        <span class="material-symbols-outlined text-4xl text-slate-600">event</span>
                    </div>
                    <?php endif; ?>
                    <div class="absolute top-4 left-4 date-badge text-white rounded-xl px-3 py-2 text-center shadow-lg" style="background: linear-gradient(135deg, #ec5b13 0%, #ff8c42 100%);">
                        <p class="text-xl font-black leading-none"><?php echo date('d', strtotime($e->event_date)); ?></p>
                        <p class="text-[10px] font-bold uppercase"><?php echo date('M', strtotime($e->event_date)); ?></p>
                    </div>
                </div>
                <div class="p-8 flex-1">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h4 class="text-xl font-bold mb-1 dark:text-white group-hover:text-primary transition-colors"><?php echo $e->title; ?></h4>
                            <p class="text-slate-500 text-sm flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">location_on</span> <?php echo $e->location; ?>
                            </p>
                        </div>
                    </div>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mb-6 line-clamp-3">
                        <?php echo $e->description; ?>
                    </p>
                    <div class="flex items-center justify-between mt-auto">
                        <div class="text-xs text-slate-400">
                             <span class="font-bold text-primary"><?php echo date('H:i', strtotime($e->event_date)); ?></span> WIB
                        </div>
                        <button class="bg-primary text-white px-6 py-2 rounded-lg font-bold text-sm hover:brightness-110 transition-all">Details</button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <?php if (empty($events)): ?>
            <div class="col-span-full text-center py-20 bg-surface-dark/50 rounded-3xl border border-border-dark">
                <span class="material-symbols-outlined text-6xl text-slate-600 mb-4">calendar_today</span>
                <p class="text-slate-400 text-lg">No upcoming events at the moment.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-24 bg-background-light dark:bg-background-dark" id="gallery">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <h3 class="text-primary font-bold tracking-widest uppercase text-sm mb-2">Community Moments</h3>
                <h2 class="text-4xl font-black dark:text-white">Gallery</h2>
            </div>
            <button class="text-primary font-bold flex items-center gap-2 hover:underline">
                View all photos <span class="material-symbols-outlined">north_east</span>
            </button>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 auto-rows-[200px]">
            <div class="col-span-2 row-span-2 relative group overflow-hidden rounded-2xl">
                <img alt="Game action" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA5hdjEEM4coutwWHQmBZ0H38cBAPFqEs1NAKPC7VGIzBDhpO0Omz1MsvbuarD3wYAS71W71aPMXoyaz2U_d8p2nW1gX0K5oehhiP8wWQCklIxKaW2qqpC1sYZrQ3hsRjNoV0LQ0W0nfS3hIx8ILDgX6eVa2qFwSya_QvZmIOrhwyCCD3trYqb--IgNVdhr8mpeUMRhsO5YyNhpN9il1NoVVRXpdVaiYOa4dHqNHl0H3Wm0Mznlz3xHSFeaS1gq4E9EpqvYUhxKoKGD"/>
                <div class="absolute inset-0 bg-primary/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <span class="text-white font-bold text-xl">UBS Gold Open 2023</span>
                </div>
            </div>
            <div class="relative group overflow-hidden rounded-2xl">
                <img alt="Training gear" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuApLxVpzZFg5Fb7K1ePWmvHyX_PxcX3SBsHI93bQfPM6SyhLaIf7fgnAYT64xoemVL9nAY4BQ8rlIEoNSJqocOTwhTGGN6_5oRbnRNnDBPg41q1eRsmBkmtAtOga2cXCTAvJk3sALx8r75tuFHf3yAJq2aMaoSg71TG9rT9G-5q5PjpkIHWzGTXZdRN97kk_OEM8qLg66VDemQFTPoecaESPDfgzCEf839dtis3BMJwywUv0bxxXaKIbjG0pT0D2KnG6nwXG5pqWwv2"/>
            </div>
            <div class="relative group overflow-hidden rounded-2xl">
                <img alt="Trophy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAOckrtCqtBIPjEpuOcL_yRtYExUM8rQIZs3GukhhAnPgJ0CTOLWXeqghLOCFoRY0f-8QAcLocZGW8VXLKO8y5Zy2PsfRUmvKhhLIsHyOL4ByZyhYqHlOdUWXhmpU5glPXQuTnkILizKNI4AJb41tm2Yb6WbM124LECoZUF-fK9DqgV4Jmixx2_WOBmMg1w1KBn8ZXRJaXWbejO2PvnzVfwEdsmoxn63oecNHOsvkfq2KMxLJnt1dgym5KdE3lQPw6M65T6Ap6bUAku"/>
            </div>
            <div class="col-span-2 relative group overflow-hidden rounded-2xl">
                <img alt="Group photo" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCUDGHqcAHu-RxYUzITo1sXX9MoqTtZyUOo9qzdX0zDPSHXVW1spOz5IgZOOIz6jfplSIXrv7dD97OR1RV6UCQuXEtPKltWYtygpgsEJOvA6V71U3ix_Cf5jqQA-QRE9jy3Q_OVIqJ3M3nV6jAqXjahIc8mSMHrlK1iHPF4tIL5PYq_JFX7BmV1qM4kYFhk11NVwAKBpmOwIKlrgHoZLqlWbKiXSG28YXLVgUm35hc52jECppSXVeh0SPsweQN9q-740bdW5H42QZ-N"/>
                <div class="absolute inset-0 bg-primary/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                    <span class="text-white font-bold text-xl">Community Meetup</span>
                </div>
            </div>
        </div>
    </div>
</section>
