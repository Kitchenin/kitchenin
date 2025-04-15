<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Kitchenin</title>
    <base href="/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-sham.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/es5-shim/4.5.12/es5-sham.min.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="XzGGU1vsVn94cuhnQ5-AM1Fb8Lehkb38VR0CN57voXU">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#de3333">
    <meta name="apple-mobile-web-app-title" content="KitchenIN">
    <meta name="application-name" content="KitchenIN">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!--/favicon -->

    <!-- og-->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://kitchenin.co.uk/" />
    <meta property="og:title" content="Kitchenin" />
    <meta property="og:description" content="Everything you need for your dream kitchen: kitchen doors, kitchen units, essential components and accessories." />
    <meta property="og:image" content="https://kitchenin.co.uk/images/static/logo.png" />
    <meta property="og:image:height" content="128" />
    <meta property="og:image:width" content="479" />
    <!--/og-->



    <!-- TrustBox script -->
    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
    <!-- End Trustbox script -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-126185415-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-126185415-1');
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MH672XR');</script>
    <!-- End Google Tag Manager -->

    <!-- Global site tag (gtag.js) - Google Ads: 786681272 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-786681272"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-786681272');
    </script>

    <!-- Event snippet for Purchase-Sale conversion page -->
    <script>
        gtag('event', 'conversion', {
            'send_to': 'AW-786681272/rJNFCMq34ZABELibj_cC',
            'transaction_id': ''
        });
    </script>

    <!-- User Heat Tag -->
    <script type="text/javascript">
    (function(add, cla){window['UserHeatTag']=cla;window[cla]=window[cla]||function(){(window[cla].q=window[cla].q||[]).push(arguments)},window[cla].l=1*new Date();var ul=document.createElement('script');var tag = document.getElementsByTagName('script')[0];ul.async=1;ul.src=add;tag.parentNode.insertBefore(ul,tag);})('//uh.nakanohito.jp/uhj2/uh.js', '_uhtracker');_uhtracker({id:'uh5GOBRrHe'});
    </script>
    <!-- End User Heat Tag -->

    <meta name="fragment" content="!">

<link rel="stylesheet" href="styles.e3f32a2f613346e8d067.css"></head>
<body>
<app-root></app-root>


<script type="text/javascript">
    //@if (\Auth::check())

    window.isLoggedIn = true;
    //@endif

    window.stripeKey = '{{ $stripeKey }}';
    window.paypalEnv = '{{ $paypal["env"] }}';
    window.paypalKey = '{{ $paypal["key"] }}';
</script>

<script src="//code.tidio.co/1ye23kyqlvoawp3z7nl28gfazzvcnftl.js"> </script>

<script type="text/javascript" src="runtime.a66f828dca56eeb90e02.js"></script><script type="text/javascript" src="polyfills.2feb438b7c42acbb610d.js"></script><script type="text/javascript" src="scripts.60cbfd9c0784025f131a.js"></script><script type="text/javascript" src="main.ec6524f2f3cc4548f921.js"></script></body>
</html>
