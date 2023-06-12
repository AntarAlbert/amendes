<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AmendeModel;
use App\Models\AutoritesCompetentesModel;
use App\Models\LieuRedactionModel;
use App\Models\ReglementationModel;

class AmendeController extends BaseController
{
    public function index()
    {
        $amendeModel = new AmendeModel();

        $data['title'] = 'amendeS VERBALISATEURS';
        $data['heading'] = 'LISTE DES amendeS BENEFICIAIRES';
        $data['amendes'] = $amendeModel->orderBy('id', 'DESC')->findAll();
        $data['tableamendes'] = $this->_generateTableamendes($data['amendes']);

        // $data['amendes'] = $amendeModel->findAll();
        return view('amende_view', $data);
    }
    public function create()
    {
        helper('form');
        return view('add_amende');
    }
    // show single user
    public function singleAmende($id = null)
    {
        helper('form');
        $amendeModel = new AmendeModel();
        $data['amende_obj'] = $amendeModel->where('id', $id)->first();
        return view('edit_amende', $data);
    }
    public function delete($id = null)
    {
        $amendeModel = new AmendeModel();
        $data['amende'] = $amendeModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/users-list'));
    }
    public function update()
    {
        $amendeModel = new AmendeModel();
        $id = $this->request->getVar('id');
        $data = [
            'NAME' => $this->request->getVar('name'),
            'EMAIL' => $this->request->getVar('email'),
        ];
        $amendeModel->update($id, $data);
        return $this->response->redirect(site_url('/users-list'));
    }
    private function _generateTableamendes(array $amendes = null)
    {
        $table = new \CodeIgniter\View\Table();

        $template = [
            'table_open' => '<table class="table cell-border hover compact stripe" id="amendes-list">',
            // 'table_open' => '<table class="table table-bordered" id="amendes-list">',
            // 'table_open' => '<table class="table table-striped"  style="width:100%" id="amendes-list">',
        ];
        $table->setTemplate($template);
        $table->setEmpty('&nbsp;');
        array_walk($amendes, function (&$value) {
            $value['nif'] = anchor('details-nif/' . $value['nif'],  $value['nif'], ['title' => 'Voir détails ' . $value['nif']]);
            $value['cin'] =  $value['cin'] ? anchor('details-cin/' . $value['cin'], $value['cin'], ['title' => 'Voir détails ' . $value['cin']]) : null;
            $userModel = model('LieuRedactionModel');
            $lieu = $userModel->where('id', $value['id_lieu_redaction'])->first();
            $value['id_lieu_redaction'] = $lieu['service'] ?? null;
            $userModel = model('AutoritesCompetentesModel');
            $autorites = $userModel->where('id', $value['id_autorite_requerente'])->first();
            $value['id_autorite_requerente'] = $autorites['autorite'] ?? null;
            $userModel = model('ReglementationModel');
            $d = 0;
            $reglement = $userModel->where('id', $value['id_reglementation'])->first();
            $value['id_reglementation'] = $reglement['loi'] ?? null;
            $value['montant_penalite'] = number_format(floatval($value['montant_penalite']), 2, ',', ' ');
            $value['montant_paye'] = number_format(floatval($value['montant_paye']), 2, ',', ' ');
            $value['montant_reste'] = number_format(floatval($value['montant_reste']), 2, ',', ' ');
            $value['Action'] = anchor('edit-amende/' . $value['id'], 'Modification',  ['title' => 'Modifier amende Id=' . $value['id'], 'class' => 'btn btn-outline-primary btn-sm']) . '&nbsp'; //'" class="btn btn-primary btn-sm"') . '&nbsp'; //'<a href="' . $action . '" class="btn btn-primary btn-sm">Edit</a>';
            $value['Action'] .= anchor('payer-amende/' . $value['id'], 'Paiement', ['title' => 'Paiement amende Id=' . $value['id'], 'class' => 'btn btn-outline-success btn-sm]']); //" class="btn btn-danger btn-sm"'); // '<a href="' . $action . '" class="btn btn-danger btn-sm">Delete</a>';
        });
        $table->setHeading('Id', 'N°PV', 'NIF', 'CIN', 'Lieu redaction', 'Autorite Requerente', 'Loi N°', 'Constatation', 'Montant penalite', 'Montant payé', 'Montant reste', 'Action');
        return $table->generate($amendes);
    }
}
