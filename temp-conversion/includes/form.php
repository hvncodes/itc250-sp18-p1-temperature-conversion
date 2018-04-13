<?php 
//form.php

//includes conversion functions
include 'includes/conversions.php';

//form handler to convert temperature 
if (isset($_POST['convert'])) {
    $tempValue = (float)$_POST['tempvalue'];
    $tempType = $_POST['temptype'];
    
    //is tempvalue a number?
    if ((is_numeric($_POST['tempvalue'])) && ($tempType != "")) {
        $convert = $tempValue;
        $celsius = convertCelsius($tempValue, $tempType);
        $fahrenheit = convertFahrenheit($tempValue, $tempType);
        $kelvin = convertKelvin($tempValue, $tempType);
        echo "You entered $convert degrees $tempType<br><br><br>";
        echo "$celsius ˚C <br><br>";
        echo "$fahrenheit ˚F <br><br>";
        echo "$kelvin K ";
        echo '
        <br>
        <br>
        <form action="">
            <input type="submit" value="BACK" class="btn"/>
        </form>
        ';
    } else { //it's not a number
       echo 'Your input is invalid';
       echo '
        <br>
        <br>
        <form action="">
            <input type="submit" value="BACK" class="btn"/>
        </form>
        ';
    }
} else {
    echo '
    <form action="" method="post">
        <p>Temperature to Convert</p>
        <input type="text" name="tempvalue"
                placeholder="Enter the Temperature" required/> <br><br>

        <p>Temperature Unit</p>
        <select name="temptype" required>
            <option value="">Please select a temperature unit </option>
            <option value="Celsius">Celsius</option>
            <option value="Fahrenheit">Fahrenheit </option>
            <option value="Kelvin">Kelvin</option>
        </select>
        <br>
        <br>
        <br>
        <input type="submit" name="convert" class="btn" value="CONVERT"/> 
    </form>
    ';
}
