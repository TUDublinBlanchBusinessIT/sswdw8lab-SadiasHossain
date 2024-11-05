<?php
class CarPolicy
{
    private $policyNumber ="";
    private $yearlyPremium ="";
    private $dateOfLastClaim="";

    public function __construct ($policyNumber, $yearlyPremium)
    {
        $this->policyNumber = $policyNumber;
        $this->yearlyPremium = $yearlyPremium;
    }

    public function setDateOfLastClaim($date)
    {
        $this->dateOfLastClaim = $date;
    }

    public function getTotalYearsNoClaims()
    {
     $currentDate = new DateTime();
     $lastDate= new DateTime($this->dateOfLastClaim);
     $interval = $currentDate->diff($lastDate);
     return $interval->format("%y");
    }

    public function __toString()
    {
        return "PN: " . $this->policyNumber; 
    }

    public function getDiscount()
    {
        $yearsNoClaim = $this->getTotalYearsNoClaims();

        if (($yearsNoClaim >= 3)&& ($yearsNoClaim <= 5)){
            return 10;
        }
        elseif ($yearsNoClaim > 5){
            return 15;
        }
        else {
            return 0;
        }
    }

    public function getDiscountedPremium()
    {
        $disc = $this->getDiscount();
        return $this-> yearlyPremium * ($disc / 100);
    }
}