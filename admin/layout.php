<!DOCTYPE html>
<html>
    <head>
        <title><?=$title;?></title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <header>
            <a href="add.php">add new page</a>
            <a href="index.php"> edit pages</a>
        </header>
        <main>
            <?php include 'elems/info.php';?>
            <?=$content;?>
        </main>
        <footer><?php include '../elems/footer.php'?></footer>
    </body>
</html>
