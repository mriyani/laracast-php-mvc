<?php require basePath('views/partials/header.php'); ?>
<?php require basePath('views/partials/nav.php'); ?>
<?php require basePath('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        <form method="POST" action="/note">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <div class="mb-4">
                <label for="body" class="block text-gray-700 font-bold mb-2">Edit Note</label>
                <input type="text" id="body" name="body" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Here's an idea for a note..." value="<?= htmlspecialchars($note['body'] ?? '') ?>">
                <?php if (isset($errors['body'])): ?>
                    <p class="text-red-500 text-s italic mt-2"><?= $errors['body'] ?></p>
                <?php endif; ?>
            </div>
            <div class="flex items-center justify-left  gap-x-4 mt-4">
                <!-- <div class="bg-gray-50 px-4 py-3 text-left sm:px-6 flex gap-x-4 justify-end"> -->
                <a href="/notes" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline">Cancel</a>
                <button type="submit" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline">Update</button>
                <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline" onclick="document.querySelector('#delete-form').submit()">Delete</button>
            </div>
        </form>
        <form id="delete-form" class="hidden" method="POST" action="/note">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
        </form>
    </div>
</main>

<?php require basePath('views/partials/footer.php'); ?>