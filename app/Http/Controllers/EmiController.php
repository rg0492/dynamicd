<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmiController extends Controller
{
	/** calculate Emi*/
    public function calculateEmi(Request $request)
    {
    	$year =$request->year;
    	$instalment =$request->instalment;  
    	$capital =$request->capital;  
    	$interest =$request->interest;  

    	//Calculate time in months. 
		$months=$year * 12; 
		//Check out which is the instalment. 
		if (strcmp($instalment,"Fixed")==0) 
		//Fixed amortization schedule 
		{ 
		//Calculate fixed payment for month. 
		    $fixedPayment=$capital / $months; 
		    $interestRateForMonth=$interest / 12; 

		//Calculate interest for every month. 
		    for ($i=0;$i<$months;$i++) 
		    { 
		//Interest for the month. 
		        $interestForMonth=$capital / 100 * $interestRateForMonth; 
		//Diminish capital after calculating interest. 
		        $capital=$capital - $fixedPayment; 
		//Payment for month is fixed pay + interest. 
		        $paymentForMonth=$fixedPayment + $interestForMonth; 
		//Print out payment for this month. Output is formatted (payment has two digits) 
		        $month=$i+1;
		        $data[".$month. payment is<br>"]= $paymentForMonth;
		    }     
		} 
		//Annuity 
		else { 
		//Calculate montly pay. 
		    $interest=$interest / 100; 
		    $result=$interest / 12 * pow(1 + $interest / 12,$months) / (pow(1 + $interest / 12,$months) - 1) * $capital;     
		    $data["Monthly pay is"] = $result;
		}
		return response()->json(["status"=>1,"data"=>$data]);
	}
}
