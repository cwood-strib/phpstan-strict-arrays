<?php

class Jam {}
class Jelly {}

/**
 * @return Jam[] 
 */
function makeJams(): array {
    return [];
}

$strs = ["first"];

$jams = makeJams();
$strawberry = new Jelly();

$jams[] = $strawberry;
$strs[] = 123;