<!--Breadcrumb-->
<!--        <div class="breadcrumb clearfix">
            <style>
    .breadcrumb li a:before {
        border-width:0px;
}
.breadcrumb li a:after {
        
        right: 0px;
}
            </style>
          <ul>
            <li><a href="index.html"><i class="fa fa-home"></i></a></li>
            <li><a href="index.html"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="index.html"><i class="fa fa-home"></i> Invoicing</a></li>
            <li><a href="index.html"><i class="fa fa-home"></i> Receivables</a></li>
            <li><a href="index.html"><i class="fa fa-home"></i> Payable</a></li>
            <li><a href="index.html"><i class="fa fa-home"></i> Reports</a></li>
            <li><a href="index.html"><i class="fa fa-home"></i> Admin</a></li>
            <li class="active">Data</li>
          </ul>
        </div>-->
<!--/Breadcrumb-->


<div class="page-header">
    <style>
        h4 :after{
            content: "|";
        }
        .no-displays {
            display: none;   
        }
        .displays {
            display: block;   
        }
    </style>
    <h1>Results<small>According to Zones</small></h1>
    <button class="btn btn-default" onclick="history.go(-1)">Back </button>
    <label class="checkbox" style="float: right;">
        <input type="checkbox" id="margin_checks" onclick="margin_check(<?php echo $comp_id; ?>,<?php echo $cat_id; ?>,<?php echo $margin_change; ?>);" />
        <i></i>
        Show Margin Analysis
    </label>
</div>

<!-- Widget Row Start grid -->
<div class="row" id="powerwidgets">
    <div class="col-md-12 bootstrap-grid"> 

        <div class="powerwidget" id="datatable-filter-column" data-widget-editbutton="false">

            <header class="purple-btn">
                <strong><h2 >Rate Sheet For <?php echo $company_category[0]->name . ' ' . $company_category[0]->category_name; ?> </h2> </strong>
            </header>
            <script>
                //    $(document).ready(function() {
                //document.getElementById("margin_analysis").className = "inner-spacer no-displays";            
                //        margin_check();
                //    });
                function margin_check($comp, $cat, $margin_ch) {

                    margin_checks = $('#margin_checks').is(":checked");
                    if (margin_checks) {
                        //                        alert('cheh');
                        //        document.getElementById("no-margin_analysis").className = "inner-spacer displays";            
                        $('#margin_analysis').show();
                        //            document.getElementById("no-margin_analysis").className = "inner-spacer displays";            
                        $('#no_margin_analysis').hide();
                    } else {
                        //            alert('vfjbsnj');
                        document.getElementById("margin_analysis").className = "inner-spacer displays";
                        $('#no_margin_analysis').show();
                        $('#margin_analysis').hide();
                    }

                }
            </script>
            
            
            <div class="inner-spacer" id="no_margin_analysis">
    <!--<input type="checkbox" name="margin_check" value="" onclick="margin_check(<?php echo $comp_id; ?>,<?php echo $cat_id; ?>,<?php echo $margin_change; ?>);" />Show Margin Analysis-->
                
<?php  
$tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="">');
$this->table->set_template($tmpl);
$this->table->set_heading($data['headings']);
foreach($data['rows'] as $d){
    $this->table->add_row($d);
}
echo $this->table->generate(); 

?>
            </div>
            
            <div class="inner-spacer no-displays" id="margin_analysis">
    <!--<input type="checkbox" name="margin_check" value="" onclick="margin_check(<?php echo $comp_id; ?>,<?php echo $cat_id; ?>,<?php echo $margin_change; ?>);" />Show Margin Analysis-->
                <?php
                $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="">');
                $this->table->set_template($tmpl);
                $this->table->set_heading($margin_data['headings']);
                foreach($margin_data['rows'] as $rows){
                    $row_pre = array();
                    foreach($rows as $d){
                        $str = '';
                        if(!is_array($d)){
                            $str .= $d;
                        }
                        if(isset($d['C'])){
                            $str .= 'C:'.$d['C'].'<br>';
                        }
                        if(isset($d['M'])){
                            $str .= 'M:'.$d['M'].'<br>';
                        }
                        if(isset($d['F'])){
                            $str .= 'F:'.$d['F'].'<br>';
                        }
                         $row_pre[] = $str;
                    }
                    $this->table->add_row($row_pre);

                }
                echo $this->table->generate(); 
?>

            </div>



<?php /*
            <div class="inner-spacer no-displays" id="margin_analysis">

                <table class="display table table-striped table-hover" id="">
                    <thead>
                        <tr>
                            <th>Weight</th>
                            <?php foreach ($rate_sheet as $rat_shet) { ?>
                                <th><?php echo $rat_shet->zone; ?></th>
<?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $price = array();
                        foreach ($zones as $zone) {
                            ?>
                            <tr>
                                <td><?php echo $zone->weight; ?> </td>
                                <?php
                                foreach ($rate_sheet as $rat_sht) {
                                    $select = array('zone_price.price', false);
                                    $where = 'zone_price.zones_id =' . $rat_sht->id . '  And zones.weight =' . $zone->weight;
                                    $joins = array();
                                    //$joins[]=array('category','category.id =zones.category_id','inner');
                                    $joins[] = array('zones', 'zones.id =zone_price.zones_id', 'inner');
//      $where='  And zones.weight ='.$zone->weight;
                                    $price = $this->web->get_data('', 'zone_price', $where, $select, '', "", "", $joins, "");
                                    ?>

                                    <td>
                                        <?php
                                        if (empty($price)) {
                                            echo '    ';
                                        } else {
                                            if ($margin_change < $employees[0]->base_rate) {
                                                $base_price = $employees[0]->base_rate;
                                            } else {
                                                $base_price = $margin_change;
                                            }
                                            //echo $employees['base_rate'];
                                            $F = $price[0]->price + ($price[0]->price * $employees[0]->base_rate / 100);
                                            $M = $price[0]->price + ($price[0]->price * $employees[0]->base_rate / 100 ) + ($price[0]->price * $base_price / 100);
                                            $C = $F + $M;
                                            echo "C:" . $C;
                                            echo "<br>";
                                            echo "F:" . $F;
                                            echo "<br>";
                                            echo "M:" . $M;
                                            echo "<br>";
//            echo $price[0]->price;
                                        }
                                        ?>
                                    </td>


                            <?php }
                            ?>
                            </tr>
<?php }
?>

                    </tbody>
                </table>

            </div>
*/ ?>















































        </div> 

    </div>
    <!-- /Inner Row Col-md-12 --> 
</div>
<!-- /Widgets Row End Grid--> 
</div>
<!-- / Content Wrapper --> 






