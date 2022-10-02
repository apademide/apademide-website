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
/* Generated CSS rules c/o APADEMIDE */
<?php 
  $fontUrlFromCollection = function($files) {
    $result = '';
    foreach ($files as $file) {
      $result .= ' url('.$file->url().')';
      if ($files->last() !== $file) {
        $result .= ',';
      }
    }
    return $result;
  };
?>
@font-face {
  font-family: "A1273D";
  src:<?= $fontUrlFromCollection($site->assetsFontDefault()->toFiles()) ?>;
}
<?php
  // There may not be an emphasis font, so we prevent creating an empty @font-face
  $fontEmphasisUrls = $fontUrlFromCollection($site->assetsFontEmphasis()->toFiles());
  if($hasEmphasis = ($fontEmphasisUrls !== '')):
?>
@font-face {
  font-family: "A1273E";
  src: <?= $fontEmphasisUrls ?>;
}
<?php endif ?>
:root {
  --F-D: "A1273D", <?= $site->assetsFontDefaultFallback()->or("sans-serif") ?>;
  --F-D-feature-settings: <?= $site->assetsFontDefaultFeatureSettings()->or("unset") ?>;
  --F-D-variation-settings: <?= $site->assetsFontDefaultVariationSettings()->or("unset") ?>;
<?php
  // Set emphasis font settings depending on its state 
  if($hasEmphasis):
?>
  --F-E: "A1273E", <?= $site->assetsFontEmphasisFallback()->or("sans-serif") ?>;
  --F-E-feature-settings: <?= $site->assetsFontEmphasisFeatureSettings()->or("unset") ?>;
  --F-E-variation-settings: <?= $site->assetsFontEmphasisVariationSettings()->or("unset") ?>;
<?php endif ?>
<?php
  // Generates all color variables
  foreach($site->assetsColors()->yaml() as $color):
?>
  <?= '--C-'.$color['name'].': '.$color['color'].';'.PHP_EOL ?>
<?php endforeach ?>
}
html {
  font-family: var(--F-D);
  font-feature-settings: var(--F-D-feature-settings);
  font-variation-settings: var(--F-D-variation-settings);
}
<?php
  if($hasEmphasis):
?>
em {
  font-family: var(--F-E);
  font-feature-settings: var(--F-E-feature-settings);
  font-variation-settings: var(--F-E-variation-settings);
}
<?php endif ?>

  </style>

</head>
<body>
  <div id="app"></div>
  <script id="site-data" type="application/json"><?= \Kirby\Data\Json::encode(vueKit()->getSite()) ?></script>

</body>
</html>
