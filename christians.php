<?php
require_once "autoload.php";

use Joseph\Node;
use Joseph\Circle;
use Joseph\Killer;

if ($_GET['number']) {
    $n = $_GET['number'];
    $total = $n * 2;
    $d = $_GET['step'];
    $circle = new Circle();

    for ($i = 0; $i < $total; $i++) {
        $circle->insertNode(new Node($i + 1));
    }
    $killer = new Killer();
    $current = $circle->getFirst();

    while ($circle->size > $n) {
        $pray = $killer->kill($current, $d);
        $current = $pray->getNext();
        $circle->removeNode($pray);
    }

    $result = [];
    $first = $circle->getFirst();
    $survived = $first;
    do {
        $result[] = $survived->getNumber();
        $survived = $survived->getNext();
    }
    while ($survived !== $first);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Josephus problem (christians and turks version)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<main class="container py-4">
    <h1 class="mb-3">Josephus problem (christians and turks version)</h1>
    <h2 class="h2 my-3">
        Condition:
        <small class="text-muted"> There are n Turks and n Christians aboard a ship in a storm which will sink unless
            half the passengers (n) are thrown overboard. The Christians need to determine where to stand (k-positions)
            to ensure that only the Turks are tossed.</small>
    </h2>
    <form action="christians.php" method="get">
        <div class="mb-3">
            <label class="form-label" for="number">Enter n:</label>
            <input type="text" class="form-control" id="number" name="number" placeholder="i.e. 15" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="step">Enter d:</label>
            <input type="text" class="form-control" id="step" name="step" placeholder="i.e. 9" required>
        </div>
        <button type="submit" class="btn btn-primary">Calculate</button>
        <a href="christians.php" class="btn btn-success" role="button">Clear</a>
    </form>
    <h2 id="result" class="my-3 h2">
        <?php if (isset($result)): ?>
            The positions of the survived warriors <?= "(n=$n, 2n=$total, d=$d)" ?>: <?= join(", ", $result) ?>
        <?php else: ?>
            Please, fill in the form fields
        <?php endif; ?>
    </h2>
</main>
</body>
</html>
