@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-400 bg-green-900/30 border border-green-400/30 rounded-lg p-4 backdrop-blur-sm']) }}>
        {{ $status }}
    </div>
@endif