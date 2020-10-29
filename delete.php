<?php require("database/connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メモ削除</title>
</head>
<body>
    <?php
    if (isset($_REQUEST["id"]) && is_numeric($_REQUEST["id"])):
        $statement = $db->prepare("DELETE FROM memos WHERE id=?");
        $statement->execute([$_REQUEST["id"]]); 
    ?>
    <p>メモを削除しました</p>
    <a href="index.php">戻り</a>
    <?php else: ?>
    <p>エラーが発生しました。もう一度試してください！</p>
    <a href="index.php">戻り</a>
    <?php endif; ?>
</body>
</html>