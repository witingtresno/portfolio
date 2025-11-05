<section id="about" class="relative border-t border-slate-800/60 bg-slate-950/70">
    <div class="mx-auto flex max-w-4xl flex-col items-center gap-6 px-6 py-20 text-center">
        <span class="text-sm font-semibold uppercase tracking-[0.35em] text-emerald-300/80">Get to know me</span>
        <h2 class="text-4xl font-bold text-white">About Me</h2>
        <div class="space-y-5 text-sm leading-relaxed text-slate-300 sm:text-base">
            @if(!empty($profile['bio']))
                <p>{{ $profile['bio'] }}</p>
            @else
                <p>Introduce yourself with a short paragraph highlighting your expertise and passion.</p>
            @endif

            @forelse($profile['about_paragraphs'] ?? [] as $paragraph)
                <p>{{ $paragraph }}</p>
            @empty
                <p>Share a more detailed story about your journey, the problems you love to solve, and how you help clients reach their goals.</p>
            @endforelse
        </div>

        @if(!empty($profile['resume_link']))
            <a href="{{ $profile['resume_link'] }}" target="_blank" rel="noopener" class="mt-4 inline-flex items-center rounded-full border border-emerald-300/60 px-8 py-2 text-sm font-semibold text-emerald-200 transition hover:bg-emerald-300 hover:text-slate-950">
                Download Resume
            </a>
        @endif
    </div>
</section>
