<!DOCTYPE html>
<html lang="en"><head>
        <title>Google Maps lat/long finder</title>

        <!--important-->
        <link rel="stylesheet" type="text/css" href="Google%20Maps%20lat_long%20finder_files/site.css">
        <script src="Google%20Maps%20lat_long%20finder_files/siteBundle.js" type="text/javascript"></script>
        <!--ENDimportant-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        


    <body>
        <?php 
        if(isset($_GET['url']))
            $url = $_GET['url'];
        else
            $url = '';
        
        if(isset($_GET['latitude']))
            $latitude = $_GET['latitude'];
        else
            $latitude =  'NAN';
        
        if(isset($_GET['longitude']))
            $longitude = $_GET['longitude'];
        else
            $longitude =    'NAN';
        
        if(isset($_GET['value']))
            $value = $_GET['value'];
        else
            $value = '';
        
        if(isset($_GET['company_id']))
            $company_id = $_GET['company_id'];
        else
            $company_id = '';
        ?>
        
        <script>
            function save()
            {
                lat = $('#lat').val();
                long = $('#long').val();
                value = $('#postcode').val();
                id = '<?php echo $company_id; ?>';
//                alert(lat);
//alert("<?php echo $url; ?>");
                $.ajax({
                    type: 'GET',
                    data: {'lat':lat,'long':long,'value':value,'id':id},
                    url: "<?php echo $url; ?>",
                    dataType: 'text',
                    success: function(data)
                    {
//                        $('body').html('<h1>saved</h1>');
//                        $('body').css('height','100px');
//                        $('#div_states_s').html(data);
//                        loader_close();
                        parent.close_frame();
                    },
                    error: function(xhr, textStatus, errorThrown){
//                        loader_close();
                    }
                });
            }
        </script>
        <div class="container">

            <div class="Content">
                <!--<div class="left-ads">-->
                <div class="realContent" style="margin-left: 0px;">

                    <div style="position: relative; background-color: rgb(229, 227, 223); overflow: hidden;" id="map" class="latLongMap">
                        <div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;">
                            <div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0; cursor: crosshair;">
                                <div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; transform-origin: 494px 566px 0px;"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"></div></div></div><div style="position: absolute; z-index: 0; left: 0px; top: 0px;"><div style="overflow: hidden; width: 520px; height: 600px;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%; transform-origin: 494px 566px 0px;"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a title="Click to see this area on Google Maps" href="https://maps.google.com/maps?ll=NaN,NaN&amp;z=4&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3" target="_blank" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 62px; height: 26px; cursor: pointer;"><img draggable="false" src="Google%20Maps%20lat_long%20finder_files/google_white2.png" style="position: absolute; left: 0px; top: 0px; width: 62px; height: 26px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px;"></div></a></div><div style="z-index: 1000001; position: absolute; right: 71px; bottom: 0px; width: 249px;" class="gmnoprint"><div class="gm-style-cc" style="-moz-user-select: none;" draggable="false"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto,Arial,sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">Map Data</a><span style="">Map data ©2015 Basarsoft, Google, INEGI, ORION-ME</span></div></div></div><div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto,Arial,sans-serif; color: rgb(34, 34, 34); box-shadow: 0px 4px 16px rgba(0, 0, 0, 0.2); z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 110px; top: 210px;"><div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div><div style="font-size: 13px;">Map data ©2015 Basarsoft, Google, INEGI, ORION-ME</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img draggable="false" src="Google%20Maps%20lat_long%20finder_files/mapcnt6.png" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px;"></div></div><div style="position: absolute; right: 0px; bottom: 0px;" class="gmnoscreen"><div style="font-family: Roboto,Arial,sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2015 Basarsoft, Google, INEGI, ORION-ME</div></div><div draggable="false" style="z-index: 1000001; position: absolute; -moz-user-select: none; right: 0px; bottom: 0px;" class="gmnoprint gm-style-cc"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto,Arial,sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><a target="_blank" href="https://www.google.com/intl/en-US_US/help/terms_maps.html" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms of Use</a></div></div><div style="padding: 5px; z-index: 0; position: absolute; right: 98px; top: 0px;" class="fullScreen"><div style="background-color: white; border-style: solid; border-width: 1px; border-color: rgb(113, 123, 135); cursor: pointer; text-align: center; box-shadow: 0px 1px 4px -1px rgba(0, 0, 0, 0.298);"><div style="font-family: Roboto,Arial,sans-serif; font-size: 11px; font-weight: 400; padding: 1px 6px;"><strong>Full screen</strong></div></div></div><div class="gm-style-cc" style="-moz-user-select: none; position: absolute; right: 0px; bottom: 0px; display: none;" draggable="false"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto,Arial,sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><a href="https://www.google.com/maps/@NaN,NaN,4z/data=%2110m1%211e1%2112b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto,Arial,sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;" title="Report errors in the road map or imagery to Google" target="_new">Report a map error</a></div></div><div controlheight="311" controlwidth="78" draggable="false" style="margin: 5px; -moz-user-select: none; position: absolute; left: 0px; top: 0px;" class="gmnoprint"><div style="cursor: url(&quot;http://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; width: 78px; height: 78px; position: absolute; left: 0px; top: 0px;" controlheight="80" controlwidth="78" class="gmnoprint"><div style="width: 78px; height: 78px; position: absolute; left: 0px; top: 0px;" controlheight="80" controlwidth="78" class="gmnoprint"><div style="visibility: hidden;"><svg viewBox="0 0 78 78" height="78px" width="78px" overflow="hidden" version="1.1" style="position: absolute; left: 0px; top: 0px;"><circle stroke="#f2f4f6" fill="#f2f4f6" fill-opacity="0.2" stroke-width="3" r="35" cy="39" cx="39"></circle><g transform="rotate(0 39 39)"><rect fill="#f2f4f6" stroke-width="1" stroke="#a6a6a6" height="11" width="12" ry="4" rx="4" y="0" x="33"></rect><polyline stroke="#000" fill="#f2f4f6" stroke-width="1.5" stroke-linejoin="bevel" points="36.5,8.5 36.5,2.5 41.5,8.5 41.5,2.5"></polyline></g></svg></div></div><div style="position: absolute; left: 10px; top: 11px;" controlheight="59" controlwidth="59" class="gmnoprint"><div style="width: 59px; height: 59px; overflow: hidden; position: relative;"><img draggable="false" src="Google%20Maps%20lat_long%20finder_files/mapcnt6.png" style="position: absolute; left: 0px; top: 0px; width: 59px; height: 492px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px;"><div title="Pan left" style="position: absolute; left: 0px; top: 20px; width: 19.6667px; height: 19.6667px; cursor: pointer;"></div><div title="Pan right" style="position: absolute; left: 39px; top: 20px; width: 19.6667px; height: 19.6667px; cursor: pointer;"></div><div title="Pan up" style="position: absolute; left: 20px; top: 0px; width: 19.6667px; height: 19.6667px; cursor: pointer;"></div><div title="Pan down" style="position: absolute; left: 20px; top: 39px; width: 19.6667px; height: 19.6667px; cursor: pointer;"></div></div></div></div><div controlheight="0" controlwidth="0" style="opacity: 0.6; display: none; position: absolute;" class="gmnoprint"><div title="Rotate map 90 degrees" style="width: 22px; height: 22px; overflow: hidden; position: absolute; cursor: pointer;"><img draggable="false" src="Google%20Maps%20lat_long%20finder_files/mapcnt6.png" style="position: absolute; left: -38px; top: -360px; width: 59px; height: 492px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px;"></div></div><div controlheight="226" controlwidth="25" style="position: absolute; left: 27px; top: 85px;" class="gmnoprint"><div title="Zoom in" style="width: 23px; height: 24px; overflow: hidden; position: relative; cursor: pointer; z-index: 1;"><img draggable="false" src="Google%20Maps%20lat_long%20finder_files/mapcnt6.png" style="position: absolute; left: -17px; top: -400px; width: 59px; height: 492px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px;"></div><div title="Click to zoom" style="width: 25px; height: 178px; overflow: hidden; position: relative; cursor: pointer; top: -4px;"><img draggable="false" src="Google%20Maps%20lat_long%20finder_files/mapcnt6.png" style="position: absolute; left: -17px; top: -87px; width: 59px; height: 492px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px;"></div><div title="Drag to zoom" style="width: 21px; height: 14px; overflow: hidden; position: absolute; transition: top 0.25s ease 0s; z-index: 2; cursor: url(&quot;http://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; left: 2px; top: 156px;"><img draggable="false" src="Google%20Maps%20lat_long%20finder_files/mapcnt6.png" style="position: absolute; left: 0px; top: -384px; width: 59px; height: 492px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px;"></div><div title="Zoom out" style="width: 23px; height: 23px; overflow: hidden; position: relative; cursor: pointer; top: -4px; z-index: 3;"><img draggable="false" src="Google%20Maps%20lat_long%20finder_files/mapcnt6.png" style="position: absolute; left: -17px; top: -361px; width: 59px; height: 492px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px;"></div></div></div><div style="margin: 5px; z-index: 0; position: absolute; cursor: pointer; right: 0px; top: 0px;" class="gmnoprint"><div class="gm-style-mtc" style="float: left;"><div title="Show street map" draggable="false" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(0, 0, 0); font-family: Roboto,Arial,sans-serif; -moz-user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 1px 6px; border-bottom-left-radius: 2px; border-top-left-radius: 2px; background-clip: padding-box; border: 1px solid rgba(0, 0, 0, 0.15); box-shadow: 0px 1px 4px -1px rgba(0, 0, 0, 0.3); min-width: 23px; font-weight: 500;">Map</div><div style="background-color: white; z-index: -1; padding-top: 2px; background-clip: padding-box; border-width: 0px 1px 1px; border-style: none solid solid; border-color: -moz-use-text-color rgba(0, 0, 0, 0.15) rgba(0, 0, 0, 0.15); -moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; border-image: none; box-shadow: 0px 1px 4px -1px rgba(0, 0, 0, 0.3); position: absolute; left: 0px; top: 20px; text-align: left; display: none;"><div title="Show street map with terrain" draggable="false" style="color: rgb(0, 0, 0); font-family: Roboto,Arial,sans-serif; -moz-user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 3px 8px 3px 3px; direction: ltr; text-align: left; white-space: nowrap;"><span style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; background-color: rgb(255, 255, 255); border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle;" role="checkbox"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img draggable="false" src="Google%20Maps%20lat_long%20finder_files/imgs8.png" style="position: absolute; left: -52px; top: -44px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Terrain</label></div></div></div><div class="gm-style-mtc" style="float: left;"><div title="Show satellite imagery" draggable="false" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(86, 86, 86); font-family: Roboto,Arial,sans-serif; -moz-user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 1px 6px; border-bottom-right-radius: 2px; border-top-right-radius: 2px; background-clip: padding-box; border-width: 1px 1px 1px 0px; border-style: solid solid solid none; border-color: rgba(0, 0, 0, 0.15) rgba(0, 0, 0, 0.15) rgba(0, 0, 0, 0.15) -moz-use-text-color; -moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; border-image: none; box-shadow: 0px 1px 4px -1px rgba(0, 0, 0, 0.3); min-width: 40px;">Satellite</div><div style="background-color: white; z-index: -1; padding-top: 2px; background-clip: padding-box; border-width: 0px 1px 1px; border-style: none solid solid; border-color: -moz-use-text-color rgba(0, 0, 0, 0.15) rgba(0, 0, 0, 0.15); -moz-border-top-colors: none; -moz-border-right-colors: none; -moz-border-bottom-colors: none; -moz-border-left-colors: none; border-image: none; box-shadow: 0px 1px 4px -1px rgba(0, 0, 0, 0.3); position: absolute; right: 0px; top: 20px; text-align: left; display: none;"><div title="Zoom in to show 45 degree view" draggable="false" style="color: rgb(184, 184, 184); font-family: Roboto,Arial,sans-serif; -moz-user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 3px 8px 3px 3px; direction: ltr; text-align: left; white-space: nowrap; display: none;"><span style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; background-color: rgb(255, 255, 255); border: 1px solid rgb(241, 241, 241); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle;" role="checkbox"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img draggable="false" src="Google%20Maps%20lat_long%20finder_files/imgs8.png" style="position: absolute; left: -52px; top: -44px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">45°</label></div><div title="Show imagery with street names" draggable="false" style="color: rgb(0, 0, 0); font-family: Roboto,Arial,sans-serif; -moz-user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 3px 8px 3px 3px; direction: ltr; text-align: left; white-space: nowrap;"><span style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; background-color: rgb(255, 255, 255); border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle;" role="checkbox"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden;"><img draggable="false" src="Google%20Maps%20lat_long%20finder_files/imgs8.png" style="position: absolute; left: -52px; top: -44px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Labels</label></div></div></div></div></div></div>
                    <div class="latLongControls">
                        <form method="post" action="<?php echo $url ?>" >
                        <table style="width:100%;">
                            <tbody>
                                <tr>
                                    <td colspan="3">
                                        Search
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input value="<?php echo $value; ?>" autocomplete="off" placeholder="Enter a location" id="postcode" class="form-control"><?php echo $value; ?><br>
                                        <input onclick="Geocode()" value="Search" class="btn btn-primary" type="button">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" id="error">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" id="locations">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>...or click this button to get the latitude/longitude of the centre of the map...</b></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input value="Get map centre" onclick="GetLocationInfo(map.getCenter())" class="btn btn-primary" type="button">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <b>...or type in your latitude/longitude and click the button below to view its location...</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="Google%20Maps%20lat_long%20finder_files/lat.png" alt="Latitude"></td>
                                    <td><label for="lat">Latitude:</label></td>
                                    <td><input value="<?php  echo $latitude; ?>" id="lat" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><img src="Google%20Maps%20lat_long%20finder_files/lng.png" alt="Longitude"></td>
                                    <td><label for="long">Longitude:</label></td>
                                    <td><input value="<?php  echo $longitude; ?>" id="long" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input value="Go to this location" onclick="GotoLatLong()" class="btn btn-primary" type="button">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input value="Save" onclick="save()" class="btn btn-primary" type="button">
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                            </form>
                    </div>
<!-- important-->
                    <script src="Google%20Maps%20lat_long%20finder_files/LatLong.js" type="text/javascript" async=""></script>
<!-- important end-->

                   


                </div>
                
            </div>
        </div>

