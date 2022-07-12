<?php
declare(strict_types = 1);

class HomepageController
{
    private $databaseLoader;

    public function __construct() {
        $this->databaseLoader = new Database();
    }
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $customerNames = $this->databaseLoader->getCustomers();
        $productNames = $this->databaseLoader->getProducts();

        if (isset($POST['submit'])) {
            $customerDetails = $this->databaseLoader->getCustomerByID($POST['customers']);
            //var_dump($customerDetails);
            $productDetails = $this->databaseLoader->getProductByID($POST['products']);
            //var_dump($productDetails);
            $groupDiscountDetails = $this->databaseLoader->getGroupDiscountByID($customerDetails['group_id']);
            //var_dump($groupDiscountDetails);

            //new price calculator
            $priceCalculation = new PriceCalculator($customerDetails, $productDetails, $groupDiscountDetails);
            //before we want to get the discounts we need to change the discount values that have NULL to 0
            $priceCalculation->refactorDiscounts();
            $priceCalculation->getHighestFixedDiscount();
            $priceCalculation->getHighestVariableDiscount();
            $priceCalculation->priceCalculation();
            var_dump($priceCalculation);


        }




        // you should not echo anything inside your controller - only assign vars here
        
        // Models will be responsible for getting the data, for example if you want to get some students from a database:
        // $students = StudentHelper::getAllStudents();
        // The line above this one will use a StudentHelper model that you can make and require in this file
        // the getAllStudents is a static method, which means you can call this function without an instance of your StudentHelper
        // If you want to learn more about static methods -> https://www.w3schools.com/Php/php_oop_static_methods.asp
        
        // then the view will actually display them.

        //load the view
        require 'View/homepage.php';
    }
}
