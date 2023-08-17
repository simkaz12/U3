<div class="container text-center">
    <div class="row align-items-start mt-5">
        <h1 class="mb-5">Accounts</h1>
        <div class="countainer-acc">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Name</th>
                        <th scope="col">ID Number</th>
                        <th scope="col" colspan="2">Account number</th>
                        <th scope="col">Balance</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($accounts as $acc): ?>
                        <tr>
                            <th scope="row"></th>
                            <td>
                                <?= $acc['name'] ?>
                                <?= $acc['last'] ?>
                            </td>
                            <td>
                                <?= $acc['idNr'] ?>
                            </td>
                            <td colspan="2"><a href="<?= URL . '/more/' . $acc['id'] ?>"
                                    class="btn btn-outline-secondary"><?= $acc['sasId'] ?></a>
                            </td>
                            <td><b>
                                    <?= $acc['sum'] ?>
                                </b>&euro;</td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
</div>