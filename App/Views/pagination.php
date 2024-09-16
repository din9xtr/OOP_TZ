<div class="pagination">

<?php if ($current_page > 1): ?>
    <a href="?page=<?= $current_page - 1 ?>&type=<?= $_GET['type'] ?? 'latest' ?>">« Предыдущая</a>
<?php endif; ?>

<?php for ($i = 1; $i <= $total_pages; $i++): ?>
    <a href="?page=<?= $i ?>" class="<?= $i == $current_page ? 'active' : '' ?>&type=<?= $_GET['type'] ?? 'latest' ?>"><?= $i ?></a>
<?php endfor; ?>

<?php if ($current_page < $total_pages): ?>
    <a href="?page=<?= $current_page + 1 ?>&type=<?= $_GET['type'] ?? 'latest' ?>">Следующая »</a>
<?php endif; ?>
</div>
<div>
<button id="loadMore" class="btn btn-secondary" data-page="<?php echo $current_page; ?>">Load more</button>
</div>