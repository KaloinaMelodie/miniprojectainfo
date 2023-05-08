<?php 
    use App\Models\Categorie;
    $categorie = new Categorie(); 
    $listcategorie = $categorie->all();    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    
    <meta content="@yield('metadescri')" name="description">
    <meta content="" name="keywords">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="{{url('assetsFO/css/bootstrap.min.css')}}" />

    <link rel="stylesheet" href="{{url('assetsFO/css/font-awesome.min.css')}}">

    <link type="text/css" rel="stylesheet" href="{{url('assetsFO/css/style.css')}}" />


    <script
        nonce="912cb391-5fcb-4593-b960-95047347a545">(function (w, d) { !function (dk, dl, dm, dn) { dk[dm] = dk[dm] || {}; dk[dm].executed = []; dk.zaraz = { deferred: [], listeners: [] }; dk.zaraz.q = []; dk.zaraz._f = function (dp) { return function () { var dq = Array.prototype.slice.call(arguments); dk.zaraz.q.push({ m: dp, a: dq }) } }; for (const dr of ["track", "set", "debug"]) dk.zaraz[dr] = dk.zaraz._f(dr); dk.zaraz.init = () => { var ds = dl.getElementsByTagName(dn)[0], dt = dl.createElement(dn), du = dl.getElementsByTagName("title")[0]; du && (dk[dm].t = dl.getElementsByTagName("title")[0].text); dk[dm].x = Math.random(); dk[dm].w = dk.screen.width; dk[dm].h = dk.screen.height; dk[dm].j = dk.innerHeight; dk[dm].e = dk.innerWidth; dk[dm].l = dk.location.href; dk[dm].r = dl.referrer; dk[dm].k = dk.screen.colorDepth; dk[dm].n = dl.characterSet; dk[dm].o = (new Date).getTimezoneOffset(); if (dk.dataLayer) for (const dy of Object.entries(Object.entries(dataLayer).reduce(((dz, dA) => ({ ...dz[1], ...dA[1] }))))) zaraz.set(dy[0], dy[1], { scope: "page" }); dk[dm].q = []; for (; dk.zaraz.q.length;) { const dB = dk.zaraz.q.shift(); dk[dm].q.push(dB) } dt.defer = !0; for (const dC of [localStorage, sessionStorage]) Object.keys(dC || {}).filter((dE => dE.startsWith("_zaraz_"))).forEach((dD => { try { dk[dm]["z_" + dD.slice(7)] = JSON.parse(dC.getItem(dD)) } catch { dk[dm]["z_" + dD.slice(7)] = dC.getItem(dD) } })); dt.referrerPolicy = "origin"; dt.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(dk[dm]))); ds.parentNode.insertBefore(dt, ds) };["complete", "interactive"].includes(dl.readyState) ? zaraz.init() : dk.addEventListener("DOMContentLoaded", zaraz.init) }(w, d, "zarazData", "script"); })(window, document);</script>
</head>

<body>

    <header id="header">

        <div id="nav">

            <div id="nav-top">
                <div class="container">
                    <div class="nav-logo">
                        <a href="#" title="Ainfo" class="logo"><img src="{{asset('vendor/assetsFO/img/logo.png')}}" width="200px" height="100px" alt=""></a>
                    </div>


                    <div class="nav-btns">
                        <button class="aside-btn" aria-label="Menu"><i class="fa fa-bars"></i></button>
                        <!-- <button class="search-btn"><i class="fa fa-search"></i></button> -->
                        <!-- <div id="nav-search">
                            <form>
                                <input class="input" name="search" placeholder="Enter your search...">
                            </form>
                            <button class="nav-close search-close">
                                <span></span>
                            </button>
                        </div> -->
                    </div>

                </div>
            </div>


            <div id="nav-bottom">
                <div class="container">
                    <ul class="nav-menu">
                        <li><a href="/">Home</a></li>
                        <li class="has-dropdown">
                            <a href="#">Categorie</a>
                            <div class="dropdown">
                                <div class="dropdown-body">
                                    <ul class="dropdown-list">
                                        @foreach($listcategorie as $catego)
                                        <li><a href="/categorie-{{$catego->idcategorie}}/{{Str::slug($catego->categorie) }}">{{$catego->categorie}}</a></li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </li>

                    </ul>

                </div>
            </div>


            <div id="nav-aside">
                <ul class="nav-aside-menu">
                    <li><a href="/">Home</a></li>
                    <li class="has-dropdown"><a>Categories</a>
                        <ul class="dropdown">
                            @foreach($listcategorie as $catego)
                                <li><a href="/categorie-{{$catego->idcategorie}}/{{Str::slug($catego->categorie) }}">{{$catego->categorie}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                <button class="nav-close nav-aside-close"><span></span></button>
            </div>

        </div>

    </header>

    @yield('content')

    <footer id="footer">

        <div class="container">

            <div class="row">
                <div class="footer-widget">
                    <div class="col-md-6">
                        <div class="footer-logo">
                            <a href="#" class="logo" title="Ainfo"><img src="{{asset('vendor/assetsFO/img/logo-alt.png')}}" alt="" height="200"
                                    width="300"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3>A propos de nous</h3>
                        <p>Ainfo est un portail indépendant dédié à l'intelligence artificielle. Nous fournissons
                            des articles, des tutoriels destinés aux étudiants, professionnels et passionnés d'IA.
                        </p>
                    </div>


                </div>


            </div>
        </div>


    </footer>


    <script src="{{url('assetsFO/js/jquery.min.js')}}"></script>
    <script src="{{url('assetsFO/js/bootstrap.min.js')}}"></script>
    <script src="{{url('assetsFO/js/jquery.stellar.min.js')}}"></script>
    <script src="{{url('assetsFO/js/main.js')}}"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816"
        integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw=="
        data-cf-beacon='{"rayId":"7c31f20a7c151850","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}'
        crossorigin="anonymous"></script>
</body>

</html>