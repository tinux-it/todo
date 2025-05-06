<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Task;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $taskList = [
            [
                'title' => 'Initial setup of the Laravel application',
                'description' => 'Install Laravel, configure the .env file, and verify the local development server is running.',
                'completed' => true,
                'tags' => ['setup', 'laravel', 'infrastructure']
            ],
            [
                'title' => 'Backend programming of the Livewire form',
                'description' => 'Create a Livewire component to handle task submission and validation on the backend.',
                'completed' => true,
                'tags' => ['backend', 'livewire', 'form']
            ],
            [
                'title' => 'Move backend logic to single page with styling',
                'description' => 'Refactor the form to appear on a single styled page with TailwindCSS and make all interactions reactive.',
                'completed' => true,
                'tags' => ['ui', 'livewire', 'refactor']
            ],
            [
                'title' => 'Setup GitHub CI/CD Actions to build a container',
                'description' => 'Configure GitHub Actions to run tests and build a Docker image for the Laravel application on push.',
                'completed' => true,
                'tags' => ['ci', 'github', 'devops']
            ],
            [
                'title' => 'Deploy to Kubernetes',
                'description' => 'Write Kubernetes deployment and service YAML files to deploy the Docker container to a cluster.',
                'completed' => true,
                'tags' => ['kubernetes', 'deployment', 'cloud']
            ],
            [
                'title' => 'Setup authentication',
                'description' => 'Implement user authentication using Laravel Breeze or Jetstream for login and registration.',
                'completed' => false,
                'tags' => ['auth', 'user', 'security']
            ],
            [
                'title' => 'Write PEST tests',
                'description' => 'Write feature and unit tests using PEST to cover task creation, completion, and tag filtering.',
                'completed' => false,
                'tags' => ['testing', 'pest', 'quality']
            ],
        ];


        foreach ($taskList as $taskData) {
            $task = Task::create([
                'title' => $taskData['title'],
                'description' => $taskData['description'],
                'completed' => $taskData['completed'],
            ]);

            foreach ($taskData['tags'] as $tagName) {
                $task->tag($tagName);
            }
        }
    }
}
