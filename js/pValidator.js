function validatePaymentsForm() {
    //validatefirst name
    var cost = document.forms["clientReg"]["cost"].value;
    if (cost == null || cost == "") {
        alert("Enter cost");
        return false;
        }
//validate last name
    var diposit = document.forms["clientReg"]["diposit"].value;
    if (diposit == null || diposit == "") {
        alert("Enter diposit");
        return false;
    }

var method = document.forms["clientReg"]["method"].value;
if(method == null || method == ""){

    alert("Please select payment mode");
    return false;
}

}




