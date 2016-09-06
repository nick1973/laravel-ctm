<div role="tabpanel" class="tab-pane" id="submit">
    {{ Form::model($user, ['route' => ['frontend.user.profile.submit_profile', $user->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) }}
        <div class="panel panel-default">
            <div class="panel-body">
                <p>Once your application has been submitted it will be sent to the CTM admin team to be processed.</p>
                <p>During this time you will no longer be able to edit your profile.</p>
                <input name="confirmed" value="0" hidden>
                {{ Form::submit('Submit Application', ['class' => 'btn btn-primary']) }}
            </div>
        </div>
    </form>
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