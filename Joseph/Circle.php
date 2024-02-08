<?php

namespace Joseph;

class Circle
{
    private ?Node $first = null;
    public int $size = 0;

    public function insertNode(Node $node)
    {
        if ($first = $this->getFirst()) {
            $last = $first->getPrevious();
            $last->setNext($node);
            $first->setPrevious($node);
            $node->setNext($first);
            $node->setPrevious($last);
        } else {
            $this->setFirst($node);
        }
        $this->size += 1;
    }

    public function removeNode(Node $node)
    {
        if ($this->getFirst() === $node) {
            $this->setFirst($node->getNext());
        }
        $node->getNext()->setPrevious($node->getPrevious());
        $node->getPrevious()->setNext($node->getNext());
        unset($node);
        $this->size -= 1;
    }

    public function getFirst(): ?Node
    {
        return $this->first;
    }

    public function setFirst(?Node $first): void
    {
        $this->first = $first;
    }
}
