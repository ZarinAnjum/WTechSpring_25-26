console.log("HTML Page Are Connected");
//alert("HTML Page Are Connected");


var a = 120; 
let b = 245.98756466;
let c = a+b;
console.log("Sum of C", c);

if(a<0)
{
    a++;
    c-a;
    b=a;
    console.log(b);
}
else if(a>0 && a<150)
{
    b++;
    console.log(b);
}
var name= "AIUB";
var name = 'BUET';
console.log(name);

function collect_data()
{
    let Pname = document.getElementById("PatientName").value;
    console.log(Pname);


    let Page= document.getElementById("Age").value;
    console.log(Page);

    let dob= document.getElementById("DOB").value;
    alert(dob);

    return false;
}