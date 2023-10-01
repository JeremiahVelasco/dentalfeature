<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "apdicon.png">
    <link rel="stylesheet" href = "patients.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>APD SecretOffice: Admins</title>
</head>
<body>
    
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class="fa-solid fa-user-secret"></i>
                <span>App Name</span>
            </div>
            <i class="fa-solid fa-bars" id = "btn"></i>
        </div>
        <div class="user">
            <img src = "" alt="secret-user" class = "user-img">
            <div class="">
                <p class = "bold">Jeremiah V.</p>
                <p>Admin</p>
            </div>
        </div>
        <ul>
            <li>
                <a href = "/dashboard">
                    <i class="fa-solid fa-grip"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href = "/appointment">
                    <i class="fa-solid fa-file-code"></i>
                    <span class="nav-item">Appointment</span>
                </a>
                <span class="tooltip">Appointment</span>
            </li>
            <li>
                <a href = "/patients">
                    <i class="fa-solid fa-newspaper"></i>
                    <span class="nav-item">Patients</span>
                </a>
                <span class="tooltip">Patients</span>
            </li>
            <li>
                <a href = "/addrecord">
                    <i class="fa-solid fa-users"></i>
                    <span class="nav-item">Add</span>
                </a>
                <span class="tooltip">Add</span>
            </li>
            <li>
                <a href = "/records">
                    <i class="fa-solid fa-user-secret"></i>
                    <span class="nav-item">Records</span>
                </a>
                <span class="tooltip">Records</span>
            </li>
            <li>
                <a href = "/logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="nav-item">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="container">
        <form id = "addRecordForm">
            <h1>Add Record</h1>
            <div class="mb-3">
                <label for="studentnumber" class="form-label">Date</label>
                <input type="text" value="" maxlength="9" class="form-control" id="date" aria-describedby="emailHelp">
                <small id="date-error" style="color:red"></small>
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="text" class="form-control name-field" id="time">
            </div>
            <div class="mb-3">
                <label for="tooth" class="form-label">Tooth Number</label>
                <input type="text" class="form-control name-field"  id="tooth">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control name-field"  id="description">
            </div>
            <div class="mb-3">
                <label for="pxfirstname" class="form-label">Patients' First Name</label>
                <input type="text" class="form-control name-field"  id="pxfirstname">
            </div>
            <div class="mb-3">
                <label for="pxlastname" class="form-label">Patients' Last Name</label>
                <input type="text" class="form-control name-field"  id="pxlastname">
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="text" class="form-control name-field" id="amount">
                <small id="lastname-error" style="color:red"></small>
            </div>
            <button type="submit" class="btn btn-primary">Add Record</button>
        </form>
        </div>
    </div>


    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');

        btn.onclick = function () {
            sidebar.classList.toggle('active');
        }

        $(document).ready(function () {
        $("#addRecordForm").submit(function (event) {
            event.preventDefault(); 

            var formData = {
            date: $("#date").val(),
            time: $("#time").val(),
            tooth: $("#tooth").val(),
            description: $("#description").val(),
            pxfirstname: $("#pxfirstname").val(),
            pxlastname: $("#pxlastname").val(),
            amount: $("#amount").val(),
            };

            $.ajax({
            type: "POST", 
            url: "/storeRecord",
            data: formData,
            success: function (response) {
                Swal.fire("Success!", "Record added successfully.", "success");

                $("#addRecordForm")[0].reset();
            },
            error: function (error) {
                Swal.fire("Error!", "An error occurred. Please try again later.", "error");
            },
            });
        });
        });

    </script>

    


</body>
</html>




