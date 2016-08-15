<div role="tabpanel" class="tab-pane" id="confirm_profile">

    <h3>Has all of the information and documentation correctly filled in and uploaded?</h3>
    {{ Form::model($user, ['route' => ['dashboard.manager.update', $user->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) }}
        <div class="col-sm-1">
            <div class="onoffswitch">
                <input name="profile_confirmed" type="hidden" value="No">
                <input type="checkbox" value="Yes" name="profile_confirmed" class="toggleBtn onoffswitch-checkbox" id="isConfirmed"
                       onclick="visible(this.id,'profile_confirmed')" <?php if($user->profile_confirmed=='Yes') echo "checked" ?>>
                <label for="isConfirmed" class="onoffswitch-label">
                    <div class="onoffswitch-inner"></div>
                    <div class="onoffswitch-switch"></div>
                </label>
            </div>
        </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-1">
                    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
    </form>

</div><!--tab panel address-->
<script>

//    $( "td.address:empty" )
//            .text( "Information Required!" )
//            //.css( "background", "rgb(238,94,72)"
//            .addClass('bg-danger');
//
//    $("td.address.bg-danger").each(function(){
//        if ($(this).hasClass('bg-danger')) {
//            $("#address_tick").addClass('hidden');
//            console.log("has Class");
//        }
//    });

</script>