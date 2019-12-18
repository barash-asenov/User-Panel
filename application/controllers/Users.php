<?php

use GuzzleHttp\Client;

class Users extends CI_Controller
{
	public function register()
	{
		$data['page'] = 'Register';

		$this->load->view('templates/header');
		$this->load->view('pages/register');
		$this->load->view('templates/footer');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]|valid_email|callback_not_disposable_email');
		$this->form_validation->set_rules('captchaResponse', 'Captcha Response', 'required|callback_valid_captcha');

		/*
		 * Check if credentials are valid.
		 */
		if ($this->form_validation->run() == FALSE) {
			$error_response = $this->form_validation->error_array();

			$this->output
				->set_status_header(400)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($error_response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
		} else {
			/*
			 * Passed the for validation, can do the insertion
			 */
			$username = $this->input->post('username');
			$email = $this->input->post('email');

			$insert_user = $this->User_model->insert_user($username, $email);

			if (!$insert_user)
			{
				$response = array(
					'insertion_error' => 'Something went wrong. Please try again later'
				);

				$this->output
					->set_status_header(500)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
			} else {
				$response = array(
					'status' => 'OK',
					'message' => 'User has been registered successfully'
				);

				$this->output
					->set_status_header(201)
					->set_content_type('application/json', 'utf-8')
					->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
			}
		}
	}

	/*
	 * Callback Functions
	 */

	public function valid_captcha($captchaResponse)
	{
		$client = new Client([
			'base_uri' => CAPTCHA_VERIFY_ADDRESS,
			'timeout' => 5.0
		]);

		$request_body = [
			'query' => [
				'secret' => env('reCAPTCHA_SECRET_KEY'),
				'response' => $captchaResponse,
				'remoteip' => $_SERVER['REMOTE_ADDR']
			]
		];

		$verify_response_json = $client->request('POST', 'siteverify', $request_body);

		$verify_response = json_decode($verify_response_json->getBody());

		if (isset($verify_response) && $verify_response->success == TRUE) {
			return TRUE;
		} else {
			$this->form_validation->set_message('valid_captcha', 'Captcha is not valid.');
			return FALSE;
		}
	}

	public function not_disposable_email($email)
	{
		$client = new Client([
			'base_uri' => DISPOSABLE_CHECK_API,
			'timeout' => 5.0
		]);

		$encoded_email = urlencode($email);

		$verify_response_json = $client->request('GET', $encoded_email);

		$verify_response = json_decode($verify_response_json->getBody());

		if (isset($verify_response) && $verify_response->disposable == FALSE) {
			return TRUE;
		} else {
			$this->form_validation->set_message('not_disposable_email', 'The email address you are using is disposable.');
			return FALSE;
		}
	}
}
