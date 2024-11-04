<?php

namespace App\Controllers;

class MentionLegalesController extends Controller
{
    public function index()
    {
        $title = "Mentions Légales";
        $this->render('mentionslegales/index', [
            'title' => $title
        ]);
    }
}