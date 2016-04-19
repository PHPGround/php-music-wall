<?php

  class Songs_model extends CI_Model{

    public function __construct(){
      $this->load->database();
    }

  }

    //to get a song from database:
    public function get_songs($id = NULL){
      if ($id === NULL){
        $query = $this->db->get('songs');
        return $query-> result_array();
      }

      $query = $this->db->get_where('songs', array('id' => $id));
      return $query->row_array();
    }

    //to post a song to database:
    public function set_songs(){
      $data = array(
        'track' => $this->input->post('track'),
        'artist' => $this->input->post('artist'),
        'link' => $this->input->post('link'), 
      );

      return $this->db->insert('songs', $data);
    }
