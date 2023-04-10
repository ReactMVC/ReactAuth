<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $style ?>">
    <title><?= $appName ?> - Register</title>
</head>

<body>
    <form method="post">
        <h2>Register to <?= $appName ?></h2>
        <?= $error ?>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Register">
        <h3>Do you have an account? <a href="/">Login</a></h3>
    </form>

</body>

</html>