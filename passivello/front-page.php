<?php
/**
 * The front page for our theme.
 *
 * Displays static front page
 *
 * @package passivello
 */
show_admin_bar(false);
?>
<!doctype html>
<!--[if !IE]>
<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>
<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>
<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>
<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="PoliEdro" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://poliedro-polimi.it" />
    <meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/inc/img/header-bg.jpg" />
    <meta property="og:description" content="<?php _e("PoliEdro is the student group in Politecnico di Milano interested in LGBTI+ people rights and issues. Visit our website to discover all our events!", "passivello"); ?>" />
    <meta name="theme-color" content="#E91E63">

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <meta name="description" content="<?php _e("The student group in Politecnico di Milano interested in LGBTI+ people rights and issues", "passivello");?>">
    <meta name="author" content="Davide Depau">

    <?php get_template_part("common", "structdata"); ?>
    <?php wp_head(); ?>

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <style>
        html{margin-top:0!important}* html body{margin-top:0!important}@media screen and (max-width:782px){html{margin-top:0!important}* html body{margin-top:0!important}}
    </style>
</head>

<body id="page-top" class="index">
    <?php get_template_part("section", "navigation"); ?>
    <?php get_template_part("section", "heading"); ?>

    <?php get_template_part("section", "chisiamo"); ?>
    <?php get_template_part("section", "social"); ?>
    <?php get_template_part("section", "eventi"); ?>
    <?php get_template_part("section", "articoli"); ?>
    <?php get_template_part("section", "storia"); ?>
    <?php get_template_part("section", "partners"); // not in navigation ?>
    <?php get_template_part("section", "contatti"); ?>

    <footer>
        <div class="container">
            <?php get_template_part("common", "footer"); ?>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>

</html>
