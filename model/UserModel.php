<?php


class UserModel
{
    public static function getAll($pdo) {
        $statement = $pdo->prepare("SELECT * FROM Users");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get($pdo,$id) {
        $statement = $pdo->prepare("SELECT * FROM Users WHERE id=:id");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public static function add($pdo,$name,$last_name,$comment) {
        $stmt= $pdo->prepare("INSERT INTO Users (name,lname,comment) VALUES (?,?,?)");
        $stmt->execute([$name,$last_name,$comment]);
        return $pdo->lastInsertId();
    }
    public static function delete($pdo,$id) {
        $sql = "DELETE FROM Users WHERE id=:id";
        $stmt= $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public static function search($name) {

    }
    public static function update(){

    }
    public static function getCount($pdo){
        $statement = $pdo->prepare("SELECT count(*) as count FROM Users");
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data[0]['count'];
    }
}