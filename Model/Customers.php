<?php

declare(strict_types=1);

class Customers extends Database
{

    protected function getCustomers() {
        $sql = "SELECT firstname, lastname FROM customer";
        $stmt = $this->connect()->query($sql);

        $results = $stmt->fetchAll();
        return $results;
    }

    public function showCustomers() {
        $results = $this->getCustomers();
        foreach ($results as $result){
            echo $result['firstname'] . '&nbsp;' . $result['lastname'] . "<br>";
        }
    }

}