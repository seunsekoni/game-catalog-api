<?php
    
function getExecutionTime($query) {
    $start_time = microtime(true); 
    $query;
    $end_time = microtime(true); 
    $execution_time = $end_time - $start_time;
    return $execution_time;
}