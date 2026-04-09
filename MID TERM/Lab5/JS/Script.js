console.log("Connected");

let clickcount = 0;

function get_fname()
{
    let fname = document.getElementById("fname").value;
    console.log(fname);
    return fname;
}

function get_lname()
{
    let lname = document.getElementById("lname").value;
    console.log(lname);
    return lname;
}

function get_email()
{
    let email = document.getElementById("email").value;
    console.log(email);
    return email;
}

function get_phone()
{
    let phone = document.getElementById("phone").value;
    console.log(phone);
    return phone;
}

function get_message()
{
    let message = document.getElementById("message").value;
    console.log(message);
    return message;
}

function collect_data()
{
    clickcount++;

    let fname = get_fname();
    let lname = get_lname();
    let email = get_email();
    let phone = get_phone();
    let message = get_message();

    if(fname=="" || lname=="" || email=="" || phone=="" || message=="")
    {
        alert("Field Value need to be filled up");
        return false;
    }

    console.log("First Name:", fname);
    console.log("Last Name:", lname);
    console.log("Email:", email);
    console.log("Phone:", phone);
    console.log("Message:", message);

    document.getElementById("submitdata").innerHTML = "Data Submit: " + clickcount;

    return false;
}