<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"><!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>MyGold.am</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="/css/normalize.css">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/jquery.fancybox-1.3.4.css" />
        <link rel="stylesheet" href="/css/desktop.css" media="all and (min-width: 1501px)" />
        <link rel="stylesheet" href="/css/tablet.css" media="all and (min-width: 650px) and (max-width: 1500px)" />
        <link rel="stylesheet" href="/css/phone.css" media="all and (max-width: 649px)" />

        <script src="/js/plugins/modernizr-2.6.1.min.js"></script>
    </head>

    <body>        
        <script src="/js/plugins/jquery-1.8.0.min.js"></script>
        <script src="/js/plugins/jquery.isotope.min.js"></script>
        <script src="/js/plugins/jquery.debouncedresize.min.js"></script>
        <script src="/js/plugins/jquery.easing.1.3.js"></script>
        <script src="/js/plugins/jquery.fancybox-1.3.4.pack.js"></script>
        <script src="/js/plugins/jquery.mousewheel-3.0.4.pack.js"></script>
        <script src="/js/plugins/respond.min.js"></script>
        <script src="/js/plugins/css3-mediaqueries.js"></script>
        <script src="/js/custom.js"></script>
        <?php echo $this->element('sidebar'); ?>
        <?php echo $this->fetch('content'); ?>
             
    </body>
</html>
