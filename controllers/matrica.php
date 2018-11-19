<?php

$page['title'] = 'Kiausai!';
$page['show_footer'] = true;
$page['show_header'] = true;

$page['content']['title'] = 'MATRICA';
$page['content']['subtitle'] = 'Subtitle';
$grid = [];
$grid_class = [
    'facebook-logo',
    'twitter-logo',
    'youtube-logo',
    'pornhub-logo'
];
for ($i = 1; $i <= 14; $i++) {
    $image = array_rand($grid_class);
    $grid[] = [
        'class' => $grid_class[$image],
    ];
}
$page['content']['grid'] = $grid;
$page['content']['rendered'] = render_page($page, 'page-matrica');
