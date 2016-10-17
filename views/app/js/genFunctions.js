function __(id) {
  return document.getElementById(id);
}

function __tn(elem, tagName) {
  return elem.getElementsByTagName(tagName);
}

function __cn(elem, className) {
  return elem.getElementsByClassName(className);
}

function DeleteItem(contenido, url) {
  var action = window.confirm(contenido);
  if (action) {
      window.location = url;
  }
}
