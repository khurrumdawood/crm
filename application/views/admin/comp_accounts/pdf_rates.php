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
$this->table->set_heading($results['headings']);
foreach($results['rows'] as $data){
    $this->table->add_row($data);
}
echo $this->table->generate(); 
echo '<br>';
echo '<br>';
}
?>
