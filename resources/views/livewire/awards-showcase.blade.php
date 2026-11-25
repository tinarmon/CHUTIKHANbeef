@php
    $total = count($slides);
    $current = $slides[$active] ?? null;
@endphp

<section
    id="awards"
    x-data
    @keydown.arrow-left.prevent="$wire.prev()"
    @keydown.arrow-right.prevent="$wire.next()"
    aria-roledescription="carousel"
    aria-label="Business case awards"
    class="bg-paper text-ink"
>
    <div class="mx-auto max-w-[1360px] px-6 py-16 lg:px-10 lg:py-20">
        <div class="flex flex-wrap items-end justify-between gap-6">
            <h2 class="text-4xl font-bold tracking-[-0.025em] text-ink sm:text-5xl">
                Awards &amp; Case Competitions
            </h2>

            <div class="flex items-center gap-3">
                <span class="font-mono tabular-nums text-sm font-semibold text-ink">
                    {{ sprintf('%02d / %02d', $active + 1, max(1, $total)) }}
                </span>
                <button
                    type="button"
                    wire:click="prev"
                    title="Previous award"
                    aria-label="Previous award"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-black/25 text-ink transition-colors hover:border-ink hover:bg-ink hover:text-white"
                >
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                        <path d="M19 12H5M11 18l-6-6 6-6" />
                    </svg>
                </button>
                <button
                    type="button"
                    wire:click="next"
                    title="Next award"
                    aria-label="Next award"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-black/25 text-ink transition-colors hover:border-ink hover:bg-ink hover:text-white"
                >
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                        <path d="M5 12h14M13 6l6 6-6 6" />
                    </svg>
                </button>
            </div>
        </div>

        @if ($current)
            <article wire:loading.class="opacity-70" class="relative mt-8 min-h-[420px] overflow-hidden bg-space text-white transition-opacity lg:min-h-[500px]">
                <x-img-slot :image="$current['image']" variant="award-overlay" />
                <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black via-black/75 to-black/15" aria-hidden="true"></div>

                <div class="relative z-10 flex min-h-[420px] flex-col justify-end p-6 pt-36 sm:p-10 sm:pt-40 lg:min-h-[500px] lg:p-12">
                    <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                        <div class="max-w-2xl" aria-live="polite">
                            <span class="inline-block bg-signal px-2.5 py-1 font-mono tabular-nums text-xs font-semibold uppercase tracking-wider text-white">
                                {{ $current['position'] }} · {{ $current['year'] }} · {{ $current['team'] }}
                            </span>
                            <h3 class="mt-3 text-2xl font-bold leading-tight tracking-tight text-white sm:text-3xl lg:text-4xl">
                                {{ $current['title'] }}
                            </h3>
                            <p class="mt-1.5 text-sm font-medium text-white/85">{{ $current['subtitle'] }}</p>
                            <p class="mt-3 text-sm leading-relaxed text-muted-dark sm:text-base">{{ $current['summary'] }}</p>
                        </div>

                        <div class="flex flex-wrap gap-2">
                            @foreach ($slides as $idx => $slide)
                                <button
                                    type="button"
                                    wire:click="select({{ $idx }})"
                                    aria-pressed="{{ $idx === $active ? 'true' : 'false' }}"
                                    class="px-4 py-2 text-xs font-semibold transition-colors {{ $idx === $active ? 'bg-white text-space' : 'border border-white/35 bg-black/50 text-white hover:border-white' }}"
                                >
                                    {{ $slide['chapter'] }} · {{ $slide['competition'] }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </article>
        @endif
    </div>
</section>
