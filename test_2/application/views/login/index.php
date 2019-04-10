<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>utenti</title>
</head>
<body>

<form action="index" method="POST">
    email:
    <input type="email" name="email">
    <br>

    password:
    <input type="password" name="password">

    <?php 
    if (strlen($error_message) > 0) {
        echo ("<br><span style='color:red;'>$error_message</span>");
    }
    ?>
    <br>
    <input type="submit">
</form>

</body>
</html>