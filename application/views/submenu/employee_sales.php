<?php  
    if(!isset($active_sub_link))
    {
        $active_sub_link = '';
    }  ?>
<ul id="menu"> 
       
        <li><a class="<?php if ($active_sub_link == 'contact'): ?>active<?php endif; ?>" href="<?php echo base_url(); ?>index.php/admin/sales/" title="Video Gallery">
        <i class="entypo-briefcase"></i><span>Contact</span>
    </a></li>
<!--          <ul id="dash-sub">
            <li><a href="index.html" title="Dashboard Variant One"><i class="fa fa-cubes"></i><span> Layout I </span></a></li>
            <li><a href="index-2.html" title="Dashboard Variant Two"><i class="fa fa-cubes"></i><span> Layout II <span class="badge">New!</span></span></a></li>
          </ul>-->
        </li>
<!--    <li><a class="submenu " href="<?php echo base_url(); ?>index.php/admin/sales/add_contact" title="Graph &amp; Charts" data-id="graph-sub">
            <i class="entypo-chart-area"></i>
            <span>Add New Contact</span></a> -->
        <li><a class="<?php if ($active_sub_link == 'add_contact'): ?>active<?php endif; ?>" href="<?php echo base_url(); ?>index.php/admin/sales/add_contact" title="Video Gallery" >
        <i class="entypo-chart-area"></i><span> Add New Contact</span>
    </a></li>
            <!-- Graph and Charts Menu -->
<!--            <ul id="graph-sub" class="accordion">
              <li><a href="admin-chart-morris.html" title="Video Gallery"><i class="entypo-chart-bar"></i><span> Morris Charts</span></a></li>
              <li><a href="admin-chart-flot.html" title="Photo Gallery"><i class="entypo-chart-line"></i><span> Flot Charts</span></a></li>
              <li><a href="admin-chart-others.html" title="Photo Gallery"><i class="entypo-chart-pie"></i><span> Others Charts</span></a></li>
            </ul>-->
          
          
          <li> 
        <a class="<?php if ($active_sub_link == 'appointment'): ?>active<?php endif; ?>" href="<?php echo base_url(); ?>index.php/admin/sales/appointment" title="Graph &amp; Charts" data-id="graph-sub"><i class="entypo-chart-area"></i><span>
         Appointments</span></a> 
          </li>
          <li> 
        <a class="<?php if ($active_sub_link == 'leads'): ?>active<?php endif; ?>" href="<?php echo base_url(); ?>index.php/admin/sales/leads" title="Graph &amp; Charts" data-id="graph-sub"><i class="entypo-chart-area"></i><span>
         Leads</span></a> 
          </li>
          
          
            <li> 
        <a class="<?php if ($active_sub_link == 'sales'): ?>active<?php endif; ?>" href="<?php echo base_url(); ?>index.php/admin/sales/cus_sales" title="Graph &amp; Charts" data-id="graph-sub"><i class="entypo-chart-area"></i><span>
         Sales</span></a> 
          </li>
          
</ul>