<?php 

    // Model used to access the partyinfo JSON file and the summaries.php file

    // Get a specific party's summary
    function get_summary($abbr)
    {
        include "summaries.php";
        foreach ($summaries as $key => $value)
        {
            if (strtolower($key) == strtolower($abbr))
            {
                return $value;
            }
        }
    }

    // Get array of all the names of the covered parties
    function get_name_array() {
        // Create array to store names and their abbreviations
        $name_array = array(
            array(8),
            array(8),
        );

        // Get the contents of the JSON file, and only read names and abbreviations into the array
        // Sort the array and return the array
        $jsonString = file_get_contents(__DIR__ . '/partyinfo.json');
        $jsonData = json_decode($jsonString, true)["party_info"];
        for ($i = 0; $i < count($jsonData); $i++)
        {
            $name_array[0][$i] = $jsonData[$i]["name"] . " " . "(" . $jsonData[$i]["abbr"] . ")";
            $name_array[1][$i] = $jsonData[$i]["abbr"];
        };
        sort($name_array[0]);
        sort($name_array[1]);
        return $name_array;
    };

    // Get a specific party's information
    function get_party_info($abbr) {
        // Get  the file's contents and search them for the specific party's info
        $jsonString = file_get_contents(__DIR__ . '/partyinfo.json');
        $jsonData = json_decode($jsonString, true)["party_info"];
        for ($i = 0; $i < count($jsonData); $i++)
        {
            if (strtolower($jsonData[$i]["abbr"]) == strtolower($abbr))
            {
                return $jsonData[$i];
            }
        };
    };

?>