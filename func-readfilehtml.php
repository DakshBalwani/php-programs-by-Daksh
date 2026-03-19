<!DOCTYPE html>
<html>
<body>
<h1>Write and read file</h1>

<form method="post">
    <textarea name="content" rows="6" cols="40"><?php
        if (!empty($_POST['content'])) {
            echo htmlspecialchars($_POST['content']);
        }
    ?></textarea><br>
    <button type="submit">Save</button>
</form>

<?php
if (!empty($_POST['content'])) {
    // append to file rather than overwrite
    file_put_contents('example.txt', $_POST['content'] . "\n", FILE_APPEND);
    echo '<p>Data appended to example.txt</p>';
}

if (file_exists('example.txt')) {
    echo '<h2>Contents of file:</h2>';
    echo nl2br(htmlspecialchars(file_get_contents('example.txt')));
}
?>

</body>
</html>