<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Task;
use App\Models\TaskRepository;
use App\Models\TaskResourceModel;
class TasksController extends Controller
{
    private $taskRepo;

    public function __construct()
    {
        /* $this->taskRepo = new TaskRepository(); */
        $this->taskRepo = new TaskResourceModel();
    }
    public function index()
    {
        $d['tasks'] = $this->taskRepo->getList();

        $this->set($d);
        $this->render("index");
    }

    public function create()
    {
        if (isset($_POST["title"])) {
            $taskModel = new Task();
            $taskModel->setTitle($_POST['title']);
            $taskModel->setDescription($_POST['description']);

            if ($this->taskRepo->save($taskModel)) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    public function edit($id)
    {
        $d['task'] = $this->taskRepo->getModelById($id);
        if (isset($_POST["title"])) {
            $taskModel = new Task();
            $taskModel->setId($id);
            $taskModel->setTitle($_POST['title']);
            $taskModel->setDescription($_POST['description']);
            if ($this->taskRepo->save($taskModel)) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    public function delete($id)
    {
        if ($this->taskRepo->delete($id)) {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
