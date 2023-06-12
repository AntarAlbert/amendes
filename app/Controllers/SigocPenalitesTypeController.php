<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SigocPenalitesTypeModel;

class SigocPenalitesTypeController extends BaseController
{
    public function index()
    {
        $penaliteModel = new SigocPenalitesTypeModel();

        $data['title'] = 'LES DIFFERENTS TYPES D\'penaliteS';
        $data['heading'] = 'Liste types d\'penalites';
        $data['penalites'] = $penaliteModel->orderBy('id', 'DESC')->findAll();
        $data['tablepenalites'] = $this->_generateTablepenalites($data['penalites']);

        // $data['penalites'] = $penaliteModel->findAll();
        return view('penalite_view', $data);
    }
    public function create()
    {
        return view('add_penalite');
    }
    // show single penalite
    public function singlepenalite($CODE_PENALITE = null)
    {
        helper('form');
        $penaliteModel = new SigocPenalitesTypeModel();
        $data['penalite_obj'] = $penaliteModel->where('id', $CODE_PENALITE)->first();
        return view('bootstrap5', $data);
    }
    public function delete($CODE_PENALITE = null)
    {
        $penaliteModel = new SigocPenalitesTypeModel();
        $data['penalite'] = $penaliteModel->where('id', $CODE_PENALITE)->delete($CODE_PENALITE);
        return $this->response->redirect(site_url('/penalites-list'));
    }
    public function update()
    {
        $penaliteModel = new SigocPenalitesTypeModel();
        $CODE_PENALITE = $this->request->getVar('id');
        $data = [
            'id' => $this->request->getVar('code_penalite'),
            'NATURE_PENALITE' => $this->request->getVar('nature_penalite'),
        ];
        $penaliteModel->update($CODE_PENALITE, $data);
        return $this->response->redirect(site_url('/penalites-list'));
    }
    private function _generateTablepenalites(array $penalites = null)
    {
        $table = new \CodeIgniter\View\Table();
        $template = [
            'table_open' => '<table class="table table-bordered" id="penalites-list">',
            // 'table_open' => '<table class="table table-striped"  style="width:100%" id="penalites-list">',
        ];
        $table->setTemplate($template);
        $table->setEmpty('&nbsp;');
        array_walk($penalites, function (&$value) {
            $value['Action'] = anchor('edit-penalite/' . $value['id'], 'Edit', '" class="btn btn-primary btn-sm"') . '&nbsp'; //'<a href="' . $action . '" class="btn btn-primary btn-sm">Edit</a>';
            $value['Action'] .= anchor('delete-penalite/' . $value['id'], 'Delete', '" class="btn btn-danger btn-sm"'); // '<a href="' . $action . '" class="btn btn-danger btn-sm">Delete</a>';
        });
        $table->setHeading(
            'Id',
            'Code',
            'Nature',
            'Action'
        );
        return $table->generate($penalites);
    }
}
