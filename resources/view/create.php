<div class="bin">
    <h1>Open New Account</h1>
    <form class="row g-3" method="POST" action="<?= URL . '/store' ?>">
        <div class="col-md-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="col-md-6">
            <label for="last" class="form-label">Last Name</label>
            <input type="text" name="last" class="form-control" id="last">
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="col-12">
            <label for="idNr" class="form-label">Personal Identification Number</label>
            <input type="number" name="idNr" class="form-control" id="idNr">
        </div>
        <div class="col-md-3">
            <label for="sex" class="form-label">Sex</label>
            <select id="sex" name="sex" class="form-select">
                <option selected>Male</option>
                <option>Female</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="day" class="form-label">Day of Birth</label>
            <select id="day" name="day" class="form-select">
                <?php foreach (range(1, 31) as $value): ?>
                    <option value="<?= $value ?>"><?= $value ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="month" class="form-label">Month</label>
            <select id="month" name="month" class="form-select">
                <?php foreach (range(1, 12) as $value): ?>
                    <option value="<?= $value ?>"><?= $value ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="year" class="form-label">Year</label>
            <select id="year" name="year" class="form-select">
                <?php foreach (range(1945, 2023) as $value): ?>
                    <option value="<?= $value ?>"><?= $value ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Create</button>
            <a class="btn btn-outline-secondary" href="<?= URL . '/' ?>">Cancel</a>
        </div>
    </form>
</div>