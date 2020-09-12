var chosenContainer;
var chosenSearchInput;
var chosenOptions;
var chosenChoices;
var choicesAry
var form;

window.addEventListener('load', function () {
  chosenContainer = document.getElementById("chosen-container");
  chosenSearchInput = document.getElementById("chosen-search-input");
  chosenOptions = document.getElementById("chosen-results");
  chosenChoices = document.getElementById("chosen-choices");
  choicesAry = [];
  form = document.getElementById("form");

  chosenContainer.addEventListener("click", goToInput);
  chosenSearchInput.addEventListener("keyup", getComponents);
  chosenSearchInput.addEventListener("keydown", removeLastChoice);
  form.addEventListener("keydown", preventEnter);
});

function goToInput() {
  chosenSearchInput.focus();
}

function getComponents() {
  if(this.value.length == 0 || this.value == " ") {
    chosenOptions.innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      if(this.responseText.length == 0) {
        chosenOptions.innerHTML = "";
        return;
      }
      console.log("Response text: " + this.responseText);
      var response = JSON.parse(this.responseText);
        fillDropdown(response);
      }
    };
    xmlhttp.open("POST", "ajax?namepart=" + this.value, true);
    xmlhttp.send();
  }
}

function fillDropdown(array) {

  chosenOptions.innerHTML = "";
  for(var item of array) {
    if(!choicesAry.includes(item)) {
      var li = document.createElement("li");
      li.appendChild(document.createTextNode(item));
      li.setAttribute("onclick", "addToChoices(this.innerHTML)");
      chosenOptions.appendChild(li);
    }
  }
}

function addToChoices(str) {
  var i = document.createElement("i");
  i.setAttribute("class", "material-icons");
  i.setAttribute("onclick", "removeChoice(this.parentNode)");
  i.appendChild(document.createTextNode("clear"));

  var span = document.createElement("span");
  span.appendChild(document.createTextNode(str));

  var li = document.createElement("li");
  li.setAttribute("class", "search-choice");
  li.appendChild(span);
  li.appendChild(i);

  var numNodes = chosenChoices.children.length;
  chosenChoices.insertBefore(li, chosenChoices.children[numNodes - 1]);
  chosenSearchInput.value = "";
  chosenOptions.innerHTML = "";
  choicesAry.push(str);
  goToInput();
}

function removeChoice(choice) {
  var elemString = choice.childNodes[0].innerHTML;
  choicesAry.splice(choicesAry.indexOf(elemString), 1);
  choice.parentNode.removeChild(choice);
}

function removeLastChoice(e) {
  if(this.value.length == 0 && e.key == "Backspace" && choicesAry.length > 0) {
    choicesAry.pop();
    chosenChoices.removeChild(chosenChoices.children[chosenChoices.children.length - 2]);
  }
}

function preventEnter(e) {
  if(e.key == "Enter") {
    e.preventDefault();
  }
}
