@props(['text' => null])

@if($text)
    <div class="px-4 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wide border-b border-gray-100">
        {{ $text }}
    </div>
@else
    <div class="border-t border-gray-100 my-1" role="separator"></div>
@endif