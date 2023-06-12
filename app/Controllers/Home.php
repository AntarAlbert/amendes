<?php

namespace App\Controllers;

use App\Models\AgentBeneficiaireModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        helper('form');
        $userModel = new AgentBeneficiaireModel();
        $data['agents'] = $userModel->orderBy('id', 'DESC')->findAll();
        // return view('agent_view', $data);
        return view('regions');
        // return view('welcome_message');
    }
}
