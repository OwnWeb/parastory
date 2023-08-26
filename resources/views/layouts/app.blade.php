<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>@yield('title', 'App')</title>
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
<div class="flex flex-col">
    <header class="bg-blue-500 py-6">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-lg font-semibold text-white">
                ParaStory
            </a>
        </div>
    </header>
    <div class="flex-grow container mx-auto sm:px-4 mt-6 mb-8">
        @yield('content')
    </div>
    <footer class="bg-gray-800 text-white py-6 text-sm">
        <div class="container mx-auto flex flex-col md:flex-row justify-between px-4 md:px-0">
            <!-- Colonne gauche -->
            <div class="mb-4 md:mb-0">
                <p>Les textes fournis à but éducatif sont la propriété de leurs auteurs respectifs.</p>
                <p>Ils sont rassemblés ici dans le but d'étoffer nos connaissances en vol et de profiter de l'expérience de toutes et tous.</p>
            </div>

            <!-- Colonne droite -->
            <div>
                <p>Contenus agrégés par le <a href="https://duckparapente.fr/" target="_blank">Duck Parapente</a></p>
                <p>Site hébergé par <a href="https://ownweb.fr/" target="_blank">OwnWeb</a></p>
            </div>
        </div>
    </footer>

</div>
</body>
</html>
