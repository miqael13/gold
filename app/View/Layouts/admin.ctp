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
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/bootstrap.css">
        <link rel="stylesheet" href="/css/jquery.jgrowl.css">
        <script src="/js/plugins/jquery-1.8.0.min.js"></script>
        <script src="/js/jquery.jgrowl.js"></script>
    </head>

    <body>        
        <?php echo $this->element('noteJg'); ?>
        <?php echo $this->fetch('content'); ?>
             
    </body>
</html>
