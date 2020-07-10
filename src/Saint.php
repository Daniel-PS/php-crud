<?php

namespace App;


class Saint
{
    public static function getAll()
    {
        $pdo = Connection::make();

        $sql = "SELECT * FROM saints";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}