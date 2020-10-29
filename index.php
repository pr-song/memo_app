<?php require("database/connection.php"); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メモアプリ</title>
</head>
<body>
    <h2>新しいメモ作成</h2>
    <form action="handle_create.php" method="post">
        <textarea name="memo" id="memo" cols="30" rows="10" placeholder="入力してください..."></textarea><br>
        <button type="submit">登録する</button>
    </form>
    
    <h2>全てのメモ</h2>

    <!-- Get total pages -->
    <?php
        $records = $db->query('SELECT COUNT(*) as records FROM memos');
        $records = $records->fetch();
        $total_pages = ceil($records["records"]/5);
    ?>

    <!-- Check if page number is valid -->
    <?php
        if (isset($_REQUEST["page"]) && is_numeric($_REQUEST["page"]) && $_REQUEST["page"] > 0)
        {
            $pages = $_REQUEST["page"];
        }
        else
        {
            $pages = 1;
        }

        $start = ($pages - 1)*5;

        $memos = $db->prepare('SELECT * FROM memos ORDER BY id DESC LIMIT ?, 5');
        $memos->bindParam(1, $start, PDO::PARAM_INT);
        $memos->execute();
    ?>

    <article>
        <?php while($memo = $memos->fetch()): ?>
            <p>
                <span><?php print($memo["memo"]); ?></span>
                |
                <a href="edit.php?id=<?php print($memo["id"]); ?>">更新</a>
                |
                <a href="delete.php?id=<?php print($memo["id"]); ?>">削除</a>
            <p>
            <time><?php print($memo["created_at"]); ?></time>
            <hr>
        <?php endwhile; ?>

        <!-- Show previous page button -->
        <?php if (($pages-1) > 0): ?>
            < <a href="index.php?page=<?php print($pages-1); ?>"><?php print($pages-1); ?> ページへ</a>&nbsp;&nbsp;
        <?php endif; ?>

        <!-- Show next page button -->
        <?php if ($pages < $total_pages): ?>
            <a href="index.php?page=<?php print($pages+1); ?>"><?php print($pages+1); ?> ページへ</a> >
        <?php endif; ?>
    </article>
</body>
</html>