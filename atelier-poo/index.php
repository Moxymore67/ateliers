<?php

/**
 * Lien vers l'atelier : https://wildcodeschool.github.io/atelier-phpoo-1/
 */

include "Cat.php";
include "Collar.php";

/**
 * Cat #1
 */
$cat1 = new Cat('Garfield', 'ginger');
$collar1 = new Collar(5, 'gold');
$cat1->setCollar($collar1);
$cat1->setTiredness(10);
$cat1->setImage('https://p.bigstockphoto.com/GeFvQkBbSLaMdpKXF1Zv_bigstock-Aerial-View-Of-Blue-Lakes-And--227291596.jpg');

/**
 * Cat #2
 */
$cat2 = new Cat('Sayan', 'blacks');
$cat2->setTiredness(150);
$cat2->setImage('https://www.twistandtwain.com/assets/resources/2020/01/pexels-photo-414612.jpeg');

/**
 * Result
 */
$catsArray = [$cat1, $cat2];
foreach($catsArray as $cat) {
    echo "<h1>" . $cat->getName() . "</h1>";
    echo "<p>" . $cat->getName() . " a un état de fatigue de " . $cat->getTiredness() . " et commence à marcher!</p>";
    $cat->eat();
    echo "<p>" . $cat->getName() . " décide de casser la croûte. Son état de fatigue passe à " . $cat->getTiredness() . ".</p>";
    while ($cat->isTired() != true){
        $cat->walk();
        echo "<p>" . $cat->getName() . " continue de marcher, il a encore de l'énergie.</p>";
    }
    echo "<p>" . $cat->getName() . " est dorénavant trop fatigué et s'arrête!</p>";
    echo "<p>" . $cat->getName() . " commence à recharger ses batteries...</p>";
    $cat->rest();
    echo "<p>" . $cat->getName() . " est parfaitement reposé. Son état de fatigue est à " . $cat->getTiredness() . ".</p>";

}








