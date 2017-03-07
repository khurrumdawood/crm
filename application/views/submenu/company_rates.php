<?php  
    if(!isset($active_sub_link))
    {
        $active_sub_link = '';
    }  ?>
<ul id="menu"> 
       
        <li><a class="<?php if ($active_sub_link == 'base_rates'): ?>active<?php endif; ?>" href="<?php echo base_url(); ?>index.php/admin/accounts/" title="Video Gallery">
        <i class="entypo-briefcase"></i><span>Base Rates</span>
    </a></li>
<!--          <ul id="dash-sub">
            <li><a href="index.html" title="Dashboard Variant One"><i class="fa fa-cubes"></i><span> Layout I </span></a></li>
            <li><a href="index-2.html" title="Dashboard Variant Two"><i class="fa fa-cubes"></i><span> Layout II <span class="badge">New!</span></span></a></li>
          </ul>-->
        </li>
<!--    <li><a class="submenu " href="<?php echo base_url(); ?>index.php/admin/sales/add_contact" title="Graph &amp; Charts" data-id="graph-sub">
            <i class="entypo-chart-area"></i>
            <span>Add New Contact</span></a> -->
        
          
          
          
</ul>