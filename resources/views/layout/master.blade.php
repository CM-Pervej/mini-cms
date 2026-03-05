<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mini CMS')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- DaisyUI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet" />
</head>

<body class="bg-base-200 min-h-screen flex flex-col">
    <header class="bg-base-100 shadow-md">
        <div class="container mx-auto flex flex-wrap items-center justify-between p-4">
            <a href="/" class="text-2xl font-bold text-primary">Mini CMS</a>
            <div class="flex gap-2 md:gap-4">
                <a href="{{ route('blogs.index') }}" class="btn btn-sm btn-primary hover:bg-primary-focus transition">
                    Blog
                </a>
                <a href="{{ route('category.index') }}" class="btn btn-sm btn-primary hover:bg-primary-focus transition">
                    Category
                </a>
            </div>
        </div>
    </header>

    <main class="flex-1 container mx-auto px-4 md:px-6 py-8">
        @yield('content')
    </main>

    <footer class="bg-base-100 shadow-inner mt-auto">
        <div class="container mx-auto px-4 py-4 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Mini CMS. All rights reserved.
        </div>
    </footer>
</body>
</html>