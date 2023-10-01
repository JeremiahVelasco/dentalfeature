<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "mouth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Patients Mouth</title>
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
        <img src="molar.png" alt="" class="tooth" id = "molar">
        @if (session('records'))
        <div class="container">
            <section class="table_body">
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Tooth</th>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach(session('records') as $record)
                        <tr>
                            <td>{{ $record->date }}</td>
                            <td>{{ $record->time }}</td>
                            <td>{{ $record->tooth }}</td>
                            <td>{{ $record->description }}</td>
                            <td>{{ $record->amount }}</td>
                        </tr>
                    @endforeach
                    @else
                    <p>No records found.</p>
                    </tbody>
                </table>
            </section>
        </div>
        @endif

    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img src="molar.png" alt="Molar Image" class="modal-image" id="modalImage">
            <h2 class = "title">Tooth Information</h2>
            <ul>
                <li>Record 1</li>
                <li>Record 2</li>
                <li>Record 3</li>
            </ul>
        </div>
        </div>


    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');

        btn.onclick = function () {
            sidebar.classList.toggle('active');
        }

        $(document).ready(function () {

        var modal = document.getElementById("myModal");
        var modalImage = document.getElementById("modalImage");
        var closeButton = document.querySelector(".close");

        $("#molar").click(function () {
            modal.style.display = "block";
            modalImage.src = this.src; 
        });

        closeButton.onclick = function () {
            modal.style.display = "none";
        };

        window.onclick = function (event) {
            if (event.target == modal) {
            modal.style.display = "none";
            }
        };
        });

    </script>
    

</body>
</html>