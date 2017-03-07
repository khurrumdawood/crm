(function(){
var ifr = document.createElement('iframe');
ifr.setAttribute('id', 'cto_iframe_2f88e227d2');
ifr.setAttribute('frameborder', 0);
ifr.setAttribute('allowtransparency', true);
ifr.setAttribute('hspace', 0);
ifr.setAttribute('marginwidth', 0);
ifr.setAttribute('marginheight', 0);
ifr.setAttribute('scrolling', 'no');
ifr.setAttribute('vspace', 0);
ifr.setAttribute('width', '630px');
ifr.setAttribute('height', '500px');
var container = document.getElementById('crtoTextBanner');
if (container) { container.appendChild(ifr); }
var ifc = "<"+"script type=\'text/javascript\'>\n";
ifc += "window.top.document.getElementById(\'crtoTextBanner\').style.display = \'none\';\n";
ifc += "<"+"/script>\n";
ifc += "<"+"div id=\'beacon_2f88e227d2\' style=\'position: absolute; left: 0px; top: 0px; visibility: hidden;\'>\n";
ifc += "<"+"img width=\"0\" height=\"0\" src=\"http://cat.fr.eu.criteo.com/delivery/lg.php?cppv=1&cpp=Jv%2FMPnxXK3ZuTGF3N3hjY3hTcFVFYjhBVFg4ZWkrK2RLRE5kd1hhOVNoUVZ2SzZZM1dQdmZHUkJxKy9QcXhvVDl6ZnFxNDV2Ry9XMXlZVnNRNFJvcUp5dTRpL1hmVWs4VnVMWkdlUy9Ed1BBVVhXK0p3YWRrM1FvNVhCdVI3c0pOWGRsRDVHendsWGJUdk9xeVJkZUVobnRaVFI5cnpQNVoxU3NGZVhYTi9wb2NDU2hnWjhmRHdqdUdMT3F2MENhMzhEVCt1RENqQ0VFc3dZWXMrMXAwL0tHY1pRPT18\"/>\n";
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
    var ifrd = document.getElementById('cto_iframe_2f88e227d2');
    if (ifrd) {
        fillIframe(ifrd);
    } else if (maxRetryAttempts-- > 0) {
        setTimeout(pollIframe, 10);
    }
};pollIframe();})();
