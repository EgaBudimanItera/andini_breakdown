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

    function id_breakdown(){
        //BMmmYY  000001
        $this->db->select('Right(kdorder,6) as kode',false);
        
        $this->db->order_by('kdorder','DESC');
        $this->db->limit(1);
        $query = $this->db->get('orderbreakdown');

        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,6,"0",STR_PAD_LEFT);
        $kodejadi  = "BR01".date('my')."-".$kodemax;
        return $kodejadi;
    }

    


}