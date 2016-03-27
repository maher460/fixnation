function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode >= 48 && charCode <= 57)
        return false;

    return true;
}
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
};

function initialize() {
    document.getElementById("providerskills").style.visibility = "hidden";
    document.getElementById("providerskills").style.height = "0px";
    // Create the autocomplete object, restricting the search
    // to geographical location types.
    autocomplete = new google.maps.places.Autocomplete(
        /** @type {HTMLInputElement} */
        (document.getElementById('autocomplete')), {
            types: ['geocode']
        });
    // When the user selects an address from the dropdown,
    // populate the address fields in the form.
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var flagLabel = $('#flagLabel');
        flagLabel.attr('data-flag', "true");
        var counter = parseInt(flagLabel.attr('data-flag-counter'));
        flagLabel.attr('data-flag-counter', ++counter);
        fillInAddress();
    });
}

// [START region_fillform]
function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();

    document.getElementById("latitude").value = place.geometry.location.A;
    document.getElementById("longitude").value = place.geometry.location.F;

    for (var component in componentForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
    }

    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
        }
    }
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = new google.maps.LatLng(
                position.coords.latitude, position.coords.longitude);
            var circle = new google.maps.Circle({
                center: geolocation,
                radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
        });
    }
}
// [END region_geolocation]

function provideronoff() {

    var chboxs = document.getElementsByName("provider");
    var i;
    for (i = 0; i < chboxs.length; i++) {
        if (chboxs[i].checked == true) {
            document.getElementById("providerskills").style.visibility = "visible";
            document.getElementById("providerskills").style.height = "auto";
            document.getElementById("providerDescription").setAttribute("required", "required");

        } else {
            document.getElementById("providerskills").style.visibility = "hidden";
            document.getElementById("providerskills").style.height = "0px";
            document.getElementById("providerDescription").removeAttribute("required");


        }
    }
}

function validateClick() {

    var flagLabel = $('#flagLabel');
    var flagCounter = flagLabel.attr('data-flag-counter');

    if (flagCounter == "0") {

        var addressField = $('.addressFieldName');
        addressField.val('');

        $('#street_number').val('');
        $('#route').val('');
        $('#locality').val('');
        $('#administrative_area_level_1').val('');
        $('#postal_code').val('');
        $('#country').val('');
        $('#latitude').val('');
        $('#longitude').val('');
        $('#locationError').show();

    }

    flagLabel.attr('data-flag-counter', "0")

}

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-65278937-1']);
_gaq.push(['_trackPageview']);

(function() {
    var ga = document.createElement('script');
    ga.type = 'text/javascript';
    ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ga, s);
})();