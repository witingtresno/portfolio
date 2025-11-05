<?php

namespace App\Http\Controllers;

use App\ViewModels\HomeViewModel;

class HomeController extends Controller
{
    public function __invoke()
    {
        $viewModel = HomeViewModel::make();

        return view('home.index', [
            'profile' => $viewModel->profile(),
            'projects' => $viewModel->projects(),
            'skills' => $viewModel->skills(),
        ]);
    }
}
