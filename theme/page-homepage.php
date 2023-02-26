<?php /* Template Name: quivi_homepage */ ?>

<?php
$context          = Timber::context();
$timber_page     = new Timber\Post();
$templates        = array( 'index.twig' );

Timber::render( 'pages/homepage.twig', $context );
