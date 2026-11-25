<x-layouts.app :title="$p['meta']['title']" :description="$p['meta']['description']" theme="apple">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:rounded-full focus:bg-apple-blue focus:px-4 focus:py-2 focus:text-xs focus:font-semibold focus:text-white">
        Skip to main content
    </a>

    {{-- Apple-style Global Navigation (Alpine.js) --}}
    <header x-data="{ open: false }" @keydown.escape.window="open = false" class="sticky top-0 z-40 border-b border-apple-line/70 bg-white/95 text-apple-ink">
        <div class="mx-auto flex h-11 max-w-[1024px] items-center justify-between px-4 sm:px-6">
            <a href="#top" class="flex items-center gap-1.5 text-xs font-semibold tracking-tight text-apple-ink no-underline">
                <svg class="h-3.5 w-3.5 text-apple-ink" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                    <circle cx="8" cy="8" r="5" />
                </svg>
                <span>{{ $p['meta']['brand'] }}</span>
            </a>

            <nav aria-label="Primary navigation" class="hidden items-center gap-7 md:flex">
                <a href="#experience" class="text-xs font-normal text-apple-ink/85 transition-colors hover:text-apple-ink">Experience</a>
                <a href="#capabilities" class="text-xs font-normal text-apple-ink/85 transition-colors hover:text-apple-ink">Capabilities</a>
                <a href="#cases" class="text-xs font-normal text-apple-ink/85 transition-colors hover:text-apple-ink">Cases</a>
                <a href="#awards" class="text-xs font-normal text-apple-ink/85 transition-colors hover:text-apple-ink">Awards</a>
                <a href="#leadership" class="text-xs font-normal text-apple-ink/85 transition-colors hover:text-apple-ink">Leadership</a>
                <a href="#contact" class="text-xs font-normal text-apple-ink/85 transition-colors hover:text-apple-ink">Contact</a>
            </nav>

            <div class="flex items-center gap-3">
                <a href="{{ route('draft.nasa') }}" class="rounded-full border border-apple-line px-2.5 py-0.5 text-[11px] font-medium text-apple-muted transition-colors hover:border-apple-ink hover:text-apple-ink">
                    NASA Draft
                </a>
                <button
                    type="button"
                    @click="open = !open"
                    :aria-expanded="open.toString()"
                    aria-controls="apple-mobile-nav"
                    aria-label="Toggle menu"
                    class="inline-flex h-8 w-8 items-center justify-center text-apple-ink md:hidden"
                >
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                        <path d="M4 8h16M4 16h16" />
                    </svg>
                </button>
            </div>
        </div>

        <nav id="apple-mobile-nav" x-show="open" x-cloak aria-label="Mobile navigation" class="border-t border-apple-line bg-white px-6 py-4 md:hidden">
            <div class="flex flex-col gap-3">
                @foreach ($p['nav'] as $item)
                    <a href="{{ $item['href'] }}" @click="open = false" class="text-sm font-medium text-apple-ink hover:text-apple-blue">
                        {{ $item['label'] }}
                    </a>
                @endforeach
                <a href="{{ route('draft.nasa') }}" class="pt-2 text-sm font-medium text-apple-link">View Archived NASA Draft ›</a>
            </div>
        </nav>
    </header>

    {{-- Apple Store-style Centered Availability Ribbon --}}
    <div class="border-b border-apple-line/50 bg-white px-4 py-3 text-center text-xs text-apple-ink">
        <p>
            {{ $p['hero']['availability'] }} ({{ $p['hero']['availability_window'] }}).
            <a href="#contact" class="ml-1 font-medium text-apple-link hover:underline">Get in touch ›</a>
        </p>
    </div>

    <main id="main-content" class="bg-white">
        {{-- Panel 1: Light Hero Showcase (Apple Flagship Canvas #F5F5F7) --}}
        <section id="top" class="mb-3 bg-apple-bg px-6 pt-14 pb-12 text-center text-apple-ink sm:pt-16 sm:pb-14">
            <div class="mx-auto max-w-[980px]">
                <h1 class="mx-auto max-w-[20ch] text-4xl font-semibold tracking-[-0.03em] leading-[1.06] sm:text-6xl">
                    {{ $p['hero']['headline_before'] }}
                    {{ $p['hero']['headline_emphasis'] }}
                    {{ $p['hero']['headline_after'] }}
                </h1>

                <p class="mx-auto mt-4 max-w-[46ch] text-lg leading-snug text-apple-muted sm:text-2xl">
                    {{ $p['hero']['summary'] }}
                </p>

                <div class="mt-6 flex flex-wrap items-center justify-center gap-3">
                    <a href="{{ $p['hero']['primary_cta']['href'] }}" class="rounded-full bg-apple-blue px-5 py-2.5 text-sm font-medium text-white transition-colors hover:bg-apple-blue-hover">
                        {{ $p['hero']['primary_cta']['label'] }}
                    </a>
                    <a href="{{ $p['hero']['secondary_cta']['href'] }}" class="rounded-full border border-apple-blue px-5 py-2.5 text-sm font-medium text-apple-link transition-colors hover:bg-apple-blue hover:text-white">
                        {{ $p['hero']['secondary_cta']['label'] }}
                    </a>
                </div>

                <div class="mx-auto mt-10 max-w-4xl">
                    <x-img-slot :image="$p['hero']['image']" :eager="true" variant="apple-light" />
                </div>

                <dl class="mx-auto mt-10 grid max-w-3xl grid-cols-2 gap-6 border-t border-apple-line pt-7 sm:grid-cols-4">
                    @foreach ($p['hero']['kpis'] as $kpi)
                        <div>
                            <dd class="text-2xl font-semibold tracking-tight text-apple-ink tabular-nums sm:text-3xl">{{ $kpi['value'] }}</dd>
                            <dt class="mt-1 text-xs text-apple-muted">{{ $kpi['label'] }}</dt>
                        </div>
                    @endforeach
                </dl>
            </div>
        </section>

        {{-- Panel 2: Dark Spotlight — Core Capabilities (Apple Watch Pro Black Band) --}}
        <section id="capabilities" class="mb-3 bg-black px-6 py-16 text-white sm:py-20">
            <div class="mx-auto max-w-[980px] text-center">
                <h2 class="text-4xl font-semibold tracking-[-0.025em] text-white sm:text-5xl">
                    Core Commercial Capabilities
                </h2>
                <p class="mx-auto mt-3 max-w-[46ch] text-lg text-[#C8C8CE]">
                    {{ $p['capabilities']['intro'] }}
                </p>
                <div class="mt-6 flex flex-wrap items-center justify-center gap-3">
                    <a href="#cases" class="rounded-full bg-apple-blue px-5 py-2 text-sm font-medium text-white transition-colors hover:bg-apple-blue-hover">
                        Explore Cases
                    </a>
                    <a href="#contact" class="rounded-full border border-apple-link-dark px-5 py-2 text-sm font-medium text-apple-link-dark transition-colors hover:bg-apple-link-dark hover:text-black">
                        Contact
                    </a>
                </div>

                <div class="mt-10 divide-y divide-white/15 border-y border-white/15 text-left">
                    @foreach ($p['capabilities']['pillars'] as $pillar)
                        <div class="grid gap-3 py-5 md:grid-cols-12 md:items-center">
                            <h3 class="text-base font-semibold text-white md:col-span-4">{{ $pillar['name'] }}</h3>
                            <ul class="flex flex-wrap gap-2 md:col-span-8 md:justify-end">
                                @foreach ($pillar['items'] as $skill)
                                    <li class="rounded-full border border-white/20 px-3 py-1 text-xs text-[#E5E5EA]">
                                        {{ $skill }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Panel 3: 2x2 Split Promo Grid — Commercial Experience --}}
        <section id="experience" aria-label="Commercial Experience" class="mb-3 px-3">
            <div class="grid gap-3 md:grid-cols-2">
                @foreach ($p['experience']['items'] as $idx => $exp)
                    @php($isDarkTile = in_array($idx, [1, 2], true))
                    <article class="flex flex-col justify-between px-6 pt-12 pb-6 text-center sm:px-10 {{ $isDarkTile ? 'bg-black text-white' : 'bg-apple-bg text-apple-ink' }}">
                        <div class="mx-auto max-w-md">
                            <h2 class="text-3xl font-semibold tracking-[-0.02em] sm:text-4xl">{{ $exp['company'] }}</h2>
                            <p class="mt-1.5 text-sm font-medium {{ $isDarkTile ? 'text-[#C8C8CE]' : 'text-apple-muted' }}">
                                {{ $exp['role'] }} · <span class="tabular-nums">{{ $exp['period'] }}</span>
                            </p>
                            <p class="mt-2 text-xs leading-relaxed {{ $isDarkTile ? 'text-[#A1A1A6]' : 'text-apple-muted' }}">
                                {{ $exp['impact'] }}
                            </p>

                            <dl class="mt-5 grid grid-cols-3 gap-3 border-y py-3 {{ $isDarkTile ? 'border-white/15' : 'border-apple-line' }}">
                                @foreach ($exp['metrics'] as $metric)
                                    <div>
                                        <dd class="tabular-nums text-base font-semibold">{{ $metric['value'] }}</dd>
                                        <dt class="text-[11px] {{ $isDarkTile ? 'text-[#A1A1A6]' : 'text-apple-muted' }}">{{ $metric['label'] }}</dt>
                                    </div>
                                @endforeach
                            </dl>
                        </div>

                        <div class="mt-6">
                            <x-img-slot :image="$exp['image']" :variant="$isDarkTile ? 'apple-dark' : 'apple-light'" />
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        {{-- Panel 4: 2x3 Split Promo Grid — Selected Case Studies (Full 6) --}}
        <section id="cases" aria-label="Selected Case Studies" class="mb-3 px-3">
            <div class="grid gap-3 md:grid-cols-2">
                @foreach ($p['cases']['items'] as $idx => $case)
                    @php($isDarkCase = in_array($idx, [1, 2, 5], true))
                    <article class="flex flex-col justify-between px-6 pt-12 pb-6 text-center sm:px-10 {{ $isDarkCase ? 'bg-black text-white' : 'bg-apple-bg text-apple-ink' }}">
                        <div class="mx-auto max-w-md">
                            <h3 class="text-2xl font-semibold leading-tight tracking-[-0.02em] sm:text-3xl">{{ $case['title'] }}</h3>
                            <p class="mt-2 text-sm leading-snug {{ $isDarkCase ? 'text-[#C8C8CE]' : 'text-apple-muted' }}">{{ $case['summary'] }}</p>

                            <div class="mt-5 flex flex-wrap items-center justify-center gap-2.5">
                                <span class="rounded-full bg-apple-blue px-4 py-1.5 text-xs font-medium tabular-nums text-white">
                                    {{ $case['metric'] }}
                                </span>
                                <span class="rounded-full border px-4 py-1.5 text-xs font-medium {{ $isDarkCase ? 'border-apple-link-dark text-apple-link-dark' : 'border-apple-blue text-apple-link' }}">
                                    {{ $case['index'] }} · {{ $case['category'] }}
                                </span>
                            </div>
                        </div>

                        <div class="mt-6">
                            <x-img-slot :image="$case['image']" :variant="$isDarkCase ? 'apple-dark' : 'apple-light'" />
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        {{-- Panel 5: Dark Media Carousel — Awards & Case Competitions (Alpine.js) --}}
        <section
            id="awards"
            x-data="{ index: 0, total: {{ count($p['awards']['slides']) }} }"
            @keydown.arrow-left.prevent="index = (index - 1 + total) % total"
            @keydown.arrow-right.prevent="index = (index + 1) % total"
            aria-roledescription="carousel"
            aria-label="Business case awards"
            class="px-3 pb-12"
        >
            <div class="overflow-hidden rounded-2xl bg-black px-6 py-12 text-white sm:px-10 sm:py-14">
                <div class="mx-auto max-w-[1100px]">
                    <div class="flex flex-wrap items-center justify-between gap-4 pb-8">
                        <h2 class="text-3xl font-semibold tracking-[-0.02em] text-white sm:text-4xl">
                            Awards &amp; Case Competitions
                        </h2>
                        <div class="flex items-center gap-2.5">
                            <span class="font-mono tabular-nums text-xs text-[#C8C8CE]" x-text="`${String(index + 1).padStart(2, '0')} / ${String(total).padStart(2, '0')}`">01 / 02</span>
                            <button
                                type="button"
                                @click="index = (index - 1 + total) % total"
                                aria-label="Previous award"
                                class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-white/25 text-white transition-colors hover:bg-white hover:text-black"
                            >
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                                    <path d="M19 12H5M11 18l-6-6 6-6" />
                                </svg>
                            </button>
                            <button
                                type="button"
                                @click="index = (index + 1) % total"
                                aria-label="Next award"
                                class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-white/25 text-white transition-colors hover:bg-white hover:text-black"
                            >
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                                    <path d="M5 12h14M13 6l6 6-6 6" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    @foreach ($p['awards']['slides'] as $idx => $slide)
                        <article x-show="index === {{ $idx }}" @if($idx > 0) x-cloak @endif class="grid items-center gap-8 lg:grid-cols-12">
                            <div class="lg:col-span-7">
                                <x-img-slot :image="$slide['image']" variant="apple-dark" />
                            </div>
                            <div class="lg:col-span-5">
                                <h3 class="text-2xl font-semibold tracking-tight text-white sm:text-3xl">{{ $slide['title'] }}</h3>
                                <p class="mt-1.5 text-sm font-medium text-apple-link-dark">{{ $slide['subtitle'] }}</p>
                                <p class="mt-4 text-sm leading-relaxed text-[#C8C8CE]">{{ $slide['summary'] }}</p>

                                <dl class="mt-6 grid grid-cols-2 gap-4 border-t border-white/15 pt-5 text-xs">
                                    <div>
                                        <dt class="text-[#A1A1A6]">Placement</dt>
                                        <dd class="mt-0.5 font-semibold text-white">{{ $slide['position'] }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-[#A1A1A6]">Competition</dt>
                                        <dd class="mt-0.5 font-semibold text-white">{{ $slide['competition'] }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-[#A1A1A6]">Team</dt>
                                        <dd class="mt-0.5 font-semibold text-white">{{ $slide['team'] }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-[#A1A1A6]">Year</dt>
                                        <dd class="mt-0.5 tabular-nums font-semibold text-white">{{ $slide['year'] }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            <div class="mt-4 flex items-center justify-center gap-2">
                @foreach ($p['awards']['slides'] as $idx => $slide)
                    <button
                        type="button"
                        data-award-dot
                        @click="index = {{ $idx }}"
                        :aria-pressed="(index === {{ $idx }}).toString()"
                        class="rounded-full border px-3.5 py-1 text-xs font-medium transition-colors"
                    >
                        {{ $slide['chapter'] }} · {{ $slide['competition'] }}
                    </button>
                @endforeach
            </div>
        </section>

        {{-- Panel 6: Leadership & Operational Impact (Full 10, 5x2 Gallery Strip) --}}
        <section id="leadership" class="px-3 pb-16">
            <div class="mx-auto max-w-[1100px] pt-4 pb-8 text-center">
                <h2 class="text-3xl font-semibold tracking-[-0.02em] text-apple-ink sm:text-4xl">
                    Leadership &amp; Operational Impact
                </h2>
                <dl class="mx-auto mt-5 flex max-w-xl flex-wrap justify-center gap-8 text-center">
                    @foreach ($p['leadership']['stats'] as $stat)
                        <div>
                            <dd class="tabular-nums text-2xl font-semibold text-apple-ink">{{ $stat['value'] }}</dd>
                            <dt class="text-xs text-apple-muted">{{ $stat['label'] }}</dt>
                        </div>
                    @endforeach
                </dl>
            </div>

            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-5">
                @foreach ($p['leadership']['items'] as $item)
                    <article class="flex flex-col">
                        <x-img-slot :image="$item['image']" variant="apple-light" />
                        <div class="px-1 pt-3">
                            <h3 class="text-sm font-semibold text-apple-ink">{{ $item['title'] }}</h3>
                            <p class="mt-0.5 text-xs text-apple-muted">{{ $item['role'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </main>

    {{-- Apple #F5F5F7 Directory Footer --}}
    <footer id="contact" class="bg-apple-bg text-apple-ink">
        <div class="mx-auto max-w-[980px] px-6 py-12">
            <div class="border-b border-apple-line pb-8 text-center">
                <h2 class="text-3xl font-semibold tracking-[-0.02em] text-apple-ink sm:text-4xl">
                    Let's Build Commercial Value That Lasts.
                </h2>
                <p class="mx-auto mt-2 max-w-[44ch] text-sm text-apple-muted">{{ $p['contact']['summary'] }}</p>
                <div class="mt-6 flex flex-wrap items-center justify-center gap-3">
                    <a href="mailto:{{ $p['meta']['email'] }}" class="rounded-full bg-apple-blue px-5 py-2 text-xs font-medium text-white transition-colors hover:bg-apple-blue-hover">
                        {{ $p['contact']['email_label'] }}
                    </a>
                    <a href="{{ $p['meta']['linkedin'] }}" target="_blank" rel="noopener noreferrer" class="rounded-full border border-apple-blue px-5 py-2 text-xs font-medium text-apple-link transition-colors hover:bg-apple-blue hover:text-white">
                        {{ $p['contact']['linkedin_label'] }}
                    </a>
                    <a href="{{ $p['meta']['resume_url'] }}" class="rounded-full border border-apple-line bg-white px-5 py-2 text-xs font-medium text-apple-ink transition-colors hover:border-apple-ink">
                        {{ $p['contact']['resume_label'] }}
                    </a>
                </div>
            </div>

            <div class="border-b border-apple-line py-4 text-[11px] leading-relaxed text-apple-muted">
                <p>1. {{ $p['meta']['education'] }} — {{ $p['meta']['institution'] }} ({{ $p['meta']['location'] }}).</p>
                <p class="mt-1">2. All 23 placeholder image slots are configured in <code class="font-mono text-apple-ink">config/portfolio.php</code>. Replace any <code class="font-mono text-apple-ink">'src' => null</code> entry with your image path.</p>
            </div>

            <div class="grid grid-cols-2 gap-6 py-8 text-xs sm:grid-cols-5">
                <div>
                    <p class="font-semibold text-apple-ink">Explore</p>
                    <ul class="mt-2.5 space-y-1.5 text-apple-muted">
                        @foreach ($p['nav'] as $item)
                            <li><a href="{{ $item['href'] }}" class="hover:text-apple-ink hover:underline">{{ $item['label'] }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <p class="font-semibold text-apple-ink">Experience</p>
                    <ul class="mt-2.5 space-y-1.5 text-apple-muted">
                        @foreach ($p['experience']['items'] as $exp)
                            <li><a href="#experience" class="hover:text-apple-ink hover:underline">{{ $exp['company'] }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <p class="font-semibold text-apple-ink">Case Studies</p>
                    <ul class="mt-2.5 space-y-1.5 text-apple-muted">
                        @foreach ($p['cases']['items'] as $case)
                            <li><a href="#cases" class="hover:text-apple-ink hover:underline">{{ $case['index'] }} · {{ $case['category'] }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <p class="font-semibold text-apple-ink">Connect</p>
                    <ul class="mt-2.5 space-y-1.5 text-apple-muted">
                        <li><a href="mailto:{{ $p['meta']['email'] }}" class="hover:text-apple-ink hover:underline">{{ $p['meta']['email'] }}</a></li>
                        <li><a href="{{ $p['meta']['linkedin'] }}" target="_blank" rel="noopener noreferrer" class="hover:text-apple-ink hover:underline">{{ $p['contact']['linkedin_label'] }}</a></li>
                        <li><a href="{{ $p['meta']['resume_url'] }}" class="hover:text-apple-ink hover:underline">{{ $p['contact']['resume_label'] }}</a></li>
                    </ul>
                </div>

                <div>
                    <p class="font-semibold text-apple-ink">Design Drafts</p>
                    <ul class="mt-2.5 space-y-1.5 text-apple-muted">
                        <li><a href="{{ route('draft.nasa') }}" class="text-apple-link hover:underline">Draft 01 · NASA Style</a></li>
                        <li><a href="{{ route('draft.apple') }}" class="font-medium text-apple-ink hover:underline">Draft 02 · Apple (Archived)</a></li>
                    </ul>
                </div>
            </div>

            <div class="flex flex-wrap items-center justify-between gap-3 border-t border-apple-line pt-4 text-[11px] text-apple-muted">
                <p>{{ $p['meta']['copyright'] }}</p>
                <p>Thailand</p>
            </div>
        </div>
    </footer>
</x-layouts.app>
