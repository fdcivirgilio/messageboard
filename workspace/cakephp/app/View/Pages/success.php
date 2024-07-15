<div class="container mt-3">
    <?php if (!empty($flashMessageHTML)): ?>
        <?php echo $flashMessageHTML; ?>
    <?php else: ?>
        <div class="alert alert-info">No message to display.</div>
    <?php endif; ?>
</div>