@props(["titre" => "TechnoWave"])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $titre }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="bg-mauve h-96 w-full">
        <div class="grid grid-cols-3">
            <div>

            </div>
            <div>
                <img src="image/logo.png" alt="Logo TechnoWave" class="w-auto h-64">
            </div>
            <div class="flex justify-end items-start">
                <button class="mt-6 mr-6"><p>Mon compte</p></button>
            </div>
        </div>





    </header>
    {{ $slot }}
    <footer>

    </footer>
</body>
</html>
