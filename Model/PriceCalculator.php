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

    public function __construct(array $customerDetails, array $productDetails, array $groupDiscountDetails){
        $this->customerDetails = $customerDetails;
        $this->productDetails = $productDetails;
        $this->groupDiscountDetails = $groupDiscountDetails;
        //The discounts from the customers need to be in all discounts array
        $this->allDiscounts['fixed_discount'] = $this->customerDetails['fixed_discount'];
        $this->allDiscounts['variable_discount'] = $this->customerDetails['variable_discount'];
        //The discounts from the customers group also need to be added to this array
        $this->allDiscounts['fixed_discount_group'] = $this->groupDiscountDetails['fixed_discount'];
        $this->allDiscounts['variable_discount_group'] = $this->groupDiscountDetails['variable_discount'];
    }

}