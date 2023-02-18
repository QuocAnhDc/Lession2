<?php

class Database
{
    const HOST = '127.0.0.1:3307';
    const USERNAME = 'root';
    const PASSWORD = '123456';
    const DB_NAME = 'lession2';

    private $connect;

    public function connect(){
        $connect = mysqli_connect(self::HOST, self::USERNAME,
            self::PASSWORD, self::DB_NAME);
        mysqli_set_charset($connect, "utf8");
        if(mysqli_connect_errno() === 0) {
            return $connect;
        }
        return false;
    }
}

// $db = new Database();

// if($db->connect()){
//     echo "thanh cong";
// }

?>