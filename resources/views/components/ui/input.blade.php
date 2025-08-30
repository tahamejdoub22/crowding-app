@props([
    'name',
    'label' => null,
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'help' => null,
    'icon' => null,
    'iconPosition' => 'left',
    'size' => 'md',
    'error' => null,
    'floatingLabel' => false,
    'containerClass' => '',
    'inputClass' => '',
    'labelClass' => ''
])

@php
    $hasError = $error || $errors->has($name);
    $errorMessage = $error ?: $errors->first($name);
    $inputId = $attributes->get('id', $name);
    
    // Size classes
    $sizeClasses = [
        'sm' => 'px-3 py-2 text-sm',
        'md' => 'px-4 py-3 text-base',
        'lg' => 'px-5 py-4 text-lg',
    ];
    
    // Base input classes
    $baseInputClasses = 'block w-full rounded-xl border-2 shadow-sm transition-all duration-200 focus:outline-none focus:ring-0 disabled:opacity-50 disabled:cursor-not-allowed';
    
    // State-based classes
    if ($hasError) {
        $stateClasses = 'border-red-300 focus:border-red-500 text-red-900 placeholder-red-400';
    } else {
        $stateClasses = 'border-gray-300 focus:border-primary-500 text-gray-900 placeholder-gray-400 hover:border-gray-400';
    }
    
    // Icon classes
    $iconClasses = $icon ? ($iconPosition === 'left' ? 'pl-12' : 'pr-12') : '';
    
    $finalInputClasses = implode(' ', [
        $baseInputClasses,
        $sizeClasses[$size],
        $stateClasses,
        $iconClasses,
        $inputClass
    ]);
@endphp

<div class="space-y-2 {{ $containerClass }}">
    @if($label && !$floatingLabel)
        <label for="{{ $inputId }}" class="block text-sm font-medium text-gray-700 {{ $labelClass }}">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <div class="relative">
        @if($icon && $iconPosition === 'left')
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <span class="text-gray-400 {{ $hasError ? 'text-red-400' : '' }}">
                    {!! $icon !!}
                </span>
            </div>
        @endif

        <input
            id="{{ $inputId }}"
            name="{{ $name }}"
            type="{{ $type }}"
            value="{{ old($name, $value) }}"
            placeholder="{{ $floatingLabel ? ' ' : $placeholder }}"
            @if($required) required @endif
            @if($disabled) disabled @endif
            @if($readonly) readonly @endif
            class="{{ $finalInputClasses }}"
            {{ $attributes->except(['class', 'id', 'name', 'type', 'value', 'placeholder', 'required', 'disabled', 'readonly']) }}
        />

        @if($floatingLabel && $label)
            <label 
                for="{{ $inputId }}" 
                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-4 peer-focus:text-primary-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 {{ $hasError ? 'text-red-600' : '' }} {{ $labelClass }}"
            >
                {{ $label }}
                @if($required)
                    <span class="text-red-500">*</span>
                @endif
            </label>
        @endif

        @if($icon && $iconPosition === 'right')
            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                <span class="text-gray-400 {{ $hasError ? 'text-red-400' : '' }}">
                    {!! $icon !!}
                </span>
            </div>
        @endif
    </div>

    @if($help && !$hasError)
        <p class="text-sm text-gray-600">{{ $help }}</p>
    @endif

    @if($hasError)
        <div class="flex items-center space-x-2">
            <svg class="w-4 h-4 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
            <p class="text-sm text-red-600">{{ $errorMessage }}</p>
        </div>
    @endif
</div>

<style>
    /* Floating label styles */
    input:focus ~ label,
    input:not(:placeholder-shown) ~ label {
        @apply transform scale-75 -translate-y-4 text-primary-600;
    }

    input:focus ~ label.error,
    input:not(:placeholder-shown) ~ label.error {
        @apply text-red-600;
    }
</style>