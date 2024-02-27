<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Schemes List') }}
        </h2>
    </x-slot>

    <livewire:scheme />
</x-app-layout>
@include('js.scheme_add')