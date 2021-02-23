<?php

namespace App\Models;

use App\Models\TaskResourceModel;

class TaskRepository
{
    public $taskRM;

    public function __construct()
    {
        return $this->taskRM = new TaskResourceModel();
    }

    public function get($id)
    {
        return $this->taskRM->getModelById($id);
    }

    public function getAll()
    {
        return $this->taskRM->getList();
    }

    public function add($model)
    {
        return $this->taskRM->save($model);
    }

    public function edit($model)
    {
        return $this->taskRM->save($model);
    }

    public function delete($id)
    {
        return $this->taskRM->delete($id);
    }
}
