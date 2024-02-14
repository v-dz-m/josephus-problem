<?php

namespace Joseph;

class Killer
{
    public function kill(Node $current, int $step): Node
    {
        for ($i = 0; $i < $step - 1; $i++) {
            $current = $current->getNext();
        }

        return $current;
    }
}
