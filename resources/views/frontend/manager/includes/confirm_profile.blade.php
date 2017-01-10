<div role="tabpanel" class="tab-pane" id="confirm_profile">

    <h3>Has all of the information and documentation been correctly entered and uploaded?</h3>
    {{ Form::model($user, ['route' => ['dashboard.manager.update', $user->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'id' => 'confirm_form']) }}
        <div class="col-sm-1">
            <div class="onoffswitch">
                <input name="payroll_export" type="hidden" value="1">
                <input name="profile_confirmed" type="hidden" value="No">
                <input type="checkbox" value="Yes" name="profile_confirmed" class="toggleBtn onoffswitch-checkbox" id="isConfirmed"
                       onclick="visible(this.id,'email')" <?php if($user->profile_confirmed=='Yes') echo "checked" ?> checked>
                <label for="isConfirmed" class="onoffswitch-label">
                    <div class="onoffswitch-inner"></div>
                    <div class="onoffswitch-switch"></div>
                </label>
            </div>
        </div>
            <div  class="form-group">
				<div id="save_button">
					<div class="col-md-1 col-md-offset-1">
						<input name="confirmed" value="1" hidden>
						{{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
					</div>
					<div class="col-md-6">
						<h4>When saved an email will be sent to the new staff member.</h4>
					</div>
				</div>
            </div>
    </form>
    <div id="email" style='display: none' <?php //if($user->profile_confirmed=='Yes') echo "style='display: none'" ?>>

		<div class="col-lg-6 col-md-6">
			<div class="checkbox">
				<label>
				<input onclick="addtomail('references')" id="references" type="checkbox" value="No References">
				No References
				</label>
			</div>
			<div class="checkbox">
				<label>
				<input onclick="addtomail('passportPhoto')" id="passportPhoto" type="checkbox" value="No Passport Photo">
				No Passport Photo
				</label>
			</div>
		</div>
		<div class="col-lg-6 col-md-6">
			<div class="checkbox">
				<label>
				<input onclick="addtomail('passportPage')" id="passportPage" type="checkbox" value="Passport Photo Page">
				Passport Photo Page.
				</label>
			</div>
			<div class="checkbox">
				<label>
				<input onclick="addtomail('birthCertificate')" id="birthCertificate" type="checkbox" value="Birth certificate">
				Birth certificate
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input onclick="addtomail('salutation')" id="salutation" type="checkbox"
						   value="Thank you for applying to CTM, once your application
									has been resubmitted and complete.......Many thanks, CTM">
					Salutation
				</label>
			</div>
		</div>
		<form>
			<h3>Please choose why the application has failed to meet the criteria.</h3>
			<textarea id="comments">
				<p>Hi {{ $user->name }},</p>
				<p>Sorry to inform you that your application has been unsuccessful, due to the following.</p>
				<h3>Please find a list below that needs your attention:</h3>
			</textarea>
		
		</form>
		<br>
		<div class="form-group">
			<input id="send_email" type="checkbox"> Are you ready to send the email?
		</div>
		<div id="send_button" class="form-group" style="display: none">
			<button onclick="content()" class="btn btn-primary" type="submit">Send</button>
		</div>
	</div>

</div><!--tab panel address-->

<script>

	$("#send_email").change(function() {
		if(this.checked) {
			$("#send_button").show('fade');
		}
		else {
			$("#send_button").hide('fade');
		}
	});

            function content() {

        // Get the HTML contents of the currently active editor
                console.debug(tinyMCE.activeEditor.getContent());
        //method1 getting the content of the active editor
                $.ajax({
                    type: "POST",
                    url: '/email',
                    data: {email: tinyMCE.activeEditor.getContent(),
                            e_address: '<?php echo $user->email ?>'}
                });
				//location.reload();
				$("#confirm_form").submit();
				alert('Email has been sent to ' + '<?php echo $user->email ?>');
            }

        tinymce.init({
            selector: '#comments',
            plugins: "fullpage",
            fullpage_default_font_family: "'Open Sans', sans-serif;",
            content_css : "/css/content.css",
            height : "480"
            });

        function visible(button, id) {
            if ($("#" + button).prop('checked') == true) {
                $("#" + id).hide('fade');
				$("#save_button").show('fade');
            }
            else if ($("#" + button).prop('checked') == false) {
                $("#" + id).show('fade');
				$("#save_button").hide('fade');
            }
        }

        function addtomail(id) {
            var text = $("#" + id).val();
            if ($("#" + id).is(':checked'))
            {
                // Adds a new paragraph to the end of the active editor
                tinyMCE.activeEditor.dom.add(tinyMCE.activeEditor.getBody(), 'p', {id : id}, text);

            } else {
                // Removes id in the active editor
                tinyMCE.activeEditor.dom.remove(tinyMCE.activeEditor.dom.select('#'+id));
            }
        };
</script>