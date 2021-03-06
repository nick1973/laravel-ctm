<script>
    /**
     * Created by Nick Ashford on 03/08/2016.
     */
    $( document ).ready(function() {
        console.log( "ready!" );

        $("#checkAccount").click(function () {
            var key = <?php env('PCAPREDICT_API_KEY') ?>;                             //'ND12-JK18-AU87-NX29';
            var sortCode = $("#sortcode_number").val();                  //'20-26-75';
            var accountNumber = $("#account_number").val();              //'12345678';
            if( !sortCode.trim() || !accountNumber.trim())
            {
                console.log("Fail");
                alert("BankAccountValidation Failed");
            }
            else {
                console.log("Pass");
                //$( "#addressForm" ).submit();
                BankAccountValidation_Interactive_Validate_v2_00(key, accountNumber, sortCode);
            }
        });
    });

    function BankAccountValidation_Interactive_Validate_v2_00(Key, AccountNumber, SortCode) {
        $.getJSON("https://services.postcodeanywhere.co.uk/BankAccountValidation/Interactive/Validate/v2.00/json3.ws?callback=?",
            {
                Key: Key,
                AccountNumber: AccountNumber,
                SortCode: SortCode
            },
            function (data) {
                // Test for an error
                if (data.Items.length == 1 && typeof(data.Items[0].Error) != "undefined") {
                    // Show the error message
                    alert(data.Items[0].Description);
                }
                else {
                    // Check if there were any items found
                    if (data.Items.length == 0)
                        alert("Sorry, there were no results");
                    else {
                        $( "#addressForm" ).submit();
                        // PUT YOUR CODE HERE
                        //FYI: The output is a JS object (e.g. data.Items[0].IsCorrect), the keys being:
                        //IsCorrect
                        //IsDirectDebitCapable
                        //StatusInformation
                        //CorrectedSortCode
                        //CorrectedAccountNumber
                        //IBAN
                        //Bank
                        //BankBIC
                        //Branch
                        //BranchBIC
                        //ContactAddressLine1
                        //ContactAddressLine2
                        //ContactPostTown
                        //ContactPostcode
                        //ContactPhone
                        //ContactFax
                        //FasterPaymentsSupported
                        //CHAPSSupported
                    }
                }
            });
    }
</script>