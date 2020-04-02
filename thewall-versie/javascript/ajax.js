let question = document.getElementById("question");
let textHint = document.getElementById("txtHint");
let modaalContent;
let modaalLength;
let modaalButton;
let teller;
let modaalButtonArray = [];
window.addEventListener("load", event => {
  ajax();
});
question.addEventListener("keyup", event => {
  ajax(question.value);
});

function ajax(q = "") {
  clear();
  let ajaxUrl = "getdata.php?q=" + q;
  if (q == "") {
    clear();
    ajaxUrl = "getdata2.php";
  }
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      txtHint.innerHTML = this.responseText;
      //Modaal
      modaalContent = document.querySelectorAll(".modaal");
      modaalButton = document.querySelectorAll(".modaalButton");
      modaalLength = modaalContent.length;
      for (var i = 0; i < modaalLength; i++) {
        let modaalNode = modaalContent[i];
        modaalNode.parentNode.removeChild(modaalNode);
      }
      for (var i = 0; i < modaalButton.length; i++) {
        modaalButtonArray.push(modaalButton[i]);
        modaalButton[i].addEventListener("click", voegInhoudToe);
      }
    }
  };
  xmlhttp.open("GET", ajaxUrl, true);
  xmlhttp.send();
}
let modaalAchtergrond = document.createElement("div");
modaalAchtergrond.className = "modaalAchtergrond";
let modaal = document.createElement("div");
modaal.className = "modaalContent";
let sluitButton = document.createElement("button");
sluitButton.className = "sluitButton hvr-grow";
sluitButton.innerHTML = "&#x00D7;";
function voegInhoudToe(event) {
  teller = modaalButtonArray.indexOf(event.target);
  console.log(teller);
  modaal.appendChild(sluitButton);
  modaal.appendChild(modaalContent[teller]);
  modaalAchtergrond.appendChild(modaal);
  document.body.appendChild(modaalAchtergrond);
}
const sluitModaal = () => {
  modaal.innerHTML = "";
  modaalAchtergrond.innerHTML = "";
  document.body.removeChild(modaalAchtergrond);
};
function clear(){
  modaalButtonArray.length = 0;
  teller = 0;
}
sluitButton.addEventListener("click", sluitModaal);
