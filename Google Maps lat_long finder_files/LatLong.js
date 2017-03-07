/// <reference path="../Scripts/typings/jquery/jquery.d.ts" />
/// <reference path="../Scripts/typings/bootstrap/bootstrap.d.ts" />
/// <reference path="../typings/google.maps.d.ts" />
/// <reference path="jscoord-1.2.ts" />
/// <reference path="site.ts" />
var myPano;
var map;
$(document).ready(function () {
    loadGoogleMaps("places", function () {
        var latlng = new google.maps.LatLng(54.559322, -4.174804);
        var options = {
            zoom: 5,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            draggableCursor: "crosshair",
            streetViewControl: false
        };
        map = new google.maps.Map(document.getElementById("map"), options);
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(FullScreenControl(map));
        $("#zoom").html("5");
        google.maps.event.addListener(map, "click", function (location) {
            GetLocationInfo(location.latLng);
        });
        google.maps.event.addListener(map, "zoom_changed", function () {
            $("#zoom").html(map.getZoom().toString());
        });
        myPano = new google.maps.StreetViewPanorama(document.getElementById("pano"), { visible: false });
        myPano.setPov({
            heading: 265,
            zoom: 1,
            pitch: 0
        });
        $("#pano").hide();
        google.maps.event.trigger(myPano, "resize");
        // autocomplete
        var autocomplete = new google.maps.places.Autocomplete(document.getElementById("postcode"), { bounds: null, componentRestrictions: null, types: [] });
        google.maps.event.addListener(autocomplete, "place_changed", function () {
            $("#locations").html("");
            $("#error").html("");
            var place = autocomplete.getPlace();
            GotoLocation(place.geometry.location);
        });
    });
});
var initListener;
var marker;
function StartStreetView() {
    // street view
    if ($("#streetViewBtn").val() === "Start StreetView") {
        initListener = google.maps.event.addListener(myPano, "position_changed", handlePanoMove);
        $("#pano").show();
        myPano.setVisible(true);
        $("#streetViewBtn").val("End StreetView");
        google.maps.event.trigger(myPano, "resize");
        GotoLatLong();
    }
    else {
        google.maps.event.removeListener(initListener);
        myPano.setVisible(false);
        $("#pano").hide();
        $("#streetViewBtn").val("Start StreetView");
        google.maps.event.trigger(myPano, "resize");
    }
}
function Geocode() {
    $("#locations").html("");
    $("#error").html("");
    // geocode with google.maps.Geocoder
    var localSearch = new google.maps.Geocoder();
    var postcode = $("#postcode").val();
    localSearch.geocode({ "address": postcode }, function (results) {
        if (results.length === 1) {
            var result = results[0];
            var location = result.geometry.location;
            GotoLocation(location);
        }
        else if (results.length > 1) {
            $("#error").html("Multiple addresses found");
            // build a list of possible addresses
            var html = "";
            for (var i = 0; i < results.length; i++) {
                html += "<a href=\"javascript:GotoLocation(new google.maps.LatLng(" + results[i].geometry.location.lat() + ", " + results[i].geometry.location.lng() + "))\">" + results[i].formatted_address + "</a><br/>";
            }
            $("#locations").html(html);
        }
        else {
            $("#error").html("Address not found");
        }
    });
}
function GotoLocation(location) {
    GetLocationInfo(location);
    map.setCenter(location);
}
function GetLocationInfo(latlng) {
    if (latlng != null) {
        ShowLatLong(latlng);
        UpdateStreetView(latlng);
    }
}
function showError(error) {
    $(".modal-body").html(error);
    $("#myModal").modal();
}
function ParseDMS(input) {
    var parts = input.split(/[^\d\w\d.d]+/);
    return ConvertDMSToDD(parseInt(parts[0], 10), parseInt(parts[1], 10), parseFloat(parts[2]), parts[3]);
}
function ConvertDMSToDD(degrees, minutes, seconds, direction) {
    var dd = degrees + minutes / 60 + seconds / (60 * 60);
    if (direction === "S" || direction === "W") {
        dd = dd * -1;
    } // Don't do anything for N or E
    return dd;
}
function gotoLatLongDms() {
    var latVal = $("#latDMS").val();
    var longVal = $("#lngDMS").val();
    if (latVal === "" || longVal === "") {
        showError("You need to enter the latitude and longitude");
    }
    else {
        var lat = ParseDMS(latVal);
        var long = ParseDMS(longVal);
        if (isNaN(lat) || isNaN(long)) {
            showError("Latitude and/or longitude are not valid DMS values");
        }
        else {
            var latLong = new google.maps.LatLng(lat, long);
            ShowLatLong(latLong);
            map.setCenter(latLong);
            UpdateStreetView(latLong);
        }
    }
}
function GotoLatLong() {
    var latVal = $("#lat").val();
    var longVal = $("#long").val();
    if (latVal === "" || longVal === "") {
        showError("You need to enter the latitude and longitude");
    }
    else {
        var lat = parseFloat(latVal);
        var long = parseFloat(longVal);
        if (isNaN(lat) || isNaN(long)) {
            showError("Latitude and/or longitude are not valid numbers");
        }
        else {
            var latLong = new google.maps.LatLng(lat, long);
            ShowLatLong(latLong);
            map.setCenter(latLong);
            UpdateStreetView(latLong);
        }
    }
}
function GotoGridRef() {
    var gridRef = $("#gridRef").val();
    if (gridRef === "") {
        showError("You need to enter a grid reference");
    }
    else {
        var os = OSRef.fromGridReference(gridRef);
        var ll = os.toLatLng();
        ll.OSGB36ToWGS84();
        var latLong = new google.maps.LatLng(ll.lat(), ll.lng());
        ShowLatLong(latLong);
        map.setCenter(latLong);
        UpdateStreetView(latLong);
    }
}
function ShowLink() {
    $("#mapLink").html("<a href=\"https://maps.google.com/?ll=" + $("#lat").val() + "," + $("#long").val() + "&z=" + $("#zoom").html() + "\">Link for this map</a>");
}
function toDMS(latOrLng) {
    var d = parseInt(latOrLng, 10);
    var md = Math.abs(latOrLng - d) * 60;
    var m = Math.floor(md);
    var sd = (md - m) * 60;
    return Math.abs(d) + "\u00B0 " + m + "' " + roundNumber(sd, 4) + "\"";
}
function latToDMS(lat) {
    var dms = toDMS(lat);
    if (lat > 0) {
        return dms + "N";
    }
    else {
        return dms + "S";
    }
}
function lngToDMS(lng) {
    var dms = toDMS(lng);
    if (lng > 0) {
        return dms + "E";
    }
    else {
        return dms + "W";
    }
}
function ShowLatLong(latLong) {
    // show the lat/long
    if (marker != null) {
        marker.setMap(null);
    }
    marker = new google.maps.Marker({
        position: latLong,
        map: map
    });
    $("#lat").val(roundNumber(latLong.lat(), 6).toString());
    $("#long").val(roundNumber(latLong.lng(), 6).toString());
    $("#latDMS").val(latToDMS(latLong.lat()));
    $("#lngDMS").val(lngToDMS(latLong.lng()));
    ShowLink();
    GetElevation(latLong.lat(), latLong.lng(), "#elevation");
    ReverseGeocode(latLong.lat(), latLong.lng(), "#postcode");
    // UK easting/northing
    if ((latLong.lat() > 49) && (latLong.lat() < 61) && (latLong.lng() > -12) && (latLong.lng() < 3)) {
        var ll2w = new LatLng(latLong.lat(), latLong.lng());
        ll2w.WGS84ToOSGB36();
        var os2w = ll2w.toOSRef();
        $("#easting").html(Math.round(os2w.easting()).toString());
        $("#northing").html(Math.round(os2w.northing()).toString());
        $("#gridRef").val(os2w.toTenFigureString());
    }
    else {
        $("#easting").html("Not in UK");
        $("#northing").html("Not in UK");
        $("#gridRef").val("Not in UK");
    }
    // What 3 Words support
    getWhat3Words(latLong, function (w3w) { return $("#w3w").html(w3w); });
}
function UpdateStreetView(latLong) {
    // street view
    if ($("#streetViewBtn").val() === "End StreetView") {
        $("#panoError").html("");
        myPano.setVisible(true);
        myPano.setPosition(latLong);
        // also set via the service API so we know if there is a view available
        var service = new google.maps.StreetViewService();
        service.getPanoramaByLocation(latLong, 50, function (result, status) {
            if (status !== google.maps.StreetViewStatus.OK) {
                $("#panoError").html("No street view available");
                myPano.setVisible(false);
            }
        });
    }
}
function handlePanoMove() {
    ShowLatLong(myPano.getPosition());
}
