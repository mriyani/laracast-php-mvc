<?php require 'views/partials/header.php'; ?>
<?php require 'views/partials/nav.php'; ?>
<?php require 'views/partials/banner.php'; ?>

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

        <p class="mt-6">
            <a href="/note/create" class="text-blue-500 hover:underline">Create Note</a>
        </p>
    </div>
</main>

<?php require('views/partials/footer.php'); ?>