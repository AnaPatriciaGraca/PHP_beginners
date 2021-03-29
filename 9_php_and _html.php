<?php
$name = "Dave";
$hour=17;
$fruit = ['apple', 'banana', 'orange', 'mango'];
$i=0;
// php comments aren´t sent to the browser
?>

<!DOCTYPE html>
<html>
<head>
    <title>My website</title>
    <meta charset="utf-8">
</head>
<body>

    <h1>Lorem Ipsum</h1>

    <p>Hello, <?= $name; ?>!</p>

    <?php if($hour < 12): ?>
        Good Morning!
    <?php  elseif ($hour < 18): ?>
        Good afternnon!
    <?php  elseif ($hour < 22): ?>
        Good evening!
    <?php  else : ?>
        Good night!
    <?php endif; ?>


    <h1>Fruit</h1>
    <ol>
        <?php for ($i=0; $i<=3; $i++): ?>
        <li> <?=$fruit[$i]; ?></li>
        <?php endfor; ?>
    </ol>


</body>
</html>
