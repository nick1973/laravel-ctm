<script>
    $(function(){

//        $(".name").each(function(){
//            $(this)[0].onclick();
//        })


//
//        var arrText= $("input[name^='name']").map(function(){
//            return this.value;
//        }).get();

        window.searchLastName = function searchLastName(att) {
            var tableId = $(att).closest('table').attr('id')
            $(function() {
                $(att).autocomplete({
                    source: function (request, response) {
                        $.ajax({
                            url: "/staffname",
                            type: "GET",
                            dataType: "json",
                            data: {
                                term: $(att).val()
                            },
                            success: function (data) {
                                var array = $.map(data, function (item) {
                                    return {
                                        id: item.id,
                                        value: item.lastname,
                                        label: item.name + ' ' + item.lastname,
                                        name: item.name,
                                        lastname: item.lastname,
                                        mobile: item.mobile,
                                        email: item.email,
                                        uk_driving_license: item.uk_driving_license,
                                        medical_conditions: item.medical_conditions,
                                        rtw_dirty: item.rtw_dirty,
                                        dob: item.dob,
                                    };
                                });
                                //call the filter here
                                response($.ui.autocomplete.filter(array, request.term));
                            }
                        });
                    },
                    select: function (event, ui) {
                        $(att).val(ui.item.name);
                        if($(att).hasClass('hasID')){
                            var lastChar = $(att).get(0).id.substr($(att).get(0).id.length - 1); // => "1"
                            //console.log(lastChar)
                            loadStaffWithId(att, ui, lastChar)
                        } else {
                            loadStaff(att, ui)
                        }
                        //addNote()
                    },
                    minLength: 0

                })
            })
        }


        window.searchName = function searchName(att) {
            var tableId = $(att).closest('table').attr('id')
            //console.log(att)
            $(function() {
                $(att).autocomplete({
                    source: function (request, response) {
                        $.ajax({
                            url: "/staffname",
                            type: "GET",
                            dataType: "json",
                            data: {
                                term: $(att).val()
                            },
                            success: function (data) {
                                var array = $.map(data, function (item) {
                                    return {
                                        id: item.id,
                                        value: item.name,
                                        label: item.name + ' ' + item.lastname,
                                        name: item.name,
                                        lastname: item.lastname,
                                        mobile: item.mobile,
                                        email: item.email,
                                        uk_driving_license: item.uk_driving_license,
                                        medical_conditions: item.medical_conditions,
                                        rtw_dirty: item.rtw_dirty,
                                        dob: item.dob,
                                    };
                                });
                                //call the filter here
                                response($.ui.autocomplete.filter(array, request.term));
                            }
                        });
                    },
                    select: function (event, ui) {
                        $(att).val(ui.item.name);
                        if($(att).hasClass('hasID')){
                            var lastChar = $(att).get(0).id.substr($(att).get(0).id.length - 1); // => "1"
                            //console.log(lastChar)
                            loadStaffWithId(att, ui, lastChar)
                        } else {
                            var lastChar = $(att).get(0).id.substr($(att).get(0).id);
                            var matches = parseInt(lastChar.match(/(\d+)$/)[0], 10);
                            //console.log("att: " + att)
                            loadStaff(att, ui, matches)
                        }

                    },
                    minLength: 0

                })
            })
        }

        window.getId = function getId(id) {
            fetchData()
            var tableId = $(id).closest('table').attr('id')
            var first_name = $(id).attr('id',tableId+'first_name')
            var count = 1
            $('#'+tableId).find('td').each(function(i, el) {
                var inputEl = $(el).children().get(0)
                var input = $(inputEl).hasClass('noID')
                if(input){
                    $(inputEl).attr('id',tableId+'_staff'+count)
                }
                count++
            })

            //rowID()
            return true
        }

        window.loadStaffWithId = function loadStaffWithId(item, result, num) {
            var tableId = $(item).closest('table').attr('id')
            var input = $('#'+tableId+'_Last_name');
            input.val(result.item.name);
            input.trigger('input');
            /////////////////////////
            var input = $('#'+tableId+'_Last_name'+num);
            input.val(result.item.lastname);
            input.trigger('input');
            /////////////////////////
            var input2 = $('#'+tableId+'_driver'+num);
            input2.val(result.item.uk_driving_license);
            input2.trigger('input');
            /////////////////////////
            var input3 = $('#'+tableId+'_mobile'+num);
            input3.val(result.item.mobile);
            input3.trigger('input');
            //////////////////////////////////
            var input3 = $('#'+tableId+'_email'+num);
            input3.val(result.item.email);
            input3.trigger('input');
            //////////////////////////////////
            var input3 = $('#'+tableId+'_rtw'+num);
            if(result.item.rtw_dirty.length > 0){
                var rtw = jQuery.parseJSON(result.item.rtw_dirty);
                input3.val(rtw.work_status);
                input3.trigger('input');
            }
            //////////////////////////////////
            var input3 = $('#'+tableId+'_medical'+num);
            input3.val(result.item.medical_conditions);
            input3.trigger('input');
            //////////////////////////////////
            var input3 = $('#'+tableId+'_age'+num);
            input3.val(ifAge(result.item.dob))
            input3.trigger('input');
            //////////////////////////////////
            var input3 = $('#'+tableId+'_id'+num);
            input3.val(result.item.id);
            input3.trigger('input');
            //////////////////////////////////
            days(item, result)

            addNote()
        };

        window.loadStaff = function loadStaff(item, result, num) {
            var tableId = $(item).closest('table').attr('id')
            var input = $('#'+tableId+'_staff'+num);
            input.val(result.item.name);
            input.trigger('input');
            num++
            /////////////////////////
            var input = $('#'+tableId+'_staff'+num);
            input.val(result.item.lastname);
            input.trigger('input');
            num++
            /////////////////////////
            var input2 = $('#'+tableId+'_staff'+num);
            input2.val(result.item.uk_driving_license);
            input2.trigger('input');
            num++
            /////////////////////////
            var input3 = $('#'+tableId+'_staff'+num);
            input3.val(result.item.mobile);
            input3.trigger('input');
            num++
            //////////////////////////////////
            var input3 = $('#'+tableId+'_staff'+num);
            input3.val(result.item.email);
            input3.trigger('input');
            num++
            //////////////////////////////////
            var input3 = $('#'+tableId+'_staff'+num);
            if(result.item.rtw_dirty.length > 0){
                var rtw = jQuery.parseJSON(result.item.rtw_dirty);
                input3.val(rtw.work_status);
                input3.trigger('input');
            }
            num++
            //////////////////////////////////
            var input3 = $('#'+tableId+'_staff'+num);
            input3.val(result.item.medical_conditions);
            input3.trigger('input');
            num++
            //////////////////////////////////
            var input3 = $('#'+tableId+'_staff'+num);
            input3.val(ifAge(result.item.dob))
            input3.trigger('input');
            num++
            //////////////////////////////////
            var input3 = $('#'+tableId+'_staff'+num);
            input3.val(result.item.id);
            input3.trigger('input');
            num++
            //////////////////////////////////
            var rowNo = tableId.match(/\d+/)
            var input3 = $('#'+tableId+'_staff'+num);
            input3.val(rowNo);
            input3.trigger('input');
            ////////////////////////////
            //console.log(result.item.id)

            days(item, result)
            addNote()
        };

        window.ifAge = function ifAge(isAge) {
            var dob = isAge
            var month = Number(dob.substr(5,2));
            var day = Number(dob.substr(8,2));
            var year = Number(dob.substr(0,4));
            var age = 18;
            var age2 = 25;
            var mydate = new Date();
            mydate.setFullYear(year, month-1, day);
            var currdate = new Date();
            var setDate = new Date();
            var eighteen = setDate.setFullYear(mydate.getFullYear() + age,month-1, day);
            var twentyFive = setDate.setFullYear(mydate.getFullYear() + age2,month-1, day);
            if ((currdate - eighteen) > 0 && (currdate - twentyFive) < 0){
                // you are above 18
                return 'over 18'
            }
            else if((currdate - twentyFive) > 0){
                // you are above 25
                return 'over 25'
            }
            else{
                return 'Under 18'
            }
        }

        window.daysSplit = function daysSplit(obj) {
            //var val = $(obj).closest("tr").find('td:eq(0)').find('select option').length
            $(obj).closest("tr").find('td:eq(0)').find('select').removeAttr('multiple')
            var value = $(obj).closest("tr").find('td:eq(0)').find('select option:selected').text()
            if(value.includes('staff')){
                if (value.indexOf(',') > -1) {
                    var staff = value.split(',')
                    console.log(staff[0])
                }
            }

        }

        window.days = function days(obj, result) {
            var voo = $(obj).closest("tr").find('td:eq(0)').find('select option:selected').length
            var val = $(obj).closest("tr").find('td:eq(0)').find('select option:selected').text()
            var foo = 'staff' + result.item.id + ',' + val
            if(voo>1){
                var boo = $(obj).closest("tr").find('td:eq(0)').find('select option:selected').remove()
                var doo = $(obj).closest("tr").find('td:eq(0)').find('select').append($("<option></option>")
                        .attr("value",foo)
                        .prop("selected", true)
                        .text(foo)
                );
            } else {
                $(obj).closest("tr").find('td:eq(0)').find('select option:selected').val(foo)
            }
        }

        window.saveDays = function saveDays(obj) {
            var voo = $(obj).closest("tr").find('td:eq(0)').find('select option:selected').length
            var val = $(obj).closest("tr").find('td:eq(0)').find('select option:selected').text()
            var user_id = $(obj).closest("tr").find('td:eq(12)').find('input').val()
            console.log('user ID '+user_id)
            var foo = 'staff' + user_id + ',' + val
            if(voo>1){
                var boo = $(obj).closest("tr").find('td:eq(0)').find('select option:selected').remove()
                var doo = $(obj).closest("tr").find('td:eq(0)').find('select').append($("<option></option>")
                        .attr("value",foo)
                        .prop("selected", true)
                        .text(foo)
                );
            } else {
                $(obj).closest("tr").find('td:eq(0)').find('select option:selected').val(foo)
            }
            addNote()
        }
    });
</script>