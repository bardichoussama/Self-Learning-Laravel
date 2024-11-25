<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Laravel')</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4">
 
        <header class="py-6 text-center">
            <h1 class="text-4xl font-bold text-gray-800">Blog Laravel</h1>
        </header>

     
        <div class="flex">
    
            <aside class="w-1/4 bg-white p-4 shadow-md">
                @yield('sidebar', 'Aucune catégorie disponible')
            </aside>

      
            <main class="w-3/4 p-4">
                @yield('content')
            </main>
        </div>

   
        <footer class="py-6 text-center text-gray-600">
            &copy; {{ date('Y') }} Blog Laravel. Tous droits réservés.
        </footer>
    </div>
</body>
</html>
