<?php

namespace App;

use DateTime;

class Saint
{
    private $id;
    private $photo;
    private $name;
    private $country;
    private $birthday;
    private $info;
    private $errors;
    private $status;
    private $user_id;
    private $created_at;

    private $old_photo;

    public static function getAllPublic($public)
    {
        $pdo = Connection::make();

        $sql = "SELECT * FROM saints WHERE status=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$public]);
        return $stmt->fetchAll();
    }

    public static function getByUser($user_id)
    {
        $pdo = Connection::make();
        $sql = "SELECT * FROM saints WHERE user_id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }

    public static function getById($id): ?Saint
    {
        $pdo = Connection::make();

        $stmt = $pdo->prepare('SELECT * FROM saints WHERE id=?');
        $stmt->execute([$id]);

        $saintData = $stmt->fetch();

        if (empty($saintData)) {
            return null;
        }

        $saint = new Saint();
        $saint->setId($saintData['id']);
        $saint->setUserId($saintData['user_id']);
        $saint->setName($saintData['name']);
        $saint->setPhoto($saintData['photo']);
        $saint->setCountry($saintData['country']);
        $saint->setBirthday($saintData['birthday']);
        $saint->setInfo($saintData['info']);
        $saint->setStatus($saintData['status']);
        $saint->setCreatedAt($saintData['created_at']);

        return $saint;
    }

    public static function getByUserId($id): array
    {
        $pdo = Connection::make();

        $stmt = $pdo->prepare('SELECT * FROM saints WHERE user_id=?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
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

    public function setOldPhoto($old_photo)
    {
        $this->old_photo = $old_photo;
    }

    public function hasValidData()
    {
        $this->errors = [];
        
        if ($this->status != 'private' &&  $this->status != 'public')
        {
            $this->errors['status'] = 'Status inválido.';
        }

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
        $user = Session::get('user');

        $saint = [
            $this->photo,
            $this->name,
            $this->country,
            $this->birthday,
            $this->info,
            $user->getId(),
            $this->status,
        ];

        $pdo = Connection::make();
        $stmt = $pdo->prepare('INSERT INTO saints (photo, name, country, birthday, info, user_id, status) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $result = $stmt->execute($saint);

        if ($result) {
            handleUploadedFile('photo');
        }
        return $result;
    }

    public function saveUpdate()
    {
        $updatedSaint = [
            $this->photo,
            $this->name,
            $this->country,
            $this->birthday,
            $this->info,
            $this->status,
            $this->id
        ];

        $pdo = Connection::make();
        $stmt = $pdo->prepare('UPDATE saints SET photo=?, name=?, country=?, birthday=?, info=?, status=? WHERE id=?');
        $result = $stmt->execute($updatedSaint);

        if ($result) {
            handleUploadedFile('photo', $this->old_photo);
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