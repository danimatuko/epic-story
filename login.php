<?php

require 'includes/header.php';




$db = new Database();
$conn = $db->getConn();


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (User::authenticate($conn, $_POST['username'], $_POST['password'])) {
        Auth::login();
        header("Location: index.php");
    } else {
        $error = 'Incorrect login credentials';
    }
}
?>


<div class="w-25 m-auto">
    <h1 class="display-3 mb-5">Login</h1>

    <?php if (!empty($error)) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endif ?>

    <form method="post" novalidate>
        <div class="mb-3">
            <label for="username" class="form-label">User Name</label>
            <input type="text" class="form-control" id="name" name="username" ">
    </div>
    <div class=" mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-dark">Login</button>
    </form>
</div>

<?php require "includes/footer.php"; ?>