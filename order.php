<?php
/**
 * order.php  
 *
 * Page to order different hot dogs
 * 
 * 
 * @author Gabby 
 * @version 2.091 2011/06/17
 * @link http://www.newmanix.com/
 * @license https://www.apache.org/licenses/LICENSE-2.0
 * @see config_inc.php 
 * @todo none
 */
 
require 'inc_0700/config_inc.php'; #provides configuration, pathing, error handling, db credentials
include 'hotdogs/items.php';
$config->titleTag = 'ORDER'; #Fills <title> tag. If left empty will fallback to $config->titleTag in config_inc.php

//below you can add a link to a unique page to the existing nav as follows
//$config->nav1 = array("aboutus.php"=>"About Us") + $config->nav1; 
/*
$config->metaDescription = 'Web Database ITC281 class website.'; #Fills <meta> tags.
$config->metaKeywords = 'SCCC,Seattle Central,ITC281,database,mysql,php';
$config->metaRobots = 'no index, no follow';
$config->loadhead = ''; #load page specific JS
$config->banner = ''; #goes inside header
$config->copyright = ''; #goes inside footer
$config->sidebar1 = ''; #goes inside left side of page
$config->sidebar2 = ''; #goes inside right side of page
$config->nav1["page.php"] = "New Page!"; #add a new page to end of nav1 (viewable this page only)!!
$config->nav1 = array("page.php"=>"New Page!") + $config->nav1; #add a new page to beginning of nav1 (viewable this page only)!!
*/

# END CONFIG AREA ---------------------------------------------------------- 
# Read the value of 'action' whether it is passed via $_POST or $_GET with $_REQUEST
if(isset($_REQUEST['act'])){$myAction = (trim($_REQUEST['act']));}else{$myAction = "";}

switch ($myAction)
{//check 'act' for type of process
	case "display": // 2)Display user's name!
	 	showData();
	 	break;
	default: // 1)Ask user to enter their name
	 	showForm();
}

function showForm()
{# shows form so user can enter their name.  Initial scenario
	global $config;
    get_header(); #defaults to header_inc.php

    

    // Menu & Order display 
	echo
	'<script type="text/javascript" src="' . VIRTUAL_PATH . 'include/util.js"></script>
	<script type="text/javascript">
		
	</script>
    <h3 align="center">ORDER HERE</h3>
    <br>
    <br>

    <table class="table table-hover">
    <thead>
    <tr>
    <th scope="col">Hot Dog</th>
    <th scope="col">Description</th>
    <th scope="col">Price</th>
    </tr>
    </thead>

        <tbody>';

    foreach($config->items as $item){
        echo 
        '<tr class="table-active">
        <th scope="row">'. $item->Name . '</th>';
        echo 
        '<td>'. $item->Description . '</td>';
        echo 
        '<td>'. $item->Price . '</td>
        </tr>';
    }

    echo '</tbody></table>

	<form action="' . THIS_PAGE . '" method="post" onsubmit="return checkForm(this);">';

    
    echo 
        '<label for="exampleSelect1"></label>
        <select class="form-control" id="exampleSelect1" name="Food1"  style="width: 150px; " >';
		foreach($config->items as $item)
          {
            //echo "<p>ID:$item->ID  Name:$item->Name</p>";
            //echo '<p>Taco <input type="text" name="item_1" /></p>';
            echo '<option value="' . $item->Name . '">' . $item->Name .  ' </option>';
            //echo '<p>' . $item->Name . ' <input type="text" name="item_' . $item->ID . '" /></p>';
            //echo '<input type="text" name="amount" placeholder="#" required/> <br>'

          }
        
	echo '</select>
		<input type = "number" name="quantity1" class="form-control" id="exampleSelect1" placeholder="Quantity" style="width: 150px;">
        <br />
        
        <label for="exampleSelect1"></label>
        <select class="form-control" id="exampleSelect1" name="Food2"  style="width: 150px;">';
		foreach($config->items as $item)
          {
            //echo "<p>ID:$item->ID  Name:$item->Name</p>";
            //echo '<p>Taco <input type="text" name="item_1" /></p>';
            echo '<option value="' . $item->Name . '">' . $item->Name .  ' </option>';
            //echo '<p>' . $item->Name . ' <input type="text" name="item_' . $item->ID . '" /></p>';
            //echo '<input type="text" name="amount" placeholder="#" required/> <br>'

          }
	echo '</select>
		<input type = "number" name="quantity2" class="form-control" id="exampleSelect1" placeholder="Quantity" style="width: 150px;">
        <br />
        
        <label for="exampleSelect1"></label>
        <select class="form-control" id="exampleSelect1" name="Food3" style="width: 150px;">';
		foreach($config->items as $item)
          {
            //echo "<p>ID:$item->ID  Name:$item->Name</p>";
            //echo '<p>Taco <input type="text" name="item_1" /></p>';
            echo '<option value="' . $item->Name . '">' . $item->Name .  ' </option>';
            //echo '<p>' . $item->Name . ' <input type="text" name="item_' . $item->ID . '" /></p>';
            //echo '<input type="text" name="amount" placeholder="#" required/> <br>'

          }
	echo '</select>
		<input type = "number" name="quantity3" class="form-control" id="exampleSelect1" placeholder="Quantity" style="width: 150px;">
        <br />
        
        <label for="exampleSelect1"></label>
        <select class="form-control" id="exampleSelect1" name="Food4" style="width: 150px;">';
		foreach($config->items as $item)
          {
            //echo "<p>ID:$item->ID  Name:$item->Name</p>";
            //echo '<p>Taco <input type="text" name="item_1" /></p>';
            echo '<option value="' . $item->Name . '">' . $item->Name .  ' </option>';
            //echo '<p>' . $item->Name . ' <input type="text" name="item_' . $item->ID . '" /></p>';
            //echo '<input type="text" name="amount" placeholder="#" required/> <br>'

          }
    echo '</select>
        <input type = "number" name="quantity4" class="form-control" id="exampleSelect1" placeholder="Quantity" style="width: 150px;">
		<br />';

    //Order / Submit button
    echo '
        <p>
            <input type="submit" value="Order" style="width: 150px; box-shadow: 0 20px 40px 4px rgba(0, 0, 0, 0.25); " class="btn btn-warning">
        </p>
		<input type="hidden" name="act" value="display" />
    </form>';
    
	get_footer(); #defaults to footer_inc.php
}

function showData()
{#form submits here we show entered name

	global $config;
    //dumpDie($_POST);
    get_header(); #defaults to footer_inc.php

    //PHP Variables Declared.
    //Grabs post data for quantity and food name
	$food1 = $_POST["Food1"];
	$food2 = $_POST["Food2"];
    $food3 = $_POST["Food3"];
    $food4 = $_POST["Food4"];

    
	$q1 = $_POST["quantity1"];
	$q2 = $_POST["quantity2"];
	$q3 = $_POST["quantity3"];
	$q4 = $_POST["quantity4"];

	$p1;
	$p2;
	$p3;
    $p4;

	echo '<h3 align="center">Your Order</h3>';

    
    //THIS IS WHERE THE PRICE IS CALCULATED
    //Pulls the data from the items
    //Then Checks if the names match
    //Then assigns the value based off the name from the items.
    
	foreach($config->items as $item){
        if($food1==$item->Name){
            $p1= $item->Price * $q1;
        }
        if($food2==$item->Name){
            $p2= $item->Price * $q2;

        }
        if($food3==$item->Name){
            $p3= $item->Price * $q3;
        }
        if($food4==$item->Name){
            $p4= $item->Price * $q4;
        }
    }
    
    //SUBTOTAL CALCULATIONS
    (float)$subtotal = $p1 + $p2 + $p3 + $p4;
    
    //SALES TAX
    $taxRate = 9.3;
    (float)$salesTax = $subtotal * ($taxRate / 100);
    
    //TOTAL CALCULATIONS
    (float)$total = $subtotal + $salesTax;
    
    
    
    //RESULTS DISPLAYED
    echo '
    <table class="table table-hover">
    <thead>
    <tr>
    <th scope="col">Hot Dog</th>
    <th scope="col">Quantity</th>
    <th scope="col">Price</th>
    </tr>
    </thead>';
    
    //Creates a new table row as long as 
    //quantity is a number greater than zero
    // error is thrown if quantity is less than zero

    if ($q1 < 0){
        echo '<p style="color: red;"><em>Please Enter A Valid Number of Hot Dogs!</em></p>';

    } else if ($q1 > 0){
        echo '
        <tbody>
        <tr class="table-active">
        <th scope="row">'. $food1 .'</th>
        <td>'. $q1 .'</td>
        <td>$'. number_format($p1, 2) .'</td>
        </tr>
        ';
    }
    
    if ($q2 < 0){
        echo '<p style="color: red;"><em>Please Enter A Valid Number of Hot Dogs!</em></p>';

    } else if ($q2 > 0){
        echo '
        <tr class="table-active">
        <th scope="row">'. $food2 .'</th>
        <td>'. $q2 .'</td>
        <td>$'. number_format($p2, 2) .'</td>
        </tr>
        ';
    }

    if ($q3 < 0){
        echo '<p style="color: red;"><em>Please Enter A Valid Number of Hot Dogs!</em></p>';

    } else if ($q3 > 0){
        echo '
        <tr class="table-active">
        <th scope="row">'. $food3 .'</th>
        <td>'. $q3 .'</td>
        <td>$'. number_format($p3, 2) .'</td>
        </tr>
        ';
    }
    
    if ($q4 < 0){
        echo '<p style="color: red;"><em>Please Enter A Valid Number of Hot Dogs!</em></p>';

    } else if ($q4 > 0){
        echo '
        <tr class="table-active">
        <th scope="row">'. $food4 .'</th>
        <td>'. $q4 .'</td>
        <td>$'. number_format($p4, 2) .'</td>
        </tr>
        ';
    }
    
    echo "</tbdoy></table> <br><br>";
    

    //TOTAL/SUBTOTAL/SALES TAX
    if($p1 || $p2 || $p3 || $p4 >0) {
        echo '<div class="card border-secondary mb-3" style="max-width: 20rem;">
        <div class="card-header"></div>
        <div class="card-body">
          <h4 class="card-title"><em>Your total is...</em></h4>
          <p class="card-text">
          Subtotal : $' . number_format($subtotal, 2) . '<br>
          Tax : ' . round($taxRate, 2) . '% <br>
          Sales Tax : $' . number_format($salesTax, 2) . ' <br></p>
          <p class="card-text">
          <strong>TOTAL : $' . number_format($total, 2) . ' </strong><br>
          </p>
        </div>
        </div>';

    } else {
        echo "Nothing was ordered! Please hit BACK button to order.";
    }

	echo '<p align="center"><a href="' . THIS_PAGE . '">BACK</a></p>';
	get_footer(); #defaults to footer_inc.php
}
?>