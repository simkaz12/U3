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
                    <tr>
                        <th scope="row"></th>
                        <td>
                            <?= $acc['name'] ?>
                            <?= $acc['last'] ?>
                        </td>
                        <td>
                            <?= $acc['idNr'] ?>
                        </td>
                        <td colspan="2">
                            <?= $acc['sasId'] ?>
                        </td>
                        <td><b>
                                <?= $acc['sum'] ?>
                            </b>&euro;</td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td colspan="5">
                            <a href="<?= URL . '/add/' . $acc['id'] ?>"" class=" btn btn-outline-success">Add</a>
                            <a href="<?= URL . '/withdraw/' . $acc['id'] ?>"
                                class="btn btn-outline-secondary">Withdraw</a>
                            <a href="<?= URL . '/delete/' . $acc['id'] ?>" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>