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


    <div class="main-content">
        <div class="container">
            <section class="table_body">
                <table>
                    <thead>
                        <tr>
                            <th>Patient ID</th>
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
                        <td>{{ $user['patientid']}}</td>
                        <td>{{ $user['email']}}</td>
                        <td>{{ $user['firstname']}}</td>
                        <td>{{ $user['middlename']}}</td>
                        <td>{{ $user['lastname']}}</td>
                        <td>{{ $user['points']}}</td>
                        <td><a href = "#">Records</a></td>
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
    </script>


</body>
</html>