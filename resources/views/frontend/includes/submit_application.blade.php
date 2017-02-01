<div role="tabpanel" class="tab-pane" id="submit">
    {{ Form::model($user, ['route' => ['frontend.user.profile.submit_profile', $user->id], 'id' => 'submit_application',
                            'class' => 'form-horizontal', 'method' => 'PATCH']) }}
        <div class="panel panel-default">
            <div class="panel-body">
                <p>Once your application has been submitted it will be sent to the CTM resource team to be processed.</p>
                <p>During this time you will no longer be able to edit your profile.</p>
                <input name="confirmed" value="0" hidden>
                {{--{{ Form::submit('Submit Application', ['class' => 'btn btn-primary']) }}--}}
            </div>
        </div>
        <p>CTM's Terms & Conditions <a href="/Casual Worker Agreement.pdf" target="_blank">Terms & Conditions</a></p>
        <h4>Before you can submit your application first you must tick confirming that you have read CTM's terms & conditions.</h4>
        <div class="checkbox">
            <label>
                <input id="TandC" type="checkbox"> Check here to indicate that you have read and agree to CTM's terms and conditions
            </label>
        </div>
    </form>
    <button disabled id="submit_button" style="margin-top: 10px" onclick="submit_application()" class="btn btn-primary">Submit Application</button>
</div><!--tab panel address-->
<script>
    $(function() {
        $("#TandC").click(function () {

            if(this.checked){
                $("#submit_button").removeAttr('disabled')
                console.log(this.checked)
            } else {
                $("#submit_button").attr('disabled', true)
            }

        });
    });
    function submit_application() {
        var myInfo = $("#myInfo").hasClass('hidden');
        var address_tick = $("#address_tick").hasClass('hidden');
        var reference_tick =  $("#reference_tick").hasClass('hidden');
        var account_tick = $("#account_tick").hasClass('hidden');
        var gp1_tick = $('.gp1').hasClass('bg-danger');
        var gp2_tick = $(".gp2").hasClass('bg-danger');
        console.log('gp1_tick ' + gp1_tick)
        console.log('gp2_tick ' + gp2_tick)
        if(myInfo==true || address_tick==true || reference_tick==true || account_tick==true || gp1_tick==true || gp2_tick==true){
            alert('Your application is not ready to submit, Please complete un-ticked sections to complete.')
            console.log('not submitted')
        } else {
            console.log('submitted')
            $("#submit_application").submit()
        }
    }

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