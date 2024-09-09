<?php

function isBalanced($exp){
    $stack = [];
    $length = strlen($exp);
    
    for($i =0; $i < $length; $i++){
        $char = $exp[$i];


        if($char == '(' || $char == '{' || $char == '['){
            array_push($stack, $char);
        }

        elseif($char == ')' || $char == '}' || $char == ']'){
            if(empty($stack)){
                return false;
            }


            $top = array_pop($stack); // get last value in stack
            // Check if the top element matches the closing bracket
            if (($char == ')' && $top != '(') ||
                ($char == '}' && $top != '{') ||
                ($char == ']' && $top != '[')) {
                return false;
            }
        }
    }

    return empty($stack);
}


$expression = readline("Enter an expression: ");

// Check if the expression is balanced
if (isBalanced($expression)) {
    echo "The expression is balanced.\n";
} else {
    echo "The expression is not balanced.\n";
}

?>
