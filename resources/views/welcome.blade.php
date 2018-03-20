<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Pricing example for Bootstrap</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <link href="{{ asset('css/pricing.css') }}" rel="stylesheet">
    </head>

    <body>

        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
            <h5 class="my-0 mr-md-auto font-weight-normal">Styde</h5>
            <a class="btn btn-outline-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>
        </div>

        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Inscríbete hoy</h1>
        </div>

        <div class="container">
            <div class="card-deck mb-3 text-center">
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">
                            Plan Anual
                            <strike>149 USD</strike>
                        </h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">
                            8<sup>25</sup>
                            <small class="text-muted">$/Mes</small>
                        </h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Un solo pago de 99 USD</li>
                            <li>Acceso por un año</li>
                        </ul>
                        <a class="btn btn-primary btn-lg btn-block" href="https://styde.net/registro/?level=2">Plan Anual</a>
                    </div>
                </div>
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">
                            Plan Semestral
                            <strike>79 USD</strike>
                        </h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">
                            9<sup>95</sup>
                            <small class="text-muted">$/mes</small>
                        </h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Un solo pago de 59.70 USD</li>
                            <li>Acceso por sesi meses</li>
                        </ul>
                        {{--<button type="button" class="btn btn-lg btn-block btn-primary">Plan Semestral</button>--}}
                        <a class="btn btn-primary btn-lg btn-block" href="https://styde.net/registro/?level=11">Plan Semestral</a>
                    </div>
                </div>
            </div>

            <footer class="pt-4 my-md-5 pt-md-5 border-top">
                <div class="row">
                    <div class="col-12 col-md">
                        <img class="mb-2" src="{{ asset('images/styde.png') }}" alt=""
                             width="24" height="24">
                        <small class="d-block mb-3 text-muted">&copy; 2018</small>
                    </div>
                </div>
            </footer>
        </div>


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    </body>
</html>
