<?php 

require_once './models/connection.php';

Class MealManager {
  public $tablename = "users";
  function getMeals(): array {
    $sql = "SELECT * FROM $this->tablename ORDER BY name ASC";
    $query = dbConnect()->prepare($sql);
    $query->execute();
    $users = $query->fetchAll();
    return $users;
  }

  function getUser($id): array {
    $sql = "SELECT * FROM $this->tablename WHERE id = :id";
    $query = dbConnect()->prepare($sql);
    $query->execute([
      ':id' => $id
    ]);
    $user = $query->fetchAll();
    return $user;
  }

  function addUsers($parameters): void {
    //$created_date = date_format(new DateTime('NOW'), 'Y-m-d H:i:s');
    $sql = "INSERT INTO $this->tablename (name) VALUES (:name)";
    $query = dbConnect()->prepare($sql);
    $query->execute([
        ':name' => $parameters,
    ]);
  }
  
  function deleteUser($id): void {
    $sql = "DELETE FROM $this->tablename WHERE id = :id";
    $query = dbConnect()->prepare($sql);
    $query->execute([
    ':id' => $id
    ]);
  }
}