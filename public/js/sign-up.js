function validateform(){  
var name=document.myform.name.value;  
var password=document.myform.password.value;  
var flag=true;
  
 if (name==null || name==""){  
  Swal.fire({
  type: 'warning',
  title: 'Oops...',
  text: 'Please Enter Your Username!',
 
}) 
 flag=false; 
}
else if(password.length<6){  
  Swal.fire({
  type: 'warning',
  title: 'Oops...',
  text: 'Password Must have Minimum 6 !',
 
}) 
 flag=false;
  }else if(password.length>10){
  Swal.fire({
  type: 'warning',
  title: 'Oops...',
  text: 'Password Must have Maximum 10 !',
 
}) 
 flag=false;
 }

return flag;
}  