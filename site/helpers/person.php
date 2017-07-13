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
        
        // Get a db connection.
$db = JFactory::getDbo();

// Create a new query object.
$query = $db->getQuery(true);

// Select all records from the user profile table where key begins with "custom.".
// Order it by the ordering field.
$query->select($db->quoteName(array('personID', 'firstname', 'surname')));
$query->from($db->quoteName('#__cmperson'));
$query->where($db->quoteName('personID') . ' = '. $personID);

// Reset the query using our newly populated query object.
$db->setQuery($query);

// Load the results as a list of stdClass objects (see later for more options on retrieving data).
$this = $db->loadObject();
    

    }
    
    
}
