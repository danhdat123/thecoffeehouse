<?php

class Product extends  MasterModel
{

    public function get_all_product($limit = 10, $offset = 0)
    {
        $sql = "SELECT * FROM " . $this->table . " limit " . $limit . " offset " . " 0";

        $listProduct = MasterModel::get_all_row($sql);
        return $listProduct;
    }


    public function get_product_list($id_arr)
    {
        $id_arr_string = [];
        foreach($id_arr as $value){
           array_push( $id_arr_string, $value);
        }
        
        $id_query = implode(",",$id_arr_string);

        $sql = "SELECT * FROM " . $this->table . " where id in (" . $id_query.")";
        $listProduct = MasterModel::get_all_row($sql);
        return $listProduct;
    }

    public function get_one_product($id)
    {
        $sql = "SELECT * FROM " . $this->table . " where id = " .$id ." limit 1";
        $product = MasterModel::get_one_row($sql);
        return $product;
    }


    public function insert_one($product_name, $product_price, $description, $image, $category_id)
    {
        $sql = "INSERT INTO product(id,product_name,product_price,description,image,category_id) 
                     VALUES (NULL,?,?,?,?,?)";
        MasterModel::insert_one_row($sql, array($product_name, $product_price, $description, $image, $category_id));
        
    }


    public function getOne($id)
    {
        $sql = "SELECT * FROM " . $this->table . "where id = $id" . "limit 1 offset 1";
        $listProduct = MasterModel::get_one_row($sql);
        return $listProduct;
    }

    public function count_product()
    {
        $sql = "SELECT count(id) FROM " . $this->table;
        return MasterModel::count_column($sql);
    }

    public function increase_viewed($id)
    {
        $sql = "UPDATE ". $this->table." SET viewed = viewed + 1 WHERE id = $id";
        return MasterModel::update_increase($sql);
    }


}
