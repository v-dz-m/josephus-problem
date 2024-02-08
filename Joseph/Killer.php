<?php

namespace Joseph;

class Killer
{
    private Circle $prays;

    public function __construct($input)
    {
        $this->prays = $input;
    }

    public function killExceptOne(int $step)
    {
        $current = $this->prays->getFirst();

        while ($this->prays->size > 1) {
            for ($i = 0; $i < $step - 1; $i++) {
                $current = $current->getNext();
            }
            $temp = $current->getNext();
            $this->prays->removeNode($current);
            $current = $temp;
        }
    }
}
