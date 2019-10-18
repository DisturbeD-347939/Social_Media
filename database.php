<?php

function db()
{
    $host           = '127.0.0.1';
    $port           = '3306';
    $db             = 'social_media';
    $username       = 'root';
    $password       =  null;
    $charset        = 'utf8mb4';

    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION, //Prevent malfunctioning (throws exceptions when needed)
        PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC, //Makes the data easier to fetch from the database
    ]);

    return $pdo;
}

$db = db();

function show_all_users()
{
    $result = db()->query("SELECT * FROM users");

    foreach ($result as $k => $v) {
        var_dump($v);
    }
}

//Check if the credentials match the database
function login_check($email, $password)
{
    $result = db()->query("SELECT * FROM users WHERE email='$email' AND PASSWORD='$password'");

    if ($result->rowCount()) {
        return $result->fetch();
    }
}

//Compare user based on some of his info PROBLEMATIC
/*******************************************************************************************************/
function compare($details)
{
    $found = [];
    foreach ($details as $k => $v) {
        $result = db()->query("SELECT * FROM users WHERE $k='$v'");
        if ($result->rowCount()) {
            array_push($found, $k);
        }
    }
    return $found;
}

//Insert new user into the database
function insert_user($regist_details)
{
    //Create ID number
    $result = db()->query("SELECT id FROM  users");
    $counter = 0;
    $checked = 0;

    $result = sort($result);

        foreach ($result as $k => $v) 
        {
            echo "$counter = ";
            echo $v['id'];
            echo "\n";
            if ($counter == $v['id']) 
            {
                $checked = 0;
                break;
            } 
            else 
            {
                $checked = 1;
            }
            array_push($checkbacks, $checked);
        }

    //Check if it exists in the database
    $repeated = compare($regist_details);

    $id = $counter;
    var_dump($id);

    $available = true;
    $created = false;
    foreach ($repeated as $k) {
        if ($k == "email" || $k == "username") {
            $available = false;
        }
    }
    if ($available) {
        $result = db()->query("INSERT INTO users (first_name, surname, email, username, password, id) 
            VALUES 
            (
                '$regist_details[first_name]',
                '$regist_details[surname]',
                '$regist_details[email]',
                '$regist_details[username]',
                '$regist_details[password]',
                '$id'
            )");

        if ($result) {
            $created = true;
            mkdir($id);
        } else {
            $created = false;
        }
    }
    $return = [];
    array_push($return, $created);
    array_push($return, $repeated);
    return $return;
}
