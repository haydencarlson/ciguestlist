<?php
	class Guests extends CI_Controller{
		//Index method to display all guests on guestlist
		public function index(){
			$data['guests'] = $this->Guest_model->get_guests();

			$data['title'] = 'Latest Guests';
			$this->load->view('templates/header');
			$this->load->view('guests/index', $data);
			$this->load->view('templates/footer');
		}
		//Gives us access to a single guest
		public function view($slug = NULL){
			//Gets the guest for the slug we pass in
			$data['guest'] = $this->Guest_model->get_guests($slug);
			if(empty($data['guest'])){
				show_404();
			}
			//Pass in guest data
			$data['name'] = $data['guest']['name'];
			$this->load->view('templates/header');
			$this->load->view('guests/view', $data);
			$this->load->view('templates/footer');
		}
		//Create new Guest
		public function create(){
			$data['title'] = 'Add to Guest List';
			//Don't allow empty field and callback to our isspam function
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('comment', 'Comment', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('spam', 'Spam', 'required|callback_isspam');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('guests/create', $data);
				$this->load->view('templates/footer');
			} else {
				$this->Guest_model->create_guest();
				redirect('index.php/guests');
			}
		}
		//call delete_guest function in our model passing in the id from our view function
		public function delete($id) {
			$this->Guest_model->delete_guest($id);
			redirect('index.php/guests');
		}
		public function isspam() {
			//Check spam input wether or not it equals the answer
			if ($this->input->post('spam') !== '7') {
				$this->form_validation->set_message('isspam', 'Incorrect answer');
				return false;
			} else {
				return true;
			}
		}
	}
