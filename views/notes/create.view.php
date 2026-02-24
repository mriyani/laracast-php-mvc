<?php require basePath('views/partials/header.php'); ?>
<?php require basePath('views/partials/nav.php'); ?>
<?php require basePath('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        <form method="POST" action="/note">
            <div class="mb-4">
                <label for="body" class="block text-gray-700 font-bold mb-2">New Note</label>
                <input type="text" id="body" name="body" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Here's an idea for a note..." value="<?= htmlspecialchars($_POST['body'] ?? '') ?>">
                <?php if (isset($errors['body'])): ?>
                    <p class="text-red-500 text-s italic mt-2"><?= $errors['body'] ?></p>
                <?php endif; ?>
            </div>
            <div class="flex items-center justify-between mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline">Create</button>
            </div>
        </form>
    </div>
</main>

<?php require basePath('views/partials/footer.php'); ?>