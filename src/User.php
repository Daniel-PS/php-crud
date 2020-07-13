<?php

namespace App;

class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $errors;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function hasValidData()
    {
        $this->errors = [];
        
        if (empty($this->name))
        {
            $this->errors['name'] = 'Preencha este campo.';
        }

        if(empty($this->email)) {
            $this->errors['email'] = 'Preencha este campo.';
        }

        if(empty($this->password)) {
            $this->errors['password'] = 'Preencha este campo.';
        }

        return empty($this->errors);
    }

    public static function getByEmail($email)
    {
        $pdo = Connection::make();

        $stmt = $pdo->prepare('SELECT * FROM users WHERE email=?');
        $stmt->execute([$email]);
        $userData = $stmt->fetch();

        if (empty($userData)) {
            return null;
        }

        $user = new User();
        $user->setId($userData['id']);
        $user->setName($userData['name']);
        $user->setEmail($userData['email']);
        $user->setPassword($userData['password']);

        return $user;
    }

    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        $user = [
            $this->name,
            $this->email,
            $this->password
        ];

        $pdo = Connection::make();
        $stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
        $result = $stmt->execute($user);

        return $result;
    }
    
}