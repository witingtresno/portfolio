<header class="sticky top-0 z-20 border-b border-slate-800/50 bg-slate-950/70 backdrop-blur">
    <div class="mx-auto grid max-w-6xl grid-cols-3 items-center px-6 py-5 text-sm">
        <a href="#hero" class="font-semibold tracking-[0.25em] text-white uppercase">
            {{ $profile['name'] ?? 'Portfolio' }}
        </a>
        <nav class="hidden items-center justify-center gap-8 md:flex">
            <a href="#hero" class="text-emerald-300 font-medium">Home</a>
            <a href="#about" class="transition hover:text-emerald-300">About</a>
            <a href="#skills" class="transition hover:text-emerald-300">Skills</a>
            <a href="#projects" class="transition hover:text-emerald-300">Projects</a>
            <a href="#contact" class="transition hover:text-emerald-300">Contact</a>
        </nav>
        <div class="flex items-center justify-end gap-3">
            @if(!empty($profile['primary_contact']))
                <a href="{{ $profile['primary_contact'] }}" class="inline-flex items-center rounded-full border border-emerald-400/80 px-4 py-2 text-xs font-semibold text-emerald-200 transition hover:bg-emerald-400 hover:text-slate-950">
                    Contact Me
                </a>
            @endif
            <span class="hidden rounded-full border border-slate-700/70 p-2 text-slate-400 md:inline-flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v2.25M18.364 5.636l-1.59 1.59M21 12h-2.25M18.364 18.364l-1.59-1.59M12 18.75V21M7.227 16.773l-1.59 1.591M5.25 12H3M7.227 7.227l-1.59-1.591M15.75 12A3.75 3.75 0 1 1 12 8.25 3.75 3.75 0 0 1 15.75 12Z" />
                </svg>
            </span>
        </div>
    </div>
</header>
