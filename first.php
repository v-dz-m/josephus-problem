<?php
require_once "autoload.php";

use Joseph\Node;
use Joseph\Circle;
use Joseph\Killer;
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
            circle, every d-th person is crossed out until there is one left. Find out what d number should Josephus
            say to survive if he is the first warrior.</small>
    </h2>
    <form action="first.php" method="get">
        <div class="mb-3">
            <label class="form-label" for="number">Enter n:</label>
            <input type="text" class="form-control" id="number" name="number" placeholder="i.e. 6" required>
        </div>
        <button type="submit" class="btn btn-primary">Calculate</button>
        <a href="first.php" class="btn btn-success" role="button">Clear</a>
    </form>
    <h2 id="result" class="my-3 h2">
        Please, fill in the n number
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
