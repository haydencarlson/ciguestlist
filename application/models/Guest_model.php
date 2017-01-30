<?php
	class Guest_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function get_guests($slug = FALSE) {
			if($slug === FALSE){
				$this->db->order_by('id', 'DESC');
				$query = $this->db->get('guests');
				return $query->result_array();
			}
			$query = $this->db->get_where('guests', array('slug' => $slug));
			return $query->row_array();
		}
		public function create_guest() {
			$slug = url_title($this->input->post('name'));
			$data = array(
				'name' => $this->input->post('name'),
				'slug' => $slug,
				'comment' => $this->input->post('comment')
			);
			return $this->db->insert('guests', $data);
		}
	}