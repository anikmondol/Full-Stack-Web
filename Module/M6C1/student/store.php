<?php


// INSERT INTO `students`(`id`, `name`, `email`, `bod`, `age`, `status`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')


// require_once "../db/conniption.php";



// function store(array $data){

//     global $conn;
//     studentDataValidation($data, $conn);




// }


// function studentDataValidation(array $data, $conn){

//     if(isset($data['name'])){
//         if (empty($data['name'])) {
//             echo "Name is Required";
//             return false;
//         }
//     }


//   if(isset($data['email'])){
//          if (empty($data['email'])) {
//             echo "Email is Required";
//             return false;
//         }

//         $checkEmail = "SELECT * FROM `students` WHERE email = ".$data['email'];

//        $result = $conn->query($checkEmail);

//         if ($result->fetch_assoc()) {
//              echo "Email already exists";
//         }else{
//             echo 22;
//         }

//     }

// }



// $data = [

//     'name' => "anik",
//     "email" => "anik@gmail.com",
//     'dob' => "04-10-2000",
//     "age" => 25,
//     'status' => true,

// ];


// store($data)


require_once "../db/conniption.php";

function store(array $data)
{
    global $conn;
    studentDataValidation($data, $conn);


    $sqlQuery = $conn->prepare(
        "INSERT INTO `students` (`name`, `email`, `bod`, `age`, `status`) 
     VALUES (?, ?, ?, ?, ?)"
    );

    // Bind parameters for all 5 placeholders
    $sqlQuery->bind_param(
        "sssii", // s = string, i = integer
        $data['name'],
        $data['email'],
        $data['bod'],
        $data['age'],
        $data['status']
    );

    if ($sqlQuery->execute()) {
        echo "Student inserted successfully!";
    } else {
        echo "Error: " . $sqlQuery->error;
    }
}

function studentDataValidation(array $data, $conn)
{
    // Name validation
    if (isset($data['name']) && empty($data['name'])) {
        echo "Name is Required";
        return false;
    }

    // Email validation
    if (isset($data['email'])) {
        if (empty($data['email'])) {
            echo "Email is Required";
            return false;
        }

        // Prepared statement to avoid SQL injection
        $sqlQuery = $conn->prepare("SELECT * FROM `students` WHERE email = ?");
        $sqlQuery->bind_param("s", $data['email']);
        $sqlQuery->execute();
        $result = $sqlQuery->get_result();

        if ($result->fetch_assoc()) {
            die("Email already exists");
        }
    }
}

// Example data
$data = [
    'name' => "anik",
    'email' => "anik@gmail.com",
    'dob' => "04-10-2000",
    'age' => 25,
    'status' => true,
];

store($data);
