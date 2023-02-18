<?php
class User extends BaseModel
{
  const TABLE = 'users';

  public function getUserRole($id)
  {
  }

  public function findUserById($id)
  {
  }
  public function getAll()
  {
    //    die($table);
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
