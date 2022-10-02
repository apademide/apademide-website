<?php
/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Page $page */
?>
<!DOCTYPE html>
<html lang="<?= $kirby->languageCode() ?? 'fr' ?>">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= $page->customTitle()->or($page->title() . ' – ' . $site->title()) ?></title>

  <?php /* See https://github.com/johannschopplich/kirby-extended/blob/main/docs/meta.md */ ?>
  <?php $meta = $page->meta() ?>
  <?= $meta->robots() ?>
  <?= $meta->jsonld() ?>
  <?= $meta->social() ?>

  <meta name="theme-color" content="#41b883">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <meta name="apple-mobile-web-app-title" content="<?= $site->title() ?>">

  <link rel="manifest" href="/manifest.json">
  <link rel="icon" href="/img/favicon.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="/img/apple-touch-icon.png" sizes="180x180">

  <?= vueKit()->preloadJson($page->uri()) ?>
  <?= vueKit()->preloadModule($page->intendedTemplate()->name()) ?>

  <?= vueKit()->js() ?>
  <?= vueKit()->css() ?>

  <style>
    @font-face {
      font-family: "A1273D";
      src: url(<?= $site->assetsFontDefault()->toFile()->url() ?? '' ?>);
    }
    <?php if( $font = $site->assetsFontEmphasis()->toFile() ?? false ): ?>
    @font-face {
      font-family: "A1273E";
      src: url(<?= $font->url() ?>);
    }
    <?php endif ?>
    :root {
      --F-D: "A1273D", "Alpaga VAR", "Alpaga", Menlo, Helvetica, monospace;
      --F-E: "A1273E", "Atacama VAR", "Atacama", "Times New Roman", Times, serif;
      font-family: var(--F-D);
      /* font-family: "A1273D", fantasy; */
    }
  </style>

</head>
<body>

  <div id="app"></div>
  <script id="site-data" type="application/json"><?= \Kirby\Data\Json::encode(vueKit()->getSite()) ?></script>

</body>
</html>
