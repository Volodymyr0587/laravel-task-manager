<x-app-layout>
    <x-slot name="header">
        <div class="text-center my-4">
            <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
                {{ __('Tasks') }}
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                by {{ auth()->user()->name }}
            </p>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Search and Add Task Button -->
            {{-- <div class="mb-4 flex justify-between">
                <form method="GET" action="{{ route('tasks.index') }}" class="mb-4">
                    <input type="text" name="search" value="{{ old('search', $search) }}"
                        placeholder="Search by title or description"
                        class="border border-gray-300 px-4 py-2 rounded w-full md:w-1/3" />
                </form>

                <a href="{{ route('tasks.create') }}"
                   class="inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700 transition">
                    {{ __('Add Task') }}
                </a>
            </div> --}}

            <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <form method="GET" action="{{ route('tasks.index') }}" class="w-full md:w-1/2">
                    <input type="text" name="search" value="{{ old('search', $search) }}"
                        placeholder="Search by title or description"
                        class="w-full border border-gray-300 px-4 py-2 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </form>

                <div class="text-right">
                    <a href="{{ route('tasks.create') }}"
                    class="inline-block bg-blue-600 text-white text-sm px-6 py-2 rounded-md shadow hover:bg-blue-700 transition duration-200">
                        {{ __('Add Task') }}
                    </a>
                </div>
            </div>



            <!-- Tasks Table -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $task->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <a href="{{ route('tasks.show', $task) }}" class="text-blue-600 hover:text-blue-800 font-medium">
                                        {{ $task->title }}
                                    </a>
                                </td>
                                <td class="px-6 py-4">
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
                                </td>
                                <td class="px-6 py-4 text-sm space-x-2">
                                    <a href="{{ route('tasks.edit', $task) }}"
                                       class="text-blue-600 hover:text-blue-800 font-medium">
                                        Edit
                                    </a>

                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-red-600 hover:text-red-800 font-medium"
                                                onclick="return confirm('Are you sure you want to delete this task?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="my-4">
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
