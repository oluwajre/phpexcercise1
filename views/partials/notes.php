<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold text-black">Welcome to my <?= $pageTitle ?></h1>
        <div class="mt-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach ($result as $note): ?>
                <?php 
                    $id = htmlspecialchars($note['id']);
                    $body = htmlspecialchars($note['body']);
                ?>

                <div class="bg-white p-4 rounded-lg shadow cursor-pointer hover:shadow-lg transition-shadow">
                    <a href="/note?id=<?= htmlspecialchars($id) ?>" class="text-xl font-semibold mb-2 text-blue-600 hover:underline hover:text-blue-700 transition duration-150">Note <?= array_search($note, $result) + 1 ?></a>
                    <p class="text-gray-700"><?= htmlspecialchars($body) ?></p>
                    <div class="ms-auto text-right inline-flex justify-content-end space-x-2 mt-4">
                        <a href="#" class="text-blue-500 hover:underline">Edit</a>
                        <a href="#" class="text-red-500 hover:underline">Delete</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="mt-5">
            <a href="/note/create" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-150">Create New Note</a>
        </div>
</main>