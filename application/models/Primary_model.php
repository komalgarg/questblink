<?php

Class Primary_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_where($table, $where = array(), $result = FALSE) {
        $query = $this->db->get_where($table, $where);
        if ($result == TRUE) {
            return $query->result_array();
        } else {
            return $query->row_array();
        }
    }
    
    public function get_where_group_by($table, $where = array(), $group='', $result = FALSE) {
        $this->db->group_by($group);
        $query = $this->db->get_where($table, $where);
        if ($result == TRUE) {
            return $query->result_array();
        } else {
            return $query->row_array();
        }
    }

    public function get_where_order($table, $order = array(), $where = array(), $result = FALSE) {
        $this->db->order_by($order);
        $query = $this->db->get_where($table, $where);
        if ($result == TRUE) {
            return $query->result_array();
        } else {
            return $query->row_array();
        }
    }

    public function get_where_join($table, $joinTbl, $joinCond, $joinType, $where = array(), $result = FALSE) {
        $this->db->join($joinTbl, $joinCond, $joinType);
        $query = $this->db->get_where($table, $where);
        if ($result == TRUE) {
            return $query->result_array();
        } else {
            return $query->row_array();
        }
    }

    public function get_where_join_order($table, $joinTbl, $joinCond, $joinType, $order, $where = array(), $result = FALSE) {
        $this->db->join($joinTbl, $joinCond, $joinType);
        $this->db->order_by($order);
        $query = $this->db->get_where($table, $where);
        if ($result == TRUE) {
            return $query->result_array();
        } else {
            return $query->row_array();
        }
    }

    public function get_where_in($table, $where, $values) {
        $this->db->where_in($where, $values);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function get_where_order_in($table, $order, $where = array(), $in = array('col' => '0', 'val' => 0)) {
        $this->db->where_in($in['col'], $in['val'], false);
        $this->db->where($where);
        $this->db->order_by($order);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function get_where_not_in($table, $where, $values) {
        $this->db->where_not_in($where, $values);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function get_where_order_limit($table, $limit, $order = array(), $where = array(), $result = FALSE) {
        $this->db->order_by($order);
        $this->db->limit($limit);
        $query = $this->db->get_where($table, $where);
        if ($result == TRUE) {
            return $query->result_array();
        } else {
            return $query->row_array();
        }
    }

    public function get_where_multi_join($table, $joins, $where = array(), $result = FALSE) {
        foreach ($joins as $join) {
            $this->db->join($join['table'], $join['on'], $join['type']);
        }
        $query = $this->db->get_where($table, $where);
        if ($result == TRUE) {
            return $query->result_array();
        } else {
            return $query->row_array();
        }
    }

    public function get_where_multi_join_limit($table, $joins, $limit, $where = array(), $result = FALSE) {
        foreach ($joins as $join) {
            $this->db->join($join['table'], $join['on'], $join['type']);
        }
        if ($limit != 0) {
            $this->db->limit($limit);
        }
        $query = $this->db->get_where($table, $where);
        if ($result == TRUE) {
            return $query->result_array();
        } else {
            return $query->row_array();
        }
    }

    public function get_where_multi_join_order($table, $joins, $order, $where = array(), $result = FALSE) {
        foreach ($joins as $join) {
            $this->db->join($join['table'], $join['on'], $join['type']);
        }
        $this->db->order_by($order);
        $query = $this->db->get_where($table, $where);
        if ($result == TRUE) {
            return $query->result_array();
        } else {
            return $query->row_array();
        }
    }

    public function select_multi_join($select, $table, $joins, $where = array(), $result = FALSE) {
        $this->db->order_by($select);
        foreach ($joins as $join) {
            $this->db->join($join['table'], $join['on'], $join['type']);
        }
        $this->db->from($table);
        $query = $this->db->get_where($table, $where);
        if ($result == TRUE) {
            return $query->result_array();
        } else {
            return $query->row_array();
        }
    }

    public function select_multi_join_order($select, $table, $joins, $order, $where = array(), $result = FALSE) {
        $this->db->order_by($select);
        foreach ($joins as $join) {
            $this->db->join($join['table'], $join['on'], $join['type']);
        }
        $this->db->order_by($order);
        $this->db->from($table);
        $query = $this->db->get_where($table, $where);
        if ($result == TRUE) {
            return $query->result_array();
        } else {
            return $query->row_array();
        }
    }

    //################################################## AFFECTED QUERY START ##########################################################	
    function insert($table, $data = array()) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function insert_batch($table, $data = array()) {
        $this->db->insert_batch($table, $data);
        return $this->db->insert_id();
    }

    function update($table, $data = array(), $where = array()) {
        $this->db->where($where);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

    function delete($table, $where = array()) {
        $this->db->delete($table, $where);
        return $this->db->affected_rows();
    }

//################################################## AFFECTED QUERY END ##########################################################	

  

    public function is_logged_in() {
        if ($this->session->userdata('logged_in') == 1 && $this->session->userdata('user') != "") {
            return true;
        } else {
            return false;
        }
    }
}
