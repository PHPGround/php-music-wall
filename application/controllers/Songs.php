<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Songs extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('songs_model');
    $this->load->helper('url_helper');
  }

  // public function view($song = 'home')
  // {
  //   if( ! file_exists(APPPATH.'/views/songs/'.$song.'.php')){
  //     //Don't have a page for that
  //     show_404();
  //   }
  //   $data['title'] = ucfirst($song); //capitalize the first letter
  //   $this->load->view('layout');
  //   $this->load->view('templates/header', $data);
  //   $this->load->view('songs/'.$song, $data);
  //   $this->load->view('templates/footer', $data);
  // }


  //for default page:
  public function index()
  {
    $data['title'] = "Song Homepage";

    $data['songs'] = $this->songs_model->get_songs();

    $this->load->view('layout');
    $this->load->view('templates/header', $data);
    $this->load->view('songs/index', $data);
    $this->load->view('templates/footer', $data);
  }

  public function create()
  {
    $this->load->view('layout');
    $this->load->view('templates/header', $data);
    $this->load->view('songs/create', $data);
    $this->load->view('templates/footer', $data);

    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('track', 'Track', 'required');
    $this->form_validation->set_rules('artist', 'Artist', 'required');
    $this->form_validation->set_rules('link', 'Link to Song', 'required');

    if ($this->form_validation->run() === FALSE){
      $this->load->view('songs/create');
    }else{
      $this->songs_model->set_songs();
      redirect('songs/index');
    }

  }
}