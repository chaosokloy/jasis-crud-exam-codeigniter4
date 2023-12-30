<?php

namespace app\Controller;

class Admin extends BaseController
{
    public function dashboard()
{
    return view('Admin/dashboard');
}
}