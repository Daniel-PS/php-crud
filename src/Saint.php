<?php

namespace App;

use DateTime;

class Saint
{
    private $portrait;
    private $name;
    private $country;
    private $birthday;
    private $info;
    private $errors;

    public function getPortrait()
    {
        return $this->portrait;
    }

    public function setPortrait($portrait)
    {
        $this->portrait = $portrait;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getbirthday()
    {
        return $this->birthday;
    }

    public function setbirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    public function getInfo()
    {
        return $this->info;
    }

    public function setinfo($info)
    {
        $this->info = $info;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function hasValidData()
    {
        $this->errors = [];
        $birthdayDate = DateTime::createFromFormat('d/m/Y', $this->birthday);

        if ($birthdayDate === false) {
            $this->errors['birthday'] = 'Data inválida';
        } 
        

        return empty($this->errors);
    }

    public function save()
    {
        
    }

    public static function getAll()
    {
        $pdo = Connection::make();

        $sql = "SELECT * FROM saints";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}