<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>APD - Login</title>
        <link rel = "stylesheet" href = "registerlogin.css">
        <link rel = "icon" href = "apdicon.png">
        <script src="https://kit.fontawesome.com/b3459fa126.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
    <div class = "row">
        <form>
            <h1>Login</h1>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password">
                <small id="error" style="color:red;"></small>
            </div>
            <button type="submit" class="btn btn-primary">Sign In</button>
            <br><br>
            <a href = "/registerpage" class="mt-2">New to AppName? Click here</a>
        </form>
    </div>
    <script>

        const email = document.querySelector("#email");
            email.addEventListener('keypress',(event)=>{

            return true;
        })


//*******************************Form Listeners and Functions***************************************************************
        function checkProfile(field) {
            $.ajax({
                type: "POST",
                url: "/login",
                data: {
                    'email': field.email,
                    'password': field.password
                },
                success: function (response) {
                    if (response.success) {
                        window.location.href = "/";
                    } else {
                        console.log(response);
                        $("#error").text("Incorrect Credentials!");
                    }
                },
                error: function (error) {
                    console.error("Student login request error:", error)
                }
            });
        }

        $("form").submit(function (e) {
            e.preventDefault();
            let field = {
                email: "",
                password: ""
            };
            field.email = $("#email").val();
            field.password = $("#password").val();
            checkProfile(field);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>