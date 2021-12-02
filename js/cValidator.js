function validateForm() {
    //validatefirst name
    var fname = document.forms["clientReg"]["fname"].value;
    if (fname == null || fname == "") {
        alert("Enter First Name");
        return false;
    }else{
        var regex = /^[a-zA-Z\s]+$/;
        if(regex.test(fname)===false){
            alert("please enter valid first name");
            return false;
        }
    }
//validate last name
    var lname = document.forms["clientReg"]["lname"].value;
    if (lname == null || lname == "") {
        alert("Enter last Name");
        return false;
    }else{
        var regex = /^[a-zA-Z\s]+$/;
        if(regex.test(lname)===false){
            alert("please enter valid lastname");
            return false;
        }
    }
    //validate gender
    var gender = document.forms["clientReg"]["gender"].value;
    if (gender == null || gender == "") {
        alert("Please select gender");
        return false;
    
    }

//validate phone number
var phone = document.forms["clientReg"]["phone"].value;
if(phone == null || phone == ""){
    alert("please enter phone number");
return false;
}else{
    var regex = /^[0-9]\d{9}$/;
        if(regex.test(phone) === false){
        alert("Please enter valid number");
        return false;
}
}



}
