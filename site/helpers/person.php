<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author David
 */
class Person {
    // get details on a person
    function __construct( $personID= null) {
     
     // only search if a personId has been provided
        
        if (!empty($personID)){
        
        // Get a db connection.
$db = JFactory::getDbo();

// Create a new query object.
$query = $db->getQuery(true);

// Select all fields from the person table where the personID is correct".
// Order it by the ordering field.
$query->select(array('*'));
$query->from($db->quoteName('#__cmperson'));
$query->where($db->quoteName('personID') . ' = '. $personID);

// Reset the query using our newly populated query object.
$db->setQuery($query);


$results = $db->loadObject();

foreach($results as $key=>$value){
    $this->$key = $value;
}
    

    }
    } 
    
}
