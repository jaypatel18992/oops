<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

	function __construct()
	{
		
	}
	function insert($table,$data)
	{
		return $this->db->insert($table,$data);
	}

	function select_all(string $table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$r = $this->db->get();
		return $r->result();
	}

	// function search($table,$date1 , $date2 )
	//  {
	//  $this->db->select('*');
	//  $this->db->from($table);
 //     $this->db->where('event_date <',$date1);
 //     $this->db->where('event_date >',$date2);
	//    //$this->db->where('event_date BETWEEN $date1 AND $date2"');
 //     $r = $this->db->get();
 //     return $r->result();
 //     }
	function date_range($table,$date1,$date2) 
	{
		$condition = "event_date BETWEEN " . "'" . $date1['event_date'] . "'" . " AND " . "'" . $date2['event_date'] . "'";
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	function delete(string $table, array $where)
	{
		return $this->db->delete($table,$where);
	}

	function select_where(string $table, array $where)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);
		$r = $this->db->get();
		return $r->result();
	}

	function update(string $table,array $data,array $where)
	{
		return $this->db->update($table,$data,$where);
	}

}

