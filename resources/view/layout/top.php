<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= URL ?>/app.css">
  <title>
    <?= $title ?? 'No title' ?>
  </title>
</head>

<body>
  <nav class="navbar navbar-expand-lg menu">
    <div class="container-fluid">
      <a class="navbar-brand">U3 Bank</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="<?= URL . '/' ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= URL . '/acc' ?>">Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= URL . '/create' ?>">Open New Account</a>
          </li>
        </ul>
        <a class="btn btn-outline-success">Login</a>
      </div>
    </div>
  </nav>