<?php
class Queue {
    private $queue = [];

    // Enqueue element
    public function enqueue($item) {
        array_push($this->queue, $item);
    }

    // Dequeue element
    public function dequeue() {
        if ($this->isEmpty()) {
            return "Queue is empty!";
        }
        return array_shift($this->queue);
    }

    // Peek front element
    public function peek() {
        if ($this->isEmpty()) {
            return "Queue is empty!";
        }
        return $this->queue[0];
    }

    // Check if queue is empty
    public function isEmpty() {
        return empty($this->queue);
    }

    // Display queue
    public function display() {
        return $this->queue;
    }
}

// Example usage:
$queue = new Queue();
$queue->enqueue("Apple");
$queue->enqueue("Banana");
$queue->enqueue("Cherry");
$queue->enqueue("Mango");
$queue->enqueue("Grape");


echo "Queue: ";
print_r($queue->display());

echo "<br>";

echo "Front: " . $queue->peek();
echo "<br>";

echo "Dequeued: " . $queue->dequeue();
echo "<br>";

echo "Queue after dequeue: ";
echo "<br>";

print_r($queue->display());


## FIFI First In First Out


?>