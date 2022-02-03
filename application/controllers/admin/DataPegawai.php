<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPegawai extends CI_Controller {

    public function index()
    {
        $data['title'] = "Data Pegawai";
        $data['pegawai'] = $this->PenggajianModel->get_data('data_pegawai')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataPegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData()
    {
        $data['title'] = "Tambah Data Pegawai";
        $data['jabatan'] = $this->PenggajianModel->get_data('data_jabatan')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formTambahPegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else{

        }
    }

    public function _rules()
    {
        # code...
    }
}
