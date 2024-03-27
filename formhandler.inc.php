<?php

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $inquiry = $_POST["inquiry"];

    try 
    {
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (firstName, lastName, email, phone, inquiry) VALUES (?, ?, ?, ?, ?);";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$firstName, $lastName, $email, $phone, $inquiry]);

        $pdo = null;
        $stmt = null;

        header("Location: ../contact.php");


        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

}else{
    header("Location: ../index.php");
}