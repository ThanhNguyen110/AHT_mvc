<?php

namespace App\Core;

class ResourceModel implements ResourceModelInterface
{
    protected $table;
    protected $id;
    protected $model;

    public function _init($table, $id, $model)
    {
        $this->table = $table;
        $this->id    = $id;
        $this->model = $model;
    }

    public function save($model)
    {
        $arr_atr = $model->getProperties(); //attribute's array
        $add_attributes = array();  //attribute's query for create new model
        $update_attributes = array(); //attribute's query for update model
        $addValue = array();    //attribute's value

        if ($model->getId() == null) {
            //If id == null, create new model

            foreach ($arr_atr as $value => $index) {
                if ($value == null)  continue;
                $add_attributes[] = $value;
                array_push($addValue, ':' . $value);
            }

            //convert array to string
            $str_atr = implode(', ', $add_attributes);
            $str_value = implode(', ', $addValue);

            //query
            $sql = "INSERT INTO $this->table";
            $sql .= " (" . $str_atr . ")";
            $sql .= " VALUES(" . $str_value . ")";

            $req = Database::getBdd()->prepare($sql);

            return $req->execute($arr_atr);
        } else {
            //If id != null, update model
            //Get ID
            $id = $model->getId();

            foreach ($arr_atr as $value => $index) {
                if ($value == null)   continue;
                array_push($update_attributes, $value . " = :" . $value);
            }

            $str_update_atr = implode(', ', $update_attributes);

            //query
            $sql = "UPDATE $this->table SET " . $str_update_atr;
            $sql .= " WHERE id = " . $id;

            $req = Database::getBdd()->prepare($sql);
            return $req->execute($arr_atr);
        }
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM $this->table WHERE id = ?';
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([$id]);
    }

    public function getList()
    {
        $sql = "SELECT * FROM $this->table";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function getModelById($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id =" . $id;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }
}
