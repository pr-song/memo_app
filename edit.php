<?php require("database/connection.php") ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メモ更新</title>
</head>
<body>
    <h2>メモ更新</h2>
    <?php
        $memo = $db->prepare('SELECT * FROM memos WHERE id=?');
        $memo->execute([$_REQUEST["id"]]);
        $memo = $memo->fetch();
    ?>
    <form action="handle_update.php" method="post">
        <input type="hidden" name="id" value="<?php print($memo["id"]); ?>">
        <textarea name="memo" cols="30" rows="10"><?php print($memo["memo"]); ?></textarea><br>
        <button type="submit">更新する</button>
    </form>
    <a href="index.php">戻り</a>
</body>
</html>