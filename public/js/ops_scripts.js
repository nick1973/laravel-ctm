/**
 * Created by Nick Ashford on 25/05/2017.
 */
function editTabs(value) {
    if(value.checked){
        $(".existingTabs").append('<input type="text" class="form-control '+$(value).val()+'" required>').hide().fadeIn()
    } else {
        $(".existingTabs").find('input.'+$(value).val()).fadeOut(400, function () {
            $(this).remove()
        })
    }
}

$(function() {
    $('#tabsModalEdit').on('show.bs.modal', function (e) {
        $(".existingTabs").find('.checkbox').remove()
        $("#tabs").find('li').find('a').each(function(n, i) {
            var href = this.href;
            var tabs = (href.split("#").pop())
            if(tabs!="event_summary") {
                $(".existingTabs").append('<div class="checkbox">' +
                    '<label>' +
                    '<input onchange="editTabs(this)" type="checkbox" name="' + tabs + '" value="' + tabs + '"> ' +
                    tabs +
                    '</label> ' +
                    '</div>')
            }
        });
    })

    $('#tabsModalRemove').on('show.bs.modal', function (e) {
        $(".existingTabs").find('.checkbox').remove()
        $("#tabs").find('li').find('a').each(function(n, i) {
            var href = this.href;
            var tabs = (href.split("#").pop())
            //console.log(tabs)
            if(tabs!="event_summary"){
                $(".existingTabs").append('<div class="checkbox">' +
                    '<label>' +
                    '<input type="checkbox" name="'+tabs+'" value="'+tabs+'"> ' +
                    tabs +
                    '</label> ' +
                    '</div>')
            }
        });
    })

    $('#form_modal_tabs_edit').on('submit', function(event){
        event.preventDefault();
        var boo = $(this).find("input:checked").val()
        var inputVal = $(this).find("input."+boo).val()
        console.log(inputVal)
        if(duplicateTabs(inputVal, true) && inputVal != '') {
            //changes text but need to change both text and href
            //$("#tabs").find('li .csas').prop("href", "#"+inputVal)
            $("#tabs").find('li').find('a[href$="'+boo+'"]').text(inputVal).attr("href", "#"+inputVal.toLowerCase())
                .closest('li').removeClass().addClass(inputVal.toLowerCase())
            //change the modal id to match the tab.
            $("#"+boo).attr('id', inputVal.toLowerCase())
        } else {

        }
        $(".existingTabs").find('input[type$="text"]').remove()
        $('#tabsModalEdit').modal('hide')
        save_tabs()
    });

    $('#form_modal_tabs_remove').on('submit', function(event){
        event.preventDefault();
        var boo = $(this).find("input:checked").val()
        console.log(boo)
//            if(boo == 'spec') {
//                alert("Can't remove this tab, but you can edit it!")
//                $('#tabsModalRemove').modal('hide')
//            } else {
        $("#tabs").find('li.'+boo).remove()
        $(".tab-content").find('#'+boo).remove()
        $('#tabsModalRemove').modal('hide')
//            }
        save_tabs()
    });

    $('#form_modal_tabs').on('submit', function(event){
        event.preventDefault();
        duplicateTabs($(this).find('input[name="new_text"]').val())
        console.log('fired')
        $('#tabsModal').modal('hide')
    });

    function addTab(name) {
        $("#tabs").append('<li class="'+name.toLowerCase()+'" role="presentation">' +
            '<a href="#'+name.toLowerCase()+'" aria-controls="'+name.toLowerCase()+'" role="tab" data-toggle="tab">'+name+'</a>' +
            '</li>')
        //Clone the 3 tabs and rename accordingly
        var clone_tabs = $('#extra_tab').clone();
        $('#three_tabs').append(clone_tabs);
        //alter the a href name dynamically
        $('#three_tabs > div:last').attr('id', name.toLowerCase())
        $('#three_tabs > div:last ul li a:eq(0)').attr('href', '#'+name.toLowerCase()+'_summary')
        $('#three_tabs > div:last ul li a:eq(1)').attr('href', '#'+name.toLowerCase()+'_spec')
        $('#three_tabs > div:last ul li a:eq(2)').attr('href', '#'+name.toLowerCase()+'_costs')
        //alter the div id's name dynamically
        $('#three_tabs > div:last .tab-content > div:eq(0)').attr('id', name.toLowerCase()+'_summary')
        $('#three_tabs > div:last .tab-content > div:eq(1)').attr('id', name.toLowerCase()+'_spec')
        $('#three_tabs > div:last .tab-content > div:eq(2)').attr('id', name+'_costs')
        save_tabs()
    }

    function duplicateTabs(input, edit=false) {
        console.log('INPUT '+input)
        var tabs = []
        $("#tabs").find('li').find('a').each(function(n, i) {
            var href = this.href;
            //console.log(href)
            tabs.push(href.split("#").pop())
        });
        var foo = $.inArray( input.toLowerCase(), tabs );
        console.log(tabs)
        if(foo=='-1'){
            if(edit==false){
                addTab(input)
            }
        } else {
            alert(input + ' Already Exists!')
            return false
        }
        return true
    }
})

function clearRow() {
    var $tr    = $('#firstTable').find('.highlighted')
    $tr.find(':text').val('');
    var $tr    = $('#days').find('.highlighted')
    $tr.find(':text').val('');
}

function copyRow() {
    var $tr    = $('#firstTable').find('.highlighted')//.css('background-color', 'yellow')
    var $clone_roles = $tr.clone();
    var $tr_days    = $('#days').find('tr.tr_clone.highlighted')
    var $clone_days = $tr_days.clone();
    $clone_roles.find('td:eq(1)').find('input:checkbox').removeAttr('checked')
    $clone_roles.removeClass('highlighted')
    $clone_days.removeClass('highlighted')
    $tr.after($clone_roles);
    $tr_days.after($clone_days);
}

function addRows(el) {
    var $tr    = $(el).closest('.tr_clone');
    var $clone = $tr.clone();
    var $trt    = $('#days').find('tr.tr_clone:first-child')
    //var $trt    = $('#days').find('tr.tr_clone.highlighted')
    var $clonet = $trt.clone();
    $clone.find(':text').val('');
    var foo = $clone.find('td:eq(1)')
    $tr.after($clone);
    $trt.after($clonet);
    //console.log(num)
};

function check(el) {
    var index = $(el).closest('tr').index();
    console.log(index)
    if ($(el).is(":checked")) {
        $(el).closest('tr').addClass("highlighted");
        $('#days').find('tr.tr_clone:eq('+index+')').addClass("highlighted")
    } else {
        $(el).closest('tr').removeClass("highlighted")
        $('#days').find('tr.tr_clone:eq('+index+')').removeClass("highlighted")
    }
}

function removeTableRow() {
    $('.highlighted').remove()
}