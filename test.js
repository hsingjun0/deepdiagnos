
function allLetter(){
  var ufname = document.getElementById('reg_first_name').value;
  var letters = /^[A-Za-z]+$/;
  alert('get here');
  if(uname.value.match(letters)){
    //return true;
  }
  else
  {
    alert('First/Last name must be alphabet characters only');
    uname.focus();
    //return false; 
  }
}

