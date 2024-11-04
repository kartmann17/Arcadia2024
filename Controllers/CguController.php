<?php

namespace App\Controllers;

class CguController extends Controller
{
    public function index()
    {
        $title = "CGU";
        $this->render('cgu/index', [
            'title' => $title
        ]);
    }
}