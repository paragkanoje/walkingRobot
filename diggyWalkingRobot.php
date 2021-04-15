<?php

const NORTH = 1;
const EAST = 2;
const SOUTH = 3;
const WEST = 4;
//Directions where to direct
$direction = [ 1 => "NORTH", 2 => "EAST", 3 => "SOUTH", 4 => "WEST"];

const MULTIPLIER_1 = 1;
const MULTIPLIER_2 = 1;
const MULTIPLIER_3 = -1;
const MULTIPLIER_4 = -1;

//input co- ordinates by using command promt
$a = $argv[1];
$b = $argv[2];
// inputed co- ordinates checks is it numeric or not
if(!is_numeric($a) || !is_numeric($b)){
        die("\nCo-ordinates should be in Integer\n");
}

//input direction were to direct
$currentDirection = $argv[3];

if($currentDirection != 'NORTH' && $currentDirection != 'EAST' && $currentDirection != 'SOUTH' && $currentDirection != 'WEST'){
         die("\nThis is Wrong Direction\n");
}

$currentDirectionNumber = constant($currentDirection);

//input path 
$path = $argv[4];

for($i = 0; $i < strlen($path); $i++ ){

        switch($path{$i}){
                case 'R':
                        if($currentDirectionNumber == 4)
                        {
                                $currentDirectionNumber = 1;
                        } 
                        else 
                        {
                                $currentDirectionNumber++;
                        }
                        break;
                case 'L':
                        if($currentDirectionNumber == 1)
                        {
                                $currentDirectionNumber = 4;
                        } 
                        else 
                        {
                                $currentDirectionNumber--;
                        }
                        break;
                case 'W':
                        if( !($currentDirectionNumber % 2) )
                        {
                                $a += ($path{$i+1} * constant("MULTIPLIER_".$currentDirectionNumber) );
                        } 
                        else 
                        {
                                $b += ($path{$i+1} * constant("MULTIPLIER_".$currentDirectionNumber) );
                        }
                        $i++;
                        break;
                default:
                        if(is_numeric($path{$i}))
                        {
                                echo "\nNumber should be similer with 'W' walk between from 0 - 9\n";
                        } 
                        else 
                        {
                                echo "\nInput char '".$path{$i}."' is not valid\n";
                        }
                        break;
        }

}

echo $a." ".$b." ".$direction[$currentDirectionNumber]."\n";

?>