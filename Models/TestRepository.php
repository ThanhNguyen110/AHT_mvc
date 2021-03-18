<?php

namespace App\Models;

use App\Models\TestResourceModel;

class TestRepository
{
    protected $testRM;

    public function __construct()
    {
        return $this->testRM = new TestResourceModel();
    }

    public function get($id)
    {
        return $this->testRM->getModelById($id);
    }

    public function getAll()
    {
        return $this->testRM->getList();
    }

    public function add($model)
    {
        return $this->testRM->save($model);
    }

    public function edit($model)
    {
        return $this->testRM->save($model);
    }

    public function delete($id)
    {
        return $this->testRM->delete($id);
    }
}
