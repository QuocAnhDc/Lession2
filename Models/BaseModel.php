<?php

class BaseModel extends Database
{
    protected $connect;
    public function __construct()
    {
        $this->connect = $this->connect();
    }

    //lay tat ca du lieu 
    public function all($table)
    {

        $sql = "SELECT * FROM ${table}";
        $query = $this->_query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }

        return $data;
    }

    //lay du lieu theo id 
    public function find($table, $id)
    {
        if ($id != null) {

            $sql = "SELECT * FROM ${table} WHERE ${table}.id = $id";
            $query = $this->_query($sql);
            $data = [];

            while ($row = mysqli_fetch_assoc($query)) {
                array_push($data, $row);
            }

            return $data;
        }
        return print('id not found');
    }

    //tao moi du lieu vao table
    public function create($table, $data = [])
    {
        if ($data != null) {
            // chuyen data truyen vao dang string der import vao database
            $columns = implode(', ', array_keys($data));
            $valueFinal = array_map(function ($value) {
                return "'" . $value . "'";
            }, array_values($data));
            $valueFinal = implode(', ', $valueFinal);
            // print_r($valueFinal);
            $sql = "INSERT INTO ${table} (${columns}) VALUES (${valueFinal})";

            $this->_query($sql);

            return print('Create Success');
        }

        return print('Not Created');
    }

    public function update($table, $id, $data)
    {
        if ($id != null) {
            $dataset = [];
            foreach ($data as $key => $value) {
                array_push($dataset, "${key} = '" . $value . "'");
            }
            $dataString = implode(', ', $dataset);

            $sql = "UPDATE ${table} SET ${dataString} WHERE id=$id";
            $this->_query($sql);
            return print('Updated');
        }
        return print('id not found');
    }

    public function delete($table, $id)
    {
        if ($id != null) {
            $sql = "DELETE FROM ${table} WHERE ${table}.id = $id";
            $query = $this->_query($sql);
            return print("id ${id} in ${table} has been deleted");
        }
        return print('id not found');
    }

    public function getByQuery($sql)
    {
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    public function cusquery($sql)
    {
        return mysqli_query($this->connect, $sql);
    }

    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
}
