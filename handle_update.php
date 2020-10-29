<?php require("database/connection.php"); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メモ更新</title>
</head>
<body>
    <?php
        $statement = $db->prepare('UPDATE memos SET memo=? WHERE id=?');
        $statement->execute([$_REQUEST["memo"], $_REQUEST["id"]]);
    ?>
    <p>更新されました！</p>
    <a href="index.php">戻り</a>
</body>
</html>