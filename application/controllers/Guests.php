<?php
	class Guests extends CI_Controller{
		public function index(){
			$data['guests'] = $this->Guest_model->get_guests();

			$data['title'] = 'Latest Guests';
			$this->load->view('templates/header');
			$this->load->view('guests/index', $data);
			$this->load->view('templates/footer');
		}
		public function view($slug = NULL){
			$data['guest'] = $this->Guest_model->get_guests($slug);
			if(empty($data['guest'])){
				show_404();
			}
			$data['name'] = $data['guest']['name'];
			$this->load->view('templates/header');
			$this->load->view('guests/view', $data);
			$this->load->view('templates/footer');
		}
		public function create(){
			$data['title'] = 'Add to Guest List';
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('comment', 'Comment', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('guests/create', $data);
				$this->load->view('templates/footer');
			} else {
				$this->Guest_model->create_guest();
				redirect('index.php/guests');
			}
		}
		public function delete($id) {
			echo $id;
		}
	}
