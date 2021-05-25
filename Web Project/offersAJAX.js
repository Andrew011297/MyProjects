/*
    Andrew Robson - w16011147
    This page will determine the type of object to create as well as pass in the offer
    to the index page
 */

function getRequest(url, callbackFunction)
{
    var httpRequest; //creates the variable: httpRequest

    if (window.XMLHttpRequest) //if the window is XMLHttpRequest compatible, proceed
    {
        httpRequest = new XMLHttpRequest(); //change the httpRequest to a XMLHttpRequest
    }
    else if (window.ActiveXObject) //if the window is ActiveXObject compatible, proceed
    {
        try
        {
            //change the httpRequest variable to a ActiveXObject variable
            httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (exception)
        {
            try
            {
                //change the variable httpRequest to a different ActiveXObject
                httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (exception)
            {
            }
        }
    }

    if (!httpRequest) //check if the httpRequest was not made
    {
        alert('An error has occurred, XMLHTTP has failed');
    }
    else
    {
        httpRequest.onreadystatechange = function() //when httpRequest is in the ready state, proceed
        {
            var completed = 4, successful = 200, returnValue; //declaring variables
            if (httpRequest.readyState == completed) //if httpRequest has completed its ready state, proceed
            {
                if (httpRequest.status == successful) //if httpsRequest's status is successful, proceed
                {
                    //set 'returnValue' to be equal to the response text from httpRequest
                    returnValue = httpRequest.responseText;
                    callbackFunction(returnValue);
                }
                else
                    {
                    alert("Problem with request");
                }
            }
        };
        httpRequest.open('get', url, true);
        httpRequest.send(null);
    }
}

function transferOffer(offer) //used to display the offers
{
    var retrieveAside = document.getElementById('offers'); //retrieves the offers id and stores it in retrieveAsside
    var asideOffer = "<h1>Amazing Deals:</h1>\n"; //adds a header to the new offer
    asideOffer = asideOffer + offer;

    retrieveAside.innerHTML = asideOffer; //displays the offer
}