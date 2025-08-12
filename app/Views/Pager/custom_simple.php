
<?php if ($pager->getPageCount() > 1): ?> 
<nav aria-label="Pagination" class="mt-4">
    <ul class="pagination justify-content-center">

        <!-- Bouton Précédent -->
        <?php if ($pager->hasPrevious()): ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getPrevious() ?>">⬅️ Précédent</a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link">⬅️ Précédent</span>
            </li>
        <?php endif; ?>

        <!-- Pages numérotées -->
        <?php foreach ($pager->links() as $link): ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
            </li>
        <?php endforeach; ?>

        <!-- Bouton Suivant -->
        <?php if ($pager->hasNext()): ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNext() ?>">Suivant ➡️</a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link">Suivant ➡️</span>
            </li>
        <?php endif; ?>

    </ul>
</nav>
<?php endif; ?>
