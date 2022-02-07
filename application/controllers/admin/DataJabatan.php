<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataJabatan extends CI_Controller {

    public function index()
    {
        $data['title'] = "Data Jabatan";
        $data['jabatan'] = $this->PenggajianModel->get_data('data_jabatan')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataJabatan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData()
    {
        $data['title'] = "Tambah Data Jabatan";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formTambahDataJabatan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        $this->_rules();

        // apabila form validation false, maka kembalikan ke function tambah data
        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else{
            $nama_jabatan      = $this->input->post('nama_jabatan');
            $gaji_pokok        = $this->input->post('gaji_pokok');
            $tj_transport      = $this->input->post('tj_transport');
            $uang_makan        = $this->input->post('uang_makan');

            $data = array(
                'nama_jabatan' => $nama_jabatan,
                'gaji_pokok' => $gaji_pokok,
                'tj_transport' => $tj_transport,
                'uang_makan' => $uang_makan,
            );

            // data akan dimasukkan ke data_jabatan
            $this->PenggajianModel->insert_data($data,'data_jabatan');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/DataJabatan');

        }
    }

    public function updateData($id)
    {
        // Get id
        $where = array('id_jabatan' => $id);
        $data['jabatan'] = $this->db->query("SELECT * FROM data_jabatan WHERE id_jabatan = '$id'")->result();
        $data['title'] = "Tambah Data Jabatan";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateDataJabatan', $data);
        $this->load->view('templates_admin/footer');

    }

    public function updateDataAksi()
    {
        $this->_rules();

        // apabila form validation false, maka kembalikan ke function tambah data
        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else{
            $id                = $this->input->post('id_jabatan');
            $nama_jabatan      = $this->input->post('nama_jabatan');
            $gaji_pokok        = $this->input->post('gaji_pokok');
            $tj_transport      = $this->input->post('tj_transport');
            $uang_makan        = $this->input->post('uang_makan');

            $data = array(
                'nama_jabatan' => $nama_jabatan,
                'gaji_pokok' => $gaji_pokok,
                'tj_transport' => $tj_transport,
                'uang_makan' => $uang_makan,
            );

            $where = array(
                'id_jabatan' => $id
            );

            var_dump($where);
            var_dump($data);
            // data akan dimasukkan ke data_jabatan
            // $this->PenggajianModel->update_data('data_jabatan',$data,$where);
            // $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            // <strong>Data berhasil diupdate</strong>
            // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            // <span aria-hidden="true">&times;</span>
            // </button>
            // </div>');
            // redirect('admin/DataJabatan');

        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_jabatan','nama jabatan','required');
        $this->form_validation->set_rules('gaji_pokok','gaji pokok','required');
        $this->form_validation->set_rules('tj_transport','tunjangan transport','required');
        $this->form_validation->set_rules('uang_makan','uang makan','required');
    }
}