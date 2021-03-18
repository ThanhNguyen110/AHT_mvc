<?php

namespace App\Models;

use App\Core\ResourceModel;

class TestResourceModel extends ResourceModel
{
    public function __construct()
    {
        $test = new Test();
        parent::_init("tests", null, $test);
    }
}
