<section id="skills" class="relative border-t border-slate-800/60 bg-slate-950/80">
    <div class="mx-auto max-w-6xl px-6 py-20">
        <div class="flex flex-col items-center gap-3 text-center">
            <span class="text-sm font-semibold uppercase tracking-[0.35em] text-emerald-300/80">What I use</span>
            <h2 class="text-3xl font-semibold text-white sm:text-4xl">Skills & Tools</h2>
            <p class="max-w-2xl text-sm text-slate-400 sm:text-base">
                A snapshot of the technologies and disciplines I rely on to deliver polished, impactful experiences.
            </p>
        </div>

        @if($skills->isEmpty())
            <div class="mt-12 rounded-3xl border border-dashed border-slate-700/80 bg-slate-900/40 p-12 text-center text-slate-400">
                Add your skills from the dashboard to showcase what you do best.
            </div>
        @else
            @php
                $minItems = 12;
                $trackSkills = $skills;
                if ($trackSkills->count() > 0) {
                    while ($trackSkills->count() < $minItems) {
                        $trackSkills = $trackSkills->concat($skills);
                    }
                    $trackSkills = $trackSkills->values();
                }
            @endphp
            <div class="relative mt-12">
                <div class="pointer-events-none absolute inset-y-0 left-0 z-10 w-24 bg-linear-to-r from-slate-950 via-slate-950/80 to-transparent"></div>
                <div class="pointer-events-none absolute inset-y-0 right-0 z-10 w-24 bg-linear-to-l from-slate-950 via-slate-950/80 to-transparent"></div>
                <div class="overflow-hidden">
                    <div class="skill-marquee" style="--skills-count: {{ max(1, $trackSkills->count()) }};">
                        <div class="skill-marquee-track">
                            @foreach($trackSkills as $skill)
                                @include('home.sections.skill-logo', ['skill' => $skill])
                            @endforeach
                        </div>
                        <div class="skill-marquee-track" aria-hidden="true">
                            @foreach($trackSkills as $skill)
                                @include('home.sections.skill-logo', ['skill' => $skill])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
