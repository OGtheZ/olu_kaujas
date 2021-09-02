<?php

$eggBasketPlayer = [
    ["eggType" => "regular", "winChance" => 50],
    ["eggType" => "wooden", "winChance" => 70],
    ["eggType" => "diamond", "winChance" => 90]
];
$eggBasketComputer = [
    ["eggType" => "regular", "winChance" => 50],
    ["eggType" => "regular", "winChance" => 50],
    ["eggType" => "regular", "winChance" => 50]
];

echo "Welcome to the Arena!" . PHP_EOL;

while(true) {

    $playerEggChosen = $eggBasketPlayer[rand(0, count($eggBasketPlayer) - 1)]; // randomly picks an egg from the basket
    echo "You picked a " . $playerEggChosen['eggType'] . " type egg!" . PHP_EOL;

    $computerEggChosen = $eggBasketComputer[rand(0, count($eggBasketComputer) - 1)];
    echo "The computer picked a " . $computerEggChosen['eggType'] . " type egg!" . PHP_EOL;

    $whoWon = rand(0, $playerEggChosen["winChance"] + $computerEggChosen["winChance"]);
    $whoWonSecond = rand(0, $playerEggChosen["winChance"] = $computerEggChosen["winChance"]);

    if ($whoWon <= $playerEggChosen["winChance"] && $whoWonSecond <= $playerEggChosen["winChance"]) {
        echo "Your egg won both times! First battle score: {$whoWon} and second: {$whoWonSecond}" . PHP_EOL;

        $eggToTake = array_splice($eggBasketComputer, array_search($computerEggChosen, $eggBasketComputer), 1);
        $eggToTake = $eggToTake[0];
        $eggBasketPlayer[] = $eggToTake;
        echo "You have " . count($eggBasketPlayer) . " eggs left!" . PHP_EOL;
        echo "The Computer has " . count($eggBasketComputer) . " eggs left!" . PHP_EOL;
        if (count($eggBasketComputer) < 1) {
            echo "The computer lost all eggs! Numbah one, champion! " . PHP_EOL;
            exit;
        }

        $continue = readline("Fight again? y/n  ");
        if ($continue === "n") {
            break;
        }
    }
    elseif ($whoWon > $playerEggChosen["winChance"] && $whoWonSecond <= $playerEggChosen["winChance"]) {
        echo "Your egg lost first battle and won the second one! Both players lose eggs!" . PHP_EOL;
        echo "First battle score: {$whoWon} and second: {$whoWonSecond}" . PHP_EOL;

        array_splice($eggBasketPlayer, array_search($playerEggChosen, $eggBasketPlayer), 1);
        array_splice($eggBasketComputer, array_search($computerEggChosen, $eggBasketComputer), 1);
        echo "You have " . count($eggBasketPlayer) . " eggs left!" . PHP_EOL;
        echo "The Computer has " . count($eggBasketComputer) . " eggs left!" . PHP_EOL;
        if (count($eggBasketComputer) < 1) {
            echo "The computer lost all eggs! Numbah one, champion! " . PHP_EOL;
            exit;
        }
        if (count($eggBasketPlayer) < 1) {
            echo "You are all out of eggs!" . PHP_EOL;
            exit;
        }


        $continue = readline("Try again? y/n  ");
        if ($continue === 'n') {
            break;
        }
    }
    elseif ($whoWon <= $playerEggChosen["winChance"] && $whoWonSecond > $playerEggChosen["winChance"]) {
        echo "Your egg won the first battle and lost the second one! Both players lose eggs!" . PHP_EOL;
        echo "First battle score: {$whoWon} and second : {$whoWonSecond} ." . PHP_EOL;

        array_splice($eggBasketPlayer, array_search($playerEggChosen, $eggBasketPlayer), 1);
        array_splice($eggBasketComputer, array_search($computerEggChosen, $eggBasketComputer), 1);
        echo "You have " . count($eggBasketPlayer) . " eggs left!" . PHP_EOL;
        echo "The Computer has " . count($eggBasketComputer) . " eggs left!" . PHP_EOL;
        if (count($eggBasketComputer) < 1) {
            echo "The computer lost all eggs! Numbah one, champion! " . PHP_EOL;
            exit;
        }
        if (count($eggBasketPlayer) < 1) {
            echo "You are all out of eggs!" . PHP_EOL;
            exit;
        }


        $continue = readline("Try again? y/n  ");
        if ($continue === 'n') {
            break;
        }
    }
    elseif ($whoWon > $playerEggChosen["winChance"] && $whoWonSecond > $playerEggChosen["winChance"]) {
        echo "Your egg lost both battles! You lost your egg!" . PHP_EOL;
        echo "First battle score: {$whoWon} and second: {$whoWonSecond}." . PHP_EOL;

        $eggToTake = array_splice($eggBasketPlayer, array_search($playerEggChosen, $eggBasketPlayer), 1);
        $eggToTake = $eggToTake[0];
        $eggBasketComputer[] = $eggToTake;
        echo "You have " . count($eggBasketPlayer) . " eggs left!" . PHP_EOL;
        echo "The Computer has " . count($eggBasketComputer) . " eggs left!" . PHP_EOL;
        if (count($eggBasketPlayer) < 1) {
            echo "You are all out of eggs!" . PHP_EOL;
            exit;
        }

        $continue = readline("Try again? y/n  ");
        if ($continue === 'n') {
            break;
        }
    }
}
