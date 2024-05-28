@props([
    'route' => '',
    'label' => '',
])
<a href="{{ route($route) }}"
    @if (request()->routeIs($route)) class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
    aria-current="page" @else class="text-slate-800 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium" @endif>{{ $slot }}</a>
