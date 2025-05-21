<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Replacement Kitchen Doors Company | Replacement Drawer Fronts')</title>
    <base href="/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="XzGGU1vsVn94cuhnQ5-AM1Fb8Lehkb38VR0CN57voXU">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
{{--    <meta name="description" content="Tired of your old Kitchen? Why don't you check out our replacement Kitchen Door Designs from £5.59 and discover your desired look! Order online and Get Free Delivery!">--}}
{{--    <meta property="og:type" content="website">--}}
{{--    <meta property="og:url" content="https://kitchenin.co.uk/">--}}
{{--    <meta property="og:title" content="Replacement Kitchen Doors Company | Replacement Drawer Fronts">--}}
{{--    <meta property="og:description" content="Tired of your old Kitchen? Why don't you check out our replacement Kitchen Door Designs from £5.59 and discover your desired look! Order online and Get Free Delivery!">--}}
{{--    <meta property="og:image" content="https://kitchenin.co.uk/images/static/slider/jayline-gloss-white-handleless.jpg">--}}
{{--    <meta name="theme-color" content="#ffffff">--}}
{{--    <meta name="application-name" content="KitchenIN">--}}
{{--    <meta name="apple-mobile-web-app-title" content="KitchenIN">--}}
{{--    <meta name="msapplication-TileColor" content="#ffffff">--}}
{{--    <meta name="fragment" content="!">--}}


{{--    <link rel="canonical" href="https://kitchenin.co.uk/">--}}

{{--    <base href="/">--}}

{{--    <!-- Favicons -->--}}
{{--    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">--}}
{{--    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">--}}
{{--    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">--}}
{{--    <link rel="manifest" href="/site.webmanifest">--}}
{{--    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#de3333">--}}

{{--    <!-- Fonts & Styles -->--}}
{{--    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}

{{--    <!-- Google Analytics & Ads -->--}}
{{--    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-126185415-1"></script>--}}
{{--    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-786681272"></script>--}}
{{--    <script>--}}
{{--        window.dataLayer = window.dataLayer || [];--}}
{{--        function gtag(){dataLayer.push(arguments);}--}}
{{--        gtag('js', new Date());--}}
{{--        gtag('config', 'UA-126185415-1');--}}
{{--        gtag('config', 'AW-786681272');--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        gtag('event', 'conversion', {--}}
{{--            'send_to': 'AW-786681272/rJNFCMq34ZABELibj_cC',--}}
{{--            'transaction_id': ''--}}
{{--        });--}}
{{--    </script>--}}

{{--    <!-- Google Tag Manager -->--}}
{{--    <script>--}}
{{--        (function(w,d,s,l,i){--}}
{{--            w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});--}}
{{--            var f=d.getElementsByTagName(s)[0],--}}
{{--                j=d.createElement(s), dl=l!='dataLayer'?'&l='+l:'';--}}
{{--            j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;--}}
{{--            f.parentNode.insertBefore(j,f);--}}
{{--        })(window,document,'script','dataLayer','GTM-MH672XR');--}}
{{--    </script>--}}

{{--    <!-- PayPal & Stripe -->--}}
{{--    <script src="https://www.paypalobjects.com/api/checkout.js"></script>--}}
{{--    <script async id="xo-pptm" src="https://www.paypal.com/tagmanager/pptm.js?id=kitchenin.co.uk&source=checkoutjs&t=xo&v=4.0.342"></script>--}}
{{--    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>--}}

{{--    <!-- Trustpilot -->--}}
{{--    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>--}}

{{--    <!-- User Heat Tracking -->--}}
{{--    <script type="text/javascript">--}}
{{--        (function(add, cla){--}}
{{--            window['UserHeatTag']=cla;--}}
{{--            window[cla]=window[cla]||function(){(window[cla].q=window[cla].q||[]).push(arguments)};--}}
{{--            window[cla].l=1*new Date();--}}
{{--            var ul=document.createElement('script');--}}
{{--            var tag = document.getElementsByTagName('script')[0];--}}
{{--            ul.async=1;ul.src=add;--}}
{{--            tag.parentNode.insertBefore(ul,tag);--}}
{{--        })('//uh.nakanohito.jp/uhj2/uh.js', '_uhtracker');--}}
{{--        _uhtracker({id:'uh5GOBRrHe'});--}}
{{--    </script>--}}

{{--    @stack('head')--}}
</head>
<body>
{{--    <!-- Google Tag Manager (noscript) -->--}}
{{--    <noscript>--}}
{{--        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MH672XR" height="0" width="0" style="display:none;visibility:hidden"></iframe>--}}
{{--    </noscript>--}}

    @include('partials.header')

    <main class="container mx-auto py-4">
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
