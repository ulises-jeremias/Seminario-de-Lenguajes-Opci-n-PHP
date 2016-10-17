function contact_query(email, subj, msg) {
  email_expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var query = (email == null || email.length == 0 || !email_expr.test(email) ||
               subj == null || subj.length == 0 ||
               msg == null || msg.length == 0) ? true : false;
  return query;
}

function goContact() {
  try{
    var result,
        email = __('email').value,
        subj = __('subject').value,
        msg = __('message').value,
        query = contactquery(email, subj, msg);
    if(!query){
      result = '<div class="alert alert-dismissible alert-success">';
      result += '<h4> Enviado! :D </h4>';
      result += '</div>';
      __('_AJAX_CONTACT_').innerHTML = result;
      location.reload();
    } else {
      result = '<div class="alert alert-dismissible alert-danger">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      if( email == null || email.length == 0 || subj == null || subj.length == 0 || msg == null || msg.length == 0 ) {
        result += '<strong>ERROR:</strong> Los campos [email, subject, message] deben estar llenos.';
      } else {
        result += '<strong>ERROR:</strong> Email contiene caracteres inválidos';
      }
      result += '</div>';
      __('_AJAX_CONTACT_').innerHTML = result;
    }
  } catch(error) {
      alert(error.message);
  }
}

function runScriptContact(e) {
  if(e.keyCode == 13) {
    goContact();
  }
}
