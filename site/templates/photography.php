<?php

$data = [
  'title' => $page->title()->value(),
  'metaTitle' => $page->customTitle()->or($page->title() . ' – ' . $site->title())->value(),
  'children' => $page
    ->children()
    ->listed()
    ->map(fn ($album) => [
      'uri' => $album->uri(),
      'title' => $album->title()->value(),
      'cover' => ($image = $album->cover()->toFile()) ? [
        'url' => $image->crop(800, 1000)->url(),
        'urlHome' => $image->resize(1024, 1024)->url(),
        'alt' => $image->alt()->value()
      ] : null
    ])
    ->values(),
  // 'translations' => $site
  //   ->translations()
  //   ->map(fn ($translation) => [
  //     'url' => $page->urlForLanguage($translation->code()),
  //     'name' => t('switch', $kirby->language($translation->code())->name(), $translation->code()),
  //     // 'name' => t('switch', Str::upper($translation['code']), $translation['code']),
  //   ])->values()
  //   // array_map(
  //   //   fn ($translation) => 
  //   //     [
  //   //       'name' => t('switch', Str::upper($translation['code']), $translation['code']),
  //   //       'url' => '/' . $translation['code'] . '/' . $page->uri($translation['code'])
  //   //     ],  
  //   //   $page->translations()->toArray())
];

echo \Kirby\Data\Json::encode($data);
