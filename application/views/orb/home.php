﻿<html>

<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="keywords" content="admin template, admin dashboard, inbox templte, calendar template, form validation">
<meta name="author" content="DazeinCreative">
<meta name="description" content="ORB - Powerfull and Massive Admin Dashboard Template with tonns of useful features">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ORB | Other Chart</title>
<link href="<?php echo base_url(); ?>orb-plugins/css/styles.css" rel="stylesheet" type="text/css">

<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/modernizr/modernizr.custom.js"></script>
</head>

<body>

<!--Smooth Scroll-->
<div class="smooth-overflow">
<!--Navigation-->
    <nav class="main-header clearfix" role="navigation"> <a class="navbar-brand" href="index.html"><span class="text-blue">ORB</span></a> 
      
      <!--Search-->
      <div class="site-search">
        <form action="#" id="inline-search">
          <i class="fa fa-search"></i>
          <input type="search" placeholder="Search">
        </form>
      </div>
      
      <!--Navigation Itself-->
      
      <div class="navbar-content"> 
        
        <!--Sidebar Toggler--> 
        <a href="#" class="btn btn-default left-toggler"><i class="fa fa-bars"></i></a> 
        <!--Right Userbar Toggler--> 
        <a href="#" class="btn btn-user right-toggler pull-right"><i class="entypo-vcard"></i> <span class="logged-as hidden-xs">Logged as</span><span class="logged-as-name hidden-xs">Anton Durant</span></a> 
        <!--Fullscreen Trigger-->
        <button type="button" class="btn btn-default hidden-xs pull-right" id="toggle-fullscreen"> <i class=" entypo-popup"></i> </button>
        
        <!--Settings Dropdown-->
        <div class="btn-group pull-right">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <i class="entypo-cog"></i></button>
          <div id="settings-dropdown" class="dropdown-menu keep_open orb-form">
            <div class="dropdown-header">Settings <span class="badge pull-right">6</span></div>
            <div class="dropdown-container">
              <div class="nano">
                <div class="nano-content">
                  <ul class="settings-dropdown">
                    <li>
                      <label class="toggle">
                        <input type="checkbox" name="checkbox-toggle" checked>
                        <i></i>Prevent Midnblow</label>
                    </li>
                    <li>
                      <label class="toggle">
                        <input type="checkbox" name="checkbox-toggle" checked>
                        <i></i>Sleep All nights</label>
                    </li>
                    <li>
                      <label class="toggle">
                        <input type="checkbox" name="checkbox-toggle" checked>
                        <i></i>Drink more Coffee</label>
                    </li>
                    <li>
                      <label class="toggle">
                        <input type="checkbox" name="checkbox-toggle" checked>
                        <i></i>Auto feed cat</label>
                    </li>
                    <li>
                      <label class="toggle">
                        <input type="checkbox" name="checkbox-toggle" checked>
                        <i></i>Dummy Checkbox</label>
                    </li>
                    <li>
                      <label class="toggle">
                        <input type="checkbox" name="checkbox-toggle" checked>
                        <i></i>Read More Books</label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="dropdown-footer"> <a class="btn btn-dark" href="#">Save</a> </div>
          </div>
        </div>
        
        <!--Lock Screen--> 
        <a href="#" data-toggle="modal" class="btn btn-default hidden-xs pull-right lockme"> <i class="entypo-lock"></i> </a> 
        
        <!--Notifications Dropdown-->
        
        <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <i class="entypo-megaphone"></i><span class="new"></span></button>
          <div id="notification-dropdown" class="dropdown-menu">
            <div class="dropdown-header">Notifications <span class="badge pull-right">8</span></div>
            <div class="dropdown-container">
              <div class="nano">
                <div class="nano-content">
                  <ul class="notification-dropdown">
                    <li class="bg-warning"><a href="#"> <span class="notification-icon"><i class="fa fa-bolt"></i></span>
                      <h4>Server Down</h4>
                      <p>Server #435 was shut down (Power loss)</p>
                      <span class="label label-default"><i class="entypo-clock"></i> 59 mins ago</span> </a> </li>
                    <li class="bg-info"><a href="#"> <span class="notification-icon"><i class="fa fa-bolt"></i></span>
                      <h4>Too Many Connections</h4>
                      <p>Too many connections to Database Server</p>
                      <span class="label label-default"><i class="entypo-clock"></i> 2 hours ago</span> </a> </li>
                    <li class="bg-danger"><a href="#"> <span class="notification-icon"><i class="fa fa-android"></i></span>
                      <h4>Sausage Stolen</h4>
                      <p>Someone stole your hot sausage</p>
                      <span class="label label-default"><i class="entypo-clock"></i> 3 hours ago</span> </a> </li>
                    <li class="bg-success"><a href="#"> <span class="notification-icon"><i class="fa fa-bolt"></i></span>
                      <h4>Defragmentation Completed</h4>
                      <p>Disc Defragmentation Completed on Server</p>
                      <span class="label label-default"><i class="entypo-clock"></i> 3 hours ago</span> </a> </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="dropdown-footer"><a class="btn btn-dark" href="#">See All</a></div>
          </div>
        </div>
        
        <!--Inbox Dropdown-->
        <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="entypo-mail"></i><span class="new"></span></button>
          <div id="inbox-dropdown" class="dropdown-menu inbox">
            <div class="dropdown-header">Inbox <span class="badge pull-right">32</span></div>
            <div class="dropdown-container">
              <div class="nano">
                <div class="nano-content">
                  <ul class="inbox-dropdown">
                    <li><a href="#"> <span class="user-image"><img src="http://placehold.it/150x150" alt="Gluck Dorris" /></span>
                      <h4>Why don't u answer calls?</h4>
                      <p>Listen, dude, time is off. I'll find you soon! Sounds good?...</p>
                      <span class="label label-default"><i class="entypo-clock"></i> 59 mins ago</span> <span class="delete"><i class="entypo-back"></i></span> </a> </li>
                    <li><a href="#"> <span class="user-image"><img src="http://placehold.it/150x150" alt="Gluck Dorris" /></span>
                      <h4>Rawrr, rawrrr...</h4>
                      <p>Listen, dude, time is off. I'll find you soon! Sounds good?...</p>
                      <span class="label label-default"><i class="entypo-clock"></i> 2 hours ago</span> <span class="delete"><i class="entypo-back"></i></span> </a> </li>
                    <li><a href="#"> <span class="user-image"><img src="http://placehold.it/150x150" alt="Gluck Dorris" /></span>
                      <h4>Why so serious?</h4>
                      <p>Listen, dude, time is off. I'll find you soon! Sounds good?...</p>
                      <span class="label label-default"><i class="entypo-clock"></i> 3 hours ago</span> <span class="delete"><i class="entypo-back"></i></span> </a> </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="dropdown-footer"><a class="btn btn-dark" href="admin-inbox.html">Save All</a></div>
          </div>
        </div>
      </div>
    </nav>
    
    <!--/Navigation--> 
    
    <!--MainWrapper-->
    <div class="main-wrap"> 
      
      <!--OffCanvas Menu -->
      <aside class="user-menu"> 
        
        <!-- Tabs -->
        <div class="tabs-offcanvas">
          <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#userbar-one" data-toggle="tab">Main</a></li>
            <li><a href="#userbar-two" data-toggle="tab">Users</a></li>
            <li><a href="#userbar-three" data-toggle="tab">ToDo</a></li>
          </ul>
          <div class="tab-content"> 
            
            <!--User Primary Panel-->
            <div class="tab-pane active" id="userbar-one">
              <div class="main-info">
                <div class="user-img"><img src="http://placehold.it/150x150" alt="User Picture" /></div>
                <h1>Anton Durant <small>Administrator</small></h1>
              </div>
              <div class="list-group"> <a href="#" class="list-group-item"><i class="fa fa-user"></i>Profile</a> <a href="#" class="list-group-item"><i class="fa fa-cog"></i>Settings</a> <a href="#" class="list-group-item"><i class="fa fa-flask"></i>Projects<span class="badge">2</span></a>
                <div class="empthy"></div>
                <a href="#" class="list-group-item"><i class="fa fa-refresh"></i>Updates<span class="badge">5</span></a> <a href="#" class="list-group-item"><i class="fa fa-comment"></i>Messages<span class="badge">12</span></a> <a href="#" class="list-group-item"><i class="fa fa-comments"></i> Comments<span class="badge">45</span></a>
                <div class="empthy"></div>
                <a href="#" data-toggle="modal" class="list-group-item lockme"><i class="fa fa-lock"></i> Lock</a> <a data-toggle="modal" href="#" class="list-group-item goaway"><i class="fa fa-power-off"></i> Sign Out</a> </div>
            </div>
            
            <!--User Chat Panel-->
            <div class="tab-pane" id="userbar-two">
              <div class="chat-users-menu"> 
                <!--Adding Some Scroll-->
                <div class="nano">
                  <div class="nano-content">
                    <div class="buttons">
                      <div class="btn-group btn-group-xs">
                        <button type="button" class="btn btn-default">Friends</button>
                        <button type="button" class="btn btn-default">Work</button>
                        <button type="button" class="btn btn-default">Girls</button>
                      </div>
                    </div>
                    <ul>
                      <li><a href="#"><span class="chat-name">Gluck Dorris</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span><span class="badge">5</span></a></li>
                      <li><a href="#"><span class="chat-name">Anton Durant</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                      <li><a href="#"><span class="chat-name">Spiderman</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                      <li><a href="#"><span class="chat-name">Muchu</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-default">Offline</span></a></li>
                      <li><a href="#"><span class="chat-name">Mr. Joker</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                      <li><a href="#"><span class="chat-name">Chewbacca</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                      <li><a href="#"><span class="chat-name">The Piggy</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                      <li><a href="#"><span class="chat-name">Anton Durant</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                      <li><a href="#"><span class="chat-name">Spiderman</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                      <li><a href="#"><span class="chat-name">Muchu</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                      <li><a href="#"><span class="chat-name">Anton Durant</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                      <li><a href="#"><span class="chat-name">Spiderman</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                      <li><a href="#"><span class="chat-name">Muchu</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                      <li><a href="#"><span class="chat-name">Anton Durant</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                      <li><a href="#"><span class="chat-name">Spiderman</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                      <li><a href="#"><span class="chat-name">Muchu</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                      <li><a href="#"><span class="chat-name">Anton Durant</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-default">Offline</span></a></li>
                      <li><a href="#"><span class="chat-name">Spiderman</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                      <li><a href="#"><span class="chat-name">Muchu</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            
            <!--User Tasks Panel-->
            <div class="tab-pane" id="userbar-three">
              <div class="nano"> 
                <!--Adding Some Scroll-->
                <div class="nano-content">
                  <div class="small-todos">
                    <div class="input-group input-group-sm">
                      <input id="new-todo" placeholder="Add ToDo" type="text" class="form-control">
                      <span class="input-group-btn">
                      <button id="add-todo" class="btn btn-default" type="button"><i class="fa fa-plus-circle"></i></button>
                      </span> </div>
                    <section id="task-list">
                      <ul id="todo-list">
                      </ul>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- /tabs --> 
        
      </aside>
      <!-- /Offcanvas user menu--> 
      
      <!--Main Menu-->
      <div class="responsive-admin-menu">
        <div class="responsive-menu">ORB
          <div class="menuicon"><i class="fa fa-angle-down"></i></div>
        </div>
<!--      <ul id="menu">
        <li><a class="submenu" href="#" title="Dashboard" data-id="dash-sub"><i class="entypo-briefcase"></i><span> Dashboard</span></a>
          <ul id="dash-sub">
            <li><a href="index.html" title="Dashboard Variant One"><i class="fa fa-cubes"></i><span> Layout I </span></a></li>
            <li><a href="index-2.html" title="Dashboard Variant Two"><i class="fa fa-cubes"></i><span> Layout II <span class="badge">New!</span></span></a></li>
          </ul>
        </li>
          <li><a href="admin-inbox.html" title="Inbox"><i class="entypo-inbox"></i><span> Inbox <span class="badge">32</span></span></a></li>
          <li><a class="submenu" href="#" title="Widgets" data-id="widgets-sub"><i class="entypo-rocket"></i><span> Widgets</span></a>
            <ul id="widgets-sub">
              <li><a href="admin-widgets.html" title="Power Widgets"><i class="entypo-rocket"></i><span> Power Widgets</span></a></li>
              <li><a href="admin-portlets.html" title="Portlets"><i class="fa fa-square"></i><span> Portlets</span></a></li>
            </ul>
          </li>
          <li><a href="#" class="submenu" data-id="tables-sub" title="Tables"><i class="fa fa-table"></i><span> Tables</span></a> 
             Tables Sub-Menu 
            <ul id="tables-sub" class="accordion">
              <li><a href="admin-tables.html" title="Timeline"><i class="fa fa-table"></i><span> Tables</span></a></li>
              <li><a href="admin-datatables.html" title="Profile"><i class="entypo-database"></i><span> Datatables</span></a></li>
            </ul>
          </li>
          <li><a class="submenu" href="#" data-id="other-sub" title="Other Contents"><i class="fa fa-th"></i><span> Forms</span></a> 
             Forms Sub-Menu 
            <ul id="other-sub" class="accordion">
              <li><a href="admin-forms.html" title="Forms"><i class="fa fa-th"></i><span> Forms</span></a></li>
              <li><a href="admin-forms-bootstrap.html" title="Bootstrap Forms"><i class="fa fa-table"></i><span> Bootstrap Forms</span></a></li>
              <li><a href="admin-forms-plugins.html" title="Forms Plugins"><i class="fa fa-puzzle-piece"></i><span> Form Plugins</span></a></li>
              <li><a href="admin-forms-validation.html" title="Forms Validation"><i class="fa fa-check-circle"></i><span> Form Validation</span></a></li>
              <li><a href="admin-forms-wizard.html" title="Forms Wizard"><i class="fa fa-magic"></i><span> Form Wizard</span></a></li>
            </ul>
          <li> <a class="submenu active" href="#" title="Graph &amp; Charts" data-id="graph-sub"><i class="entypo-chart-area"></i><span> Graph &amp; Charts</span></a> 
             Graph and Charts Menu 
            <ul id="graph-sub" class="accordion">
              <li><a href="admin-chart-morris.html" title="Video Gallery"><i class="entypo-chart-bar"></i><span> Morris Charts</span></a></li>
              <li><a href="admin-chart-flot.html" title="Photo Gallery"><i class="entypo-chart-line"></i><span> Flot Charts</span></a></li>
              <li><a href="admin-chart-others.html" title="Photo Gallery"><i class="entypo-chart-pie"></i><span> Others Charts</span></a></li>
            </ul>
          <li> <a class="submenu" href="#" data-id="interface-sub" title="Interface"><i class="entypo-palette"></i><span> Interface</span></a> 
             Interface Sub-Menu 
            <ul id="interface-sub" class="accordion">
              <li><a href="admin-typography.html" title="Typography"><i class="entypo-language"></i><span> Typography</span></a></li>
              <li><a href="admin-nestable.html" title="Nestable"><i class="entypo-list-add"></i><span> Nestable</span></a></li>
              <li><a href="admin-tree-view.html" title="Tree View"><i class="entypo-flow-tree"></i><span> Tree View</span></a></li>
              <li><a href="admin-animation.html" title="Animation"><i class="entypo-cd"></i><span> Animation</span></a></li>
              <li><a href="admin-components.html" title="Components"><i class="entypo-traffic-cone"></i><span> Components</span></a></li>
              <li><a href="admin-elements.html" title="Elements"><i class="entypo-archive"></i><span> Elements</span></a></li>
              <li><a href="admin-buttons.html" title="Items List"><i class="entypo-list"></i><span> Buttons</span></a></li>
              <li><a href="#" data-id="fonts-sub" title="Icon Fonts" class="submenu"><i class="fa fa-heart"></i><span> Icons</span></a>
                <ul id="fonts-sub">
                  <li><a href="admin-font-awesome.html" title="Awesome Font"><i class="fa fa-flag"></i><span> Awesome</span></a></li>
                  <li><a href="admin-font-glyphicons.html" title="Glyphicons"><i class="entypo-cancel-circled"></i><span> Glyphicons</span></a></li>
                  <li><a href="admin-font-entypo.html" title="Entypo"><i class="entypo-flag"></i><span> Entypo</span></a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li> <a class="submenu" href="#" data-id="pages-sub" title="Pages"><i class="entypo-book"></i><span> Pages</span></a> 
             Pages Sub-Menu 
            <ul id="pages-sub">
              <li><a href="admin-megamenu.html" title="MegaMenu"><i class="entypo-menu"></i><span> MegaMenu <span class="badge">New!</span></span></a></li>
          <li><a href="admin-timeline.html" title="Timeline"><i class="entypo-chart-bar"></i><span> Timeline</span></a></li>
              <li><a href="admin-profile.html" title="Profile"><i class="entypo-user"></i><span> Profile</span></a></li>
              <li><a href="admin-gallery.html" title="Gallery"><i class="entypo-picture"></i><span> Gallery</span></a></li>
              <li><a href="admin-user-list.html" title="Items List"><i class="entypo-list"></i><span> Items List</span></a></li>
              <li><a href="admin-pricelists.html" title="Pricelists"><i class="entypo-tag"></i><span> Pricelists</span></a></li>
              <li><a href="admin-forum.html" title="Forum"><i class="entypo-comment"></i><span> Forum</span></a></li>
              <li><a href="admin-chat.html" title="Chat"><i class="entypo-chat"></i><span> Chat</span></a></li>
              <li><a href="admin-404.html" title="404"><i class="entypo-window"></i><span> 404 Error</span></a></li>
              <li><a href="admin-404.html" title="500"><i class="entypo-window"></i><span> 500 Error</span></a></li>
              <li><a href="admin-login.html" title="Login"><i class="entypo-vcard"></i><span> Login Page</span></a></li>
              <li><a href="admin-clear.html" title="Clear Page"><i class="entypo-monitor"></i><span> Carte blanche</span></a></li>
              <li><a href="admin-events.html" title="Events Calendar"><i class="entypo-calendar"></i><span> Calendar</span></a></li>
              <li><a href="admin-search.html" title="Search Results"><i class="entypo-search"></i><span> Search Results</span></a></li>
              <li><a href="admin-invoice.html" title="Invoice"><i class="entypo-box"></i><span> Invoice</span></a></li>
            </ul>
          </li>
          <li> <a class="submenu" href="#" data-id="maps-sub" title="Maps"><i class="entypo-map"></i><span> Maps</span></a> 
             Maps Sub-Menu 
            <ul id="maps-sub">
              <li><a href="admin-maps-google.html" title="Google Maps"><i class="entypo-location"></i><span> Google Maps</span></a></li>
              <li><a href="admin-maps-vector.html" title="Vector Maps"><i class="entypo-compass"></i><span> Vector Maps</span></a></li>
            </ul>
          </li>
          
           Other Contents Menu 
          <li><a href="#" title="Front End"><i class="entypo-cog"></i><span> Front End <span class="badge">Soon</span></span></a></li>
        </ul>-->
<ul id="menu">
        <li><a class="submenu" href="#" title="Dashboard" data-id="dash-sub"><i class="entypo-briefcase"></i><span> Dashboard</span></a>
          <ul id="dash-sub">
            <li><a href="index.html" title="Dashboard Variant One"><i class="fa fa-cubes"></i><span> Layout I </span></a></li>
            <li><a href="index-2.html" title="Dashboard Variant Two"><i class="fa fa-cubes"></i><span> Layout II <span class="badge">New!</span></span></a></li>
          </ul>
        </li>
          
            
            
          <li> 
        <a class="submenu active" href="#" title="Graph &amp; Charts" data-id="graph-sub"><i class="entypo-chart-area"></i><span> Graph &amp; Charts</span></a> 
            <!-- Graph and Charts Menu -->
            <ul id="graph-sub" class="accordion">
              <li><a href="admin-chart-morris.html" title="Video Gallery"><i class="entypo-chart-bar"></i><span> Morris Charts</span></a></li>
              <li><a href="admin-chart-flot.html" title="Photo Gallery"><i class="entypo-chart-line"></i><span> Flot Charts</span></a></li>
              <li><a href="admin-chart-others.html" title="Photo Gallery"><i class="entypo-chart-pie"></i><span> Others Charts</span></a></li>
            </ul>
          
          </li>
</ul>
      </div>
      <!--/MainMenu-->
      
      <div class="content-wrapper"> 
        <!--Content Wrapper--><!--Horisontal Dropdown-->
        <nav class="cbp-hsmenu-wrapper" id="cbp-hsmenu-wrapper">
          <div class="cbp-hsinner">
            <ul class="cbp-hsmenu">
              <li> <a href="#"><span class="icon-bar"></span></a>
                <ul class="cbp-hssubmenu">
                  <li><a href="#">
                    <div class="sparkle-dropdown"><span class="inlinebar">10,8,8,7,8,9,7,8,10,9,7,5</span>
                      <p class="sparkle-name">project income</p>
                      <p class="sparkle-amount">$23989 <i class="fa fa-chevron-circle-up"></i></p>
                    </div>
                    </a></li>
                  <li><a href="#">
                    <div class="sparkle-dropdown"><span class="linechart">5,6,7,9,9,5,3,2,9,4,6,7</span>
                      <p class="sparkle-name">site traffic</p>
                      <p class="sparkle-amount">122541 <i class="fa fa-chevron-circle-down"></i></p>
                    </div>
                    </a></li>
                  <li><a href="#">
                    <div class="sparkle-dropdown"><span class="simpleline">9,6,7,9,3,5,7,2,1,8,6,7</span>
                      <p class="sparkle-name">Processes</p>
                      <p class="sparkle-amount">890 <i class="fa fa-plus-circle"></i></p>
                    </div>
                    </a></li>
                  <li><a href="#">
                    <div class="sparkle-dropdown"><span class="inlinebar">10,8,8,7,8,9,7,8,10,9,7,5</span>
                      <p class="sparkle-name">orders</p>
                      <p class="sparkle-amount">$23989 <i class="fa fa-chevron-circle-up"></i></p>
                    </div>
                    </a></li>
                  <li><a href="#">
                    <div class="sparkle-dropdown"><span class="piechart">1,2,3</span>
                      <p class="sparkle-name">active/new</p>
                      <p class="sparkle-amount">500/200 <i class="fa fa-chevron-circle-up"></i></p>
                    </div>
                    </a></li>
                  <li><a href="#">
                    <div class="sparkle-dropdown"><span class="stackedbar">3:6,2:8,8:4,5:8,3:6,9:4,8:1,5:7,4:8,9:5,3:5</span>
                      <p class="sparkle-name">fault/success</p>
                      <p class="sparkle-amount">$23989 <i class="fa fa-chevron-circle-up"></i></p>
                    </div>
                    </a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
        
        <!--Breadcrumb-->
        <div class="breadcrumb clearfix">
            <style>
    .breadcrumb li a:before {
	border-width:0px;
}
.breadcrumb li a:after {
	
	right: 0px;
}
            </style>
          <ul>
            <!--<li><a href="index.html"><i class="fa fa-home"></i></a></li>-->
            <li><a href="index.html"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="index.html"><i class="fa fa-home"></i> Invoicing</a></li>
            <li><a href="index.html"><i class="fa fa-home"></i> Receivables</a></li>
            <li><a href="index.html"><i class="fa fa-home"></i> Payable</a></li>
            <li><a href="index.html"><i class="fa fa-home"></i> Reports</a></li>
            <li><a href="index.html"><i class="fa fa-home"></i> Admin</a></li>
<!--            <li class="active">Data</li>-->
          </ul>
        </div>
        <!--/Breadcrumb-->
        
        <div class="page-header">
            <style>
                h4 :after{
                    content: "|";
                       
                }
            </style>
          <h1>Home<small>Home beta</small></h1>
          
        </div>
        
        <!-- Widget Row Start grid -->
        <div class="row" id="powerwidgets">
          <div class="col-md-12 bootstrap-grid"> 
            
            <!-- New widget -->
<!--            <div class="powerwidget" id="sparkline-chart-expo" data-widget-editbutton="false">
              <header>
                <h2>Sparkline Charts<small>Demo</small></h2>
              </header>
              <div class="inner-spacer">
                <div class="clearfix">
                  <div class="dropcap">S</div>
                  Sparklines is a JQuery plugin that generates so called sparklines (small inline charts) directly in the browser using data supplied either inline in the HTML, or via javascript.
                  We love Sparklines and use this plugin in different ways in our theme. Working example of sparklines chart in ORB is horisontal menu at the top of the content container. The plugin is compatible with most modern browsers. 
                  Each example displayed you can meet at ORB Theme takes just only one line of HTML or javascript to generate. Wonderfull! </div>
                <div class="row">Row
                  <div class="col-md-6">
                    <div class="well margin-top">
                      <p> Inline <span class="demo-sparkline">10,8,9,3,5,8,5</span> line graphs <span class="demo-sparkline">8,4,0,0,0,0,1,4,4,10,10,10,10,0,0,0,4,6,5,9,10</span> </p>
                      <p> Bar charts <span class="demo-sparkbar">10,8,9,3,5,8,5</span> negative values: <span class="demo-sparkbar">-3,1,2,0,3,-1</span> stacked: <span class="demo-sparkbar">0:2,2:4,4:2,4:1</span> </p>
                      <p> Composite inline <span id="demo-compositeline">8,4,0,0,0,0,1,4,4,10,10,10,10,0,0,0,4,6,5,9,10</span> </p>
                      <p> Inline with normal range <span id="demo-normalline">8,4,0,0,0,0,1,4,4,10,10,10,10,0,0,0,4,6,5,9,10</span> </p>
                      <p> Composite bar <span id="demo-compositebar">4,6,7,7,4,3,2,1,4</span> </p>
                      <p> Pie charts <span class="demo-sparkpie">1,1,2</span> <span class="demo-sparkpie">1,5</span> <span class="demo-sparkpie">20,50,80</span> </p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="well margin-top">
                      <p> Discrete <span class="demo-discrete1">4,6,7,7,4,3,2,1,4,4,5,6,7,6,6,2,4,5</span><br />
                        Discrete with threshold <span id="demo-discrete2">4,6,7,7,4,3,2,1,4</span> </p>
                      <p> Tristate chart using a colour map: <span class="demo-sparktristatecols">1,2,0,2,-1,-2,1,-2,0,0,1,1</span> </p>
                      <p> Box Plot: <span class="demo-sparkboxplot">4,27,34,52,54,59,61,68,78,82,85,87,91,93,100</span><br />
                      <p> Bullet charts<br />
                        <span class="demo-sparkbullet">10,12,12,9,7</span>, <span class="demo-sparkbullet">14,12,12,9,7</span>, <span class="demo-sparkbullet">10,12,14,9,7</span> </p>
                    </div>
                  </div>
                </div>
                Row 
              </div>
            </div>-->
            <!-- /End Widget --> 
            
            <!-- New widget -->
            <div class="powerwidget" id="chartjscharts" data-widget-editbutton="false">
                
<!--              <header>
                <h2>Chart.js<small>Cool charts</small></h2>
              </header>-->
              <div class="inner-spacer">
<!--                <div class="clearfix">
                  <div class="dropcap">C</div>
                  hart.js is easy, object oriented client side graphs for designers and developers. We can
                  visualise data in different ways. Each of them animated, fully customisable and look great, even on retina displays. 
                  Chart.js uses the HTML5 canvas element. It supports all modern browsers. 
                  The main advantage of Chart.js is dependency free, lightweight (4.5k when minified and gzipped) and loads of customisation options.
                  The problem with Chart.js that is not fully responsible within a box, so use it carefully. We are fully stylise these charts to make em compartible with ORB Theme.</div>-->
                <div class="row">
<!--                  <div class="col-md-6">
                    <div class="chartjs-container well">
                      <canvas id="chartjs-doughnut" height="300" width="300"></canvas>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="chartjs-container well">
                      <canvas id="chartjs-pie" height="300" width="300"></canvas>
                    </div>
                  </div>-->
<!--                  <div class="col-md-6">
                    <div class="chartjs-container">
                      <canvas id="chartjs-line" height="170" width="300"></canvas>
                    </div>
                  </div>-->
                  <div class="col-md-6">
                    <div class="chartjs-container">
                        <select style="float: right">
                            <option>All carriers</option>
                        </select>
                        <p style="width: 100%; text-align: center;font-size:30px; color:#cccccc; margin-left: 64px;">
                                         WebShip 
                </p>
                        <p style="width: 100%; text-align: center;font-size:30px; color:#cccccc;">
                            Log 
                </p>
                        <p style="width: 100%; text-align: center;font-size:30px; color:#cccccc;">
                            Today
                </p>
<!--                      <canvas id="chartjs-bar" height="170" width="300"></canvas>-->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="chartjs-container">
                      <canvas id="chartjs-bar" height="170" width="300"></canvas>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="chartjs-container">
                      <canvas id="chartjs-bar1" height="170" width="300"></canvas>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="chartjs-container">
                      <canvas id="chartjs-bar2" height="170" width="300"></canvas>
                    </div>
                  </div>
<!--                  <div class="col-md-6">
                    <div class="chartjs-container well">
                      <canvas id="chartjs-radar" height="300" width="300"></canvas>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="chartjs-container well">
                      <canvas id="chartjs-polarArea" height="300" width="300"></canvas>
                    </div>
                  </div>-->
                </div>
              </div>
            </div>
            <!-- /New widget --> 
            
          </div>
          <!-- /Inner Row Col-md-12 --> 
        </div>
        <!-- /Widgets Row End Grid--> 
      </div>
      <!-- / Content Wrapper --> 
    </div>
    <!--/MainWrapper--> 
  </div>
<!--/Smooth Scroll--> 


<!-- scroll top -->
<div class="scroll-top-wrapper hidden-xs">
    <i class="fa fa-angle-up"></i>
</div>
<!-- /scroll top -->



<!--Modals-->

<!--Power Widgets Modal-->
<div class="modal" id="delete-widget">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <i class="fa fa-lock"></i> </div>
      <div class="modal-body text-center">
        <p>Are you sure to delete this widget?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="trigger-deletewidget-reset">Cancel</button>
        <button type="button" class="btn btn-primary" id="trigger-deletewidget">Delete</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- /.modal --> 

<!--Sign Out Dialog Modal-->
<div class="modal" id="signout">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <i class="fa fa-lock"></i> </div>
      <div class="modal-body text-center">Are You Sure Want To Sign Out?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="yesigo">Ok</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- /.modal --> 

<!--Lock Screen Dialog Modal-->
<div class="modal" id="lockscreen">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <i class="fa fa-lock"></i> </div>
      <div class="modal-body text-center">Are You Sure Want To Lock Screen?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="yesilock">Ok</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- /.modal --> 

<!--Scripts--> 
<!--JQuery--> 
<script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/jquery/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/jquery/jquery-ui.min.js"></script> 

<!--EasyPieChart--> 
<script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/easing/jquery.easing.1.3.min.js">
</script><script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/easypie/jquery.easypiechart.min.js"></script> 

<!--Fullscreen--> 
<script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/fullscreen/screenfull.min.js"></script> 

<!--NanoScroller--> 
<script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/nanoscroller/jquery.nanoscroller.min.js"></script> 

<!--Sparkline--> 
<script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/sparkline/jquery.sparkline.min.js"></script> 

<!--Horizontal Dropdown--> 
<script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/horisontal/cbpHorizontalSlideOutMenu.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/classie/classie.js"></script> 

<!--PowerWidgets--> 
<script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/powerwidgets/powerwidgets.min.js"></script> 

<!--Chart.js--> 
<script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/chartjs/chart.min.js"></script> 

<!--Bootstrap--> 
<script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/bootstrap/bootstrap.min.js"></script> 

<!--Chat--> 
<script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/todos/todos.js"></script> 

<!--Main App--> 
<script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/scripts.js"></script>



<!--/Scripts-->

</body>
</html>