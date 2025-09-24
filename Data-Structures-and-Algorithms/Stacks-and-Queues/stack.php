<?php
class Stack {
    private $stack = [];

    // Push an element onto the stack
    public function push($item) {
        array_push($this->stack, $item);
    }

    // Pop an element from the stack
    public function pop() {
        if ($this->isEmpty()) {
            return "Stack is empty!";
        }
        return array_pop($this->stack);
    }

    // Peek top element
    public function peek() {
        if ($this->isEmpty()) {
            return "Stack is empty!";
        }
        // return end($this->stack);
          return $this->stack[count($this->stack) - 1];
    }

    // Check if stack is empty
    public function isEmpty() {
        return empty($this->stack);
    }

    // Display stack
    public function display() {
        return $this->stack;
    }
}

// Example usage:
$stack = new Stack();
$stack->push("A");
$stack->push("B");
$stack->push("C");

echo "Stack: ";
print_r($stack->display());

echo "<br>";
echo "Top: " . $stack->peek() ;
// echo "<br>";
// echo "Popped: " . $stack->pop();
// echo "<br>";
// echo "Stack after pop: ";
// echo "<br>";
// print_r($stack->display());


## LIFO Last In First Out
?>
