<?php  
    if(!isset($active_sub_link))
    {
        $active_sub_link = '';
    } 
?>
<ul id="menu">
        <li><a class="<?php if ($active_sub_link == 'dashboard'): ?>active<?php endif; ?>" href="#" title="Dashboard" data-id="dash-sub"><i class="entypo-briefcase"></i><span> Dashboard</span></a>
          <ul id="dash-sub">
            <li><a href="index.html" title="Dashboard Variant One"><i class="fa fa-cubes"></i><span> Layout I </span></a></li>
            <li><a href="index-2.html" title="Dashboard Variant Two"><i class="fa fa-cubes"></i><span> Layout II <span class="badge">New!</span></span></a></li>
          </ul>
        </li>
          
            
            
          <li> 
        <a class="" href="#" title="Graph &amp; Charts" data-id="graph-sub"><i class="entypo-chart-area"></i><span> Graph &amp; Charts</span></a> 
            <!-- Graph and Charts Menu -->
            <ul id="graph-sub" class="accordion">
              <li><a href="admin-chart-morris.html" title="Video Gallery"><i class="entypo-chart-bar"></i><span> Morris Charts</span></a></li>
              <li><a href="admin-chart-flot.html" title="Photo Gallery"><i class="entypo-chart-line"></i><span> Flot Charts</span></a></li>
              <li><a href="admin-chart-others.html" title="Photo Gallery"><i class="entypo-chart-pie"></i><span> Others Charts</span></a></li>
            </ul>
          
          </li>
</ul>