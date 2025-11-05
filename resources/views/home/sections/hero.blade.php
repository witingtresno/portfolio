<section id="hero" class="relative">
    <div class="mx-auto flex max-w-3xl flex-col items-center gap-6 px-6 py-20 text-center md:py-28">
        <div class="relative">
            <div class="absolute inset-0 rounded-full bg-gradient-to-b from-emerald-500/30 via-emerald-500/10 to-transparent blur-3xl"></div>
            <div class="relative flex h-44 w-44 items-center justify-center rounded-full bg-gradient-to-b from-slate-900 to-slate-800 shadow-2xl shadow-black/30 ring-2 ring-slate-800/60">
                @if(!empty($profile['avatar']))
                    <img src="{{ $profile['avatar'] }}" alt="{{ $profile['name'] ?? 'Avatar' }}" class="h-40 w-40 rounded-full object-cover">
                @else
                    <div class="h-40 w-40 rounded-full bg-gradient-to-br from-emerald-500/40 to-sky-500/40"></div>
                @endif
            </div>
        </div>
        <div class="space-y-4">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl">
                {{ $profile['name'] ?? 'Your Name' }}
            </h1>
            <p class="text-lg font-semibold uppercase tracking-[0.3em] bg-gradient-to-r from-emerald-300 to-sky-400 bg-clip-text text-transparent">
                {{ $profile['job'] ?? 'Your Role' }}
            </p>
            <p class="mx-auto max-w-2xl text-base leading-relaxed text-slate-300">
                {{ $profile['bio'] ?? 'Introduce yourself briefly and highlight what you do.' }}
            </p>
        </div>
        @if(!empty($profile['primary_contact']))
            <a href="{{ $profile['primary_contact'] }}" class="inline-flex items-center gap-2 rounded-full border border-emerald-400/60 px-8 py-2 text-sm font-semibold text-emerald-200 transition hover:bg-emerald-400 hover:text-slate-950">
                Contact Me
            </a>
        @endif
    </div>
</section>
