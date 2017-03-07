(function(){
var ifr = document.createElement('iframe');
ifr.setAttribute('id', 'cto_iframe_adb189b346');
ifr.setAttribute('frameborder', 0);
ifr.setAttribute('allowtransparency', true);
ifr.setAttribute('hspace', 0);
ifr.setAttribute('marginwidth', 0);
ifr.setAttribute('marginheight', 0);
ifr.setAttribute('scrolling', 'no');
ifr.setAttribute('vspace', 0);
ifr.setAttribute('width', '728px');
ifr.setAttribute('height', '90px');
var container = document.getElementById('CriteoAdTop');
if (container) { container.appendChild(ifr); }
var ifc = "<"+"style type=\"text/css\">\n";
ifc += "		.headerAds { width: 728px; height: 90px; }\n";
ifc += "		@media handheld, only screen and (max-width: 600px), only screen and (max-device-width: 600px) \n";
ifc += "		{ .headerAds {width: 300px; height: 250px;} }\n";
ifc += "		<"+"/style>		\n";
ifc += "<"+"script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"><"+"/script>\n";
ifc += "<"+"!-- Header (responsive) -->\n";
ifc += "<"+"ins class=\"adsbygoogle headerAds\"\n";
ifc += "     style=\"display:block\"\n";
ifc += "     data-ad-client=\"ca-pub-3374089704310222\"\n";
ifc += "     data-ad-slot=\"5994218919\"\n";
ifc += "     data-ad-format=\"auto\"><"+"/ins>\n";
ifc += "<"+"script>\n";
ifc += "(adsbygoogle = window.adsbygoogle || []).push({});\n";
ifc += "<"+"/script>\n";
ifc += "<"+"div id=\'beacon_adb189b346\' style=\'position: absolute; left: 0px; top: 0px; visibility: hidden;\'>\n";
ifc += "<"+"img width=\"0\" height=\"0\" src=\"http://cat.fr.eu.criteo.com/delivery/lg.php?cppv=1&cpp=xRhRUXx4OEVvYWZYd3JUS3RlQjloaEdobEc0QVk0QUFGOXZTUkJ3ZDNmQlFqMFIvRS95NGRxVGFCMThBQXhxUHpwZlQ0TW5WU2NhUjUzRWRmNGROcFB4UjNFLzhMUFVweWlZY293bzNyOXp0dEkvSDFHUzJJWE15eFFIT3pvMTBvV0pzY3ZkcmE3VUFjWm0ybUVpVXZwOCtyT2V0NVVVenUwMHA5YUVwa2hmVEVTclhGSmZSUytmTnppU0lNNjZ6MDU0dkR8\"/>\n";
ifc += "<"+"/div>\n";
ifc += "\n";

var fillIframe = function(ifrd) {
    var getDocument = function(iframe) {
        var result_document = iframe.contentWindow || iframe.contentDocument;
        if (result_document && result_document.document)
            result_document = result_document.document;
        return result_document;
    };
    var c = getDocument(ifrd);
    if (c) {
        c.open();
        c.write(ifc);
        c.close();
    }
};


var maxRetryAttempts = 100;
var pollIframe = function() {
    var ifrd = document.getElementById('cto_iframe_adb189b346');
    if (ifrd) {
        fillIframe(ifrd);
    } else if (maxRetryAttempts-- > 0) {
        setTimeout(pollIframe, 10);
    }
};pollIframe();})();
