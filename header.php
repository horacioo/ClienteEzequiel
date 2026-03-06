<!DOCTYPE html>

<html lang="pt-BR" itemscope itemtype="https://schema.org/WebSite">

<title> <?php bloginfo('name'); ?> </title>

<head>

    <!------------------------------------------------------------------------>
    <!-- Google tag (gtag.js) -->
    <!--<script async src="https://www.googletagmanager.com/gtag/js?id=AW-864773653"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-864773653');
</script>-->
    <!------------------------------------------------------------------------>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <?php

    ob_start();

    $path_corrigido = str_replace('\\', '/', get_template_directory());

    define('pasta', $path_corrigido);

    define("tema", get_theme_file_uri());




    ?>






    <script type="application/ld+json">
        {

            "@context": "https://schema.org",

            "@type": "Organization",

            "name": "planos de saude",

            "url": "planosdesaudedolitoral.com.br ",

            "logo": "planosdesaudedolitoral.com.br/img/logo.png",

            "contactPoint": {

                "@type": "ContactPoint",

                "telephone": "+55-13-99614-4791",

                "contactType": "Customer Service"

            },

            "address": {

                "@type": "PostalAddress",

                "streetAddress": "Av. Frei Gaspar, 943  - centro",

                "addressLocality": "São Vicente",

                "addressRegion": "SP",

                "postalCode": "11310-061",

                "addressCountry": "BR"

            }

        }
    </script>



    <?php echo get_template_part('fontes') ?>
    <link rel="preload" href="<?php echo tema; ?>/css/slick/slick.css" media="all">
    <link rel="alternate" hreflang="pt-br" href="<?php echo home_url(); ?>" />

    <!------------------------------------->
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <?php
    /*******************************************************/
    if (is_home()) {

        /*************************************/
        echo " <style>";
        echo file_get_contents(tema . "/styles/header.css");
        echo "</style>";
        /*************************************/

        echo "<link rel='preload' href='" . tema . "/styles/index.css' as='style' onload=\"this.rel='stylesheet'\">";
        echo "<noscript><link rel='stylesheet' href='" . tema . "/styles/index.css'></noscript>";
    }


    if (is_page('blog')) {
        echo " <style>";
        echo file_get_contents(tema . "/styles/blogHome.css");
        echo "</style>";
    }

    if (is_category()) {
        echo " <style>";
        echo file_get_contents(tema . "/styles/category.css");
        echo "</style>";
    }

    if (is_single()) {
        echo " <style>";
        echo file_get_contents(tema . "/styles/pageContent.css");
        echo "</style>";
    }

    ?>


















    <!----------description---------->
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <?php wp_head(); ?>




</head>



<body class='wrapper'>