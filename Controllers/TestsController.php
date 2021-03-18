<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Test;
use App\Models\TestRepository;
use App\Models\TestResourceModel;

class TestsController extends Controller
{
    private $testRepo;

    public function __construct()
    {
        $this->testRepo = new TestRepository();
        /* $this->testRepo = new TestResourceModel(); */
    }
    public function index()
    {
        $d['tests'] = $this->testRepo->getAll();

        $this->set($d);
        $this->render("index");
    }

    public function create()
    {
        if (isset($_POST["title"])) {
            $testModel = new Test();
            $testModel->setTitle($_POST['title']);
            $testModel->setDescription($_POST['description']);
            if ($this->testRepo->add($testModel)) {
                header("Location: " . WEBROOT . "tests/index");
            }
        }

        $this->render("create");
    }

    public function edit($id)
    {
        $d['test'] = $this->testRepo->get($id);
        if (isset($_POST["title"])) {
            $testModel = new Test();
            $testModel->setId($id);
            $testModel->setTitle($_POST['title']);
            $testModel->setDescription($_POST['description']);

            if ($this->testRepo->edit($testModel)) {
                header("Location: " . WEBROOT . "tests/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    public function delete($id)
    {
        if ($this->testRepo->delete($id)) {
            header("Location: " . WEBROOT . "tests/index");
        }
    }
}
