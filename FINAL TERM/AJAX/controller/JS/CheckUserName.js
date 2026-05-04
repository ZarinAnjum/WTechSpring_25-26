function CheckUserName()    {}
    let userName = document.getElementById("name").value;
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("msg").innerHTML = this.responseText;
        }
    else{
        document.getElementById("userresponse").innerHTML = this.status;
    }
    xhttp.open("POST", "../Controller/CheckUserName.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}