<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
    <?php require "./views/partials/head.php" ?>
    <body class="h-full">
        <div class="min-h-full">
            <?php 
            require "./views/partials/nav.php";
            echo "<a href='/notes' class='my-3 px-5 text-blue-600 hover:underline hover:text-700'>Go Back</a>";
            require "./views/partials/header.php";

            ?>
        </div>
    </body>
</html>