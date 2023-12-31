<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserCrud extends BaseController
{
	// show users list
	public function index()
	{
		$userModel = new UserModel();
		$data['users'] = $userModel->orderBy('ID', 'DESC')->findAll();
		return view('user_view', $data);
	}

	// add user form
	public function create()
	{
		return view('add_user');
	}

	// insert data
	public function store()
	{
		$userModel = new UserModel();
		$data = [
			'ID' => count($userModel->findAll()) + 1,
			'NAME' => $this->request->getVar('name'),
			'EMAIL' => $this->request->getVar('email'),
		];

		$userModel->insert($data);
		return $this->response->redirect(site_url('/users-list'));
	}

	// show single user
	public function singleUser($id = null)
	{
		$userModel = new UserModel();
		$data['user_obj'] = $userModel->where('ID', $id)->first();
		return view('edit_view', $data);
	}

	// update user data
	public function update()
	{
		$userModel = new UserModel();
		$id = $this->request->getVar('id');
		$data = [
			'NAME' => $this->request->getVar('name'),
			'EMAIL' => $this->request->getVar('email'),
		];
		$userModel->update($id, $data);
		return $this->response->redirect(site_url('/users-list'));
	}

	// delete user
	public function delete($id = null)
	{
		$userModel = new UserModel();
		$data['user'] = $userModel->where('ID', $id)->delete($id);
		return $this->response->redirect(site_url('/users-list'));
	}
}
