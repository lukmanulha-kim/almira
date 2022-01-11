<?php
class almiraModels extends CI_Model {

    public function queryAll($table)
    {
    	$Q = $this->db->get($table);
    	return $Q;
    }

    public function whereQuery($tb_name, $params){
		$q = $this->db->get_where($tb_name, $params);
		return $q;
	}

	public function queryJoin($tb1, $tb2, $on)
	{
		$this->db->select('*');
		$this->db->from($tb1);
		$this->db->join($tb2, $on);
		$q = $this->db->get();
		return $q;
	}
	public function queryJoinWhere($tb1, $tb2, $on, $field, $parameter)
	{
		$this->db->select('*');
		$this->db->from($tb1);
		$this->db->join($tb2, $on);
		$this->db->where($field, $parameter);
		$q = $this->db->get();
		return $q;
	}

	public function insert($table,$data)
	{
		$q = $this->db->insert($table, $data);
		return $q;
	}

	public function update($table, $pk, $params, $data)
	{
		$q = $this->db->where($pk, $params);
		$q = $this->db->update($table, $data);
		return $q;
	}

	public function delete($table, $field, $params)
	{
		$q = $this->db->where($field, $params);
		$q = $this->db->delete($table);
		return $q;
	}

    public function insert_multiple($tb_name,$data){
		$this->db->insert_batch($tb_name, $data);
	}

}
?>