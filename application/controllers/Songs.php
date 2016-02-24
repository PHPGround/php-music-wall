<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Songs extends CI_Controller{
  public function view($song = 'home')
  {
    if( ! file_exists(APPPATH.'/views/songs/'.$song.'.php')){
      //Don't have a page for that
      show_404();
    }
    $data['title'] = ucfirst($song); //capitalize the first letter
    $this->load->view('templates/header', $data);
    $this->load->view('songs/'.$song, $data);
    $this->load->view('templates/footer', $data);
  }
}