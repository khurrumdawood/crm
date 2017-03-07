<style>
    table { 
        color: #333; /* Lighten up font color */
        font-family: Helvetica, Arial, sans-serif; /* Nicer font */
        width: 640px; 
        border-collapse: 
            collapse; border-spacing: 0; 
    }

    td, th { border: 1px solid #CCC; height: 30px; } /* Make cells a bit taller */

    th {
        background: #F3F3F3; /* Light grey background */
        font-weight: bold; /* Make sure they're bold */
    }

    td {
        background: #FAFAFA; /* Lighter grey background */
        text-align: center; /* Center our text */
    }
</style>
<?php
foreach ($r as $results) {
    $headerDisplayed = false;
    echo '<table>';
    foreach ($results as $data) {
// Add a header row if it hasn't been added yet
        if (!$headerDisplayed) {
// Use the keys from $data as the titles
//                print_r(array_keys($data));
             $headings = array_keys($data);
             echo '<tr>';
             foreach($headings as $heading){
                 echo '<th>'.$heading.'</th>';
             }
             echo '</tr>';
            $headerDisplayed = true;
        }
// Put the data into the stream
        echo '<tr>';
        foreach($data as $da){
            echo '<td>'.$da.'</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    echo '<br>';
}
?>
