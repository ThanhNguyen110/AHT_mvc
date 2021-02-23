<?php

namespace App\Models;

use App\Core\ResourceModel;

class TaskResourceModel extends ResourceModel
{
    public function __construct()
    {
        $task = new TaskModel();
        parent::_init("tasks", "id", $task);
    }
}
