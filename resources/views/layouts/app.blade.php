<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>La Molisana</title>

        {{-- Includiamo gli assets con la direttiva @vite --}}
        @vite('resources/js/app.js')
    </head>
    <body>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        HEADER
                    </div>
                </div>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        FOOTER
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
