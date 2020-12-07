<?php


function solve_one($input) : string
{
    /**
     * Find the two entries that sum to 2020; what do you get if you multiply them together?
     */
    $items = xplode_input($input, true);

    // My idea: take a number, find its complement to 2020 and see if it's already in the list; if it is, that's the
    // required elements for the challenge; if it's not, test the next item in the array and so on.

    foreach ($items as $item) {
        $companion = 2020 -$item;
        if (in_array($companion, $items)) {
            echo sprintf("Tuple found: %d and %d \n", $item, $companion);
            return sprintf("%d\n", $companion * $item);
        }
    }
}


function solve_two($input) : string
{
    /**
     * find three numbers in your expense report that meet the same criteria.
     */

    // I see no other way, now, other than bruteforcing the sum of two numbers
    
    $items = xplode_input($input, true);
    foreach ($items as $item) {
        echo "Current: $item\n";
        foreach ($items as $testMatch) {
            echo "Checking: $testMatch\n";
            if ($testMatch != $item) {
                $couple = $item + $testMatch;
                $companion = 2020 - $couple;
                echo "Diff: $companion\n";
                if (in_array($companion, $items) && $companion != 0) {
                    echo sprintf("Match: %d, %d, %d\n", $item, $testMatch, $companion);
                    return sprintf("%d\n", $item * $testMatch * $companion);
                }
            }
        }
    }
    return "";
}