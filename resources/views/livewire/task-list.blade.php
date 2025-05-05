<div>
    @foreach($tasks as $task)
        <div>
            <h2>Title: {{ $task->title }}</h2>
            <p>Description: {{ $task->description }}</p>
            <ul>
                @foreach($task->tags as $tag)
                    <li> {{ $tag->name }} </li>
                @endforeach
            </ul>
        </div>
    @endforeach

    <form wire:submit="save">
        <label>
            <span>Title</span>

            <input type="text" wire:model="title">
        </label>

        <label>
            <span>Description</span>

            <textarea wire:model="description"></textarea>
        </label>

        <label>
            <span>Tags (comma separated list)</span>

            <input type="text" wire:model="tags">
        </label>

        <button type="submit">Save</button>
    </form>
</div>
