<?php

class Home extends Controller
{
    public $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    public function index()
    {
        $this->view('homepage');
    }
    public function dashboard()
    {
        $this->view('dashboard');
    }

}