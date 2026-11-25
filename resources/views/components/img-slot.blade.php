@props([
    'image',
    'eager' => false,
    'variant' => 'light',
    'collapseWhenEmpty' => false,
])

@php
    $ratio = $image['ratio'] ?? '16/10';
    $src = $image['src'] ?? null;
    $slotId = $image['slot'] ?? 'IMG-SLOT';
    $label = $image['label'] ?? 'Image Placeholder';
    $size = $image['size'] ?? '1200x750';
    $alt = $image['alt'] ?? $label;

    $isAwardOverlay = $variant === 'award-overlay';

    $frameClasses = match ($variant) {
        'dark' => 'rounded-none bg-[#111216] border border-dashed border-[#3C404C] text-[#D8DCE4]',
        'apple-light' => 'rounded-2xl bg-[#E8E8ED] border border-dashed border-[#B8B8C0] text-[#3A3A3D]',
        'apple-dark' => 'rounded-2xl bg-[#161618] border border-dashed border-[#3A3A40] text-[#D2D2D7]',
        default => 'rounded-none bg-[#F1F2F5] border border-dashed border-[#B8BCC6] text-[#373A40]',
    };

    $outerRadius = str_starts_with($variant, 'apple-') ? 'rounded-2xl' : 'rounded-none';
@endphp

@if (empty($src) && $collapseWhenEmpty)
@elseif ($isAwardOverlay)
    <div {{ $attributes->merge(['class' => 'absolute inset-0 h-full w-full overflow-hidden']) }}>
        @if (!empty($src))
            <img
                src="{{ $src }}"
                alt="{{ $alt }}"
                loading="lazy"
                decoding="async"
                class="h-full w-full object-cover"
            >
        @else
            <div
                role="img"
                aria-label="{{ $alt }} ({{ $slotId }} placeholder {{ $size }})"
                class="flex h-full w-full flex-col items-end justify-start bg-[#0E1015] pt-6 pr-6 text-[#D8DCE4] sm:pt-8 sm:pr-8 lg:pt-10 lg:pr-10"
            >
                <div class="flex max-w-xs flex-col items-center gap-1.5 border border-dashed border-[#3C404C] bg-[#111216]/90 px-5 py-4 text-center">
                    <svg class="h-6 w-6 opacity-85" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                        <rect x="3" y="4" width="18" height="16" />
                        <circle cx="8.5" cy="9.5" r="1.5" />
                        <path d="M21 16l-5.2-5.2a1.5 1.5 0 0 0-2.1 0L6 18.5" />
                    </svg>
                    <p class="text-sm font-semibold tracking-tight text-white">{{ $label }}</p>
                    <p class="font-mono tabular-nums text-xs text-[#C8CCD4]">{{ $slotId }} · {{ $size }}</p>
                </div>
            </div>
        @endif
    </div>
@else
    <div {{ $attributes->merge(['class' => "relative w-full overflow-hidden {$outerRadius}"]) }} style="aspect-ratio: {{ $ratio }};">
        @if (!empty($src))
            <img
                src="{{ $src }}"
                alt="{{ $alt }}"
                loading="{{ $eager ? 'eager' : 'lazy' }}"
                decoding="async"
                class="h-full w-full object-cover"
            >
        @else
            <div
                role="img"
                aria-label="{{ $alt }} ({{ $slotId }} placeholder {{ $size }})"
                class="flex h-full w-full flex-col items-center justify-center gap-1.5 p-4 text-center {{ $frameClasses }}"
            >
                <svg class="h-6 w-6 opacity-80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                    <rect x="3" y="4" width="18" height="16" />
                    <circle cx="8.5" cy="9.5" r="1.5" />
                    <path d="M21 16l-5.2-5.2a1.5 1.5 0 0 0-2.1 0L6 18.5" />
                </svg>
                <p class="text-xs font-semibold tracking-tight sm:text-sm">{{ $label }}</p>
                <p class="font-mono tabular-nums text-xs opacity-90">{{ $slotId }} · {{ $size }}</p>
            </div>
        @endif
    </div>
@endif
