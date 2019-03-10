<?php
/**
 * Created by PhpStorm.
 * User: phillip
 * Date: 2/28/19
 * Time: 10:57 PM
 */

class Site_model extends CI_Model
{

    /**
     * @param string $slug
     * @return CI_DB_row
     */
    function check_slug($slug, $table = 'services')
    {
        do {
            $count = 0;
            $this->db->where('slug', $slug);
            $this->db->from($table);
            if ($this->db->count_all_results() >= 1) {
                $number = random_string('nozero', 6);
                $slug = $slug . '-' . $number;
                $this->db->where('slug', $slug);
                $this->db->from( $table);
                $count = $this->db->count_all_results();
            } else {
                $count = 0;
            }
        } while ($count >= 1);
        return $slug;
    }

    function get_result($table, $select = '', $condition = ''){
        if( $select != '' ){
            $this->db->select($select);
        }
        if( $condition != '' ){
            $this->db->where( $condition );
        }
        return $this->db->get( $table )->result();
    }


    /**
     * @param array $data
     * @param string $table_name
     * @return int|string
     */
    function insert_data($table_name = 'users', $data = array())
    {
        if (!empty($data)) {
            try {
                $this->db->insert($table_name, $data);
                $result = $this->db->insert_id();
            } catch (Exception $e) {
                $result = $e->getMessage();
            }
            return $result;
        }
    }

    /*
     * Insert batch
     * */
    function insert_batch( $table_name = 'plans', $data = array() ){
        if( !empty($data)) {
            try {
                return $this->db->insert_batch($table_name, $data);
            } catch (Exception $e ) {
                return $e->getMessage();
            }
        }
    }


    function delete( $where, $table ){
        $this->db->where( $where );
        return $this->db->delete( $table );
    }

    // Delete service from admin
    function delete_service( $id ){
        if( $this->delete(array('sid' => $id), 'plans') ){
            return $this->delete(array('id' => $id ), 'services' );
        }
    }

    // Generate code
    //generate_code('transactions', 'trans_id');
    function generate_code($table = 'transactions', $label = 'trans_id')
    {

        do {
            $number = random_string('nozero', 6);
            $this->db->where($label, $number);
            $this->db->from($table);
            $count = $this->db->count_all_results();
        } while ($count >= 1);
        return $number;
    }

    // General SQL query

    function run_sql( $query ){
        return $this->db->query( $query );
    }


    /*
     * Update
     * */

    function update($table = 'users', $data = array(), $condition){
        $this->db->where( $condition );
        return $this->db->update($table, $data);
    }


    function set_field( $table, $field, $set, $where ){
        $this->db->where($where);
        $this->db->set($field, $set, false);
        return $this->db->update($table);
    }

    function auto_version($file = '')
    {
        if (!file_exists($file)):
            return $file;
        else:
            $mtime = filemtime($file);
            return base_url() . $file . '?' . $mtime;
        endif;
    }

}