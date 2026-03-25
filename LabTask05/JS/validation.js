console.log("Connected");

function analyzeText(){

let text = document.getElementById("textInput").value;
if(text.trim()===""){
    alert("Enter text first");
    return;
}

let charCount=text.length;
let words=text.trim().split(/\s+/);
let wordCount=words.length;
let reversed="";

for(let i=text.length-1; i>=0; i--){
    reversed=reversed+text[i];
}

document.getElementById("charCount").innerText = charCount;
document.getElementById("wordCount").innerText = wordCount;
document.getElementById("reversedText").innerText = reversed;
}