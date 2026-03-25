console.log("Connected");

function analyzeText(){

let text = document.getElementById("textInput").value;
if(text.trim()===""){
    alert("Enter text first");
    return;
}
}

let charCount = text.length;
let words = text.trim().split(/\s+/);
let wordCount = words.length;
let reversed = "";
