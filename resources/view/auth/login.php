<div class="bin">
    <h1>Login</h1>
    <form class="row g-3" method="POST" action="<?= URL . '/login' ?>">
        <div class="col-md-6">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" id="email" value="<?= old('email') ?>">
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Login</button>
            <a class="btn btn-outline-secondary" href="<?= URL . '/' ?>">Cancel</a>
        </div>
    </form>
</div>