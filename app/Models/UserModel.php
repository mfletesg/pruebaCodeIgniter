<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function createUserModel($firtName, $lastName, $address)
        {
            $query = "INSERT INTO home
                            (
                            first_name,
                            last_name,
                            address
                            )
                            VALUES
                            (
                            '{$firtName}', 
                            '{$lastName}', 
                            '{$address}' 
                            )";
            $query=$this->db->query($query);
            return $query;
        }

    public function getUsersModel(){
        $query = "SELECT id, first_name, last_name, address FROM home";
        $query=$this->db->query($query);
        return $query->getResultArray();
    }


    public function editUsersModel($id, $firtName, $lastName, $address){
        $query = "  UPDATE  home
                        SET
                        first_name = '{$firtName}',
                        last_name = '{$lastName}',
                        address = '{$address}'
                    WHERE id = $id";
        $query=$this->db->query($query);
    }

    public function deleteUsersModel($id){
        $query = "  DELETE FROM home WHERE id = $id";
        $query=$this->db->query($query);
    }
}