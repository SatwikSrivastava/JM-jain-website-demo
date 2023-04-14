<?php
class A{
   const PI=3.142;
   static $x=10;
}
echo A::PI;
echo A::$x;
$var='A';
echo $var::PI;
echo $var::$x;
?>

