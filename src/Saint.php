<?php

namespace App;

use DateTime;

class Saint
{
    private $photo;
    private $name;
    private $country;
    private $birthday;
    private $info;
    private $errors;

    public static function getAll()
    {
        $pdo = Connection::make();

        $sql = "SELECT * FROM saints";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function getById($id) : array
    {
        $pdo = Connection::make();

        $stmt = $pdo->prepare('SELECT * FROM saints WHERE id=?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    /* public function setOldPhoto($oldPhoto)
    {
        $this->oldPhoto = $oldPhoto;
    }

    public function getOldPhoto($oldPhoto)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare('SELECT photo FROM saints WHERE id=?');
        $stmt->execute([$oldPhoto]);
        return $stmt->fetch();
    } */

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
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
        

        if(empty($this->photo)) {
            $this->errors['photo'] = 'Preencha este campo.';
        }

        if(empty($this->name)) {
            $this->errors['name'] = 'Preencha este campo.';
        }

        if(empty($this->country)) {
            $this->errors['country'] = 'Preencha este campo.';
        }

        if(empty($this->birthday)) {
            $this->errors['birthday'] = 'Preencha este campo.';
        }
        else {
            $birthdayDate = DateTime::createFromFormat('d/m/Y', $this->birthday);
            $this->birthday = $birthdayDate->format('Y-m-d');

            if ($birthdayDate === false) {
                $this->errors['birthday'] = 'Data inválida';
            }
        }

        if(empty($this->info)) {
            $this->errors['info'] = 'Preencha este campo';
        }
        return empty($this->errors);
    }

    public function save()
    {
        $saint = [
            $this->photo,
            $this->name,
            $this->country,
            $this->birthday,
            $this->info,
        ];

        $pdo = Connection::make();
        $stmt = $pdo->prepare('INSERT INTO saints (photo, name, country, birthday, info) VALUES (?, ?, ?, ?, ?)');
        $result = $stmt->execute($saint);

        if ($result) {
            handleUploadedFile('photo');
        }
        return $result;
    }

    public function saveUpdate($id)
    {
        // $old_photo = $this->getOldPhoto($this->oldPhoto);
        $oldData = Saint::getById($id);

        $old_photo = $oldData['photo'];
        
        $updatedSaint = [
            $this->photo,
            $this->name,
            $this->country,
            $this->birthday,
            $this->info,
            $id
        ];

        $pdo = Connection::make();
        $stmt = $pdo->prepare('UPDATE saints SET photo=?, name=?, country=?, birthday=?, info=? WHERE id=?');
        $result = $stmt->execute($updatedSaint);

        if ($result) {
            handleUploadedFile('edited_photo', $old_photo);
        }
        return $result;
    }

    public static function delete($id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare('SELECT photo FROM saints WHERE id=?');
        $stmt->execute([$id]);
        $photo = $stmt->fetch();

        $stmt = $pdo->prepare('DELETE FROM saints WHERE id=?');
        $result = $stmt->execute([$id]);

        if ($result) {
            deletePhoto($photo);
        }
    }
}