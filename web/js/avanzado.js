
$( "#type" )
    .change(function () {
        var str = "";
        $( "#type option:selected" ).each(function() {
            str =$( this ).text();

            if( str === "Thesis"){
                $("#advisor").show();
                document.getElementById("adv").setAttribute('name', 'advisor');
            }
            else {
                $("#advisor").hide();
                document.getElementById("adv").setAttribute('name', '');
            }
        });
    })
    .change();