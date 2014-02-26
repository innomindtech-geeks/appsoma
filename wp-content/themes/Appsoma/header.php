<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Appsoma</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
         <link rel="icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:300,600,200|Signika:300,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap-theme.min.css">
        <link href="<?php blogInfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/slicknav.css">

        <script src="<?php bloginfo('template_url'); ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <?php wp_head();?>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
       <div id="headerWrap">
        <header id="mastHead">
            <figure class="logo">
              <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Home' ) ) );?>"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt=""></a>
            </figure>  
             
           
            <?php get_template_part('nav'); ?>
        </header>
       </div>