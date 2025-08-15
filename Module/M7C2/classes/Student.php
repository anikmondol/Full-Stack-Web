<?php


class Student
{

    public function __construct(private Database $db) {}


    public function getStudents()
    {
        $sqlQuery = $this->db->conn->prepare(
            "SELECT * FROM `students`"
        );

        $sqlQuery->execute();
        $result = $sqlQuery->get_result();

        $students = $result->fetch_all(MYSQLI_ASSOC);

        return json_encode($students);
    }
}
