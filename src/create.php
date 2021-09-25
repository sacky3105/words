<?php

require_once __DIR__ . '/lib/mysqli.php';

function createWord($link, $word){
    $sql = <<<EOT
INSERT INTO words(
    word,
    meaning,
    purpose,
    other
) VALUES (
    "{$word['word']}",
    "{$word['meaning']}",
    "{$word['purpose']}",
    "{$word['other']}"
)
EOT;
    $result = mysqli_query($link, $sql);
    if ($result) {
        echo 'データを登録しました' . PHP_EOL;
    } else {
        echo 'Error: データの追加に失敗しました' . PHP_EOL;
        error_log('Debugging Error: ' . mysqli_error($link));
    }
}

function validate($word){
    $errors = [];

    if(strlen($word)){
        $errors['word'] = '英単語を入力して下さい。';
    } elseif (strlen($word['word'] > 255)){
        $errors['word'] = '英単語は255文字以内で入力してください。';
    }

    if (strlen($word)) {
        $errors['meaning'] = '意味を入力して下さい。';
    } elseif (strlen($word['meaning'] > 500)) {
        $errors['meaning'] = '意味は500文字以内で入力してください。';
    }

    if (strlen($word)) {
        $errors['purpose'] = '使用用途を入力して下さい。';
    } elseif (strlen($word['purpose'] > 800)) {
        $errors['purpose'] = '使用用途は800文字以内で入力してください。';
    }

    if (strlen($word)) {
        $errors['other'] = '英単語を入力して下さい。';
    } elseif (strlen($word['other'] > 1200)) {
        $errors['other'] = '英単語は1200文字以内で入力してください。';
    }

    return $errors;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $word = [
        'word' => $_POST['word'],
        'meaning' => $_POST['meaning'],
        'purpose' => $_POST['purpose'],
        'other' => $_POST['other']
    ];
//バリデーションする
$errors = validate($word);
if(!count($errors)){
    $link = dbConnect();
    createWord($link, $word);
    mysqli_close($link);
    header("Location: index.php");
}
}

include 'views/new.php';
