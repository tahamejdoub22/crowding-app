@props([
    'trigger' => '',
    'position' => 'bottom-right',
    'width' => 'w-48',
    'contentClass' => '',
    'triggerClass' => '',
    'backdrop' => true,
    'offset' => 2,
    'zIndex' => 50
])

@php
    $positionClasses = [
        'bottom-right' => 'origin-top-right right-0 top-full',
        'bottom-left' => 'origin-top-left left-0 top-full',
        'top-right' => 'origin-bottom-right right-0 bottom-full',
        'top-left' => 'origin-bottom-left left-0 bottom-full',
        'center' => 'origin-top left-1/2 top-full transform -translate-x-1/2',
    ];
    
    $offsetClass = "mt-{$offset}";
    if (str_contains($position, 'top')) {
        $offsetClass = "mb-{$offset}";
    }
@endphp

<div 
    class="relative inline-block text-left"
    x-data="{ open: false }"
    @click.outside="open = false"
    @keydown.escape.window="open = false"
>
    <!-- Trigger -->
    <div @click="open = !open" class="cursor-pointer {{ $triggerClass }}">
        @if($trigger)
            {!! $trigger !!}
        @else
            {{ $slot->filter(fn($item) => $item->attributes->get('slot') === 'trigger') }}
        @endif
    </div>

    <!-- Dropdown Content -->
    <div 
        x-show="open"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute {{ $positionClasses[$position] }} {{ $offsetClass }} {{ $width }} z-{{ $zIndex }} focus:outline-none"
        role="menu"
        aria-orientation="vertical"
        aria-labelledby="dropdown-menu"
    >
        <div class="rounded-xl shadow-xl bg-white ring-1 ring-black ring-opacity-5 border border-gray-200 {{ $contentClass }}">
            <div class="py-1" role="none">
                {{ $slot->except(fn($item) => $item->attributes->get('slot') === 'trigger') }}
            </div>
        </div>
    </div>

    <!-- Optional backdrop -->
    @if($backdrop)
        <div 
            x-show="open" 
            class="fixed inset-0 z-{{ $zIndex - 10 }}"
            @click="open = false"
        ></div>
    @endif
</div>

<style>
    /* Custom dropdown animations */
    [x-cloak] { display: none !important; }
    
    .dropdown-enter {
        opacity: 0;
        transform: scale(0.95);
    }
    
    .dropdown-enter-active {
        opacity: 1;
        transform: scale(1);
        transition: opacity 100ms ease-out, transform 100ms ease-out;
    }
    
    .dropdown-leave {
        opacity: 1;
        transform: scale(1);
    }
    
    .dropdown-leave-active {
        opacity: 0;
        transform: scale(0.95);
        transition: opacity 75ms ease-in, transform 75ms ease-in;
    }
</style>