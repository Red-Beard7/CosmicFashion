<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AnalyticController extends BaseController
{
    public function index() {
        return view('Admin/pages/analytics/index');
    }
}
