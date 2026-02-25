<?php require basePath('views/partials/header.php'); ?>
<?php require basePath('views/partials/nav.php'); ?>
<?php require basePath('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        <p class="mb-3">
            <a href="/notes" class="text-blue-500 hover:underline">go back...</a>
        </p>
        <hr>
        <p class="mt-2">
            <?= htmlspecialchars($note['body']) ?>
        </p>
        <footer class="mt-6">

            <a href="/note/edit?id=<?= $note['id'] ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
        </footer>


    </div>
</main>

<?php require(basePath('views/partials/footer.php')); ?>