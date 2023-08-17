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
                            <?= $user['name'] ?>
                            <?= $user['last'] ?>
                        </td>
                        <td>
                            <?= $user['idNr'] ?>
                        </td>
                        <td colspan="2">
                            <?= $user['sasId'] ?>
                        </td>
                        <td><b>
                                <?= $user['sum'] ?>
                            </b>&euro;</td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td colspan="5">
                            <a href="<?= URL . '/add/' . $user['id'] ?>"" class=" btn btn-outline-success">Add</a>
                            <a href="<?= URL . '/withdraw/' . $user['id'] ?>"
                                class="btn btn-outline-secondary">Withdraw</a>
                            <a href="<?= URL . '/delete/' . $user['id'] ?>" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>