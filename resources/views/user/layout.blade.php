<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="icon" href="https://img.logoipsum.com/249.svg" type="image/svg+xml">
    <title>Blog App</title>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <!-- Header -->
    <div class="container mx-auto py-2">
        @include('partials.user.header', ['categories' => $categories])
    </div>

    <div class="container mx-auto py-4">
        <!-- For large screens -->
        <div>
            <!-- Main Content and Slider -->
            <main>
                @yield('content')
            </main>
        </div>

        <!-- Footer -->
        @include('partials.user.footer')

    <!-- Import Flowbite script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.5.3/flowbite.min.js"></script>
</body>
</html>
