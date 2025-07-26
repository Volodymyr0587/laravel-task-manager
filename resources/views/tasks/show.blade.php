<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Task') }} {{ $task->title }}
        </h2>
    </x-slot>

    <div>
       {{ $task->title }}
    </div>
</x-app-layout>
