<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This header snippet is reused in all templates.
  It fetches information from the `site.txt` content file
  and contains the site navigation.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="icon" href="">

  <?php
  /*
    In the title tag we show the title of our
    site and the title of the current page
  */
  ?>
  <title><?= $site->title() ?></title>

  <?php
  /*
    Stylesheets can be included using the `css()` helper.
    Kirby also provides the `js()` helper to include script file.
    More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers
  */
  ?>
  <?= css([
    'assets/css/base.css',
    'assets/css/style.css',
    'https://use.typekit.net/ixw0zdv.css',
    '@auto'
  ]) ?>
  <?= js([
    'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.1.1/gsap.min.js',
    'assets/js/three.min.js'
  ]) ?>

  <?php
  /*
    The `url()` helper is a great way to create reliable
    absolute URLs in Kirby that always start with the
    base URL of your site.
  */
  ?>
</head>
<body>
  <?php
  $navigation = $pages->find('navigation')
   ?>
  <header class="section-pad">
      <div class="header-wrap">
        <a class="home-button underline" href="">home</a>
        <a class="music-button" href="<?= $navigation->musiclink() ?>" target="_blank">music</a>
        <a class="news-button">news</a>
        <!-- <a class="tour-button">tour</a> -->
        <a class="contact-button">contact</a>
        <a class="merch-button" href="<?= $navigation->merchlink() ?>" target="_blank">merch</a>
      </div>
    </header>

  <main class="main">
