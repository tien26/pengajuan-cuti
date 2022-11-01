<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <h2>Saya Adalah {{ $role }}</h2>
    </x-slot>

</x-app-layout>
