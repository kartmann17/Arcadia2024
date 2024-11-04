<?php

namespace App\Controllers;

class RgpdController extends Controller
{
    public function index()
    {
        $title = "RGPD";
        $this->render('rgpd/index', [
            'title' => $title
        ]);
    }
}