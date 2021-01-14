<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This home template renders content from others pages, the children of
  the `photography` page to display a nice gallery grid.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>
  <?php
  /*
    We always use an if-statement to check if a page exists to
    prevent errors in case the page was deleted or renamed before
    we call a method like `children()` in this case
  */
  ?>
  <section>
      <h1 class="maisie-logo display"><?= $site->title() ?></h1>
    </section>
    <?php
    $navigation = $pages->find('navigation')
     ?>
    <?php
     $social = $pages->find('social')
    ?>

    <div class="contact-pop">
      <p class="inquiries"><?= $navigation->inquiries() ?></p>
      <h2 class="email"><?= $social->gmail() ?></h2>
      <p class="cta"><?= $navigation->mailing() ?></p>
      <form action="https://instagram.us4.list-manage.com/subscribe/post?u=44bf518154115ca62346857dd&amp;id=2b7ee32b07" target="_blank" method="post" id="subForm" class="sign-up">
        <input placeholder="Enter your email" id="fieldEmail" name="EMAIL" type="email" required class="email-input">
        <input type="submit" value="Submit" class="submit" name="" >
      </form>
      <div class="brandon-portfolio-wrap">Website by:
        <a class="brandon-portfolio" href="https://brandontong.info/" target="_blank">Brandon Tong</a></div>
    </div>

    <section class="news">
      <?php
      $items = $pages->find('news')->children()->listed()->sortBy('date', 'desc')
       ?>


      <?php foreach ($items as $item): ?>
        <?php if ($item->template() == 'song.release'): ?>
          <div class="news-story <?= $item->class() ?>">
            <h3 class="news-title"><?= $item->title() ?></h3>
            <h3 class="news-date"><?= $item->date()->toDate('M. j, Y') ?></h3>
            <div class="news-thumbnail">
              <a href="<?= $item->link() ?>">
                <img class="news-thumbnail-image" src="<?= $item->image()->url() ?>" alt="<?= $item->title() ?>">
              </a>
            </div>
            <div class="main-content">
              <h3 class="post-title"><?= $item->imageCaption()->kt() ?></h3>
            </div>
          </div>
        <?php elseif ($item->template() == 'video.post'): ?>
          <div class="news-story <?= $item->class() ?>">
            <h3 class="news-title"><?= $item->title() ?></h3>
            <h3 class="news-date"><?= $item->date()->toDate('M. j, Y') ?></h3>
            <div class="news-thumbnail">
              <iframe width="560" height="315" src="<?= $item->videolink() ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="main-content">
              <h3 class="post-title"><?= $item->imageCaption()->kt() ?></h3>
            </div>
          </div>
        <?php elseif ($item->template() == 'press.clip'): ?>
          <div class="news-story <?= $item->class() ?>">
            <h3 class="news-title"><?= $item->title() ?></h3>
            <h3 class="news-date"><?= $item->date()->toDate('M. j, Y') ?></h3>
            <div class="news-thumbnail">
              <a href="<?= $item->link() ?>">
                <img class="news-thumbnail-image" src="<?= $item->image()->url() ?>" alt="<?= $item->title() ?>">
              </a>
            </div>
            <div class="main-content">
              <h3 class="post-title"><a href="<?= $item->link() ?>" target="_blank"><?= $item->postTitle() ?></a></h3>
              <p class=""><?= $item->description()->kt() ?></p>
            </div>
          </div>
        <?php endif ?>
      <?php endforeach ?>

    </section>

    <div class="star star_1">
      <img src="home/star.png" onclick="event.preventDefault()">
    </div>

    <div class="star star_2">
      <img src="home/star.png" onclick="event.preventDefault()">
    </div>

    <div class="star star_3">
      <img src="home/star.png" onclick="event.preventDefault()">
    </div>

    <div class="star star_4">
      <img src="home/star.png" onclick="event.preventDefault()">
    </div>

    <div class="star star_5">
      <img src="home/star.png" onclick="event.preventDefault()">
    </div>

    <div class="star star_6">
      <img src="home/star.png" onclick="event.preventDefault()">
    </div>

    <div class="star star_7">
      <img src="home/star.png" onclick="event.preventDefault()">
    </div>

<?php snippet('footer') ?>
