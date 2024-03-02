<?php
require_once "autoload.php";

use Joseph\Node;
use Joseph\Circle;
use Joseph\Killer;

function is_josephus_alive(Killer $killer, int $n, int $d): bool
{
    $circle = new Circle();

    for ($i = 0; $i < $n; $i++) {
        $circle->insertNode(new Node($i + 1));
    }
    $current = $circle->getFirst();

    while ($circle->size > 1) {
        $pray = $killer->kill($current, $d);
        if ($pray->getNumber() === 1) {
            return false;
        }
        $current = $pray->getNext();
        $circle->removeNode($pray);
    }

    return true;
}

if ($_GET['number']) {
    $n = $_GET['number'];
    $killer = new Killer();
    $result = 1;

    while (true) {
        if (is_josephus_alive($killer, $n, $result)) {
            break;
        }
        $result++;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Josephus problem (Josephus first version)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<main class="container py-4">
    <h1 class="mb-3">Josephus problem (Josephus first version)</h1>
    <h2 class="h2 my-3">
        Condition:
        <small class="text-muted">There are n warriors in the circle, numbered from 1 to n. When keeping count in a
            circle, every d-th person is crossed out until there is one left. Find out what the least d number should
            Josephus say to survive if he is the first warrior.</small>
    </h2>
    <form action="first-while.php" method="get">
        <div class="mb-3">
            <label class="form-label" for="number">Enter n:</label>
            <input type="text" class="form-control" id="number" name="number" placeholder="i.e. 6" required>
        </div>
        <button type="submit" class="btn btn-primary">Calculate</button>
        <a href="first-while.php" class="btn btn-success" role="button">Clear</a>
    </form>
    <h2 id="result" class="my-3 h2">
        <?php if (isset($result)): ?>
            The least d number for Josephus <?= "(n=$n)" ?>:
            <?= $result ?>
        <?php else: ?>
            Please, fill in the n number
        <?php endif; ?>
    </h2>
</main>
<footer>
    <div class="container">
        <h2>See also:</h2>
        <ul>
            <li><a href="index.php">Standard version</a></li>
            <li><a href="first.php">Josephus first version</a></li>
            <li><a href="">Christians and turks version</a></li>
        </ul>
    </div>
</footer>
</body>
</html>
