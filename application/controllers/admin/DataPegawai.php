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
            $nik                = $this->input->post('nik');
            $nama_pegawai       = $this->input->post('nama_pegawai');
            $jenis_kelamin      = $this->input->post('jenis_kelamin');
            $tanggal_masuk      = $this->input->post('tanggal_masuk');
            $jabatan            = $this->input->post('jabatan');
            $status             = $this->input->post('status');
            $foto               = $_FILES['foto']['name'];

            if($foto=''){}else{
                $config['upload_path']      = './assets/photo';
                $config['allowed_types']    = 'jpg|jpeg|png|tiff';
                $this->load->library('upload',$config);
                // apabila tidak berhasil upload foto tampilkan pesan error
                if(!$this->upload->do_upload('foto')){
                    echo "Photo gagal diupload!";
                }else{
                    $foto = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nik' => $nik,
                'nama_pegawai' => $nama_pegawai,
                'jenis_kelamin' => $jenis_kelamin,
                'tanggal_masuk' => $tanggal_masuk,
                'jabatan' => $jabatan,
                'status' => $status,
                'foto' => $foto
            );

            // var_dump($data);

            $this->PenggajianModel->insert_data($data,'data_pegawai');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/DataPegawai');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nik','NIK','required');
        $this->form_validation->set_rules('nama_pegawai','nama pegawai','required');
        $this->form_validation->set_rules('jenis_kelamin','jenis kelamin','required');
        $this->form_validation->set_rules('tanggal_masuk','tanggal masuk','required');
        $this->form_validation->set_rules('jabatan','jabatan jabatan','required');
        $this->form_validation->set_rules('status','status','required');
    }
}

?>