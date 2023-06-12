<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TypeInfractionModel;

class TypeInfractionController extends BaseController
{
    public function index()
    {
        $infractionModel = new TypeInfractionModel();

        $data['title'] = 'LES DIFFERENTS TYPES D\'INFRACTIONS';
        $data['heading'] = 'Liste types d\'infractions';
        $data['infractions'] = $infractionModel->orderBy('id', 'DESC')->findAll();
        $data['tableinfractions'] = $this->_generateTableinfractions($data['infractions']);

        // $data['infractions'] = $infractionModel->findAll();
        return view('infraction_view', $data);
    }
    public function get_types_infactions()
    {
        $model = model(TypeInfractionModel::class);
        $data['infractions'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->response->setJSON($data['infractions']);
    }
    public function create()
    {
        return view('add_infraction');
    }
    // show single user
    public function singleinfraction($id = null)
    {
        helper('form');
        $infractionModel = new TypeInfractionModel();
        $data['infraction_obj'] = $infractionModel->where('id', $id)->first();
        return view('bootstrap5', $data);
    }
    public function delete($id = null)
    {
        $infractionModel = new TypeInfractionModel();
        $data['infraction'] = $infractionModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/users-list'));
    }
    public function update()
    {
        $infractionModel = new TypeInfractionModel();
        $id = $this->request->getVar('id');
        $data = [
            'NAME' => $this->request->getVar('name'),
            'EMAIL' => $this->request->getVar('email'),
        ];
        $infractionModel->update($id, $data);
        return $this->response->redirect(site_url('/users-list'));
    }
    private function _generateTableinfractions(array $infractions = null)
    {
        $table = new \CodeIgniter\View\Table();
        $template = [
            'table_open' => '<table class="table table-bordered" id="infractions-list">',
            // 'table_open' => '<table class="table table-striped"  style="width:100%" id="infractions-list">',
        ];
        $table->setTemplate($template);
        $table->setEmpty('&nbsp;');
        array_walk($infractions, function (&$value) {
            $value['Action'] = anchor('edit-infraction/' . $value['id'], 'Edit', '" class="btn btn-primary btn-sm"') . '&nbsp'; //'<a href="' . $action . '" class="btn btn-primary btn-sm">Edit</a>';
            $value['Action'] .= anchor('delete-infraction/' . $value['id'], 'Delete', '" class="btn btn-danger btn-sm"'); // '<a href="' . $action . '" class="btn btn-danger btn-sm">Delete</a>';
        });
        $table->setHeading(
            'Id',
            'Date Création',
            'libellé',
            'Loi N°',
            'Date Loi',
            'Action'
        );
        return $table->generate($infractions);
    }
}
