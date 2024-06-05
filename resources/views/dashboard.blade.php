<x-app-layout>
    @if(auth()->user()->role === 'admin')
        @include('livewire.pages.admin.index')
    @elseif(auth()->user()->role === 'manager')
        @include('livewire.pages.manager.index')
    @endif
</x-app-layout>