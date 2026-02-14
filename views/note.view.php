<?php require 'partials/header.php'; ?>
<?php require 'partials/nav.php'; ?>
<?php require 'partials/banner.php'; ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        <p class="mb-3">
            <a href="/notes" class="text-blue-500 hover:underline">go back...</a>
        </p>
        <hr>
        <p class="mt-2">
            <?= $note['body'] ?>
        </p>
    </div>
</main>

<?php require('partials/footer.php'); ?>