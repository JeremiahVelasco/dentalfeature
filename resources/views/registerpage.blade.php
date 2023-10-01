<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>APD - Register</title>
        <link rel = "stylesheet" href = "registerlogin.css">
        <link rel = "icon" href = "apdicon.png">
        <script src="https://kit.fontawesome.com/b3459fa126.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
    <div class = "row">
        <form>
            <h1>Register</h1>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" aria-describedby="emailHelp">
                <small id="email-error" style="color:red"></small>
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control name-field"  id="firstname">
            </div>
            <div class="mb-3">
                <label for="middlename" class="form-label">Middle Name</label>
                <input type="text" class="form-control name-field"  id="middlename">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control name-field" id="lastname">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control name-field" id="address">
                <small id="lastname-error" style="color:red"></small>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="text" class="form-control" id="age">
                <small id="yearlevel-error"></small>
            </div>
            <div class="mb-3">
                <label for="contactno" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="contactno">
                <small id="yearlevel-error"></small>
            </div>
            <div class="mb-3">
                <label for="occupation" class="form-label">Occupation</label>
                <input type="text" class="form-control" id="occupation">
                <small id="yearlevel-error"></small>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password">
                <small id="password-error" style="color:red"></small>
            </div>
            <div class="mb-3">
                <label for="confirmpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirmpassword">
                <small id="confirmpassword-error" style="color:red"></small>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <br><br>
            <a href = "/loginpage" class="mt-2">Already have an account</a>
        </form>
    </div>



    <script>
//***********************Student Number Listeners and Functions********************************************
        //create listener on student no field
        const email=document.querySelector("#email");
        const emailErr=document.querySelector("#email-error");

        function emailExists(num){
            return new Promise(function(resolve,reject){
                $.ajax({
                    type:'GET',
                    url:'/email-exists',
                    data:{'email':email},
                    success:function(response){
                        let success=response.success
                        resolve(success);
                    },
                    error:function(error){
                        console.error("Student request error: ",error);
                        reject(error);
                    }
                });
            });
        } 
        function validateEmail(num) {
            if (!num || typeof num !== 'string') {
                emailErr.textContent = "Email is required!";
                return false;
            }
            emailExists(num)
                    .then(function(result) {
                        if (result) {
                            emailErr.textContent = "Student number exists!";
                        } else {
                            emailErr.textContent = "";
                        }
                    })
                    .catch(function(error) {
                        console.error("Error in studentNumExists:", error);
                    });
                    emailErr.textContent="";
            return true;
        }

//**********************************Name Field Listeners and Functions********************************

        //create listener on name fields
        const firstname=document.querySelector("#firstname");
        const middlename=document.querySelector("#middlename");
        const lastname=document.querySelector("#lastname");
        const address=document.querySelector("#address");
        const age=document.querySelector("#age");
        const contactno=document.querySelector("#contactno");
        const occupation=document.querySelector("#occupation");
        const firstnameErr=document.querySelector("#firstname-error");
        const lastnameErr=document.querySelector("#lastname-error");
        const addressErr=document.querySelector("#address-error");
        const ageErr=document.querySelector("#age-error");
        const contactnoErr=document.querySelector("#contactno-error");
        const occupationErr=document.querySelector("#occupation-error");
        function validateFirstname(firstname){
            if(firstname.length==0){
                firstnameErr.textContent="Firstname field is required!";
                return false;
            }
            return true;
        }
        firstname.addEventListener("keypress",(event)=>{
            var numbers=/^[0-9]+$/;
            if(event.keyCode==8 || event.keyCode==13){
                return true;
            }
            if(numbers.test(event.key)){
                event.preventDefault();
                return false;
            }
        })
        firstname.addEventListener("input",(event)=>{
            if(firstname.value===""){
                firstnameErr.textContent="";
            }
            else{
                validateFirstname(firstname.value);
            }
        });
        middlename.addEventListener("keypress",(event)=>{
            var numbers=/^[0-9]+$/;
            if(event.keyCode==8 || event.keyCode==13){
                return true;
            }
            if(numbers.test(event.key)){
                event.preventDefault();
                return false;
            }
        });
        function validateLastname(lastname){
            if(lastname.length==0){
                lastnameErr.textContent="Lastname field is required!";
                return false;
            }
            lastnameErr.textContent="";;
            return true;
        }
        lastname.addEventListener("keypress",(event)=>{
            var numbers=/^[0-9]+$/;
            if(event.keyCode==8 || event.keyCode==13){
                return true;
            }
            if(numbers.test(event.key)){
                event.preventDefault();
                return false;
            }
        })
        lastname.addEventListener("input",()=>{
            if(lastname.value===""){
                lastnameErr.textContent="";
            }
            else{
                validateLastname(lastname.value);
            }
        });


//**********************Password And Config Password Listeners and Functions***************************

        const password=document.querySelector("#password");
        const confPass=document.querySelector("#confirmpassword");
        const passwordErr=document.querySelector("#password-error");
        const confPassErr=document.querySelector("#confirmpassword-error");
        //initialize confPass to be disabled;
        confPass.disabled=true;
        function validatePassword(pass){
            if(pass.length==0){
                passwordErr.textContent="Password field is required!";
                return false;
            }
            if(pass.length<8){
                passwordErr.textContent="Password must contain at least 8 characters";
                return false;
            }
            passwordErr.textContent="";
            return true;
        }
        password.addEventListener('change',()=>{
            if(password.value===""){
                confPass.disabled=true;
                confPass.value="";
                confPass.textContent="";
            }
            else{
                confPass.disabled=false;
            }
        });
        password.addEventListener('input',()=>{
            if(password.value===""){
                passwordErr.textContent="";
            }
            else{
                validatePassword(password.value);
            }
        });
        function validateConfirmPassword(confPass){
            if(confPass.length===0){
                confPassErr.textContent="Confirm password field is required!";
            }
            if(confPass!=password.value){
                confPassErr.textContent="Both passwords do not match!";
                return false;
            }
            confPassErr.textContent="";
            return true;
        }
        confPass.addEventListener('change',()=>{
            if(confPass.value===""){
                confPass.textContent="";
            }
            else{
                validateConfirmPassword(confPass.value);
            }
        })
//**********************Submit listeners and functions*************************************************
        //create listeners and function for the password and config password
        function validateFields(fields){
            let result={
                emailField:(validateEmail(fields.email)?true:false),
                firstnameField:(validateFirstname(fields.firstname)?true:false),
                lastnameField:(validateLastname(fields.lastname)?true:false),
                passwordField:(validatePassword(fields.password)?true:false),
            }
            let isValid=true;
            for(let key in result){
                if(result[key]==false){
                    isValid=false;
                }
            }
            if(isValid){
                addUser(fields);
            }
        }
        function addUser(fields){
            $.ajax({
                    type:'POST',
                    url:'/register',
                    data:fields,
                    success:function(response){
                        if(response.success){
                            console.log('User successfully registered!');
                            window.location.href="registersuccess";
                        }
                    },
                    error:function(error){
                        console.error("User regisration request error: ",error);
                    }
            });
        }
        $("form").submit(function(e){
            e.preventDefault();
            let field = {
              email:"",
              firstname:"",
              middlename:"",
              lastname:"",
              address:"",
              age:"",
              contactno:"",
              occupation:""
            };
            field.email = $('#email').val();
            field.firstname = $('#firstname').val();
            field.middlename = $('#middlename').val();
            field.lastname = $('#lastname').val();
            field.address = $('#address').val();
            field.age = $('#age').val();
            field.contactno = $('#contactno').val();
            field.occupation = $('#occupation').val();
            field.password = $('#password').val();
            validateFields(field);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>