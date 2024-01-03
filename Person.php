<?php

class Person{
    private $id; // You may want to include an id as a primary key
    private $fname;
    private $lname;
    private $email;

    private $age;
    private $password;
    private $inscription;


    /**
     * @param $fname
     * @param $lname
     * @param $email
     * @param $age
     * @param $password
     */

    public function __construct($fname=null, $lname=null, $email=null, $age=null, $password=null,$inscription=null)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->age = $age;
        //$this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $password;
        $this->inscription = $inscription;
    }

    /**
     * @return mixed|null
     */
    public function getInscription()
    {
        return $this->inscription;
    }

    /**
     * @param mixed|null $inscription
     */
    public function setInscription($inscription)
    {
        $this->inscription = $inscription;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * @param mixed $fname
     */
    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    /**
     * @return mixed
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * @param mixed $lname
     */
    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return false|string|null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param false|string|null $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

}
?>