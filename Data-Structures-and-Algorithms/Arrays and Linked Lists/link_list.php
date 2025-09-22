<?php


class Node
{


    public $data;

    public $next;


    public function __construct($value)
    {
        $this->data = $value;
        $this->next = null;
    }
}



class LinkList
{

    public $head;

    public function __construct()
    {
        $this->head = null;
    }


    // 👉 Insert a node at the END of the linked list
    public function insert($data)
    {
        $newNode = new Node($data); // Step 1: Create a new node

        // Case 1: If list is empty, make the new node the head
        if ($this->head == null) {
            $this->head = $newNode;
        }
        // Case 2: Otherwise, traverse to the end and add it there
        else {
            $current = $this->head; // Start from head
            while ($current->next != null) { // Keep going until the last node
                $current = $current->next;
            }
            $current->next = $newNode; // Link last node to the new node
        }
    }



    // 👉 Delete a node by value
    public function delete($key)
    {
        $current = $this->head;
        $prev = null;

        // Case 1: If the node to delete is the head
        if ($current != null && $current->data == $key) {
            $this->head = $current->next; // Move head to next node
            return; // Node deleted
        }

        // Case 2: Search for the node to be deleted (keep track of previous node)
        while ($current != null && $current->data != $key) {
            $prev = $current;
            $current = $current->next;
        }

        // If node not found
        if ($current == null) return;

        // Case 3: Node found → skip it by connecting previous node to next node
        $prev->next = $current->next;
    }



    // 👉 Search for a node by value
    public function search($key)
    {
        $current = $this->head;

        // Traverse the list
        while ($current != null) {
            if ($current->data == $key) { // Match found
                return true;
            }
            $current = $current->next; // Move to next node
        }
        return false; // Not found
    }



    public function display()
    {
        $current = $this->head;

        // Traverse and print each node
        while ($current != null) {
            echo $current->data . " -> ";
            $current = $current->next; // Move to next node
        }
        echo "NULL\n"; // End of list
    }
}



// ---------------- Example Usage ----------------
$list = new LinkList();

// Insert elements
$list->insert(10);
$list->insert(20);
$list->insert(30);
$list->insert(60);

$list->display();


echo "<br>";
// Delete elements
$list->delete(20);
$list->display();


echo "<br>";
echo $list->search(60)? "Found" : "Not Found";