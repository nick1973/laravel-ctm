/**
 * Created by Nick Ashford on 03/08/2016.
 */
$( document ).ready(function() {
    console.log( "validation!" );

    $("#checkAccount").click(function () {
        var key = 'WM74-KH86-WD91-HR24';                             //'ND12-JK18-AU87-NX29';
        var sortCode = $("#sortcode_number").val();                  //'20-26-75';
        var accountNumber = $("#account_number").val();
        //console.log(sortCode);
        BankAccountValidation_Interactive_Validate_v2_00Begin(key, accountNumber, sortCode);
        //'12345678';
        // if( !sortCode.trim() || !accountNumber.trim())
        // {
        //     console.log("Fail");
        //     alert("BankAccountValidation Failed");
        // }
        // else {
        //     BankAccountValidation_Interactive_Validate_v2_00Begin(key, accountNumber, sortCode);
        //     //console.log("Pass");
        //     //$( "#addressForm" ).submit();
        // }
    });
});


function BankAccountValidation_Interactive_Validate_v2_00Begin(Key, AccountNumber, SortCode) {
    var script = document.createElement("script"),
        head = document.getElementsByTagName("head")[0],
        url = "http://services.postcodeanywhere.co.uk/BankAccountValidation/Interactive/Validate/v2.00/json3.ws?";

    // Build the query string
    url += "&Key=" + encodeURIComponent(Key);
    url += "&AccountNumber=" + encodeURIComponent(AccountNumber);
    url += "&SortCode=" + encodeURIComponent(SortCode);
    url += "&callback=BankAccountValidation_Interactive_Validate_v2_00End";

    script.src = url;

    // Make the request
    script.onload = script.onreadystatechange = function () {
        if (!this.readyState || this.readyState === "loaded" || this.readyState === "complete") {
            script.onload = script.onreadystatechange = null;
            if (head && script.parentNode)
                head.removeChild(script);
        }
    }

    head.insertBefore(script, head.firstChild);
}

function BankAccountValidation_Interactive_Validate_v2_00End(response) {
    // Test for an error
    if (response.Items.length == 1 && typeof(response.Items[0].Error) != "undefined") {
        // Show the error message
        alert(response.Items[0].Description);
    }
    else {
        // Check if there were any items found
        if (response.Items.length == 0)
            alert("Sorry, there were no results");
        else {
            $( "#addressForm" ).submit();
            // PUT YOUR CODE HERE
            //FYI: The output is an array of key value pairs (e.g. response.Items[0].IsCorrect), the keys being:
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
}

// function BankAccountValidation_Interactive_Validate_v2_00(Key, AccountNumber, SortCode) {
//     $.getJSON("https://services.postcodeanywhere.co.uk/BankAccountValidation/Interactive/Validate/v2.00/json3.ws?callback=?",
//         {
//             Key: Key,
//             AccountNumber: AccountNumber,
//             SortCode: SortCode
//         },
//         function (data) {
//             // Test for an error
//             if (data.Items.length == 1 && typeof(data.Items[0].Error) != "undefined") {
//                 // Show the error message
//                 alert(data.Items[0].Description);
//             }
//             else {
//                 // Check if there were any items found
//                 if (data.Items.length == 0)
//                     alert("Sorry, there were no results");
//                 else {
//                     $( "#addressForm" ).submit();
//                     // PUT YOUR CODE HERE
//                     //FYI: The output is a JS object (e.g. data.Items[0].IsCorrect), the keys being:
//                     //IsCorrect
//                     //IsDirectDebitCapable
//                     //StatusInformation
//                     //CorrectedSortCode
//                     //CorrectedAccountNumber
//                     //IBAN
//                     //Bank
//                     //BankBIC
//                     //Branch
//                     //BranchBIC
//                     //ContactAddressLine1
//                     //ContactAddressLine2
//                     //ContactPostTown
//                     //ContactPostcode
//                     //ContactPhone
//                     //ContactFax
//                     //FasterPaymentsSupported
//                     //CHAPSSupported
//                 }
//             }
//         });
// }