/**
* Created by Sam Noble - w16006438
*/

'use strict';
/*
 function creates an XML Object based off the browser
 */
function getRequest(url, callback) {
    //create the request variable
    var httpRequest;
    //create request object
    //check if window understands XMLHttpRequest
    if (window.XMLHttpRequest) {
        //make httpRequest an XMLhttpRequest object
        httpRequest = new XMLHttpRequest();
    }
    //check if window understands ActiveXObject
    else if (window.ActiveXObject) {
        //attempt to set httpRequest to XML2
        try {
            httpRequest = new ActiveXObject('Msxml2.XMLHTTP');
        }
            //if it fails
        catch (exception) {
            //attempt setting httpRequest to other ActiveXObject
            try {
                httpRequest = new ActiveXObject('Microsoft.XMLHTTP');
            }
            catch (exception) {
                //do nothing as there is nothing that can be done
            }
        }
    }
    //check if XML HTTP was not made
    if (!httpRequest) {
        //alert user that XML HTTP could not be made
        alert('XMLHTTP instance could not be made');
    }
    else {
        //when httpRequest is ready display an offer
        httpRequest.onreadystatechange = function () {
            var completed = 4;
            var successful = 200;
            if (httpRequest.readyState == completed) {
                if (httpRequest.status == successful) {
                    callback(httpRequest.responseText);
                }
                else {
                    alert("Problem with request");
                }
            }
        };
        //get offers from the getOffers.php in asynchronous manner
        httpRequest.open('get', url, true);
        httpRequest.send();
    }
}

/*
 function puts an offer into the offer aside
 */
function displayOffer(offer) {
    //get the offer aside as an object
    var offerAside = document.getElementById('offers');
    //display new offer with a h3 header
    var offerContent = "<h3>Offers!</h3>\n";
    offerContent += offer;
    //add offer details after the h3 tag in offer asde
    offerAside.innerHTML = offerContent;
}
