<div class="container text-center">
    <div class="row align-items-start mt-5">
        <h1 class="mb-5">Accounts</h1>
        <div class="countainer-acc">
            <?php foreach ($accounts as $acc): ?>
                <div class="container row mb-2">
                    <div class="col nameSum">
                        <b>
                            <?= $acc['name'] ?>
                            <?= $acc['last'] ?>
                        </b>
                    </div>
                    <div class="col">
                        <a href="<?= URL . '/more' ?>" class="btn btn-outline-secondary"><?= $acc['sasId'] ?></a>
                    </div>
                    <div class="col nameSum">
                        Balance:
                        <b>
                            <?= $acc['sum'] ?>
                        </b>&euro;
                    </div>
                </div>
            <?php endforeach ?>
        </div>

    </div>
</div>