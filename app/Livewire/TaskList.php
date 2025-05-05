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

    public function mount()
    {
        $this->tasks = Task::with('tags')->get();
    }


    public function render()
    {
        return view('livewire.task-list');
    }

    public function save()
    {
        $task = Task::create([
            'title' => $this->title,
            'description' => $this->description
        ]);

        foreach(explode(',', $this->tags) as $tag) {
            $task->tag($tag);
        }

        $this->tasks = Task::with('tags')->get();

        $this->reset(['title', 'description', 'tags']);
    }
}
