<?php
include "./function.php";

$dt = new main();
$item = $dt->allTodo();

if (isset($_POST["text"])) {
    $dt->newTodo($_POST["text"]);
}

if (isset($_POST["delete"])) {
    $dt->deleteTodo($_POST["id"]);
}

if (isset($_POST["edit"])) {
    $dt->updateTodo($_POST["name"], $_POST["id"]);
}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/index.css">
</head>

<body>
    <div class="container">
        <form class="form" method="POST">
            <input placeholder="New todo" type="text" name="text">
            <button type="submit">Add</button>
        </form>
        <ul class="list">
            <?php
            foreach ($item as $value) {
            ?>
                <li>
                    <form method="POST">
                        <input class="input" readonly name="name" value="<?= $value["text"] ?>" type="text">
                        <div class="buttons">
                            <div>
                                <input type="hidden" name="id" value="<?= $value["id"] ?>">
                                <button name="delete" type="submit"><i class="fa-solid fa-trash"></i></button>
                            </div>
                            <div>
                                <input type="hidden" name="id" value="<?= $value["id"] ?>">
                                <span class="editBtn" type="submit"><i class="fa-solid fa-pen"></i></span>
                                <button hidden class="ok" name="edit" type="submit"><i class="fa-solid fa-check"></i></button>
                            </div>
                        </div>
                    </form>
                </li>
            <?php
            } ?>
        </ul>
    </div>
    <script src="./script.js"></script>
</body>

</html>