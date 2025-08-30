@props([
    'href' => null,
    'icon' => null,
    'disabled' => false,
    'destructive' => false,
    'active' => false,
    'external' => false,
    'method' => 'GET'
])

@php
    $baseClasses = 'group flex items-center w-full px-4 py-2 text-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500';
    
    if ($disabled) {
        $classes = $baseClasses . ' text-gray-400 cursor-not-allowed';
    } elseif ($destructive) {
        $classes = $baseClasses . ' text-red-700 hover:bg-red-50 hover:text-red-800 focus:bg-red-50';
    } elseif ($active) {
        $classes = $baseClasses . ' text-primary-700 bg-primary-50 font-medium';
    } else {
        $classes = $baseClasses . ' text-gray-700 hover:bg-gray-50 hover:text-gray-900';
    }
@endphp

@if($href && !$disabled)
    <a 
        href="{{ $href }}" 
        class="{{ $classes }}"
        @if($external) target="_blank" rel="noopener noreferrer" @endif
        role="menuitem"
        {{ $attributes->except(['href', 'icon', 'disabled', 'destructive', 'active', 'external', 'method']) }}
    >
        @if($icon)
            <span class="mr-3 flex-shrink-0">
                {!! $icon !!}
            </span>
        @endif
        
        <span class="flex-1">{{ $slot }}</span>
        
        @if($external)
            <svg class="ml-2 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
            </svg>
        @endif
    </a>
@elseif($method !== 'GET' && !$disabled)
    <form method="POST" action="{{ $href }}" class="w-full">
        @csrf
        @if($method !== 'POST')
            @method($method)
        @endif
        <button 
            type="submit"
            class="{{ $classes }}"
            role="menuitem"
            {{ $attributes->except(['href', 'icon', 'disabled', 'destructive', 'active', 'external', 'method']) }}
        >
            @if($icon)
                <span class="mr-3 flex-shrink-0">
                    {!! $icon !!}
                </span>
            @endif
            
            <span class="flex-1 text-left">{{ $slot }}</span>
        </button>
    </form>
@else
    <button 
        class="{{ $classes }}"
        role="menuitem"
        @if($disabled) disabled @endif
        {{ $attributes->except(['href', 'icon', 'disabled', 'destructive', 'active', 'external', 'method']) }}
    >
        @if($icon)
            <span class="mr-3 flex-shrink-0">
                {!! $icon !!}
            </span>
        @endif
        
        <span class="flex-1 text-left">{{ $slot }}</span>
    </button>
@endif