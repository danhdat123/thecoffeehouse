<?php


class Category extends MasterModel
{


    public function get_all_category()
    {
        $sql = "SELECT * FROM category";
        $category = MasterModel::get_all_row($sql);
        return $category;
    }

    public function insert_one($product_name, $product_price, $description, $category_id, $image)
    {
        $sql = "INSERT INTO product(id,product_name,product_price,description,image,category_id) 
                     VALUES (NULL,?,?,?,?,?)";
        MasterModel::insert_one_row($sql, array($product_name, (int)$product_price, $description, $image, $category_id));
    }
}
