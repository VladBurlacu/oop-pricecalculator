<?php

declare(strict_types=1);

class Products extends Database
{

    protected function getProducts() {
        $sql = "SELECT id, name, price FROM product;";
        $stmt = $this->connect()->query($sql);

        $results = $stmt->fetchAll();
        return $results;
    }

    public function showProducts() {
        $results = $this->getProducts();
        foreach ($results as $result){
            echo "<option value='" . $result['id'] . "'>" . $result['name'] . '&nbsp;' . " - " . $result['price'] . "</option>";
        }
    }
}