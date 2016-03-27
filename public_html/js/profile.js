function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode >= 48 && charCode <= 57)
        return false;

    return true;
}

function provideronoff() {
console.log("tere")
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