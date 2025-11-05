<footer class="border-t border-slate-800/60 bg-slate-950/95">
    <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-4 px-6 py-8 text-sm text-slate-500 md:flex-row">
        <span>© {{ now()->year }} {{ $profile['name'] ?? config('app.name') }}. All rights reserved.</span>
        @if(!empty($profile['social_links']))
            <div class="flex gap-4">
                @foreach($profile['social_links'] as $link)
                    <a href="{{ $link['url'] }}" class="transition hover:text-emerald-300" target="_blank" rel="noopener">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</footer>
