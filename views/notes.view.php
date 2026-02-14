<?php require 'partials/header.php'; ?>
<?php require 'partials/nav.php'; ?>
<?php require 'partials/banner.php'; ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        <?php foreach ($notes as $note): ?>
            <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                <li>
                    <?= htmlspecialchars($note['body']) ?>
                </li>
            </a>
            <hr class="mt-2">
        <?php endforeach; ?>
    </div>
</main>

<?php require('partials/footer.php'); ?>