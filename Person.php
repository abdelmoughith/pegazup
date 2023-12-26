<?php

class Person{
    public $id; // You may want to include an id as a primary key
    public $fname;
    public $lname;
    public $email;
    //public $phone;
    public $age;
    public $password;

    /**
     * @param $fname
     * @param $lname
     * @param $email
     * @param $age
     * @param $password
     */
    public function __construct($fname, $lname, $email, $age, $password)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->age = $age;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
}
?>