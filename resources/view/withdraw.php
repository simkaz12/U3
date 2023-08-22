<div class="bin confirm">
    <h1 class="mb-5">Withdraw Funds</h1>
    <form class="row g-3 confirm" method="POST" action="<?= URL . '/minus/' . $acc['id'] ?>">
        <h2 class="mb-2 mt-2">
            <?= $acc['name'] ?>
            <?= $acc['last'] ?>
        </h2>
        <div class="mb-5 mt-2">
            <?= $acc['sasId'] ?>
        </div>
        <div class="col-md-6">
            <label for="minus" class="form-label">Balance:
                <b>
                    <?= $acc['sum'] ?> &euro;
                </b>
            </label>
            <input type="number" name="minus" class="form-control" id="minus">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-outline-primary">Withdraw</button>
            <a class="btn btn-outline-secondary" href="<?= URL . '/' ?>">Cancel</a>
        </div>
    </form>
</div>