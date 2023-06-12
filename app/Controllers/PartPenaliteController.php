<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PartPenaliteModel;

class PartPenaliteController extends BaseController
{

    public function index()
    {
        helper('form');
        $part_penaliteModel = new PartPenaliteModel();

        $data['title'] = 'AGENTS VERBALISATEURS';
        $data['heading'] = 'LISTE DES AGENTS BENEFICIAIRES';
        $data['part_penalites'] = $part_penaliteModel->orderBy('id', 'DESC')->findAll();
        $data['tableAgents'] = $this->_generateTableAgents($data['part_penalites']);

        // $data['part_penalites'] = $part_penaliteModel->findAll();
        return view('part_penalite_view', $data);
    }
    public function store()
    {
        $part_penaliteModel = new PartPenaliteModel();
        $data = [
            'nom' => 'required|max_length[255]|min_length[3]',
            'prenom'  => 'required|max_length[255]|min_length[10]',
            'division_id'   => 'integer',
            'civilite_id'   => 'integer',
            'id_recapitulatif' => 'integer',
            'ordre' => 'integer',
            'fonction_part_penalite' => 'required|max_length[255]|min_length[10]',
        ];
        $part_penaliteModel->insert($data);
        return $this->response->redirect(site_url('/part_penalites-list'));
    }

    public function create()
    {
        helper('form');
        if (!$this->request->is('post')) {
            return view('add_part_penalite');
        }
        $post = $this->request->getPost([
            'user_id',
            'division_id',
            'civilite_id',
            'sigle',
            'nom',
            'prenom',
            'im',
            'email',
            'actif',
            'id_recapitulatif',
            'ordre',
            'fonction_part_penalite'
        ]);
        if (!$this->validateData($post, [
            'nom' => 'required|max_length[255]|min_length[3]',
            'prenom'  => 'required|max_length[255]|min_length[10]',
            'email' => 'required|valid_email|max_length[150]',
            'division_id'   => 'integer',
            'civilite_id'   => 'integer',
            'id_recapitulatif' => 'integer',
            'ordre' => 'integer',
            'fonction_part_penalite' => 'required|max_length[255]|min_length[10]',
        ])) {
            return view('add_part_penalite');
        }
        $model = model(PartPenaliteModel::class);
        $model->save([
            'division_id' => $post['division_id'],
            'civilite_id' => $post['civilite_id'],
            'sigle' => $post['sigle'],
            'nom' => $post['nom'],
            'prenom' => $post['prenom'],
            'im' => $post['im'],
            'email' => $post['email'],
            'actif' => $post['actif'],
            'id_recapitulatif' => $post['id_recapitulatif'],
            'ordre' => $post['ordre'],
            'fonction_part_penalite' => $post['fonction_part_penalite'],
        ]);
        return $this->response->redirect(site_url('/part_penalites-list'));
    }
    // show single part_penalite
    public function singlePenalite($id = null)
    {
        helper('form');
        $partPenaliteModel = new PartPenaliteModel();
        $data['part_penalite'] = $partPenaliteModel->where('id', $id)->first();
        return view('edit_part_penalite', $data);
    }
    public function delete($id = null)
    {
        $part_penaliteModel = new PartPenaliteModel();
        $data['part_penalite'] = $part_penaliteModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/part_penalites-list'));
    }
    public function update()
    {
        $part_penaliteModel = new PartPenaliteModel();
        $id = $this->request->getVar('id');
        $data = [
            'part_penalite_id' => $this->request->getVar('part_penalite_id'),
            'division_id' => $this->request->getVar('division_id'),
            'civilite_id' => $this->request->getVar('civilite_id'),
            'sigle' => $this->request->getVar('sigle'),
            'nom' => $this->request->getVar('nom'),
            'prenom' => $this->request->getVar('prenom'),
            'im' => $this->request->getVar('im'),
            'email' => $this->request->getVar('email'),
            'actif' => $this->request->getVar('actif'),
            'id_recapitulatif' => $this->request->getVar('id_recapitulatif'),
            'ordre' => $this->request->getVar('ordre'),
            'fonction_part_penalite' => $this->request->getVar('fonction_part_penalite')
        ];
        $part_penaliteModel->update($id, $data);
        return $this->response->redirect(site_url('/part_penalites-list'));
    }
    private function _generateTableAgents(array $part_penalites = null)
    {
        $table = new \CodeIgniter\View\Table();
        $template = [
            'table_open' => '<table class="table table-bordered" id="part_penalites-list">',
            // 'table_open' => '<table class="table table-striped"  style="width:100%" id="part_penalites-list">',
        ];
        $table->setTemplate($template);
        $userModel = model('DivisionModel');
        array_walk($part_penalites, function (&$value) use ($userModel) {
            unset($value['user_id']);
            unset($value['civilite_id']);
            unset($value['actif']);
            unset($value['ordre']);
            $division = $userModel->where('id', $value['division_id'])->first();
            $value['division_id'] = $division['nom_division'] ?? '';
            $userModel = model('RecapitulatifModel');
            $division = $userModel->where('id', $value['id_recapitulatif'])->first();
            $value['id_recapitulatif'] = $division['recapitulatif'] ?? '';
            $value['Action'] = anchor('edit-part_penalite/' . $value['id'], 'Modifier', '" class="btn btn-primary btn-sm"') . '&nbsp'; //'<a href="' . $action . '" class="btn btn-primary btn-sm">Edit</a>';
            $value['Action'] .= anchor('delete-part_penalite/' . $value['id'], 'Supprimer', '" class="btn btn-danger btn-sm"'); // '<a href="' . $action . '" class="btn btn-danger btn-sm">Delete</a>';
        });
        $table->setHeading('Id', 'Division', 'Sigle', 'Nom', 'Prénom(s)', 'Matricule', 'E-mail', 'Rôle', 'Fonction', 'Action');
        return $table->generate($part_penalites);
    }
}
