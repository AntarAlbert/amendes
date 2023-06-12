<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VerbalisateurInfractionModel;

class VerbalisateurInfractionController extends BaseController
{
    public function index()
    {
        $verbalisateurModel = new VerbalisateurInfractionModel();

        $data['title'] = 'VERBALISATEURS D\'INFRACTION';
        $data['heading'] = 'Liste des verbalisateurs de l\'infraction';
        $data['verbalisateurs'] = $verbalisateurModel->orderBy('id', 'DESC')->findAll();
        $data['tableverbalisateurs'] = $this->_generateTableverbalisateurs($data['verbalisateurs']);

        // $data['verbalisateurs'] = $verbalisateurModel->findAll();
        return view('verbalisateur_view', $data);
    }
    public function create()
    {
        return view('add_verbalisateur');
    }
    // show single user
    public function singleverbalisateur($id = null)
    {
        helper('form');
        $verbalisateurModel = new VerbalisateurInfractionModel();
        $data['verbalisateur_obj'] = $verbalisateurModel->where('id', $id)->first();
        return view('bootstrap5', $data);
    }
    public function delete($id = null)
    {
        $verbalisateurModel = new VerbalisateurInfractionModel();
        $data['verbalisateur'] = $verbalisateurModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/users-list'));
    }
    public function update()
    {
        $verbalisateurModel = new VerbalisateurInfractionModel();
        $id = $this->request->getVar('id');
        $data = [
            'NAME' => $this->request->getVar('name'),
            'EMAIL' => $this->request->getVar('email'),
        ];
        $verbalisateurModel->update($id, $data);
        return $this->response->redirect(site_url('/users-list'));
    }
    private function _generateTableverbalisateurs(array $verbalisateurs = null)
    {
        $table = new \CodeIgniter\View\Table();
        $template = [
            'table_open' => '<table class="table table-bordered" id="verbalisateurs-list">',
            // 'table_open' => '<table class="table table-striped"  style="width:100%" id="verbalisateurs-list">',
        ];
        $table->setTemplate($template);
        $table->setEmpty('&nbsp;');
        array_walk($verbalisateurs, function (&$value) {
            unset($value['user_id']);
            unset($value['division_id']);
            unset($value['civilite_id']);
            unset($value['actif']);
            unset($value['billeteur']);
            unset($value['ordre']);
            $value['Action'] = anchor('edit-verbalisateur/' . $value['id'], 'Edit', '" class="btn btn-primary btn-sm"') . '&nbsp'; //'<a href="' . $action . '" class="btn btn-primary btn-sm">Edit</a>';
            $value['Action'] .= anchor('delete-verbalisateur/' . $value['id'], 'Delete', '" class="btn btn-danger btn-sm"'); // '<a href="' . $action . '" class="btn btn-danger btn-sm">Delete</a>';
        });
        $table->setHeading('Id', 'Sigle', 'Nom', 'Prénom(s)', 'Matricule', 'E-mail', 'Fonction', 'Action');
        return $table->generate($verbalisateurs);
    }
}
