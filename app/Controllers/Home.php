<?php

namespace App\Controllers;
use App\Models\UserModel;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



class Home extends BaseController
{
    public function index()
    {
        return view('home');
    }


    public function createUsers(){

        try {
            $json = json_decode(trim(file_get_contents('php://input')), true);
            $firtName = $json['firtName'];
            $lastName = $json['lastName'];
            $address = $json['address'];

            $UserModel = new UserModel();
            $UserModel->createUserModel($firtName, $lastName, $address);
        } catch (\Throwable $th) {
            print_r($th);
        }

        $data = array('message' => 'User Create', 'data' => null, 'error' => 0);
        echo json_encode($data);

    }


    public function getUsers(){
        $UserModel = new UserModel();
        $listUsers = $UserModel->getUsersModel();

        $data = array('message' => 'ok', 'data' => $listUsers, 'error' => 0);
        echo json_encode($data);
    }

    public function editUsers(){
        $json = json_decode(trim(file_get_contents('php://input')), true);
        $id = $json['id'];
        $firtName = $json['firtName'];
        $lastName = $json['lastName'];
        $address = $json['address'];
        $UserModel = new UserModel();
        $UserModel->editUsersModel($id, $firtName, $lastName, $address);

        $data = array('message' => 'User updated successy', 'data' => '', 'error' => 0);
        echo json_encode($data);
    }


    public function deleteUser(){
        $json = json_decode(trim(file_get_contents('php://input')), true);
        $id = $json['id'];
        $UserModel = new UserModel();
        $UserModel->deleteUsersModel($id);

        $data = array('message' => 'User deleted', 'data' => '', 'error' => 0);
        echo json_encode($data);
    }
}
