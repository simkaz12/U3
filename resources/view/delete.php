<div class="bin confirm">
    <h1 class="mb-5">Delete Account</h1>
    <form class="row g-3 confirm" method="POST" action="<?= URL . '/destroy/' . $user['id'] ?>">
        <h2 class="mb-2 mt-2">
            <?= $user['name'] ?>
            <?= $user['last'] ?>
        </h2>
        <label>Identification Number:</label>
        <div class="mb-5 mt-2">
            <b>
                <?= $user['idNr'] ?>
            </b>
        </div>
        <label>Account Number:</label>
        <div class="col-md-6 mb-5 mt-2" style="width: 100%;">
            <b>
                <?= $user['sasId'] ?>
            </b>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-outline-danger">Delete</button>
            <a class="btn btn-outline-secondary" href="<?= URL . '/' ?>">Cancel</a>
        </div>
    </form>
</div>