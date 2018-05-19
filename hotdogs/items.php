<?php
//items.php

$myItem = new Item(1,"Beef Hot Dog","A Classic 1/4Lb All Beef Hot Dog",5.95);
$myItem->addExtra("Relish");
$myItem->addExtra("Onions");
$myItem->addExtra("Chili");
$config->items[] = $myItem;

$myItem = new Item(2,"Vegan","House Made Seitan Sausage With Mushrooms & Spices",6.95);
$myItem->addExtra("Sauerkraut");
$myItem->addExtra("French Fried Onions");
$myItem->addExtra("Jalapenos");
$config->items[] = $myItem;

$myItem = new Item(3,"German Bratwurst","A 1/4 Lb White Pork & Beef Sausage Made With Skim Milk & 7 Spices",7.95);
$myItem->addExtra("Sauerkraut");
$myItem->addExtra("Bacon");
$myItem->addExtra("Chopped Onions");
$config->items[] = $myItem;

$myItem = new Item(4,"Chicken Sausage","A 1/4 Lb Sausage Made With Chicken, Herbs & Spices In A Natural Pork Casing",6.95);
$myItem->addExtra("Cheese");
$myItem->addExtra("Bacon");
$myItem->addExtra("Relish");
$myItem->addExtra("Turkey bacon");
$config->items[] = $myItem;


class Item
{
    public $ID = 0;
    public $Name = '';
    public $Description = '';
    public $Price = 0;
    public $Extras = array();
    
    public function __construct($ID,$Name,$Description,$Price)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;
        
    }#end Item constructor
    
    public function addExtra($extra)
    {
        $this->Extras[] = $extra;
        
    }#end addExtra()

}#end Item class