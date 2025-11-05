<section id="contact" class="relative border-t border-slate-800/60 bg-slate-950">
    <div class="mx-auto max-w-4xl px-6 py-20">
        <div class="space-y-3 text-center">
            <span class="text-sm font-semibold uppercase tracking-[0.35em] text-emerald-300/80">Get in touch</span>
            <h2 class="text-3xl font-semibold text-white sm:text-4xl">Let’s build something great</h2>
            <p class="text-slate-400">
                Ready to collaborate or have a project in mind? Drop me a message and I’ll get back to you soon.
            </p>
        </div>
        <form class="mx-auto mt-10 grid gap-4 rounded-3xl border border-slate-800 bg-slate-900/40 p-8 shadow-xl shadow-black/20 md:grid-cols-2">
            <div class="md:col-span-1">
                <label class="block text-xs font-semibold uppercase tracking-[0.3em] text-slate-500">Name</label>
                <input type="text" class="mt-2 w-full rounded-xl border border-slate-800 bg-slate-950/70 px-4 py-3 text-sm text-white placeholder:text-slate-500 focus:border-emerald-300 focus:outline-none focus:ring-2 focus:ring-emerald-300/40" placeholder="John Doe">
            </div>
            <div class="md:col-span-1">
                <label class="block text-xs font-semibold uppercase tracking-[0.3em] text-slate-500">Email</label>
                <input type="email" class="mt-2 w-full rounded-xl border border-slate-800 bg-slate-950/70 px-4 py-3 text-sm text-white placeholder:text-slate-500 focus:border-emerald-300 focus:outline-none focus:ring-2 focus:ring-emerald-300/40" placeholder="you@example.com">
            </div>
            <div class="md:col-span-2">
                <label class="block text-xs font-semibold uppercase tracking-[0.3em] text-slate-500">Message</label>
                <textarea rows="4" class="mt-2 w-full rounded-xl border border-slate-800 bg-slate-950/70 px-4 py-3 text-sm text-white placeholder:text-slate-500 focus:border-emerald-300 focus:outline-none focus:ring-2 focus:ring-emerald-300/40" placeholder="Tell me about your project or idea."></textarea>
            </div>
            <div class="md:col-span-2 flex flex-col items-center gap-4 pt-2">
                <button type="button" class="inline-flex items-center rounded-full bg-emerald-400 px-8 py-3 text-sm font-semibold text-slate-950 transition hover:bg-emerald-300">
                    Send Message
                </button>
                @if(!empty($profile['primary_contact']))
                    <a href="{{ $profile['primary_contact'] }}" class="text-sm text-emerald-300 transition hover:text-emerald-200">
                        Prefer email or chat? Reach me directly here.
                    </a>
                @endif
            </div>
        </form>
    </div>
</section>
