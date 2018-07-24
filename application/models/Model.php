<?php


class Model extends CI_Model {

	function insertdata($table, $data){
		return $this->db->insert($table, $data);
	}

	function getdataall($table){
		return $this->db->get($table);
	}

	function getdata($table, $param = array()){
		return $this->db->get_where($table, $param);
	}

	function updatedata($table, $param = array(), $data){       
        $this->db->where($param);
        $this->db->update($table, $data); 
        return true;
    }

    function removedata($table, $param = array()){
        $this->db->delete($table, $param); 
        return true;
    }

    function kueri(){
    	
    }

    


}