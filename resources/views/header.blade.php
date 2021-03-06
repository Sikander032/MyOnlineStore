    <head>
        <meta charset="utf-8">
        <title>{{env('APP_NAME')}}</title>
        <!-- SEO Meta Tags-->
        <meta name="description" content="OnlineStore -E-commerce">
        <meta name="keywords" content="bootstrap, shop, e-commerce, market">
        <meta name="author" content="My Online Store">
        <!-- Viewport-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon and Touch Icons-->
        <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
        <link rel="manifest" href="site.webmanifest">
        <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">
        <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
        <link rel="stylesheet"  href="{{asset('vendor/simplebar/dist/simplebar.min.css')}}"/>
        <link rel="stylesheet"  href="{{asset('vendor/tiny-slider/dist/tiny-slider.css')}}"/>
        <link rel="stylesheet"  href="{{asset('vendor/drift-zoom/dist/drift-basic.min.css')}}"/>
        <!-- Main Theme Styles + Bootstrap-->
        <link rel="stylesheet"  href="{{asset('assets/css/theme.min.css')}}">
        <input type="hidden" id="app_url" @isset($app_url) value="{{$app_url}}" @endisset/>
        <!-- Google Tag Manager-->
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-WKV3GT5');
        </script>
    </head>


