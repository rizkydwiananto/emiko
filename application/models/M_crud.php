<?php
class M_crud extends CI_Model {
    function insert_id($table, $data){
        $this->db->trans_begin();
        $this->db->insert($table, $data);
        $last_id = $this->db->insert_id();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return 0;
        }
        else {
            $this->db->trans_commit();
            return $last_id;
        }
    }
    function insert($table, $data){
        $this->db->trans_begin();
        $this->db->insert($table, $data);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return 0;
        }
        else {
            $this->db->trans_commit();
            return 1;
        }
    }
    function uploadfile($var,$dir,$all){
        $new_name = time();
        $config2=array(
            'image_library' => 'gd2',
            'upload_path' => $dir."/1000/", //lokasi gambar akan di simpan
            'allowed_types' => $all, //ekstensi gambar yang boleh di uanggah
            'create_thumb' => TRUE,
            'max_size' => '20000', //batas maksimal ukuran gambar
            'file_name' => $new_name
        );
        
        $this->load->library('upload');
        $this->upload->initialize($config2);
        if ($this->upload->do_upload($var))
        {
            $file = $this->upload->data()['file_name'];
            $config = array(
                'image_library' => 'gd2',
                'source_image' => $dir."/1000/".$file,
                'new_image' => $dir.'500/',
                'create_thumb' => TRUE,
                'maintain_ratio' => TRUE,
                'width'=>500, 
                'thumb_marker' => ''
            );
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $this->image_lib->clear();
            $config2 = array(
                'image_library' => 'gd2',
                'source_image' => $dir."/1000/".$file,
                'new_image' => $dir.'300/',
                'create_thumb' => TRUE,
                'maintain_ratio' => TRUE,
                'width'=>300, 
                'thumb_marker' => ''
            );
            $this->image_lib->initialize($config2);
            $this->image_lib->resize();
            return $this->upload->data();
        }
        else
        {
            return 0;
        }
    }
    
    function uploadfile2($var,$dir,$all){
        $new_name = time();
        $config2=array(
            'image_library' => 'gd2',
            'upload_path' => $dir, //lokasi gambar akan di simpan
            'allowed_types' => $all, //ekstensi gambar yang boleh di uanggah
            'create_thumb' => TRUE,
            'max_size' => '20000', //batas maksimal ukuran gambar
            'file_name' => $new_name
        );
        
        $this->load->library('upload');
        $this->upload->initialize($config2);
        if ($this->upload->do_upload($var))
        {
            return $this->upload->data();
        }
        else
        {
            return 0;
        }
    }
    function update($table, $field, $data, $id){
        $this->db->trans_begin();
        $this->db->update($table, $data, array($field => $id));
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return 0;
        }
        else {
            $this->db->trans_commit();
            return 1;
        }
    }
    function delete($table, $field, $id) {
        $this->db->trans_begin();
        $this->db->delete($table, array($field => $id));
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return 0;
        }
        else {
            $this->db->trans_commit();
            return 1;
        }
    }
    

    
}		