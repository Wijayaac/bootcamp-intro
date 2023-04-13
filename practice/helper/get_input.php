<?php
// helper function
function get_input(string $inputName, $defaultValue)
{
    $result = $defaultValue;

    if (isset($_GET[$inputName]) && $_GET[$inputName] !== "") {
        $result = $_GET[$inputName];
    }

    return $result;
}
