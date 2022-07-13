<?php
class convertfn{
    public $ci;
    function __construct()
    {
        $this->ci = &get_instance();
        date_default_timezone_set("Asia/Bangkok");
    }
    public function gci()
    {
        return $this->ci;
    }
}

function getcon()
{
    $obj = new convertfn();
    return $obj->gci();
}

function conDateTimeFromDb($datetime)
{
    if($datetime != ""){
        $datetimeIn = date_create($datetime);
        return date_format($datetimeIn,"d/m/Y H:i:s");
    }else{
        return $datetime;
    }
    
}

function conOnlyTimeFromDb($datetime)
{
    if($datetime != ""){
        $datetimeIn = date_create($datetime);
        return date_format($datetimeIn,"H:i:s");
    }else{
        return $datetime;
    }
}

function conDateFromDb($datetime)
{
    if($datetime != ""){
        $datetimeIn = date_create($datetime);
        return date_format($datetimeIn,"d/m/Y");
    }else{
        return $datetime;
    }
    
}

function conDateFormat($datetime)
{
    if($datetime != ""){
        $datetimeIn = date_create($datetime);
        return date_format($datetimeIn,"Y-m-d");
    }else{
        return $datetime;
    }
}



function conPrice($priceinput)
{
    $oriprice = str_replace("," , "" , $priceinput);
    return $oriprice;
}

function conNumToNull($number)
{
    if($number == 0.0000 || $number == ""){
        return "";
    }else{
        return valueFormat($number);
    }
}

function conNumToText($number)
{
    if($number == 0.0000 || $number == ""){
        return "None";
    }else{
        return valueFormat($number);
    }
}


function getLeadtime($startDatetime , $finishDatetime)
{
    if($startDatetime != "" && $finishDatetime != ""){
        $current_date_time_sec = strtotime($startDatetime); 
        $future_date_time_sec = strtotime($finishDatetime); 
        $difference = $future_date_time_sec - $current_date_time_sec; 
        $hours = ($difference / 3600); 
        $minutes = ($difference / 60 % 60); 
        $seconds = ($difference % 60); 
        $days = ($hours / 24);

        // $hours = ($hours % 24); 
        // echo "The difference is <br/>"; 
        // if ($days < 0) { 
        //     echo ceil($days) . " days AND "; 
        // } else { 
        //     echo floor($days) . " days AND "; 
        // } 
        return sprintf("%02d", $hours) . ":" . sprintf("%02d", $minutes) . ":" . sprintf("%02d", $seconds);
    }else{
        return "";
    }
    
}

function conTimeToComTime($time)
{
    $min = substr($time , 3 , 2);
    $hr = substr($time , 0 , 2);
    $conmin = intval($min);
    $conhr = intval($hr);
    $calComtime = $conmin/60;
    $roundCalComtime = round($calComtime , 2);

    // echo $hr." ".$min;
    // echo "<br>";
    // echo $conhr." ".$conmin;
    // echo "<br>";
    // echo $conhr." ".$calComtime;
    // echo "<br>";
    // echo $conhr+$roundCalComtime;
    // echo "<br>";
    // echo round($roundCalComtime , 2);
    // echo "<br>";
    return $conhr+$roundCalComtime;

}





?>