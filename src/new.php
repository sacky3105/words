<?php

$word =[
    'word' => '',
    'meaning' => '',
    'purpose' => '',
    'other' => ''
];

$errors = [];

$title = 'プログラミング My英単語の登録';
$content = __DIR__ . '/views/new.php';
include __DIR__ . '/views/layout.php';
