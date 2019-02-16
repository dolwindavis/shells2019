function validateform(){  
var name=document.myform.name.value;  
var x=document.myform.email.value;  
var atposition=x.indexOf("@");  
var dotposition=x.lastIndexOf(".");
var phoneno=document.myform.phoneno.value;  
var password=document.myform.password.value;  
var flag=true;


if (name==null || name==""){  
  Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'Please Enter College Name!',
 
}) 
 flag=false;
}
else if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
  Swal.fire({
  type: 'warning',
  title: 'Oops...',
  text: 'Please Enter A Vaild E-mail Address!',
 
}) 
 flag=false; 
  } 

else if(phoneno.length<10){
        Swal.fire({
  type: 'warning',
  title: 'Oops...',
  text: 'Please Enter Your Phone Number!',
 
})    
flag=false;
  }else if(phoneno.length>10){
   Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'Please Enter Only 10 Number',
 
}) 
 flag=false;
        }

else if(password.length<6){  
   Swal.fire({
  type: 'warning',
  title: 'Oops...',
  text: 'Password Must Contain Minimum 6 Characters !',
 
}) 
 flag=false; 
  }else if(password.length>10){
  Swal.fire({
  type: 'warning',
  title: 'Oops...',
  text: 'Password Must have Maximum 10 Characters!',
 
}) 
 flag=false;
}

 return flag;
}  





