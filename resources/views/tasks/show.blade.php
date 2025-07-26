<x-app-layout>
    <x-slot name="header">
        <div class="text-center my-4">
            <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
                {{ $task->title }}
            </h2>
            <span @class([
                    'px-2 py-1 rounded-full text-xs font-semibold',
                    'bg-yellow-100 text-yellow-800' => $task->status === \App\Enums\TaskStatus::InProgress,
                    'bg-green-100 text-green-800' => $task->status === \App\Enums\TaskStatus::Completed,
                    'bg-blue-100 text-blue-800' => $task->status === \App\Enums\TaskStatus::OnHold,
                    'bg-red-100 text-red-800' => $task->status === \App\Enums\TaskStatus::Dropped,
                    'bg-orange-100 text-orange-800' => $task->status === \App\Enums\TaskStatus::PlanToDo,
                ])>
                {{ \App\Enums\TaskStatus::labels()[$task->status->value] ?? ucfirst($task->status->value) }}
            </span>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="text-left text-gray-800 leading-relaxed">
                    {{ $task->description }}
                </div>

                <div class="flex justify-end mt-6 pt-4 border-t border-gray-100">
                    <a href="{{ route('tasks.edit', $task) }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-md transition-colors">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
