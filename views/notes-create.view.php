<?php require('partials/head.php') ?>

<?php require('partials/nav.php') ?>

<?php require('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div>
            <form action="" method="POST">
                <label for="body">Description</label>
            
                <div class="my-3">
                    <textarea 
                    class="mt-1 p-4 outline-none block w-1/3 rounded-md border-gray-300 shadow-sm focus:ring focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                    id="body" 
                    name="body"
                    ><?= $_POST['body'] ?? '' ?></textarea>
                </div>
                <p>
                    <?php if (isset($errors['body'])): ?>
                        <span class="text-red-500 text-xs block mb-3"><?= $errors['body'] ?></span>
                    <?php endif ?>
                </p>

                <p>
                    <button class="px-2 py-1 bg-blue-600 text-white rounded" type="submit">Create</button>
                </p>
            </form>
        </div>
    </div>
</main>

<?php require('partials/foot.php') ?>