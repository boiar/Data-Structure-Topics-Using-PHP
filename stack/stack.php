<?php 
declare(strict_types=1);

class stack{

    private array $stack;
    private int $limit;

    public function __construct(int $limit = 10)
    {
        $this->stack = [];
        $this->limit = $limit;
    }


    public function push(mixed $item): void
    {
        if(count($this->stack) < $this->limit){
            $this->stack[] = $item;
        } else {
            throw new OverflowException("Stack is full!");
        }

    }

    public function pop(): mixed
    {
        if ($this->isEmpty()) {
            throw new UnderflowException("Stack is empty!");
        } else {
            return array_pop($this->stack);
        }
    }


    public function top():mixed 
    {
        if ($this->isEmpty()) {
            throw new UnderflowException("Stack is empty!");
        } else {
            return end($this->stack); // the top item in stack 
        }
    }




    public function isEmpty(): bool
    {
        return empty($this->stack);
    }

    public function display(): array
    {
        return $this->stack;
    }
    
}


$stack = new stack(5);

$stack->push("First");
$stack->push("Second");
$stack->push("Third");

echo "Stack contents after pushing elements:\n";
print_r($stack->display());

echo "Top element is: " . $stack->top() . "\n";

$stack->pop();

echo "Stack contents after popping an element:\n";
print_r($stack->display());

echo "Is the stack empty? " . ($stack->isEmpty() ? 'Yes' : 'No') . "\n";

echo "Top element is: " . $stack->top() . "\n";