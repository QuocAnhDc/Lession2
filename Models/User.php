<?php
class User extends BaseModel
{
  // ten data table
  const TABLE = 'users';

  // check login
  public function login($username,$password){
    $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
    $query = $this->cusquery($sql);
    return $query;
  }
  public function getAll()
  {
    return $this->all(self::TABLE);
  }
  public function findById($id)
  {
    return $this->find(self::TABLE, $id);
  }

  public function store($data)
  {
    $this->create(self::TABLE, $data);
  }

  public function updateById($id, $data)
  {
    $this->update(self::TABLE, $id, $data);
  }

  public function deleteById($id)
  {
    return $this->delete(self::TABLE, $id);
  }
}
