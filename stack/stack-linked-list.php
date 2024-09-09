<?php

class Node {
    public mixed $item;
    public ?Node $next;

    public function __construct(mixed $item = null, ?Node $next = null) {
        $this->item = $item;
        $this->next = $next;
    }
}

class Stack {
    /** @var Node|null */
    private ?Node $top = null;
    private ?Node $current = null;

    public function __construct() {
        // Initialization is handled by property default values
    }

    public function push(mixed $newItem): void {
        $newNode = new Node($newItem); // Create a new Node with the item
        $newNode->next = $this->top; // Link newNode to the current top
        $this->top = $newNode; // Update the top to be the new node
    }

    public function pop(?int &$stackTop): void {
        if ($this->isEmpty()) {
            echo "Stack is empty, cannot pop.";
        } else {
            $stackTop = $this->top->item;
            $temp = $this->top;
            $this->top = $this->top->next;
            unset($temp); // Deallocate memory for the popped node
        }
    }

    public function getTop(?int &$stackTop): void {
        if ($this->isEmpty()) {
            echo "Stack is empty!";
        } else {
            $stackTop = $this->top->item;
        }
    }

    public function display(): void {
        $this->current = $this->top;
        echo "\nItems in stack: [ ";
        while ($this->current !== null) {
            echo $this->current->item . " ";
            $this->current = $this->current->next;
        }
        echo "]";
    }

    public function isEmpty(): bool {
        return $this->top === null;
    }
}

// Example usage
$stack = new Stack();
$stack->push(100);
$stack->push(200);
$stack->push(300);
$stack->push(500);

$poppedItem = null;
$stack->pop($poppedItem); // Pop the top item and store it in $poppedItem

$stack->display(); // Display the stack contents

?>
