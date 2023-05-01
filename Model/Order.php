<?php


class Order extends MasterModel
{
    public  $table;
    public  $status = [];



    public function __construct()
    {
        $this->table = "tb_order";
        $this->status = array(
            "pending" => "pending",
            "confirm" => "confirm",
            "ship" => "ship",
            "success" => "success",
            "cancel" => "cancel",
        );
    }

    public function order_product($user_id, $product_id, $size = "M", $quantity = 1,  $status = "pending")
    {
        $sql = "INSERT INTO " . $this->table . "(`id`, `user_id`, `product_id`, `quantity`, `size`, `status`) VALUES (NULL, ?, ?, ?, ?,? )";

        return MasterModel::insert_one_row($sql, array($user_id, $product_id, $quantity, $size, $status));
    }

    public function order_update_item($user_id, $id)
    {
        $sql = "UPDATE " . $this->table . " SET quantity = `quantity` + 1 where user_id = ? and id = ?";
        return MasterModel::update($sql, array($user_id, $id));
    }


    public function deleted_cart($user_id, $id)
    {
        $sql = "UPDATE " . $this->table . " SET deleted_at = now() where user_id = ? and product_id = ?";
        return MasterModel::update($sql, array($user_id, $id));
    }


    public function get_all_order($user_id)
    {
        $sql = "SELECT * FROM " . $this->table . " LEFT JOIN user on " . $this->table . ".user_id = USER.id LEFT JOIN product on " . $this->table . ".product_id = product.id WHERE " . $this->table . ".user_id = $user_id and tb_order.status = 'pending' and " . $this->table . ".deleted_at is NULL";

        return MasterModel::get_all_row($sql);
    }

   
    public function get_all_order_confirm($user_id)
    {
        $status = "'".$this->status['pending']."'";
        $sql = "SELECT tb_order.*, product.product_name,product.product_price,product.image  FROM " . $this->table . " LEFT JOIN user on " . $this->table . ".user_id = USER.id LEFT JOIN product on " . $this->table . ".product_id = product.id WHERE " . $this->table . ".user_id = $user_id and ".$this->table.".status not like ".$status." and " . $this->table . ".deleted_at is NULL";

        return MasterModel::get_all_row($sql);
    }


    public function change_status_order($user_id)
    {
        $status = "'".$this->status['confirm']."'";
        $sql = "UPDATE " . $this->table . " SET ".$this->table.".status = ".$status." where user_id = ? and ".$this->table.".deleted_at is NULL";
        return MasterModel::update($sql, array($user_id));
    }

    public function count_cart($user_id)
    {
        $sql = "SELECT sum(quantity) FROM " . $this->table . " where " . $this->table . ".status = 'pending' and user_id = $user_id and " . $this->table . ".deleted_at is NULL";

        return MasterModel::count_column($sql);
    }


    public function get_one_order($id, $user_id)
    {
        $sql = "SELECT * FROM " . $this->table . " where " . $this->table . ".status = 'pending' and user_id = $user_id and product_id = $id and " . $this->table . ".deleted_at is NULL";
        return MasterModel::get_one_row($sql);
    }

        
    public function get_all_order_by_admin()
    {
        $sql = "SELECT ".$this->table.".user_id,  sum(".$this->table.".quantity) as 'total_product', max(".$this->table.".updated_at) as 'updated_at', user_name FROM ".$this->table." LEFT JOIN user on ".$this->table.".user_id = USER.id LEFT JOIN product on ".$this->table.".product_id = product.id WHERE ".$this->table.".status = 'confirm' and ".$this->table.".deleted_at is NULL GROUP BY ".$this->table.".user_id, 'total_product'";
        // die($sql);
        return MasterModel::get_all_row($sql);
    }
}
