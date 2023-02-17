<?php 
class User extends BaseModel{
  const TABLE = 'users';

  public function getUserRole($id){
  }

  public function findUserById($id){
    
  }
  public function getAll($table){
    //    die($table);
        return $this->all($table);
    }
}
?>