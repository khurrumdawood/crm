<ul class="sf-menu">
    <li class="<?php if ($active_link == 'dashboard'): ?>active<?php endif; ?>">
        <a href="<?php echo base_url(); ?>index.php/admin/dashboard">Home</a>
    </li>
    <li class="<?php if ($active_link == 'contacts'): ?>active<?php endif; ?>">
        <a href="<?php echo base_url(); ?>index.php/admin/sales">CRM</a>
    </li>
    <li class="<?php if ($active_link == 'comp_accounts'): ?>active<?php endif; ?>">
        <a href="<?php echo base_url(); ?>index.php/admin/comp_accounts/customer">Accounts</a>
    </li>
    <li class="<?php if ($active_link == 'employees'): ?>active<?php endif; ?>">
        <a href="<?php echo base_url(); ?>index.php/admin/comp_accounts/employees">Employees</a>
    </li>
<!--    <li class="<?php if ($active_link == 'rates'): ?>active<?php endif; ?>">
        <a href="<?php echo base_url(); ?>index.php/admin/comp_accounts">Rates</a>
    </li>-->
    <li class="<?php if ($active_link == 'companies'): ?>active<?php endif; ?>">
        <a href="javascript:void(0)">Invoicing</a>
    </li>
    <li class="<?php if ($active_link == 'companies'): ?>active<?php endif; ?>">
        <a href="javascript:void(0)">Receivables</a>
    </li>
    <li  class="<?php if ($active_link == 'c'): ?>active<?php endif; ?>">
        <a  href="javascript:void(0)">Payables
<!--                                                    <span class="sf-sub-indicator"> »</span>-->
        </a>
    </li>
    <li  class="<?php if ($active_link == 'note'): ?>active<?php endif; ?>">
        <a  href="<?php echo base_url(); ?>index.php/admin/note">Note
        </a>
    </li>
    <li  class="<?php if ($active_link == 'c'): ?>active<?php endif; ?>">
        <a  href="javascript:void(0)">Reports
<!--                                                    <span class="sf-sub-indicator"> »</span>-->
        </a>
    </li>
<!--    <li  class="<?php if ($active_link == 'share_location'): ?>active<?php endif; ?>">
        <a  href="javascript:void(0)" onclick="geoFindMe()" >Share Location
        </a>
    </li>-->
    <li  class="<?php if ($active_link == 'c'): ?>active<?php endif; ?>">
        <a  href="javascript:void(0)">Logout
<!--                                                    <span class="sf-sub-indicator"> »</span>-->
        </a>
    </li>
    <div class="clear"></div>
</ul>
<div id="out" class=""></div>


<script>
    base_url='<?php echo base_url(); ?>'
    function geoFindMe() {
  var output = document.getElementById("out");

  if (!navigator.geolocation){
    output.innerHTML = "<p>Geolocation is not supported by your browser</p>";
    return;
  }

  function success(position) {
    var latitude  = position.coords.latitude;
    var longitude = position.coords.longitude;

    //output.innerHTML = '<p>Latitude is ' + latitude + '° <br>Longitude is ' + longitude + '°</p>';
    
    
    $.ajax({
            type: 'POST',
            data: {'latitude':latitude,'longitude':longitude},
//            url: "http://localhost/orb/index.php/admin/lat_long/index/"+latitude+"/"+longitude,
            url: base_url+"admin/lat_long/index/"+latitude+"/"+longitude,
            dataType: 'text',
            success: function(data)
            {
//                $('#div_states_s').html(data);
//                loader_close();
            },
            error: function(xhr, textStatus, errorThrown){
                loader_close();
            }
        });

//    var img = new Image();
//    img.src = "https://maps.googleapis.com/maps/api/staticmap?center=" + latitude + "," + longitude + "&zoom=13&size=300x300&sensor=false";
//
//    output.appendChild(img);
  };

  function error() {
    output.innerHTML = "Unable to retrieve your location";
  };

//  output.innerHTML = "<p>Locating…</p>";

  navigator.geolocation.getCurrentPosition(success, error);
}

    </script>

