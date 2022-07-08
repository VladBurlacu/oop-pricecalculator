<?php

class Test extends Database
{

    public function getCustomers() {
        $sql = "SELECT * FROM customer";
        //statement
        $stmt = $this->connect()->query($sql);
        while ($row = $stmt->fetch()){
            echo $row['firstname'] . '<br>';
        }
    }

    public function getCustomersStmt($firstname, $lastname) {
        $sql = "SELECT * FROM customer WHERE firstname = ? AND lastname = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$firstname, $lastname]);
        $names = $stmt->fetchAll();

        foreach ($names as $variableDiscount){
            echo $variableDiscount['variable_discount'] . '<br>';
        }
    }

    public function setCustomersStmt($firstname, $lastname, $group_id) {
        $sql = "INSERT INTO customer(firstname, lastname, group_id) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$firstname, $lastname, $group_id]);
    }
}