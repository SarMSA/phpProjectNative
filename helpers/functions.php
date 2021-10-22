<?php 


function validate($input,$flag){
$status = true;

 switch ($flag) {
     case 'emptyVal':
         # code...
         if(empty($input)){
           $status = false;
         }
         break;

    case 'nameVal': 
        if(!preg_match('/^[a-zA-Z\s]*$/',$input)){
            $status = false;
        }
       break;

    case 'emailVal': 
        # code 
        if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
            $status = false;
        } 
        break; 

    case 'passVal': 
        if (strlen($input) <= '6')
        {
            $status = false;
        }

        break;

    case 'titleVal':
        if (strlen($input) < '3' and strlen($input) > '20')
        {
            $status = false;
        }
        break;

    case 'descVal':
        if (strlen($input) < '10' and strlen($input) > '1000')
        {
            $status = false;
        }
        break;

    case 'genderVal':
        if ($input == NULL)
        {
            $status = false;
        }
        break;

    case 'urlVal':
        $urlval = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
        if (!preg_match($urlval, $input)) {
            $status = false;
        }
        break;

    case 'fileVal':
        $allowedExt = ['jpg', 'png', 'jpeg', 'svg'];

        $extArray = explode('/',$input);
    
        if(!in_array($extArray[1],$allowedExt)){
            $status = false;
        }
        break;

    case 'intVal': 
        if(!filter_var($input,FILTER_VALIDATE_INT)){
            $status = false;
        } 
        break; 
   }
  
    return $status;

}





function CleanInputs($input){
  
    $input = trim($input);
    $input = stripcslashes($input);
    $input = htmlspecialchars($input);

     return $input;
}

function sanitize($input,$flag){
    
    switch ($flag) {
        case 1:
            # code...
            $input = filter_var($input,FILTER_SANITIZE_NUMBER_INT);     
            break;
        
    }
    return $input;
}

function PrintMessages($text, $del_flag = 0) {
    if (isset($_SESSION['message'])) {
        foreach($_SESSION['message'] as $m) {
            echo "* ".$m .'<br>';
        }
        if ($del_flag == 0) {
            unset($_SESSION['message']);
        }
    }else {
        echo $text;
    }
} 
function url($input) {
    return "http://".$_SERVER['HTTP_HOST']."/phpProjectNative/admin/".$input;
}

function hurl($input){
    return "http://localhost/phpProjectNative/".$input;
}

function urlUser($input) {
    return "http://".$_SERVER['HTTP_HOST']."/phpProjectNative/user/".$input;
}
function returnPositiveInt ($int) {

    $int = str_replace(['-', '+'], '', $int);
    return $int;

}

function convertToValidPrice($price) {
    $price = str_replace(['-', ',', '$', ' '], '', $price);
    $status = true;
    if(!is_numeric($price)) {
        $status = false;
    } else {
        if(strpos($price, '.') !== false) {
            $poundExplode = explode('.', $price);
            $pound = $poundExplode[0];
            $piastre  = $poundExplode[1];
            if(strlen($piastre) === 0) {
                $piastre = '00';
            } elseif(strlen($piastre) === 1) {
                $piastre = $piastre.'0';
            } elseif(strlen($piastre) > 2) {
                $piastre = substr($piastre, 0, 2);
            }
            $price = $pound.'.'.$piastre;
        } else {
            $piastre = '00';
            $price = $price.'.'.$piastre;
        }
        return $price;
    }

}



?>