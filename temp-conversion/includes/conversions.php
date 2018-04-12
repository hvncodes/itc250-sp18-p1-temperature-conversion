<?php 
// conversions.php

// form handler to convert temperature 
if(isset($_POST['convert'])) {

    $tempValue = (float)$_POST['tempvalue'];
    $tempType = $_POST['temptype'];
    
    if (is_numeric($_POST['tempvalue'])){ //is tempvalue a number?
        $convert = $tempValue;
        $celsius = convertCelsius ($tempValue, $tempType);
        $fahrenheit = convertFahrenheit ($tempValue, $tempType);
        $kelvin = convertKelvin ($tempValue, $tempType);
        echo "You entered $convert <br><br>";
        echo "$celsius ˚C <br>";
        echo "$fahrenheit ˚F <br>";
        echo "$kelvin K ";
        echo '
        <br>
        <p><a href="">BACK</a></p>
        ';
    }else { //it's not a number
       echo 'Your input is invalid';
    }
} else {
    echo '<form action="" method="post">
    <p>Temperature to Convert</p>
    <input type="text" name="tempvalue" placeholder="Enter the Temperature" /> <br><br>

    <p>Temperature Unit</p>
    <select name="temptype">
        <option value="">Please select a temperature unit </option>
        <option value="celsius">Celsius</option>
        <option value="fahrenheit">Fahrenheit </option>
        <option value="kelvin">Kelvin</option>
    </select>
    <br>
    <br>
    <br>
    <input type="submit" name="convert" class="btn"/> 
    </form>';
}

function convertCelsius ($tempValue, $tempType) //converts Fahren or Kelvin to Celsius
{
    if ($tempType == 'fahrenheit') { //convert from fahrenheit to celsius
        $celsConver = ($tempValue -32) / 1.8;
    } else if ($tempType == 'kelvin') { //convert from Kelvin to celsius
        $celsConver = $tempValue - 273.15;
    } else { //it's already celsius, do nothing
        $celsConver = $tempValue;
    }
    return round ($celsConver, 2);
}

function convertFahrenheit ($tempValue, $tempType) //converts celsius or Kelvin to fahren
{
    if ($tempType == 'kelvin') { // convert from kelvin to fahren
        $farConver = $tempValue * 1.8 - 459.67;
    } else if ($tempType == 'celsius') { //convert from celsius to fahren
        $farConver = $tempValue * 1.8 + 32;
    } else {// already fahren, do nothing
        $farConver = $tempValue;
    }
    return round ($farConver, 2);
}

function convertKelvin ($tempValue, $tempType) //converts celsius or fahren to Kelvin
{
    if ($tempType == 'fahrenheit') { // convert from fahren to kelvin
        $kelConver = ($tempValue + 459.67) * 5/9;
    } else if ($tempType == 'celsius') { //convert from celsius to kelvin
        $kelConver = $tempValue + 273.15;
    } else { //already kelvin, do nothing.
        $kelConver = $tempValue;
    }
    return round ($kelConver, 2);
}