<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

print "Enter bouquet design and press ENTER. Press double Enter if you're done with it \n";

$last_line = false;
$designs = [];
while (!$last_line) {
    $next_line = fgets(STDIN, 1024); // read the special file to get the user input from keyboard
    if ("\n" == $next_line) {
        $last_line = true;
    } else {
        $designs[] = $next_line;
    }
}

fwrite(STDOUT, "Bouquet designs are: " . implode(', ', $designs));

