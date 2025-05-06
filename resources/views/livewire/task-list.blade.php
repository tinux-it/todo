<div class="max-w-2xl mx-auto px-4 py-12 space-y-8">

    <!-- Header -->
    <header class="text-center">
        <h1 class="text-4xl font-bold mb-2">The only personal tasks app you need</h1>
        <p class="text-gray-400">Tag, filter, and manage tasks effortlessly</p>
    </header>

    <form wire:submit="save">
        <label>
            <span>Title</span>

            <input
                type="text"
                placeholder="What needs to be done?"
                class="w-full px-4 py-3 rounded-xl bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-purple-500"
                wire:model="title"
                required
            >
            <x-error name="title" />

        </label>

        <label>
            <span>Description</span>
            <textarea
                placeholder="A description might make the task easier to complete.."
                class="w-full px-4 py-3 rounded-xl bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-purple-500"
                wire:model="description"
                required
            ></textarea>
            <x-error name="description" />

        </label>

        <label>
            <span>Tags (comma separated list)</span>

            <input
                type="text"
                placeholder="Add tags (comma separated: e.g. work, urgent)"
                class="w-full px-4 py-2 rounded-xl bg-gray-800 text-sm text-gray-300 focus:outline-none focus:ring-1 focus:ring-purple-500"
                wire:model="tags">

            <x-error name="tags" />
        </label>

        <button
            type="submit"
            class="w-full bg-purple-600 hover:bg-purple-700 text-white py-3 mt-6 rounded-xl font-semibold"
        >Save</button>
    </form>

    <!-- Tag Filter -->
    <div class="flex flex-wrap gap-2">
        <button
            wire:click="setTagFilter('all')"
            class="{{ $searchTag === 'all' ? 'bg-purple-700' : 'bg-gray-800 hover:bg-gray-700' }} px-3 py-1 text-sm rounded-full"
        >All</button>

        @foreach($searchTags as $tag)
            <button
                wire:click="setTagFilter('{{ $tag }}')"
                class="{{ $searchTag === $tag ? 'bg-purple-700' : 'bg-gray-800 hover:bg-gray-700' }} px-3 py-1 text-sm rounded-full capitalize"
            >{{ $tag }}</button>
        @endforeach
    </div>

    <!-- Tasks list -->
    <div class="space-y-4">
        @foreach($tasks as $task)
            <div class="{{ $task->completed ? 'bg-gray-800 opacity-60' : 'bg-gray-900' }} rounded-xl px-5 py-4 flex justify-between items-start shadow hover:shadow-lg transition">
                <div>
                    <div>
                        <div class="flex flex-1/2 items-center gap-3 mb-2">
                            <input
                                type="checkbox"
                                class="w-5 h-5 text-purple-500 bg-gray-700 rounded focus:ring-0"
                                wire:click="toggleCompletionState({{ $task }})"
                                @if($task->completed) checked @endif
                            >
                            <span class="text-lg font-medium {{ $task->completed ? 'line-through' : '' }}">{{ $task->title }}</span>
                        </div>
                        <div class="flex gap-2 mt-2 mb-2 flex-wrap">
                            <span class="text-sm font-medium">{{ $task->description }}</span>
                        </div>

                        <div class="flex gap-2 mt-1 flex-wrap">
                            @foreach($task->tags as $tag)
                                    <span class=" bg-gray-800 hover:bg-gray-700 text-xs px-2 py-1 rounded-full">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                <button wire:click="remove({{ $task }})"
                        class="text-red-400 hover:text-red-600 text-lg">
                    ✕
                </button>
            </div>
        @endforeach
    </div>
</div>
