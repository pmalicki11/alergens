function goToInput() {
  document.getElementById("chosen-search-input").focus();
  document.getElementById("chosen-search-input").select();
}


function getComponents(str) {
  var ul = document.getElementById("chosen-results");
  if(str.length == 0 || str == " ") {
    ul.innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log("Response text: " + this.responseText);
        var response = JSON.parse(this.responseText);
        fillDropdown(ul, response);
      }
    };
    xmlhttp.open("POST", "ajax?namepart=" + str, true);
    xmlhttp.send();
  }
}

function fillDropdown(ul, array) {
  ul.innerHTML = "";
  for(var item of array) {
    var li = document.createElement("li");
    li.appendChild(document.createTextNode(item));
    li.setAttribute("onclick", "addToChoices(this.innerHTML)");
    ul.appendChild(li);
  }
}

function addToChoices(str) {
  var i = document.createElement("i");
  i.setAttribute("class", "material-icons");
  i.appendChild(document.createTextNode("clear"));

  var a = document.createElement("a");
  a.setAttribute("href", "#");
  a.appendChild(i);

  var span = document.createElement("span");
  span.appendChild(document.createTextNode(str));
  var li = document.createElement("li");
  li.setAttribute("class", "search-choice");
  li.appendChild(span);
  li.appendChild(a);

  var ul = document.getElementById("chosen-choices");
  var numNodes = ul.children.length;
  //ul.appendChild(li);
  ul.insertBefore(li, ul.children[numNodes - 1]);
  var inputField = document.getElementById("chosen-search-input");
  inputField.value = "";

  ul = document.getElementById("chosen-results");
  ul.innerHTML = "";
}
