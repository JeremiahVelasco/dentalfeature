<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mouth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Patients Mouth</title>
</head>

<body>

    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class="fa-solid fa-tooth"></i>
                <span>Mediatrix</span>
            </div>
            <i class="fa-solid fa-bars" id="btn"></i>
        </div>
        <div class="user">
            <img src="" alt="secret-user" class="user-img">
            <div class="">
                <p class="bold">Jeremiah V.</p>
                <p>Admin</p>
            </div>
        </div>
        <ul>
            <li>
                <a href="/dashboard">
                    <i class="fa-solid fa-grip"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="/appointment">
                    <i class="fa-solid fa-file-code"></i>
                    <span class="nav-item">Appointment</span>
                </a>
                <span class="tooltip">Appointment</span>
            </li>
            <li>
                <a href="/patients">
                    <i class="fa-solid fa-newspaper"></i>
                    <span class="nav-item">Patients</span>
                </a>
                <span class="tooltip">Patients</span>
            </li>
            <li>
                <a href="/records">
                    <i class="fa-solid fa-user-secret"></i>
                    <span class="nav-item">Records</span>
                </a>
                <span class="tooltip">Records</span>
            </li>
            <li>
                <a href="/logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="nav-item">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
        </ul>
    </div>
    <div class="main-content">

        <div class="teeth-container">
            <table class="upperlower">
                <tr>
                    <td id="18">18<img src="teeth/18.png"></td>
                    <td id="17">17<img src="teeth/17.png"></td>
                    <td id="16">16<img src="teeth/16.png"></td>
                    <td id="15">15<img src="teeth/15.png"></td>
                    <td id="14">14<img src="teeth/14.png"></td>
                    <td id="13">13<img src="teeth/13.png"></td>
                    <td id="12">12<img src="teeth/12.png"></td>
                    <td id="11">11<img src="teeth/11.png"></td>
                    <td id="21">21<img src="teeth/21.png"></td>
                    <td id="22">22<img src="teeth/22.png"></td>
                    <td id="23">23<img src="teeth/23.png"></td>
                    <td id="24">24<img src="teeth/24.png"></td>
                    <td id="25">25<img src="teeth/25.png"></td>
                    <td id="26">26<img src="teeth/26.png"></td>
                    <td id="27">27<img src="teeth/27.png"></td>
                    <td id="28">28<img src="teeth/28.png"></td>
                </tr>
                <tr>
                    <td id="48"><img src="teeth/48.png">48</td>
                    <td id="47"><img src="teeth/47.png">47</td>
                    <td id="46"><img src="teeth/46.png">46</td>
                    <td id="45"><img src="teeth/45.png">45</td>
                    <td id="44"><img src="teeth/44.png">44</td>
                    <td id="43"><img src="teeth/43.png">43</td>
                    <td id="42"><img src="teeth/42.png">42</td>
                    <td id="41"><img src="teeth/41.png">41</td>
                    <td id="31"><img src="teeth/31.png">31</td>
                    <td id="32"><img src="teeth/32.png">32</td>
                    <td id="33"><img src="teeth/33.png">33</td>
                    <td id="34"><img src="teeth/34.png">34</td>
                    <td id="35"><img src="teeth/35.png">35</td>
                    <td id="36"><img src="teeth/36.png">36</td>
                    <td id="37"><img src="teeth/37.png">37</td>
                    <td id="38"><img src="teeth/38.png">38</td>
                </tr>
            </table>
        </div>



        @if (session('records'))
        <div class="container">
            <section class="recordsbody">
                <table class="recordstable">
                    <thead class="recordshead">
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Tooth</th>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody class="detailsbody">
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
            <h2 class="title">Tooth Information</h2>
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

        btn.onclick = function() {
            sidebar.classList.toggle('active');
        }


        var toothArray = @json(session('toothArray'));
        if (toothArray && toothArray.length > 0) {
            toothArray.forEach(function(tooth) {
                var td = document.getElementById(tooth);
                if (td) {
                    td.style.background = 'rgba(255, 15, 15, 0.35)';
                }
            });
        }
    </script>


</body>

</html>