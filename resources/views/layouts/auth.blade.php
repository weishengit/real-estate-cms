<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
    <meta name="robots" content="noindex">

    <title>Vista Land Residences - House and Lot | Condominium</title>
    <meta name="author" content="Vista Land Residences">
    <meta name="description" content="The developer of Brittany, Crown Asia, Camella, Lessandra, Bria, Lumina and Vista Residences. Contact Now: 0923.875.7468, 0917.621.7831, vistalandresidences.com@gmail.com. Your real estates and condo in Manila largest builder in the Philippines." />
    <meta name="keywords" content="vista land residences, real estate philippines, condo in manila, condominium philippines, bahay ni juan, bria, lumina, camella homes" />
    <link rel="canonical" href="{{ url()->current() }}/" />
</head>

<body class="c-app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
</body>

</html>
