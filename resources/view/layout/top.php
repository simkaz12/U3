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
  <?php require __DIR__ . '/msg.php' ?>
  <?php if (!isset($showNav) || $showNav): ?>
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
          <?php if (null === $user): ?>
            <a class="btn btn-outline-success" href="<?= URL . '/login' ?>">Login</a>
          <?php else: ?>
            <form method="POST" action="<?= URL . '/logout' ?>">
              <button type="submit" class="btn btn-outline-success" href="<?= URL . '/logout' ?>">Logout</button>
            </form>
          <?php endif ?>
        </div>
      </div>
    </nav>
  <?php endif ?>