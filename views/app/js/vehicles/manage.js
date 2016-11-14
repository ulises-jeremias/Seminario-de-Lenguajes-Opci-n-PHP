(function() {
  var umd_form = document.umd_form,
      nodeList = umd_form.elements;

  //Functions

  var validateInputs = function() {
    for (var i = 0; i < nodeList.length; i++) {
      if (nodeList[i].type == "text" || nodeList[i].type == "email" || nodeList[i].type == "password") {
        if (nodeList[i].value == 0) {
          console.log('El campo ' + nodeList[i].name + ' debe estar lleno');
          nodeList[i].className += " umd_error";
          return false;
        } else {
          nodeList[i].className = nodeList[i].className.replace(" umd_error","");
        }
      }
    }
    return true;
  };

  var manage_query = function() {
    var price = __('price').value,
        year = __('year').value,
        characts = __('idCharact[]'),
        type = __('idType').value,
        model = __('idModel').value
        image = __('image').value;

    if (isNaN(price) || isNaN(year)) {
      console.log('Price and Year should be numbers');
      return false;
    } else if (type == "blank" || model == "blank") {
      console.log('type and model are null');
      return false;
    } else if (characts.selectedIndex == -1) {
      console.log('No characteristics selected');
      return false;
    } else if (image.value == "") {
      console.log('No image uploaded');
      alert('No image uploaded');
      return false;
    } else {
      return true;
    }
  }

  var send = function(e){
    if (!validateInputs()) {
      console.log('Inputs were not validated');
      e.preventDefault();
    /*
    } else if (!validateRadios()) {
      console.log('Radios were not validated');
      e.preventDefault();
    } else if (!validateCheckbox()) {
      console.log('Checkboxes were not validated');
      e.preventDefault();
    */
    } else if (!manage_query()) {
      console.log('Inputs were not validated');
      e.preventDefault();
    }
  };

  //Focus & Blur Functions
  var focusInput = function() {
    this.parentElement.children[1].className = "umd_label umd_active";
    this.parentElement.children[0].className = this.parentElement.children[0].className.replace("error", "");
  };

  var blurInput = function() {
    if (this.value.length <= 0) {
      this.parentElement.children[1].className = "umd_label";
      this.parentElement.children[0].className += " umd_error";
    }
  };

  //Events
  umd_form.addEventListener("submit", send);

  for (var i = 0; i < nodeList.length; i++) {
    if (nodeList[i].type == "text" || nodeList[i].type == "email" || nodeList[i].type == "password"){
      nodeList[i].addEventListener("focus", focusInput);
      nodeList[i].addEventListener("blur", blurInput);
    }
  }

  for (var i = 0; i < nodeList.length; i++) {
    if (nodeList[i].type == "text" || nodeList[i].type == "email" || nodeList[i].type == "password"){
      if (nodeList[i].value.length > 0) {
        nodeList[i].parentElement.children[1].className = "umd_label umd_active";
        nodeList[i].parentElement.children[0].className = nodeList[i].parentElement.children[0].className.replace("error", "");
      }
    }
  }
}());
