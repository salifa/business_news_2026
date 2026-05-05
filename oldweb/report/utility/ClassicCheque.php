<?php
	
function UpdateTransactions($transaction_program,$account_cash_id) {
    
    
    
    
    if ($transaction_program == "เงินสด") {
	    
	    $SQLCommand = "SELECT * FROM accountTransaction ";  
    	$SQLCommand .= "WHERE (transaction_program ='เงินสด') ";
    	$SQLCommand .= "AND (cash_id ='".$account_cash_id."') ";    	
    	$SQLCommand .= "ORDER BY transaction_date ASC,id ASC; ";
    	
		$RS1 = CustomQuery($SQLCommand); 
		 
			while ($data = db_fetch_array($RS1)) { 
				
				if ($ICount = 0) {
					
					$transaction_amount_balance = $data["transaction_amount_balance"];
					
					
				}
				else {
					
					
					if ($data["transaction_type"] == "ฝาก") {
						
						$transaction_amount_balance = $transaction_amount_balance + $data["transaction_amount"];
						
					}
					elseif ($data["transaction_type"] == "ถอน") {
						$transaction_amount_balance = $transaction_amount_balance - $data["transaction_amount"];
					
					}					
					
					
				}
				
				
				$SQLCommand = "UPDATE accountTransaction SET ";
				$SQLCommand .= "transaction_amount_balance = '".$transaction_amount_balance."' ";
				$SQLCommand .= "WHERE (id = '".$data["id"]."')";
				CustomQuery($SQLCommand);
				
				$ICount = ICount + 1;

			}    	
    	

    } 
    
    else {
	    

    	$SQLCommand = "SELECT * FROM accountTransaction ";  
    	$SQLCommand .= "WHERE ((transaction_program ='บัญชีธนาคาร') OR (transaction_program ='เช็ค')) ";
    	$SQLCommand .= "AND (transaction_status = '' OR transaction_status = 'รับเงินแล้ว' OR transaction_status = 'จ่ายเงินแล้ว') ";
    	
    	$SQLCommand .= "AND (account_id ='".$account_cash_id."') ";    	
    	$SQLCommand .= "ORDER BY transaction_date ASC,id ASC; ";


		$RS1 = CustomQuery($SQLCommand);  
		
			while ($data = db_fetch_array($RS1)) {
				
				if ($ICount = 0) {
					
					$transaction_amount_balance = $data["transaction_amount_balance"];
					
					
				}
				else {
					
					if (($data["transaction_type"] == "ฝาก") OR ($data["transaction_type"] == "รับ") ) {
						
						$transaction_amount_balance = $transaction_amount_balance + $data["transaction_amount"];
						
					}
					elseif (($data["transaction_type"] == "ถอน") OR ($data["transaction_type"] == "จ่าย") ) {
						$transaction_amount_balance = $transaction_amount_balance - $data["transaction_amount"];
					
					}

				}
				
				$SQLCommand = "UPDATE accountTransaction SET ";
				$SQLCommand .= "transaction_amount_balance = '".$transaction_amount_balance."' ";
				$SQLCommand .= "WHERE (id = '".$data["id"]."')";
				CustomQuery($SQLCommand);
				
				$ICount = ICount + 1;	

			}    	
    	    	
 
	    
    }
    

}
	
	
	
	
	
	
	
	
	
	
	
?>