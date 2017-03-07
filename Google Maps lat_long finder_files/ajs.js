(function(){
var ifr = document.createElement('iframe');
ifr.setAttribute('id', 'cto_iframe_b978aa9a77');
ifr.setAttribute('frameborder', 0);
ifr.setAttribute('allowtransparency', true);
ifr.setAttribute('hspace', 0);
ifr.setAttribute('marginwidth', 0);
ifr.setAttribute('marginheight', 0);
ifr.setAttribute('scrolling', 'no');
ifr.setAttribute('vspace', 0);
ifr.setAttribute('width', '160px');
ifr.setAttribute('height', '600px');
var container = document.getElementById('CriteoAdLeft');
if (container) { container.appendChild(ifr); }
var ifc = "<"+"script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"><"+"/script>\n";
ifc += "<"+"!-- Left column wide -->\n";
ifc += "<"+"ins class=\"adsbygoogle\"\n";
ifc += "     style=\"display:inline-block;width:160px;height:600px\"\n";
ifc += "     data-ad-client=\"ca-pub-3374089704310222\"\n";
ifc += "     data-ad-slot=\"9770043689\"><"+"/ins>\n";
ifc += "<"+"script>\n";
ifc += "(adsbygoogle = window.adsbygoogle || []).push({});\n";
ifc += "<"+"/script>\n";
ifc += "<"+"div id=\'beacon_b978aa9a77\' style=\'position: absolute; left: 0px; top: 0px; visibility: hidden;\'>\n";
ifc += "<"+"img width=\"0\" height=\"0\" src=\"http://cat.fr.eu.criteo.com/delivery/lg.php?cppv=1&cpp=K2iYx3x2eDgzditJQ3pHZEJMbkI1eHdhQWMwbmk0bnNEbDZBZU53NUZWYUF1dkZvSjgxZTRqOFNjNkxNR3lWb1Y5ZGNERXJjWFlTSVA5dlJCaEJ1aThPQldWMlJKVVlFV052a0NvemhRR2RqQkVoeG9xUUxBcVRPaFpNcHJOckRBOGpDeklCeVpkdzRSdW55bXBvWVltMVBuWTQ2cGRtRTY4NUhKb1pWZE5GNGk4d001VXErOWVWRmtwTWl6NTFPQVc3RlF8\"/>\n";
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
    var ifrd = document.getElementById('cto_iframe_b978aa9a77');
    if (ifrd) {
        fillIframe(ifrd);
    } else if (maxRetryAttempts-- > 0) {
        setTimeout(pollIframe, 10);
    }
};pollIframe();})();
