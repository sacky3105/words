<?php

require_once __DIR__ . '/lib/escape.php';
require_once __DIR__ . '/lib/mysqli.php';

function listWords($link)
{
    $words = [];
    $sql = 'SELECT word, meaning, purpose, other FROM words;';
    $results = mysqli_query($link, $sql);

    while ($word = mysqli_fetch_assoc($results)) {
        $words[] = $word;
    }

    return $words;
}

$link = dbConnect();
$words = listWords($link);

$title = 'My英単語一覧';
$content = __DIR__ . '/views/index.php';
include __DIR__ . '/views/layout.php';
