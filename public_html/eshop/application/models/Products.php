<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Products extends CI_Model {
        function __construct() {
            parent::__construct();
        }
        
        function getSubCategories($current_cat) {
            if ($current_cat==0){
                $query = $this->db->query('SELECT * FROM eshop_categories WHERE super_cat IS NULL ORDER BY name ASC');
            }
            else {
                $query = $this->db->query('SELECT * FROM eshop_categories WHERE super_cat ='.strval(intval($current_cat)).' ORDER BY name ASC');
            }
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return NULL;
            }
        }

        function getSuperCat($current_cat) {
            $query = $this->db->query('SELECT * FROM eshop_categories where ID=(SELECT super_cat from eshop_categories where ID='.strval(intval($current_cat)).')');
            if ($query->num_rows() > 0) {
                $ret = $query->row();
                return $ret;
            } else {
                return NULL;
            }   
        }

        function getCurrentCat($current_cat) {
            $query = $this->db->query('SELECT * FROM eshop_categories where ID='.strval(intval($current_cat)));
            if ($query->num_rows() > 0) {
                $ret = $query->row();
                return $ret;
            } else {
                return NULL;
            }   
        }

        function getAllSubCats($catid) {
            $subcats = array();
            $query = $this->db->query('SELECT ID FROM eshop_categories WHERE super_cat='.strval(intval($catid)));
            if ($query->num_rows() > 0) {
                $foundcats = $query->result();
                foreach ($foundcats as $foundcat){
                    if (!(in_array($foundcat->ID, $subcats))){
                        array_push($subcats, $foundcat->ID);
                    }
                }
            }
            $stop_con = 0;
            while ($stop_con==0){
                $found=0;
                foreach ($subcats as $subcat){
                    $query2 = $this->db->query('SELECT ID FROM eshop_categories WHERE super_cat='.strval(intval($subcat)));
                    if ($query->num_rows() > 0) {
                        $foundcats = $query->result();
                        foreach ($foundcats as $foundcat){
                            if (!(in_array($foundcat->ID, $subcats))){
                                array_push($subcats, $foundcat->ID);
                                $found=1;
                            }
                        }
                    }
                }
                if ($found==0) {
                    $stop_con=1;
                }
            }
            if (array_count_values($subcats)>0){
                return $subcats;
            }
            else {
                return NULL;
            }
        }

        function getItems($current_cat) {
            if ($current_cat==0){
                //if on home screen, random 9 items will be shown
                $query = $this->db->query('SELECT * FROM eshop_items WHERE showing=1 ORDER BY title ASC');
                if ($query->num_rows() > 0) {
                    $random_sel1 = array();
                    $random_sel2 = array();
                    $q_out = $query->result();
                    foreach ($q_out as $res){
                        array_push($random_sel1, $res->ID);   
                    }
                    $random_sel2 = array_rand($random_sel1,min(9,$query->num_rows()));
                    $item_con='';
                    $counter=0;
                    foreach ($random_sel2 as $rsel){
                        if ($counter!=0) {
                            $item_con.=' OR ';
                        }
                        $item_con.='ID='.$random_sel1[$rsel];
                        $counter=$counter+1;
                    }
                    $query2 = $this->db->query('SELECT * FROM eshop_items WHERE showing=1 AND ('.$item_con.') ORDER BY title ASC');
                    return $query2->result();
                } else {
                    return NULL;
                } 
            }
            else {
                $cat_condition='category_id='.strval(intval($current_cat));
                $subcats=array();
                $subcats=$this->getAllSubCats($current_cat);
                foreach ($subcats as $subcat){
                    $cat_condition.=' OR category_id='.strval(intval($subcat));
                }
                $query = $this->db->query('SELECT * FROM eshop_items WHERE showing=1 AND ('.$cat_condition.') ORDER BY title ASC');
            }
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return NULL;
            }
        }

        function login($username, $password){
            $this -> db -> select('id, email, password');
            $this -> db -> from('eshop_users');
            $this -> db -> where('email', $username);
            $this -> db -> where('is_active', 1);
            $this -> db -> where('password', MD5($password));
            $this -> db -> limit(1);
         
            $query = $this -> db -> get();
         
            if($query -> num_rows() == 1)
            {
                return $query->result();
            }
            else
            {
                return false;
            }
        }

        function searchItems($searchtext) {
            if ($searchtext==''){
                $searchtext='%';
            }
            else {
                $searchtext='%'.strtolower($searchtext).'%';
            }
            $query = $this->db->query("SELECT * FROM eshop_items WHERE showing=1 AND (LOWER(title) LIKE '".$searchtext."' OR LOWER(description) LIKE '".$searchtext."') ORDER BY title ASC");
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return NULL;
            } 
        }

        function showItem($itemid) {
            $query=$this->db->query("SELECT * FROM eshop_items WHERE ID=".strval(intval($itemid)));
            if ($query->num_rows() > 0) {
                return $query->row();
            } else {
                return NULL;
            }   
        }

        function getBasket($userid) {
            $query=$this->db->query("SELECT B.*, I.title, I.price FROM eshop_baskets B, eshop_users U, eshop_items I  WHERE B.user_id=U.ID AND B.item_id=I.ID AND U.email='".$userid."'");
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return NULL;
            } 
        }

        function getBasketCount($userid) {
            $query=$this->db->query("SELECT B.*, I.title, I.price FROM eshop_baskets B, eshop_users U, eshop_items I  WHERE B.user_id=U.ID AND B.item_id=I.ID AND U.email='".$userid."'");
            if ($query->num_rows() > 0) {
                return $query->num_rows();
            } else {
                return 0;
            }   
        }

        function askIfAdmin($username) {
            $query = $this->db->query("SELECT * FROM eshop_users WHERE email='".$username."' AND is_admin=1");
            if ($query->num_rows() > 0) {
                return 1;
            } else {
                return 0;
            }    
        }
        
    }