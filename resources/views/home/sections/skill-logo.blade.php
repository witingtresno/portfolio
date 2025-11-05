<div class="flex items-center justify-center" title="{{ $skill['name'] }}">
    <div class="flex h-20 w-20 items-center justify-center rounded-3xl border border-slate-800/70 bg-slate-900/60 p-4 shadow-lg shadow-black/20">
        @if(!empty($skill['icon']))
            <img src="{{ $skill['icon'] }}" alt="{{ $skill['name'] }} logo" class="h-full w-full object-contain">
        @else
            <span class="text-lg font-semibold uppercase tracking-widest text-emerald-200">
                {{ $skill['initials'] }}
            </span>
        @endif
    </div>
</div>
