<div role="tabpanel" class="tab-pane" id="submit">

    <div class="panel panel-default">
        <div class="panel-body">
            <a href="#" class="btn btn-danger col-md-offset-6 ">Submit Application</a>
        </div>
    </div>

</div><!--tab panel address-->
<script>

    $( "td.address:empty" )
            .text( "Information Required!" )
            //.css( "background", "rgb(238,94,72)"
            .addClass('bg-danger');

    $("td.address.bg-danger").each(function(){
        if ($(this).hasClass('bg-danger')) {
            $("#address_tick").addClass('hidden');
            console.log("has Class");
        }
    });

</script>