<?php

namespace App\Livewire;

use App\Models\Tag;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class TaskList extends Component
{
    public string $title = '';
    public string $description = '';
    public string $tags = '';
    public Collection $tasks;
    public array $searchTags = [];
    public ?string $searchTag = 'all';

    public function mount(): void
    {
        $this->loadData();
    }


    public function render(): object
    {
        return view('livewire.task-list');
    }

    public function save(): void
    {
        $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'tags' => ['nullable', 'string']
        ]);

        $task = Task::create([
            'title' => $this->title,
            'description' => $this->description
        ]);

        foreach(explode(',', $this->tags) as $tag) {
            $task->tag($tag);
        }

        $this->loadData();

        $this->reset(['title', 'description', 'tags']);
    }

    public function remove(Task $task): void
    {
        $task->delete();

        $this->loadData();
    }

    public function toggleCompletionState(Task $task): void
    {
        $task->completed = !$task->completed;
        $task->save();
        $this->loadData();
    }

    public function setTagFilter(string $tagName): void
    {
        $this->searchTag = $tagName;

        $this->loadData();
    }

    public function loadData(): void
    {
        $query = Task::with('tags');

        // If there is an active tag, filter by that tag
        if ($this->searchTag && $this->searchTag !== 'all') {
            $query->whereHas('tags', function ($q) {
                $q->where('name', $this->searchTag);
            });
        }

        $this->tasks = $query->get();

        $this->searchTags = Tag::whereHas('tasks')->pluck('name')->unique()->toArray();
    }
}
