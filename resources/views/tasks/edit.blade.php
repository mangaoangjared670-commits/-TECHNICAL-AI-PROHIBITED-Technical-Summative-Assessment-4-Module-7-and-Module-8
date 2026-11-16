<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Edit Task') }}</h2>
    </x-slot>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm sm:rounded-lg">
            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Title</label>
                    <input type="text" name="title" value="{{ old('title', $task->title) }}" class="border-gray-300 rounded-md shadow-sm w-full" required>
                </div>
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Description</label>
                    <textarea name="description" class="border-gray-300 rounded-md shadow-sm w-full">{{ old('description', $task->description) }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Status</label>
                    <select name="status" class="border-gray-300 rounded-md shadow-sm w-full">
                        <option value="pending" {{ $task->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="done" {{ $task->status === 'done' ? 'selected' : '' }}>Done</option>
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Task</button>
            </form>
        </div>
    </div>
</x-app-layout>