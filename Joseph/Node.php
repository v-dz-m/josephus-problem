<?php

namespace Joseph;

class Node
{
    private int $number;
    private Node $next;
    private Node $previous;

    function __construct($number)
    {
        $this->number = $number;
        $this->next = $this;
        $this->previous = $this;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getNext(): Node
    {
        return $this->next;
    }

    public function setNext(Node $next): void
    {
        $this->next = $next;
    }

    public function getPrevious(): Node
    {
        return $this->previous;
    }

    public function setPrevious(Node $previous): void
    {
        $this->previous = $previous;
    }
}
