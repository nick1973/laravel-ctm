@extends('frontend.layouts.master')

@section('content')
    <button class="btn btn-default" onclick="send_user('email','emails')">Email</button>
    <button class="btn btn-danger" onclick="send_user('text','text')">Text</button>
    <h3>{{ count($unique_payroll) }} Users</h3>
    <table class="table">
        <tr>
            <th>Payroll</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Tel No</th>
            <th>User Updated</th>
            <th>Snapshot Created</th>
        </tr>
            @foreach($unique_payroll as $user)
            <?php
                    $user_updated = \Carbon\Carbon::parse($user->user_updated)->format('d-m-Y');
                    $snapshot_created = \Carbon\Carbon::parse($user->snapshot_created)->format('d-m-Y');
                    ?>

                        <tr>
                            <td>{{ $user->payroll }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->mobile }}</td>
                            <td>{{ $user_updated }}</td>
                            <td>{{ $snapshot_created }}</td>
                        </tr>


            @endforeach
    </table>

    <script>
        console.log(emails)
        function send_user(message, table){
            var selected = [];
            var mobile = [];
            var dataTable = $('#'+table).dataTable()
            $(".user:input:checked", dataTable.fnGetNodes()).each(function(){
                selected.push($(this).attr('name'));
                mobile.push($(this).attr('id'));
            })
            var sorted_arr = selected.slice().sort();
            var text_sorted_arr = mobile.slice().sort();
            var emailresults = [];
            var textresults = [];
            for (var i = 0; i < selected.length - 1; i++) {
                if (sorted_arr[i + 1] == sorted_arr[i]) {
                    emailresults.push(sorted_arr[i]);
                }
            }
            for (var i = 0; i < mobile.length - 1; i++) {
                if (text_sorted_arr[i + 1] == text_sorted_arr[i]) {
                    textresults.push(text_sorted_arr[i]);
                }
            }
            email_selected = sorted_arr
            mobile_selected = mobile
            //console.log(email_selected)

            if(mobiles.length == 0){
                //console.log(mobile_selected)
                $("#free_input input").remove()
                $("#free_input label").remove()
                $("#free_input").append('<label>Mobile</label><input onpaste="pasted();" id="mobile_numbers" class="form-control" name="mobile_numbers">')
            } else {
                $("#free_input label").remove()
                $("#free_input input").remove()
            }


            if(message=='email'){
                $('#emailModal').modal('show')
            } else{
                $('#textModal').modal('show')
            }
        }

        function textcontent() {
            if(mobile_selected.length == 0){
                var mobile = [];
                var mobileArray = $("input[name=mobile_numbers]").val().split(',')
                mobile_selected = mobileArray
                console.log(mobile_selected)
            }

            // Get the HTML contents of the currently active editor
            //console.debug(tinyMCE.activeEditor.getContent());
            //method1 getting the content of the active editor
            $.ajax({
                type: "POST",
                url: '/dashboard/manager/text',
                data: {numbers: mobiles,
                    message: tinyMCE.get('textcomments').getContent({ format: 'text' })
                }
            }).done(function(data) {
                //$( this ).addClass( "done" );
                //console.log(data)
                $("#bal").append('<p>Text Local Credits:= ' + data + '</p>')
            });
            //location.reload();
            //$("#confirm_form").submit();
            alert('Text been sent to ' + mobiles);
            $('#textModal').modal('hide')
        }

        function content() {

            // Get the HTML contents of the currently active editor
            //console.debug(tinyMCE.activeEditor.getContent());
            //method1 getting the content of the active editor
            $.ajax({
                type: "POST",
                url: '/email',
                data: {email: tinyMCE.get('comments').getContent(),
                    e_address: emails
                }
            });
            //location.reload();
            //$("#confirm_form").submit();
            alert('Email has been sent to ' + emails);
            $('#emailModal').modal('hide')
        }

        tinymce.init({
            selector: '#comments',
            plugins: "fullpage",
            fullpage_default_font_family: "'Open Sans', sans-serif;",
            content_css : "/css/content.css",
            height : "480"
        });

        tinymce.init({
            selector: '#textcomments',
            height : "480",
            plugins: "charactercount",
            //wordcount_cleanregex: /[0-9.(),;:!?%#$?\x27\x22_+=\\\/\-]*/g
            setup: function (editor) {
                editor.on('change', function(e) {
                    var count = this.plugins["charactercount"].getCount();
                    if (count > 5000)
                        $('#invalidContentHtml').show();
                    else
                        $('#invalidContentHtml').hide();
                });
            },
            init_instance_callback: function (editor) {
                $('.mce-tinymce').show('fast');
                $(editor.getContainer()).find(".mce-path").css("display", "none");
            }
        });

        tinymce.PluginManager.add('charactercount', function (editor) {
            var self = this;

            function update() {
                editor.theme.panel.find('#charactercount').text(['Characters: {0}', self.getCount()]);
            }

            editor.on('init', function () {
                var statusbar = editor.theme.panel && editor.theme.panel.find('#statusbar')[0];

                if (statusbar) {
                    window.setTimeout(function () {
                        statusbar.insert({
                            type: 'label',
                            name: 'charactercount',
                            text: ['Characters: {0}', self.getCount()],
                            classes: 'charactercount',
                            disabled: editor.settings.readonly
                        }, 0);

                        editor.on('setcontent beforeaddundo', update);

                        editor.on('keyup', function (e) {
                            update();
                        });
                    }, 0);
                }
            });

            self.getCount = function () {
                var tx = editor.getContent({ format: 'raw' });
                var decoded = decodeHtml(tx);
                var decodedStripped = decoded.replace(/(<([^>]+)>)/ig, "").trim();
                var tc = decodedStripped.length;
                return tc;
            };

            function decodeHtml(html) {
                var txt = document.createElement("textarea");
                txt.innerHTML = html;
                return txt.value;
            }
        });

    </script>

    <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Email</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <textarea id="comments">
				<p>Hi,</p>

			</textarea>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button onclick="content()" class="btn btn-primary" type="submit">Send</button>
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="textModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Text</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group" id="free_input"></div>
                        <textarea id="textcomments"></textarea>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button onclick="textcontent()" class="btn btn-primary" type="submit">Send</button>
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                </div>
            </div>
        </div>
    </div>

@endsection