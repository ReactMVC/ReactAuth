<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/public/style.css">
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/mdb.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="text-center container mt-5">
        <h2>Hello <?= $name ?></h2>
        <h3>Your E-mail is: <?= $email ?></h3>
        <h3>You are an <?= $role ?></h3>
        <h3 class="text-primary"><a href="/logout">Logout</a></h3>
    </div>


    <script type="text/javascript" src="/public/main.js"></script>
    <script type="text/javascript" src="/public/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/public/js/mdb.min.js"></script>
</body>

</html>