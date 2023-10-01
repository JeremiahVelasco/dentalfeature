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
    <title>Dental Feature: Patients</title>
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
            <section class="table_body">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td></td>
                        <td>{{ $user['email']}}</td>
                        <td>{{ $user['firstname']}}</td>
                        <td>{{ $user['middlename']}}</td>
                        <td>{{ $user['lastname']}}</td>
                        <td>{{ $user['points']}}</td>
                        <td><a href="#" data-patientid="{{ $user['patientid'] }}" data-firstname="{{ $user['firstname'] }}" data-lastname="{{ $user['lastname'] }}" class="view-records">Records</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>

    </div>


    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');

        btn.onclick = function () {
            sidebar.classList.toggle('active');
        }

        document.addEventListener('click', function (e) {
        if (e.target.classList.contains('view-records')) {
            e.preventDefault();
            const firstname = e.target.getAttribute('data-firstname');
            const lastname = e.target.getAttribute('data-lastname');
            
            // Send an AJAX request to the getRecords function in the controller
            $.ajax({
                type: 'GET',
                url: '/getRecords',
                data: {
                    firstname: firstname,
                    lastname: lastname,
                },
                success: function (response) {
                    if (response.success) {
                        window.location.href = 'mouth';
                        console.log('Success: ' + firstname + " " + lastname);
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'No Records Found',
                            showConfirmButton: true,
                            confirmButtonColor: '#F27574',
                            timer: 2500
                        })
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error:', textStatus, errorThrown);
                }
            });

        }
    });

    </script>


</body>
</html>