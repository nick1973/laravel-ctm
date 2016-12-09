<div role="tabpanel" class="tab-pane" id="money">
    <table class="table table-striped table-hover table-bordered dashboard-table">
        <tr>
            <th>{{ trans('labels.general.actions') }}</th>
            <td>
                {{ link_to_route('frontend.user.profile.edit_money', trans('labels.frontend.user.profile.edit_information'), [], ['class' => 'btn btn-primary btn-sm']) }}
            </td>
        </tr>
        <tr>
            <th>Account Holder's Name</th>
            <td class="account">{{ $user->account_name }}</td>
        </tr>
        <tr>
            <th>Account Number</th>
            <td class="account">{{ $user->account_number }}</td>
        </tr>
        <tr>
            <th>Sort Code</th>
            <td class="account">{{ $user->account_sort_code }}</td>
        </tr>
        <tr>
            <th>National Insurance Number</th>
            <td class="account">{{ $user->ni_number }}</td>
        </tr>
    </table>

    @if($user->job_status=='A')
        <div class="well">
            <h4>Work Status</h4>
            <p>This is my first job since last 6 April and I have not been receiving taxable Jobseeker's Allowance,
                Employment and Support Allowance or taxable Incapacity Benefit or a state or occupational pension.</p>
        </div>
    @endif
    @if($user->job_status=='B')
        <div class="well">
            <h4>Work Status</h4>
            <p>This is now my only job, but since last 6 April I have had another job,
                or have received taxable Jobseeker's Allowance,
                Employment and Support Allowance or taxable Incapacity Benefit. I do not receive a state or occupational pension.</p>
        </div>
    @endif
    @if($user->job_status=='C')
        <div class="well">
            <h4>Work Status</h4>
            <p>I have another job or receive a state or occupational pension.</p>
        </div>
    @endif
    @if($user->student_loan=='D')
        <div class="well">
            <h4>Student Loan</h4>
            <p>you left a course of Higher Education before last 6 April and received your first Student Loan instalment on or
                after 1 September 1998 and you have not fully repaid your Student Loan.</p>
        </div>
    @endif


</div><!--tab panel address-->
<script>

    $( "td.account:empty" )
            .text( "Information Required!" )
            //.css( "background", "rgb(238,94,72)"
            .addClass('bg-danger');

    $("td.account.bg-danger").each(function(){
        if ($(this).hasClass('bg-danger')) {
            $("#account_tick").addClass('hidden');
            console.log("has Class");
        }
    });

</script>