<?php
// PHP code to demonstrate
// printing pattern of numbers
 
// Function to demonstrate
// printing pattern
function numpat($n)
{
     
    // initializing starting number
    $num = 1;
 
    // outer loop to handle
    // number of rows
    // n in this case
    for ($i = 0; $i < $n; $i++)
    {
 
        // inner loop to handle
        // number of columns
        // values changing acc.
        // to outer loop
        for ($j = 0; $j <= $i; $j++ )
        {
             
            // printing number
            echo $num." ";
        }
         
            // incrementing number
            // at each column
            $num = $num + 1;
 
        // ending line after
        // each row
        echo "\n";
    }
}
 
    // Driver Code
    $n = 5;
    numpat($n);
 
?>