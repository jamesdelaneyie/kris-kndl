<?php
    // First we get the string from the POST parameter 
    // Notice I used $_REQUEST which works both on GET and POST parameters. You could obviously change it to $_POST.
    $people = $_REUQEST['givers'];

    // We convert the JSON string into an array. 
    // The second parameter tells the function to return an array(true) and not an object(false, which is the default)
    $people = json_decode($people, true);

    // Now we use the foreach loop for going through each item in the array, meaning - each person.
    foreach ($people as $key => $person) {
        // Now, we send an email for each person, with the following parameters:
        // to: The person's email
        // subject: The first name
        // content: The string "Gift to " and the thanked person's name. (copied that from Wowenko)
        mail ($person['email'], $person['firstName'] , "Gift to " . $person['givesGiftTo']);
    }