<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Tasks') }} [by {{ auth()->user()->name }}]
        </h2>
    </x-slot>

    <div>
        <div>
            <a href="{{ route('tasks.create') }}">{{ __('Add Task') }}</a>
        </div>
        <table class="table-auto border-collapse border border-gray-400 w-full">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-400 px-4 py-2">ID</th>
                    <th class="border border-gray-400 px-4 py-2">Title</th>
                    <th class="border border-gray-400 px-4 py-2">Status</th>
                    <th class="border border-gray-400 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td class="border border-gray-400 px-4 py-2">{{ $task->id }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $task->title }}</td>
                    <td class="border border-gray-400 px-4 py-2">
                        <span @class(
                        [
                                'px-2 py-1 rounded text-xs',
                                'bg-yellow-100 text-yellow-800' => $task->status === \App\Enums\TaskStatus::InProgress,
                                'bg-green-100 text-green-800' => $task->status === \App\Enums\TaskStatus::Completed,
                                'bg-blue-100 text-blue-800' => $task->status === \App\Enums\TaskStatus::OnHold,
                                'bg-red-100 text-red-800' => $task->status === \App\Enums\TaskStatus::Dropped,
                                'bg-orange-100 text-orange-800' => $task->status === \App\Enums\TaskStatus::PlanToDo,
                            ])>
                            {{ \App\Enums\TaskStatus::labels()[$task->status->value] ?? ucfirst($task->status->value) }}
                        </span>
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        <a href="{{ route('tasks.edit', $task) }}">Edit</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>
