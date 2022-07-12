<?php

class PriceCalculator
{
    //we need details from the customer which we select
    private array $customerDetails;
    //we also need the details from the product that will be selected
    private array $productDetails;
    //the group discount
    private array $groupDiscountDetails;
    //we need the highest fixed discount
    private int $highestFixedDiscount;
    //we need the highest variable discount
    private int $highestVariableDiscount;
    //all the discounts
    private array $allDiscounts;
    //our calculation result
    private float $result;

    public function __construct(array $customerDetails, array $productDetails, array $groupDiscountDetails){
        $this->customerDetails = $customerDetails;
        $this->productDetails = $productDetails;
        $this->groupDiscountDetails = $groupDiscountDetails;
        //The discounts from the customers need to be in all discounts array
        $this->allDiscounts['fixed_discount'] = $this->customerDetails['fixed_discount'];
        $this->allDiscounts['variable_discount'] = $this->customerDetails['variable_discount'];
        //The discounts from the customers group also need to be added to this array
        $this->allDiscounts['fixed_discount_group'] = $this->groupDiscountDetails[0]['fixed_discount'];
        $this->allDiscounts['variable_discount_group'] = $this->groupDiscountDetails[0]['variable_discount'];
    }

    /*
     * Need to add a function which sets NULL value to 0 int value else we get the following error
     * Fatal error: Uncaught TypeError: Cannot assign null to property PriceCalculator::$highestFixedDiscount of type int
     */

    public function refactorDiscounts(){
        foreach ($this->allDiscounts as $type => $discount){
            if ($discount == null){
                $this->allDiscounts[$type] = 0;
            }
        }
    }

    public function getHighestFixedDiscount(): int
    {
        if ($this->allDiscounts['fixed_discount'] > $this->allDiscounts['fixed_discount_group']) {
            $this->highestFixedDiscount = $this->allDiscounts['fixed_discount'];
        } else {
            $this->highestFixedDiscount = $this->allDiscounts['fixed_discount_group'];
        }
        return $this->highestFixedDiscount;
    }

    public function getHighestVariableDiscount(): int
    {
        if ($this->allDiscounts['variable_discount'] > $this->allDiscounts['variable_discount_group']) {
            $this->highestVariableDiscount = $this->allDiscounts['variable_discount'];
        } else {
            $this->highestVariableDiscount = $this->allDiscounts['variable_discount_group'];
        }
        return $this->highestVariableDiscount;
    }

    public function priceCalculation(){
        $productPrice = $this->productDetails['price']/100; //gives a price with a decimal point
        $fixedDiscountPrice = $productPrice - $this->getHighestFixedDiscount();
        $variableDiscountPrice = $productPrice - (($productPrice/100) * $this->getHighestVariableDiscount());

        if ($fixedDiscountPrice > $variableDiscountPrice){
            $this->result = $variableDiscountPrice;
        } else {
            $this->result = $fixedDiscountPrice;
        }

        if ($this->result < 0){
            $this->result = 0;
        }
    }

    public function getResult(): float
    {
        return $this->result;
    }


}