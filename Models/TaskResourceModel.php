<?php

namespace App\Models;

use App\Core\ResourceModel;

class TaskResourceModel extends ResourceModel
{
    public function __construct()
    {
        $task = new Task();
        parent::_init("tasks", "id", $task);
    }
}
