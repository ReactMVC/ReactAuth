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
  <?php load('layouts.dashboard.navbar'); ?>
  <!-- Header -->
  <header>
    <div class="p-5 text-center bg-image" style="
        height: 400px;
        overflow: hidden;
      ">
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
        <div class="d-flex justify-content-center align-items-center h-100">
          <div class="text-white">
            <h1 class="mb-2 mt-4">
              Dashboard
            </h1>
            <h4 class="mb-3">Manage your account here</h4>
            <button type="button" class="btn btn-outline-light btn-lg" data-mdb-toggle="modal" data-mdb-target="#edit" role="button">Edit Profile</button>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="text-center container mt-5 mb-5">
    <h2 class="mt-5">Hello
      <?= $name ?>
    </h2>
    <h3>Your E-mail is:
      <?= $email ?>
    </h3>
    <h3>You are an
      <?= $role ?>
    </h3>
    <h3 class="text-primary"><a href="/logout">Logout</a></h3>
  </div>

  <!-- Edit -->
  <div class="modal fade" id="edit" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1"
    aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editLabel">Update Profile</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="text-center mt-1 mb-1">
            <h3>Update Name and Email</h3>
          </div>
          <form method="post" id="profile" action="/dashboard">
            <div class="form-outline mb-4">
              <input type="text" name="name" class="form-control" value="<?= $name ?>" required />
              <label class="form-label">Name</label>
            </div>
            <div class="form-outline mb-4">
              <input type="email" name="email" class="form-control" value="<?= $email ?>" required />
              <label class="form-label">Email address</label>
            </div>
            <button type="submit" onclick="submitForm(event)" class="btn btn-primary btn-block mb-4">Update
              Profile</button>
          </form>
          <div class="text-center">
            <h3 id="edited" class="text-success" style="display: none;">Profile updated successfully.</h3>
            <h3 id="errorEdit" class="text-danger" style="display: none;">Please fill in all required
              fields.</h3>
            <h3 id="noSend" class="text-danger" style="display: none;">Request failed.</h3>
            <h3 id="userEmail" class="text-danger" style="display: none;">Please enter a valid email
              address.</h3>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <?php load('layouts.dashboard.footer'); ?>

  <script type="text/javascript" src="/public/update.js"></script>
  <script type="text/javascript" src="/public/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="/public/js/mdb.min.js"></script>
</body>

</html>