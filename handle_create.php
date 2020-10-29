<?php require("database/connection.php"); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新しいメモ</title>
</head>
<body>
    <?php
    if (strlen($_POST["memo"])):
        $statement = $db->prepare('INSERT INTO memos VALUES(NULL, ?, NOW())');
        $statement->execute([$_POST["memo"]]);  
    ?>
        <h2><?php print($_POST["memo"]); ?></h2>
        <p>新しいメモが作成されました！</p>
        <a href="index.php">戻り</a>
    <?php else: ?>
        <p>内容を入力してください！</p>
        <a href="index.php">戻り</a>
    <?php endif; ?>
</body>
</html>
