


<script>
    function popupB($lat,$long) {
        var lat= $lat;
        var long= $long;
	   newwindow=window.open('lat_long/location/'+lat+'/'+long,'myWindow','height=400,width=500');
	   if (window.focus) {newwindow.focus()}
	   return false;
	}
</script><!--Breadcrumb-->
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
    </style>
    <h1><?php echo (isset($page_text))?$page_text:''; ?>
<?php if(isset($back_button)){ ?>
    <a style="float: right;" href="<?php echo $back_button['url'];?>" <?php echo isset($back_button['onclick'])? 'onclick="'.$back_button['onclick'].'"':'';?> style="margin-bottom: 10px;" class="btn btn-default"><?php echo $back_button['btn_title']; ?></a>
<?php } ?>
    
    </h1>
    
    
</div>
<?php if(isset($back_button)){ ?>
<!--<a href="<?php echo $back_button['url'];?>" <?php echo isset($back_button['onclick'])? 'onclick="'.$back_button['onclick'].'"':'';?> style="margin-bottom: 10px;" class="btn btn-default"><?php echo $back_button['btn_title']; ?></a>-->
<?php } ?>
<!-- Widget Row Start grid -->
<div class="row" id="powerwidgets">
    <div class="col-md-12 bootstrap-grid"> 

        <div class="powerwidget" id="datatable-filter-column" data-widget-editbutton="false">

            <header>
                <strong><h2><?php echo (isset($table_text))?$table_text:''; ?> </h2> </strong>
<!--                <h2>Datatable<small>Columns Filtering</small></h2>-->
            </header>

            <div class="inner-spacer">
                <?php if(isset($add_button)){?>
                <a href="<?php echo $add_button['url'];?>"  style="margin-bottom: 10px;" class="btn btn-success"><?php echo $add_button['btn_title']; ?></a>
                <?php } ?>
                
                <?php echo $this->table->generate(); ?>
                
            </div>
        </div> 

    </div>
    <!-- /Inner Row Col-md-12 --> 
</div>
<!-- /Widgets Row End Grid --> 
</div>
<!-- / Content Wrapper --> 
