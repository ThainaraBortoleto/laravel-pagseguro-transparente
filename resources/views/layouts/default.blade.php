
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- CSS  -->
    <link href="/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <title>Store Pagseguro</title>

    <style>
        .credit-card{
            border: 1px solid #bbb;
        }
    </style>
</head>
<body>
    <header id="idHeader" class="row">
        <nav>
            <div class="nav-wrapper col s12 black accent-2">
                <a class="brand-logo deep-orange-text">Store</a>
                <ul class="right">
                    <li>
                        <a href="" class="orange-text">Minha conta</a>
                    </li>
                    <li>
                        <a href="" class="orange-text">Ajuda</a>
                    </li>
                    <li>
                        <a href="" class="orange-text">Sair</a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    {{--<h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>--}}
                </div>
            </div>
        </div>
        <div class="parallax">
            <img src="/img/pagseguro.png" alt="Unsplashed background img 3">
        </div>
    </div>

    <main>
        <section class="container">
            @yield('content')
        </section>
    </main>

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="/js/materialize.js"></script>
    <script src="/js/checkout/init.js"></script>
    <script src="/js/buscaCep.js"></script>
</body>
</html>
