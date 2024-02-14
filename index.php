<?php
require_once "autoload.php";

use Joseph\Node;
use Joseph\Circle;
use Joseph\Killer;

if ($_GET['number']) {
    $n = $_GET['number'];
    $d = $_GET['step'];
    $circle = new Circle();

    for ($i = 0; $i < $n; $i++) {
        $circle->insertNode(new Node($i + 1));
    }
    $killer = new Killer($circle);
    $killer->killExceptOne($d);

    $result = $circle->getFirst()->getNumber();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Josephus problem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<main class="container py-4">
    <h1 class="mb-3">Josephus problem</h1>
    <h2 class="h2 my-3">
        Condition:
        <small class="text-muted">There are n warriors in the circle, numbered from 1 to n. When keeping count in a
            circle, every d-th person is crossed out until there is one left. Find out what position should Josephus
            take to survive.</small>
    </h2>
    <form action="index.php" method="get">
        <div class="mb-3">
            <label class="form-label" for="number">Enter n:</label>
            <input type="text" class="form-control" id="number" name="number" placeholder="i.e. 6" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="step">Enter d:</label>
            <input type="text" class="form-control" id="step" name="step" placeholder="i.e. 3" required>
        </div>
        <button type="submit" class="btn btn-primary">Calculate</button>
        <a href="index.php" class="btn btn-success" role="button">Clear</a>
    </form>
    <h2 id="result" class="my-3 h2">
        <?php if (isset($result)): ?>
            The position of the survived warrior <?= "(n=$n, d=$d)" ?>: <?= $result ?>
        <?php else: ?>
            Please, fill in the form fields
        <?php endif; ?>
    </h2>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
