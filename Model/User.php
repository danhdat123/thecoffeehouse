<?php


class User extends MasterModel
{
    public function login($email, $pass_word)
    {
        $sql = "SELECT * FROM user WHERE email like '$email'and password like '$pass_word' limit 1";
        $user = MasterModel::get_one_row($sql);
        return $user;
    }

    public function count_user($user_name, $pass_word)
    {
        $sql = "SELECT count(id) FROM user WHERE user_name LIKE '$user_name' and pass_word = '$pass_word' ";
      return  MasterModel::count_column($sql);
    }

    public function get_one_user($user_name, $email)
    {
        $sql = "SELECT count(id) FROM user WHERE user_name = '$user_name' or email = '$email' ";
       return MasterModel::count_column($sql);
    }


    public function register($user_name, $pass_word, $email, $phone_number, $address)
    {
        $sql = "INSERT INTO user(id,user_name,password,email,phone_number,address) 
                     VALUES (NULL,?,?,?,?,?)";
       return MasterModel::insert_one_row($sql, array($user_name, $pass_word, $email, $phone_number, $address));
        
    }
}
