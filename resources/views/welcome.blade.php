<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My To-Do App</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-gray-950 text-white font-sans min-h-screen">
<div class="max-w-2xl mx-auto px-4 py-12 space-y-8">

    <!-- Header -->
    <header class="text-center">
        <h1 class="text-4xl font-bold mb-2">The only personal tasks app you need</h1>
        <p class="text-gray-400">Tag, filter, and manage tasks effortlessly</p>
    </header>

    <!-- Task Input -->
    <div class="bg-gray-900 p-4 rounded-xl shadow space-y-4">
        <input
            type="text"
            placeholder="What needs to be done?"
            class="w-full px-4 py-3 rounded-xl bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-purple-500"
        >
        <input
            type="text"
            placeholder="Add tags (comma separated: e.g. work, urgent)"
            class="w-full px-4 py-2 rounded-xl bg-gray-800 text-sm text-gray-300 focus:outline-none focus:ring-1 focus:ring-purple-500"
        >
        <button class="w-full bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-xl font-semibold">
            Add Task
        </button>
    </div>

    <!-- Tag Filter -->
    <div class="flex flex-wrap gap-2">
        <button class="bg-purple-700 px-3 py-1 text-sm rounded-full">All</button>
        <button class="bg-gray-800 px-3 py-1 text-sm rounded-full hover:bg-gray-700">Work</button>
        <button class="bg-gray-800 px-3 py-1 text-sm rounded-full hover:bg-gray-700">Urgent</button>
        <button class="bg-gray-800 px-3 py-1 text-sm rounded-full hover:bg-gray-700">Personal</button>
        <!-- These would dynamically render based on available tags -->
    </div>

    <!-- Task List -->
    <div class="space-y-4">
        <!-- Task with tags -->
        <div class="bg-gray-900 rounded-xl px-5 py-4 flex justify-between items-start shadow hover:shadow-lg transition">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <input type="checkbox" class="w-5 h-5 text-purple-500 bg-gray-700 rounded focus:ring-0">
                    <span class="text-lg font-medium">Submit project report</span>
                </div>
                <div class="flex gap-2 mt-1 flex-wrap">
                    <span class="bg-blue-600 text-xs px-2 py-1 rounded-full">Work</span>
                    <span class="bg-red-600 text-xs px-2 py-1 rounded-full">Urgent</span>
                </div>
            </div>
            <button class="text-red-400 hover:text-red-600 text-lg">✕</button>
        </div>

        <!-- Completed Task -->
        <div class="bg-gray-800 rounded-xl px-5 py-4 flex justify-between items-start opacity-60">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <input type="checkbox" class="w-5 h-5 text-purple-500 bg-gray-700 rounded focus:ring-0" checked>
                    <span class="text-lg line-through">Read Laravel docs</span>
                </div>
                <div class="flex gap-2 mt-1">
                    <span class="bg-green-600 text-xs px-2 py-1 rounded-full">Learning</span>
                </div>
            </div>
            <button class="text-red-400 hover:text-red-600 text-lg">✕</button>
        </div>
    </div>
</div>
</body>
</html>
