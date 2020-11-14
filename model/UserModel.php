<?php


class UserModel
{
    public static function getAll($pdo) {
        $statement = $pdo->prepare("SELECT * FROM Users");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function add($pdo,$name,$last_name,$comment) {
        $sql = "INSERT INTO AdminToken (name,lname,comment) VALUES (?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$name,$last_name,$comment]);
        $pdo->lastInsertId();

    }
    public static function delete() {
        //..
    }
    public static function search() {

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