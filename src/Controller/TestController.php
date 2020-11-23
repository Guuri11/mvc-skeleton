<?php


namespace App\Controller;

use App\Model\TestModel;

class TestController extends AbstractController
{
    public function index()
    {
        require("views/index.view.php");
    }

    public function showTest($id){

        $test_model = new TestModel($this->db);

        $test = $test_model->getById(intval($id));

        require("views/show.view.php");
    }

    public function showTestByName($name){

        $test_model = new TestModel($this->db);

        $test = $test_model->getByName($name);

        require("views/show.view.php");
    }
}