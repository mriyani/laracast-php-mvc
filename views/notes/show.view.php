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
        <form class="mt-6" method="POST">
            <input type="hidden" name="_method" id="_method" value="DELETE">
            <input type="hidden" name="id" id="id" value="<?= $note['id'] ?>">
            <button class="text-red-500">Delete Note</button>
        </form>
    </div>
</main>

<?php require(basePath('views/partials/footer.php')); ?>