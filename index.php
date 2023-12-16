<?php
    // Controller file for the site

    // get the Model file
    include 'model/partyjson.php';
    
    // Generate the index of parties
    $party_names = get_name_array();

    // Get the get request for party information and set up
    // the array for use in the party template
    $party = filter_input(INPUT_GET, 'party');
    if ($party == NULL) {
        $party = filter_input(INPUT_POST, 'party');
    }
    $party_info = get_party_info($party);
    $party_summary = get_summary($party);

?>