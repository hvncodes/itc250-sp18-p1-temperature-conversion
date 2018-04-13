<?php 
// conversions.php

//converts Fahren or Kelvin to Celsius
function convertCelsius($tempValue, $tempType)
{
    if ($tempType == 'Fahrenheit') {
        //convert from fahrenheit to celsius
        $celsConver = ($tempValue -32) / 1.8;
    } elseif ($tempType == 'Kelvin') {
        //convert from Kelvin to celsius
        $celsConver = $tempValue - 273.15;
    } else {
        //it's already celsius, do nothing
        $celsConver = $tempValue;
    }
    return round($celsConver, 2);
}

//converts celsius or Kelvin to fahren
function convertFahrenheit($tempValue, $tempType)
{
    if ($tempType == 'Kelvin') {
        // convert from kelvin to fahren
        $farConver = $tempValue * 1.8 - 459.67;
    } elseif ($tempType == 'Celsius') {
        //convert from celsius to fahren
        $farConver = $tempValue * 1.8 + 32;
    } else {
        //already fahren, do nothing
        $farConver = $tempValue;
    }
    return round($farConver, 2);
}

//converts celsius or fahren to kelvin
function convertKelvin($tempValue, $tempType)
{
    if ($tempType == 'Fahrenheit') {
        // convert from fahren to kelvin
        $kelConver = ($tempValue + 459.67) * 5/9;
    } elseif ($tempType == 'Celsius') {
        //convert from celsius to kelvin
        $kelConver = $tempValue + 273.15;
    } else {
        //already kelvin, do nothing
        $kelConver = $tempValue;
    }
    return round($kelConver, 2);
}
