<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgentBeneficiaireModel;

class AgentBeneficiaireController extends BaseController
{
    public function index()
    {
        helper('form');
        $agentModel = new AgentBeneficiaireModel();

        $data['title'] = 'AGENTS VERBALISATEURS';
        $data['heading'] = 'LISTE DES AGENTS BENEFICIAIRES';
        $data['agents'] = $agentModel->orderBy('id', 'DESC')->findAll();
        $data['tableAgents'] = $this->_generateTableAgents($data['agents']);

        // $data['agents'] = $agentModel->findAll();
        return view('agent_view', $data);
    }
    public function store()
    {
        $agentModel = new AgentBeneficiaireModel();
        $data = [
            'nom' => 'required|max_length[255]|min_length[3]',
            'prenom'  => 'required|max_length[255]|min_length[10]',
            'division_id'   => 'integer',
            'civilite_id'   => 'integer',
            'id_recapitulatif' => 'integer',
            'ordre' => 'integer',
            'fonction_agent' => 'required|max_length[255]|min_length[10]',
        ];
        $agentModel->insert($data);
        return $this->response->redirect(site_url('/agents-list'));
    }

    public function create()
    {
        helper('form');
        if (!$this->request->is('post')) {
            return view('add_agent');
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
            'fonction_agent'
        ]);
        if (!$this->validateData($post, [
            'nom' => 'required|max_length[255]|min_length[3]',
            'prenom'  => 'required|max_length[255]|min_length[10]',
            'email' => 'required|valid_email|max_length[150]',
            'division_id'   => 'integer',
            'civilite_id'   => 'integer',
            'id_recapitulatif' => 'integer',
            'ordre' => 'integer',
            'fonction_agent' => 'required|max_length[255]|min_length[10]',
        ])) {
            return view('add_agent');
        }
        $model = model(AgentBeneficiaireModel::class);
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
            'fonction_agent' => $post['fonction_agent'],
        ]);
        return $this->response->redirect(site_url('/agents-list'));
    }
    // show single agent
    public function singleAgent($id = null)
    {
        helper('form');
        $agentModel = new AgentBeneficiaireModel();
        $data['agent_obj'] = $agentModel->where('id', $id)->first();
        return view('edit_agent', $data);
    }
    public function delete($id = null)
    {
        $agentModel = new AgentBeneficiaireModel();
        $data['agent'] = $agentModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/agents-list'));
    }
    public function update()
    {
        $agentModel = new AgentBeneficiaireModel();
        $id = $this->request->getVar('id');
        $data = [
            'agent_id' => $this->request->getVar('agent_id'),
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
            'fonction_agent' => $this->request->getVar('fonction_agent')
        ];
        $agentModel->update($id, $data);
        return $this->response->redirect(site_url('/agents-list'));
    }
    private function _generateTableAgents(array $agents = null)
    {
        $table = new \CodeIgniter\View\Table();
        $template = [
            'table_open' => '<table class="table table-bordered" id="agents-list">',
            // 'table_open' => '<table class="table table-striped"  style="width:100%" id="agents-list">',
        ];
        $table->setTemplate($template);
        $userModel = model('DivisionModel');
        array_walk($agents, function (&$value) use ($userModel) {
            unset($value['user_id']);
            unset($value['civilite_id']);
            unset($value['actif']);
            unset($value['ordre']);
            $division = $userModel->where('id', $value['division_id'])->first();
            $value['division_id'] = $division['nom_division'] ?? '';
            $userModel = model('RecapitulatifModel');
            $division = $userModel->where('id', $value['id_recapitulatif'])->first();
            $value['id_recapitulatif'] = $division['recapitulatif'] ?? '';
            $value['Action'] = anchor('edit-agent/' . $value['id'], 'Modifier', '" class="btn btn-primary btn-sm"') . '&nbsp'; //'<a href="' . $action . '" class="btn btn-primary btn-sm">Edit</a>';
            $value['Action'] .= anchor('delete-agent/' . $value['id'], 'Supprimer', '" class="btn btn-danger btn-sm"'); // '<a href="' . $action . '" class="btn btn-danger btn-sm">Delete</a>';
        });
        $table->setHeading('Id', 'Division', 'Sigle', 'Nom', 'Prénom(s)', 'Matricule', 'E-mail', 'Rôle', 'Fonction', 'Action');
        return $table->generate($agents);
    }
}
