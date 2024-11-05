<?php
include("CarPolicy2.php");



$policyNumber = $POST['policyNumber'];
$yearlyPremium = $POST['yearlyPremium'];
$dateOfLastClaim = $POST['dateOfLastClaim'];

$policy = new CarPolicy($policyNumber, $yearlyPremium);
$policy->setDateOfLastClaim($dateOfLastClaim);

echo "Initial Premium: $" . $policy->yearlyPremium . "<br>";
echo "Discounted Premium: $" . $policy->getDiscountedPremium() . "<br>";


?>