<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cinematch</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-black flex items-center justify-center text-white">

    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1524985069026-dd778a71c7b4')] 
                bg-cover bg-center opacity-20"></div>

    <div class="relative z-10 w-full max-w-md p-8 rounded-xl bg-black/80 shadow-2xl">
        {{ $slot }}
    </div>

</body>
</html>
