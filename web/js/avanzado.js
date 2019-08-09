
$( "#type" )
    .change(function () {
        var str = "";
        $( "#type option:selected" ).each(function() {
            str =$( this ).text();

            if( str === "Thesis"){
                $("#advisor").show();
            }
            else {
                $("#advisor").hide();
            }

        });

    })
    .change();