<?php

require_once __DIR__ . '/lib/mysqli.php';

function dbConnect($link){
  $dropTableSql = 'DROP TABLE IF EXISTS companies';
  $result = mysqli_query($link, $dropTableSql);
  $result = mysqli_query($link, $dropTableSql);

  if (!$result) {
    echo 'Error: データベースに接続できませんでした' . PHP_EOL;
    echo 'Debugging Error:' . mysqli_connect_error() . PHP_EOL;
    exit;
  }

  return $result;
}

function dropTable($link){
  $dropTableSql = 'DROP TABLE IF EXISTS words;';
  $result = mysqli_query($link, $dropTableSql);
  if ($result) {
    echo 'テーブルを削除しました' . PHP_EOL;
  } else {
    echo 'Error: テーブルの削除に失敗しました' . PHP_EOL;
    echo  'Debugging Error: ' . mysqli_error($link) . PHP_EOL;
  }
}

function createTable($link){
  $createTableSql = <<<EOT
  CREATE TABLE words (
  id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  word VARCHAR(255),
  meaning VARCHAR(500),
  purpose VARCHAR(800),
  other VARCHAR(1200),
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARACTER SET=utf8mb4;
EOT;
  $result = mysqli_query($link, $createTableSql);
  if ($result) {
    echo 'テーブルを作成しました' . PHP_EOL;
  } else {
    echo 'Error: テーブルの作成に失敗しました' . PHP_EOL;
    echo  'Debugging Error: ' . mysqli_error($link) . PHP_EOL;
  }
}

$link = dbConnect();
DropTable($link);
createTable($link);
mysqli_close($link);
