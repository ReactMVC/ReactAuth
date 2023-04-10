<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $style ?>">
    <title><?= $appName ?> - Login</title>
</head>

<body>
    <form method="post">
        <h2>Login to <?= $appName ?></h2>
        <?= $error ?>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Login">
        <h3>Don't have an account? <a href="/register">Register</a></h3>
    </form>
</body>

</html>