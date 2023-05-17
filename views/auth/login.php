<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $appName ?> - Login</title>
    <link rel="stylesheet" href="/public/style.css">
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/mdb.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
</head>

<body class="container">
    <div class="row mt-4 d-flex align-items-center">
        <div class="col-lg-6 col-md-12 col-sm-12 mb-3 mt-5">
            <div class="text-center">
                <h1>Login to <?= $appName ?></h1>
                <p class="mt-1">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati veritatis laudantium
                    alias adipisci. Quisquam ipsa consequatur, at magnam quas provident sint fugiat enim unde esse
                    debitis quaerat atque nesciunt. Hic.</p>
            </div>
            <?php if (!empty($error)): ?>
            <div class="mt-2 text-center">
                <ul>
                    <?php foreach ($error as $show_error): ?>
                    <p class="text-danger">
                        <?php echo $show_error; ?>
                    </p>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
            <form method="post" class="mt-2">
                <div class="form-outline mb-4">
                    <input type="email" name="email" class="form-control" required />
                    <label class="form-label">Email Address</label>
                </div>

                <div class="form-outline mb-4">
                    <input type="password" name="password" class="form-control" required />
                    <label class="form-label">Password</label>
                </div>

                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                <div class="text-center">
                    <p>Not a member? <a href="/register">Register</a></p>
                </div>
            </form>

        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 mb-3 mt-2">
            <img src="/public/images/login.svg" alt="login">
        </div>
    </div>


    <script type="text/javascript" src="/public/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/public/js/mdb.min.js"></script>
</body>

</html>