<?php

class Home extends CI_Controller
{
	/*
	 * Default to Home page
	 */
	public function index()
	{
		$data['page'] = 'Home';
		$data['users'] = $this->User_model->get_users();

		$this->load->view('templates/header', $data);
		$this->load->view('pages/home', $data);
		$this->load->view('templates/footer');
	}
}
