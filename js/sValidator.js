function validateSongsForm() {
//validate category
var category = document.forms["clientReg"]["category"].value;
if (category == null || category == "") {
    alert("Please select category");
    return false;
}
//validate song type
var type = document.forms["clientReg"]["type"].value;
if (type == null || type == "") {
    alert("Please select song type");
    return false;

}
//validate title
var title=document.forms["clientReg"]["title"].value;
if(title == null|| title==""){
    alert("Please enter song tittle");
    return false;
}else{
    var regex = /^[a-zA-Z\s]+$/;//ensure no integers are used
    if(regex.test(title)===false){
        alert("Please enter a valid tittle");
        return false;
    }
}
}