<x-app-layout>
    <x-slot name="header">
        <div class="text-center my-4">
            <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
                {{ __('Edit Task') }} "{{ $task->title }}"
            </h2>
        </div>
    </x-slot>

    <div>
        <form action="{{ route('tasks.update', $task) }}" method="POST" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}"
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                @error('title')
                <span class="text-sm font-bold text-red-500 mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description"
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">{{ old('description', $task->description) }}</textarea>
                @error('description')
                <span class="text-sm font-bold text-red-500 mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                    @foreach (\App\Enums\TaskStatus::cases() as $status)
                        <option value="{{ $status->value }}"
                            @selected(old('status', $task->status->value ?? '') === $status->value)>
                            {{ ucfirst($status->label()) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Submit
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
