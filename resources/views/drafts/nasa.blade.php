<x-layouts.app :title="$p['meta']['title']" :description="$p['meta']['description']" theme="nasa">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:bg-signal focus:px-4 focus:py-2 focus:text-sm focus:font-semibold focus:text-white">
        Skip to main content
    </a>

    {{-- Top Navigation Bar --}}
    <header x-data="{ open: false }" @keydown.escape.window="open = false" class="sticky top-0 z-40 border-b border-white/15 bg-space text-white">
        <div class="mx-auto flex max-w-[1360px] items-center justify-between gap-4 px-6 py-4 lg:px-10">
            <div class="flex items-center gap-3">
                <button
                    type="button"
                    @click="open = !open"
                    :aria-expanded="open.toString()"
                    aria-controls="mobile-nav-drawer"
                    aria-label="Toggle navigation menu"
                    class="inline-flex h-9 w-9 items-center justify-center border border-white/25 text-white transition-colors hover:border-white lg:hidden"
                >
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                        <path d="M4 7h16M4 12h16M4 17h16" />
                    </svg>
                </button>
                <a href="#top" class="flex items-center gap-2 text-white no-underline">
                    <span class="whitespace-nowrap text-sm font-bold tracking-tight sm:text-lg">{{ $p['meta']['name'] }}</span>
                    <span class="h-2 w-2 shrink-0 rounded-full bg-signal" aria-hidden="true"></span>
                </a>
                <span class="hidden border-l border-white/20 pl-3 text-xs font-medium text-muted-dark xl:inline">{{ $p['meta']['role'] }}</span>
            </div>

            <nav aria-label="Primary navigation" class="hidden items-center gap-4 lg:flex xl:gap-6">
                @foreach ($p['nav'] as $item)
                    <a href="{{ $item['href'] }}" class="text-sm font-medium text-white/90 transition-colors hover:text-white">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>

            <div class="flex items-center gap-4">
                <a href="{{ $p['meta']['resume_url'] }}" download class="hidden border border-white/30 px-3 py-1.5 text-xs font-semibold text-white transition-colors hover:border-white hover:bg-white hover:text-space sm:inline-flex">
                    Resume (PDF)
                </a>
                <a href="#contact" class="text-sm font-semibold text-white transition-colors hover:text-muted-dark">
                    Contact
                </a>
            </div>
        </div>

        <nav id="mobile-nav-drawer" x-show="open" x-cloak aria-label="Mobile navigation" class="border-t border-white/15 bg-obsidian px-6 py-5 lg:hidden">
            <div class="flex flex-col gap-3">
                @foreach ($p['nav'] as $item)
                    <a href="{{ $item['href'] }}" @click="open = false" class="text-sm font-semibold text-white hover:text-signal">
                        {{ $item['label'] }}
                    </a>
                @endforeach
                <div class="mt-2 flex flex-wrap gap-4 border-t border-white/15 pt-3">
                    <a href="{{ $p['meta']['resume_url'] }}" download @click="open = false" class="text-xs font-semibold text-white underline">
                        {{ $p['contact']['resume_label'] }}
                    </a>
                    <a href="#contact" @click="open = false" class="text-xs font-semibold text-muted-dark">
                        Contact
                    </a>
                </div>
            </div>
        </nav>
    </header>

    {{-- Availability Ribbon --}}
    <div class="border-b border-white/15 bg-mission text-white">
        <div class="mx-auto flex max-w-[1360px] flex-wrap items-center justify-between gap-3 px-6 py-2.5 lg:px-10">
            <p class="text-xs font-semibold tracking-tight sm:text-sm">{{ $p['hero']['availability'] }}</p>
            <div class="flex items-center gap-5">
                <span class="font-mono tabular-nums text-xs font-medium text-white/95">Available {{ $p['hero']['availability_window'] }}</span>
                <a href="{{ $p['meta']['resume_url'] }}" download class="inline-flex items-center gap-1.5 text-xs font-semibold text-white underline hover:text-white/85">
                    Download CV
                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                        <path d="M5 12h14M13 6l6 6-6 6" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <main id="main-content" class="overflow-x-clip">
        {{-- Band 1: Responsive Grid Editorial Hero --}}
        <section id="top" class="bg-space text-white">
            <div class="mx-auto max-w-[1360px] px-6 py-14 sm:py-16 lg:px-10 lg:py-22">
                <div class="grid items-center gap-8 lg:grid-cols-12 lg:gap-12">
                    <div class="lg:col-span-7">
                        <h1 class="max-w-2xl text-4xl font-bold leading-[1.06] tracking-[-0.025em] text-white sm:text-5xl lg:text-[3.5rem]">
                            {{ $p['hero']['headline_before'] }}
                            <span class="underline decoration-signal decoration-2 underline-offset-8">{{ $p['hero']['headline_emphasis'] }}</span>
                            {{ $p['hero']['headline_after'] }}
                        </h1>

                        <p class="mt-6 text-sm font-semibold text-white/95 sm:text-base">
                            {{ $p['meta']['credentials_line'] }}
                        </p>
                        <p class="mt-2 max-w-[58ch] text-base leading-relaxed text-muted-dark sm:text-lg">
                            {{ $p['hero']['summary'] }}
                        </p>

                        <div class="mt-8 flex flex-wrap items-center gap-4">
                            <a href="{{ $p['hero']['primary_cta']['href'] }}" download class="inline-flex items-center gap-2 bg-signal px-6 py-3.5 text-sm font-semibold text-white transition-colors hover:bg-signal-hover">
                                {{ $p['hero']['primary_cta']['label'] }}
                            </a>
                            <a href="{{ $p['hero']['secondary_cta']['href'] }}" class="inline-flex items-center gap-2 border border-white/35 px-6 py-3.5 text-sm font-semibold text-white transition-colors hover:border-white hover:bg-white hover:text-space">
                                {{ $p['hero']['secondary_cta']['label'] }}
                            </a>
                            <a href="mailto:{{ $p['meta']['email'] }}" class="text-sm font-semibold text-white underline transition-colors hover:text-muted-dark">
                                {{ $p['contact']['email_label'] }}
                            </a>
                        </div>
                    </div>

                    <div class="lg:col-span-5">
                        <x-img-slot :image="$p['hero']['image']" :eager="true" variant="dark" />
                    </div>
                </div>
            </div>
        </section>

        {{-- Band 2: Unified Commercial Experience --}}
        <section id="experience" class="bg-paper text-ink">
            <div class="mx-auto max-w-[1360px] px-6 py-16 lg:px-10 lg:py-20">
                <div class="flex flex-wrap items-end justify-between gap-4 border-b border-black/15 pb-6">
                    <h2 class="text-4xl font-bold tracking-[-0.025em] text-ink sm:text-5xl">
                        Commercial Experience
                    </h2>
                    <a href="#cases" class="inline-flex items-center gap-2.5 text-sm font-bold text-ink no-underline transition-colors hover:text-signal">
                        <span>Selected Case Studies</span>
                        <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-signal text-white">
                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                                <path d="M5 12h14M13 6l6 6-6 6" />
                            </svg>
                        </span>
                    </a>
                </div>

                <div class="mt-8 grid gap-6 md:grid-cols-2">
                    @foreach ($p['experience']['items'] as $exp)
                        @php($isFeaturedSpan = $loop->first && $loop->count % 2 === 1)
                        <article class="{{ $isFeaturedSpan ? 'md:col-span-2 grid md:grid-cols-2 items-stretch' : 'flex flex-col' }} border border-black/15 bg-mist/60">
                            <div class="{{ $isFeaturedSpan ? 'bg-[#111216] flex items-center' : '' }}">
                                <x-img-slot :image="$exp['image']" variant="dark" />
                            </div>

                            <div class="{{ $isFeaturedSpan ? 'flex flex-col justify-center p-6 lg:p-10' : 'flex flex-1 flex-col p-6' }}">
                                <div class="flex flex-wrap items-center justify-between gap-2">
                                    <span class="font-mono text-xs font-medium text-muted">{{ $exp['type'] }}</span>
                                    <span class="font-mono tabular-nums whitespace-nowrap text-xs font-medium text-muted">{{ $exp['period'] }}</span>
                                </div>

                                <h3 class="mt-2 text-2xl font-bold leading-snug tracking-tight text-ink">{{ $exp['company'] }}</h3>
                                <p class="text-sm font-semibold text-signal">{{ $exp['role'] }}</p>
                                <p class="mt-0.5 text-xs text-muted">{{ $exp['initiative'] }}</p>

                                <dl class="mt-5 grid grid-cols-3 gap-4 border-y border-black/15 py-4">
                                    @foreach ($exp['metrics'] as $metric)
                                        <div>
                                            <dt class="text-xs text-muted">{{ $metric['label'] }}</dt>
                                            <dd class="mt-0.5 tabular-nums text-lg font-bold text-ink">{{ $metric['value'] }}</dd>
                                        </div>
                                    @endforeach
                                </dl>

                                <p class="mt-4 text-sm leading-relaxed text-muted">{{ $exp['impact'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>

                <p class="mt-5 text-xs text-muted">{{ $p['experience']['metrics_note'] }}</p>
            </div>
        </section>

        {{-- Band 3: Core Commercial Capabilities --}}
        <section id="capabilities" class="bg-space text-white">
            <div class="mx-auto max-w-[1360px] px-6 py-16 lg:px-10 lg:py-20">
                <div class="grid items-start gap-12 lg:grid-cols-12">
                    <div class="lg:col-span-5">
                        <h2 class="text-4xl font-bold leading-tight tracking-[-0.025em] text-white sm:text-5xl">
                            Core Commercial Capabilities
                        </h2>
                        <p class="mt-4 text-base leading-relaxed text-muted-dark">
                            {{ $p['capabilities']['intro'] }}
                        </p>
                        <a href="#cases" class="mt-6 inline-flex items-center gap-2.5 text-sm font-bold text-white no-underline transition-colors hover:text-muted-dark">
                            <span>Review Commercial Cases</span>
                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-signal text-white">
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                                    <path d="M5 12h14M13 6l6 6-6 6" />
                                </svg>
                            </span>
                        </a>

                        <div class="mt-8">
                            <x-img-slot :image="$p['capabilities']['image']" variant="dark" />
                        </div>
                    </div>

                    <div class="divide-y divide-white/20 border-y border-white/20 lg:col-span-7">
                        @foreach ($p['capabilities']['pillars'] as $pillar)
                            <div class="py-5">
                                <h3 class="text-base font-bold text-white sm:text-lg">{{ $pillar['name'] }}</h3>
                                <p class="mt-1.5 text-sm leading-relaxed text-muted-dark">
                                    {{ implode(' · ', $pillar['items']) }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- Band 4: Interactive Selected Case Studies (Full 6) --}}
        <section id="cases" class="bg-obsidian text-white">
            <div class="mx-auto max-w-[1360px] px-6 py-16 lg:px-10 lg:py-20">
                <div class="flex flex-wrap items-end justify-between gap-4 border-b border-white/15 pb-6">
                    <h2 class="text-4xl font-bold tracking-[-0.025em] text-white sm:text-5xl">
                        Selected Case Studies
                    </h2>
                    <span class="font-mono text-xs font-medium tracking-wider text-muted-dark uppercase">6 Commercial Engagements</span>
                </div>

                <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($p['cases']['items'] as $case)
                        <article x-data="{ open: false }" class="flex flex-col border border-white/15 bg-space">
                            <x-img-slot :image="$case['image']" variant="dark" :collapse-when-empty="true" />

                            <div class="flex flex-1 flex-col p-6">
                                <span class="font-mono tabular-nums text-xs font-medium text-muted-dark">{{ $case['index'] }} · {{ $case['category'] }}</span>

                                <h3 class="mt-3 text-lg font-bold leading-snug text-white sm:text-xl">{{ $case['title'] }}</h3>
                                <p class="mt-3 flex-1 text-sm leading-relaxed text-muted-dark">{{ $case['summary'] }}</p>

                                <dl x-show="open" x-cloak class="mt-4 space-y-2 border-t border-white/15 pt-4 text-xs leading-relaxed text-muted-dark">
                                    <div>
                                        <dt class="inline font-semibold text-white">Problem:</dt>
                                        <dd class="inline">{{ $case['problem'] }}</dd>
                                    </div>
                                    <div>
                                        <dt class="inline font-semibold text-white">Lever:</dt>
                                        <dd class="inline">{{ $case['lever'] }}</dd>
                                    </div>
                                    <div>
                                        <dt class="inline font-semibold text-white">Outcome:</dt>
                                        <dd class="inline">{{ $case['outcome'] }}</dd>
                                    </div>
                                </dl>

                                <button
                                    type="button"
                                    @click="open = !open"
                                    :aria-expanded="open.toString()"
                                    class="mt-5 flex w-full items-center justify-between gap-3 border-t border-white/15 pt-4 text-left text-xs font-semibold text-white transition-colors hover:text-muted-dark"
                                >
                                    <span class="text-muted-dark">{{ $case['role'] }}</span>
                                    <span class="inline-flex shrink-0 items-center gap-2">
                                        <span x-text="open ? 'Hide Brief' : 'Case Brief'">Case Brief</span>
                                        <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-signal text-white transition-transform" :class="{ 'rotate-90': open }" aria-hidden="true">
                                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75">
                                                <path d="M5 12h14M13 6l6 6-6 6" />
                                            </svg>
                                        </span>
                                    </span>
                                </button>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Band 5: Awards & Case Competitions (Livewire Option C Full-Bleed Overlay) --}}
        <livewire:awards-showcase />

        {{-- Band 6: Executive Callout Banner --}}
        <section class="bg-space text-white">
            <div class="mx-auto max-w-[1360px] px-6 py-16 lg:px-10 lg:py-20">
                <div>
                    <h2 class="text-3xl font-bold leading-tight tracking-[-0.025em] text-white sm:text-4xl xl:text-5xl xl:whitespace-nowrap">
                        Let's Build Commercial Value That Lasts.
                    </h2>
                    <p class="mt-3 text-base leading-relaxed text-muted-dark">
                        {{ $p['contact']['summary'] }}
                    </p>
                    <div class="mt-7 flex flex-wrap gap-6">
                        <a href="mailto:{{ $p['meta']['email'] }}" class="inline-flex items-center gap-2.5 text-sm font-bold text-white no-underline hover:text-muted-dark">
                            <span>{{ $p['contact']['email_label'] }}</span>
                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-signal text-white">
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                                    <path d="M5 12h14M13 6l6 6-6 6" />
                                </svg>
                            </span>
                        </a>
                        <a href="{{ $p['meta']['linkedin'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2.5 text-sm font-bold text-white no-underline hover:text-muted-dark">
                            <span>{{ $p['contact']['linkedin_label'] }}</span>
                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-signal text-white">
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                                    <path d="M7 17L17 7M9 7h8v8" />
                                </svg>
                            </span>
                        </a>
                        <a href="{{ $p['meta']['resume_url'] }}" download class="inline-flex items-center gap-2.5 text-sm font-bold text-white no-underline hover:text-muted-dark">
                            <span>{{ $p['contact']['resume_label'] }}</span>
                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-signal text-white">
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                                    <path d="M12 4v11m0 0l-4-4m4 4l4-4M4 19h16" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Band 7: Progressive Leadership & Operational Impact (Top 4 + Show All 10) --}}
        <section id="leadership" x-data="{ showAll: false }" class="bg-paper text-ink">
            <div class="mx-auto max-w-[1360px] px-6 py-16 lg:px-10 lg:py-20">
                <div class="grid gap-8 border-b border-black/15 pb-8 lg:grid-cols-12 lg:items-end">
                    <div class="lg:col-span-6">
                        <h2 class="text-4xl font-bold tracking-[-0.025em] text-ink sm:text-5xl">
                            Leadership &amp; Operational Impact
                        </h2>
                    </div>
                    <dl class="grid grid-cols-3 gap-6 lg:col-span-6">
                        @foreach ($p['leadership']['stats'] as $stat)
                            <div class="border-t-2 border-ink pt-3">
                                <dt class="text-xs font-medium text-muted">{{ $stat['label'] }}</dt>
                                <dd class="mt-1 text-3xl font-bold text-ink tabular-nums sm:text-4xl">{{ $stat['value'] }}</dd>
                            </div>
                        @endforeach
                    </dl>
                </div>

                <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($p['leadership']['items'] as $idx => $item)
                        <article @if($idx >= 4) x-show="showAll" x-cloak @endif class="flex flex-col border-t-2 border-ink pt-4">
                            <x-img-slot :image="$item['image']" variant="light" class="mb-3" />
                            <p class="font-mono text-xs font-medium text-muted">{{ $item['scope'] }}</p>
                            <h3 class="mt-1 text-base font-bold leading-snug text-ink">{{ $item['title'] }}</h3>
                            <p class="mt-0.5 text-xs font-semibold text-signal">{{ $item['role'] }}</p>
                        </article>
                    @endforeach
                </div>

                <div class="mt-8">
                    <button
                        type="button"
                        @click="showAll = !showAll"
                        :aria-expanded="showAll.toString()"
                        class="border border-ink px-5 py-2.5 text-xs font-semibold text-ink transition-colors hover:bg-ink hover:text-white"
                    >
                        <span x-text="showAll ? 'Show top 4 only' : 'Show all 10 initiatives (+6)'">Show all 10 initiatives (+6)</span>
                    </button>
                </div>
            </div>
        </section>
    </main>

    {{-- Band 8: Clean Production Footer --}}
    <footer id="contact" class="border-t border-white/15 bg-space text-white">
        <div class="mx-auto max-w-[1360px] px-6 py-14 lg:px-10 lg:py-16">
            <div class="grid gap-12 lg:grid-cols-12">
                <div class="lg:col-span-5">
                    <p class="flex items-center gap-2 text-lg font-bold tracking-tight text-white">
                        <span>{{ $p['meta']['name'] }}</span>
                        <span class="h-2 w-2 rounded-full bg-signal" aria-hidden="true"></span>
                    </p>
                    <p class="mt-3 text-sm leading-relaxed text-muted-dark">
                        {{ $p['meta']['role'] }} · Bridging systems execution with commercial growth.
                    </p>
                    <a href="mailto:{{ $p['meta']['email'] }}" class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-white no-underline hover:text-muted-dark">
                        <span>{{ $p['meta']['email'] }}</span>
                        <span class="inline-flex h-5 w-5 items-center justify-center rounded-full bg-signal text-white">
                            <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path d="M5 12h14M13 6l6 6-6 6" />
                            </svg>
                        </span>
                    </a>
                </div>

                <div class="grid grid-cols-1 gap-8 sm:grid-cols-3 lg:col-span-7">
                    <div>
                        <p class="text-xs font-semibold tracking-wider text-muted-dark uppercase">Sections</p>
                        <ul class="mt-3 space-y-2 text-sm">
                            @foreach ($p['nav'] as $item)
                                <li><a href="{{ $item['href'] }}" class="text-white/90 hover:text-white">{{ $item['label'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <p class="text-xs font-semibold tracking-wider text-muted-dark uppercase">Background</p>
                        <dl class="mt-3 space-y-3 text-sm">
                            <div>
                                <dt class="text-xs text-muted-dark">Education</dt>
                                <dd class="mt-0.5 font-medium text-white">{{ $p['meta']['education'] }}</dd>
                                <dd class="text-xs text-muted-dark">{{ $p['meta']['institution'] }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs text-muted-dark">Location</dt>
                                <dd class="mt-0.5 font-medium text-white">{{ $p['meta']['location'] }}</dd>
                            </div>
                        </dl>
                    </div>

                    <div>
                        <p class="text-xs font-semibold tracking-wider text-muted-dark uppercase">Direct Links</p>
                        <ul class="mt-3 space-y-2 text-sm">
                            <li><a href="mailto:{{ $p['meta']['email'] }}" class="text-white/90 hover:text-white">{{ $p['contact']['email_label'] }}</a></li>
                            <li><a href="{{ $p['meta']['linkedin'] }}" target="_blank" rel="noopener noreferrer" class="text-white/90 hover:text-white">{{ $p['contact']['linkedin_label'] }}</a></li>
                            <li><a href="{{ $p['meta']['resume_url'] }}" download class="text-white/90 hover:text-white">{{ $p['contact']['resume_label'] }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-12 flex flex-wrap items-center justify-between gap-4 border-t border-white/15 pt-6 text-xs text-muted-dark">
                <p>{{ $p['meta']['copyright'] }}</p>
                <div class="flex items-center gap-4">
                    <span>{{ $p['meta']['location'] }}</span>
                    @if (app()->environment(['local', 'testing']) || config('portfolio.enable_apple_draft'))
                        <a href="{{ route('draft.apple') }}" class="text-white/80 underline hover:text-white">Archived Apple Draft</a>
                    @endif
                </div>
            </div>
        </div>
    </footer>
</x-layouts.app>
