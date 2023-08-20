<div class="messages --msgs">
    <?php foreach ($msg as $message): ?>
        <div class="alert alert-<?= $message['type'] ?>" role="alert">
            <?= $message['text'] ?>
        </div>
    <?php endforeach; ?>
</div>