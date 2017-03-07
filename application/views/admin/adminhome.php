
      
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
