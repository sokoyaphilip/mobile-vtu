<?php
Class User_model extends CI_Model
{

    /**
     * @param string $id
     * @param string $table
     * @return mixed
     */
    function get_profile($id = '', $table = 'users')
    {
        $this->db->where('id', $id);
        $this->db->or_where('email', $id);
        $this->db->or_where('phone', $id);
        return $this->db->get($table)->row();
    }

    /**
     * @param array $data
     * @param string $table_name
     * @return bool|mixed
     */
    function login($data = array(), $table_name = 'users')
    {
        if (!empty($data)) {
            $this->db->where('email', $data['login_username']);
            $this->db->or_where('phone', $data['login_username']);
            if ($this->db->get($table_name)->row()) {
                $this->db->where('email', $data['login_username']);
                $this->db->or_where('phone', $data['login_username']);
                $salt = $this->db->get($table_name)->row()->salt;
                if ($salt) {
                    $password = shaPassword($data['password'], $salt);
                    $login_username = $data['login_username'];
                    $where = "phone='{$login_username}' OR email='{$login_username}' AND password='{$password}'";
                    $this->db->where($where );
                    $result = $this->db->get('users');
                    if ($result->num_rows() == 1) {
                        $c_update = array('last_login' => get_now(), 'ip' => $_SERVER['REMOTE_ADDR']);
                        $this->db->where('email', $data['login_username']);
                        $this->db->or_where('phone', $data['login_username']);
                        $this->db->update($table_name, $c_update);
                        return $result->row();
                    } else {
                        return false;
                    }
                }
            }
        }
    }


    /**
     * @param array $data
     * @param string $table_name
     * @return int|string
     */
    function create_account($data = array(), $table_name = 'users')
    {
        $result = '';
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


    public function last_login()
    {
        if ($this->session->userdata('logged_id')) {
            $array = array(
                'last_login' => get_now(),
                'ip' => $_SERVER['REMOTE_ADDR']
            );
            $this->db->set($array);
            $this->db->where('id', $this->session->userdata('logged_id'));
            $this->db->update('users');
        }
    }


    /**
     * @param null $password
     * @param string $access
     * @param string $table
     * @return bool
     */
    function cur_pass_match($password = null, $access = '', $table = 'users')
    {
        if ($password) {
            $this->db->where('id', $access);
            $this->db->or_where('email', $access);
            $this->db->or_where('phone', $access);
            $salt = $this->db->get('users')->row()->salt;
            $this->db->where('id', $access);
            $this->db->or_where('email', $access);
            $this->db->or_where('phone', $access);
            $curpassword = $this->db->get($table)->row()->password;
            $password = shaPassword($password, $salt);
            if ($password === $curpassword) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * @param $password
     * @param string $access
     * @param string $table
     * @return bool
     */
    function change_password($password, $access = '', $table = 'users')
    {
        if ($access == '') $access = $this->session->userdata('logged_id');
        $salt = salt(50);
        $password = shaPassword($password, $salt);
        $data = array(
            'password' => $password,
            'salt' => $salt
        );
        $this->db->where('id', $access);
        $this->db->or_where('email', $access);
        $this->db->or_where('phone', $access);
        return $this->db->update($table, $data);
    }



    /**
     * @param $id
     * @return mixed
     */
    function get_my_order_status($id, $order_code)
    {
        $query = $this->db->query("SELECT p.id as pid, p.name, g.image_name, o.order_date, pay.name payment_method,o.responseCode, o.status, o.active_status, o.qty,o.amount, o.billing_address_id, o.pickup_location_id
        FROM orders o
        JOIN (SELECT prod.id AS id, prod.product_name AS name FROM products AS prod) AS p ON (p.id = o.product_id)
        JOIN product_gallery AS g ON (o.product_id = g.product_id AND g.featured_image = 1 )
        LEFT JOIN payment_methods pay ON (pay.id = o.payment_method)
        WHERE o.buyer_id = ? AND o.order_code = ? GROUP BY o.product_id ORDER BY o.id DESC", array($id, $order_code))->result();
        return $query;
    }

    function get_my_orders($id, $array = array())
    {
        $query = "SELECT order_code, SUM(amount) as amount, SUM(qty) as qty, order_date FROM orders WHERE buyer_id = $id";
        if ($array['time'] != '') {
            switch ($array['time']) {
                case 'last-6-month':
                    $query .= " AND order_date > DATE_SUB(NOW(), INTERVAL 6 MONTH) ";
                    break;
                case 'this-year':
                    $query .= " AND order_date > DATE_SUB(NOW(), INTERVAL 12 MONTH) ";
                    break;
                case 'previous-year':
                    $query .= " AND order_date < DATE_SUB(NOW(), INTERVAL 12 MONTH) ";
                    break;
                default:
                    $query .= '';
                    break;
            }
        } else {
            $query .= " AND MONTH(order_date) = EXTRACT(month FROM (NOW())) AND year(order_date) = EXTRACT(year FROM (NOW())) ";
        }
        $limit = $array['is_limit'];
        if ($limit == true) {
            $query .= " GROUP BY order_code ORDER BY id DESC LIMIT " . $array['offset'] . "," . $array['limit'];
        } else {
            $query .= ' GROUP BY order_code ORDER BY id DESC';
        }
        return $this->db->query($query, array($id))->result();
    }

    /*
     * Get users orders
     * */

    function get_states()
    {
        return $this->db->get('states')->result_array();
    }

    // Get states

    function get_area($sid = '')
    {
        $this->db->select('id,name,price');
        $this->db->where('sid', $sid);
        return $this->db->get('area')->result_array();
    }



    function generate_user_code($table = 'users')
    {
        do {
            $number = random_string('nozero',6);
            $this->db->where('user_code', $number);
            $this->db->from($table);
            $count = $this->db->count_all_results();
        } while ($count >= 1);
        return $number;
    }

    function recover_email()
    {
    }


    /*
    * @param id = user id
    * @return CI_result
    */

    /**
     * @param string $uid
     * @param $address_id
     * @return array
     */
    function get_single_address($uid = '', $address_id)
    {
        if ($uid != '') $this->db->where('uid', $uid);
        $this->db->where('id', $address_id);
        return $this->db->get('billing_address')->result_array();
    }

    function get_pickup_address(){
        $this->db->where('enable', 1);
        return $this->db->get('pickup_address')->result();
    }

    /**
     * @param $id
     * @return string
     */
    function get_default_address_price($id)
    {
        $select = "SELECT a.price price FROM billing_address b INNER JOIN area a ON(a.id = b.aid) WHERE b.primary_address = 1 AND b.uid = $id";
        if ($this->db->query($select)->num_rows()) {
            return $this->db->query($select)->row()->price;
        } else {
            return '';
        }
    }

    function recently_viewed($pid, $user_id)
    {
        // Does product exist in the record
        $products = array();
        $user = $this->get_row('recently_viewed', 'id,product_ids', "user_id = $user_id");
        if ($user) {
            $product_ids = json_decode($user->product_ids);
            if (!in_array($pid, $product_ids)) {
                array_push($product_ids, $pid);
                $product_ids = json_encode($product_ids);
                $this->update_data($user->id, array('product_ids' => $product_ids), 'recently_viewed');
            }
        } else {
            $products[] = $pid;
            $data = array(
                'user_id' => $user_id,
                'product_ids' => json_encode($products),
                'viewed_date' => get_now()
            );
            $this->create_account($data, 'recently_viewed');
        }
    }

    /**
     * @param string $table_name
     * @param $where
     * @return mixed
     */
    function get_row($table_name = 'users', $select, $where)
    {
        $this->db->select($select);
        $this->db->where($where);
        return $this->db->get($table_name)->row();
    }

    /*
     * Add or update the user recently viewed
     * */

    /**
     * @param string $access
     * @param array $data
     * @param string $table_name
     * @return bool
     */
    function update_data($access = '', $data = array(), $table_name = 'users')
    {
        $this->db->where('id', $access);
        return $this->db->update($table_name, $data);
    }

    function toPlainArray($array)
    {
        $output = '';
        foreach ($array as $arr) {
            $output .= $arr . ", ";
        }
        return (array)substr($output, 0, -2);
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
