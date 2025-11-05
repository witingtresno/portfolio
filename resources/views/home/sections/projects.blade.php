<section id="projects" class="relative border-t border-slate-800/60 bg-slate-950/80">
    <div class="mx-auto max-w-6xl px-6 py-20">
        <div class="flex flex-col items-start gap-4 text-left">
            <span class="text-sm font-semibold uppercase tracking-[0.35em] text-emerald-300/80">Projects</span>
            <h2 class="text-3xl font-semibold text-white sm:text-4xl">Selected Work</h2>
            <p class="max-w-2xl text-slate-400">Explore some of the recent projects I’ve collaborated on — each one crafted with attention to detail and real-world impact.</p>
        </div>

        <div class="mt-12 grid gap-8 md:grid-cols-2">
            @forelse($projects as $project)
                <article class="group flex flex-col overflow-hidden rounded-3xl border border-slate-800/80 bg-slate-900/50 shadow-xl shadow-black/20 transition hover:-translate-y-1 hover:border-emerald-400/70">
                    @if($project['primary_image'])
                        <img src="{{ $project['primary_image'] }}" alt="{{ $project['title'] }}" class="h-56 w-full object-cover transition group-hover:scale-[1.02]">
                    @else
                        <div class="h-56 w-full bg-gradient-to-br from-slate-800 to-slate-900"></div>
                    @endif
                    <div class="flex flex-1 flex-col gap-4 p-6">
                        <div class="space-y-1">
                            <h3 class="text-xl font-semibold text-white">{{ $project['title'] }}</h3>
                            @if($project['subtitle'])
                                <p class="text-sm uppercase tracking-[0.3em] text-emerald-300">{{ $project['subtitle'] }}</p>
                            @endif
                        </div>
                        @if($project['description'])
                            <p class="text-sm leading-relaxed text-slate-300">{{ $project['description'] }}</p>
                        @endif
                        <div class="mt-auto flex items-center justify-between">
                            @if($project['link'])
                                <a href="{{ $project['link'] }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-300 transition hover:text-emerald-200">
                                    View Project
                                    <span aria-hidden="true">→</span>
                                </a>
                            @endif
                            <div class="flex gap-2">
                                @foreach($project['images'] as $image)
                                    <span class="h-2 w-2 rounded-full bg-slate-700 transition group-hover:bg-emerald-400"></span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-3xl border border-dashed border-slate-700/80 bg-slate-900/40 p-12 text-center text-slate-400">
                    Projects will appear here once you add them from the dashboard.
                </div>
            @endforelse
        </div>
    </div>
</section>
