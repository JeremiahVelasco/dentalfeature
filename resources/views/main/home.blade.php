<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logo</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <header>
        <div class="nav">
            <div class="logo">
                <h1><i class="fa-solid fa-tooth"></i> Logo</h1>
            </div>

            <div class="nav-links">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>

        <div class="main-content">
            <div class="default">
                <button class="btn book" type="button">Book Appointment</button>
                <h3 id="tag">Schedule Your Visit for a Dental Service!</h3>
            </div>



            <form action="" class="names">
                <label for="firstname">First Name</label>
                <input type="text" placeholder="First Name">
                <label for="lastname">Last Name</label>
                <input type="text" placeholder="Last Name">
                <div class="row">
                    <button id="prevnames" type="button">Previous</button>
                    <button id="nextnames" type="button">Next</button>
                </div>
            </form>

            <form action="" class="date-time">
                <label for="date">Date</label>
                <input type="date" placeholder="First Name">
                <label for="time">Time</label>
                <input type="time" placeholder="Time">

                <button id="prevdt" type="button">Previous</button>
                <button id="nextdt" type="button">Next</button>
            </form>

            <form action="" class="services">
                <label for="service">Service</label>
                <select name="" id="service">
                    <option value="Check Up">Check Up</option>
                    <option value="Check Up">Zirconia Crowns</option>
                    <option value="Check Up">Root Canal Therapy</option>
                    <option value="Check Up">Teeth Whitening</option>
                    <option value="Check Up">Composite Veneers</option>
                    <option value="Check Up">Odontectomy</option>
                    <option value="Check Up">Partial Dentures</option>
                    <option value="Check Up">Flexible Dentures</option>
                    <option value="Check Up">Buccal Fat Removal</option>
                </select>
                <label for="doctor">Doctor</label>
                <select name="" id="doctor">
                    <option value="No Preference">No Preference</option>
                    <option value="Dr. Juan Dela Cruz">Dr. Juan Dela Cruz</option>
                    <option value="Dr. Juan Dela Cruz">Dr. Caroline Daligues</option>
                    <option value="Dr. Juan Dela Cruz">Dr. Maria Clara</option>
                </select>
                <label for="message">Message</label>
                <textarea style="resize:none" id="message"></textarea>

                <button type="button" id="prevservices">Previous</button>
                <button type="button" id="bookbtn">Book</button>
            </form>
        </div>
    </header>


    <script>
        //Book Appointment Button -> Names View
        document.addEventListener('click', function(e) {
            const bookButton = document.querySelector('.book');
            const namesView = document.querySelector('.names');
            const tag = document.getElementById('tag');

            bookButton.addEventListener('click', function() {
                e.preventDefault();
                bookButton.style.display = 'none';
                tag.style.display = 'none';
                namesView.style.display = 'flex';
            });
        })

        //Names View <- Book Appointment Button
        document.addEventListener('click', function(e) {
            const bookButton = document.querySelector('.book');
            const namesPrevButton = document.getElementById('prevnames');
            const namesView = document.querySelector('.names');
            const tag = document.getElementById('tag');

            namesPrevButton.addEventListener('click', function() {
                e.preventDefault();
                namesView.style.display = 'none';
                bookButton.style.display = 'flex';
                tag.style.display = 'flex';
            });
        })

        //Names View -> Date & Time View
        document.addEventListener('click', function(e) {
            const namesNextButton = document.getElementById('nextnames');
            const dateTimeView = document.querySelector('.date-time');
            const namesView = document.querySelector('.names');

            namesNextButton.addEventListener('click', function() {
                e.preventDefault();
                namesView.style.display = 'none';
                dateTimeView.style.display = 'flex';
            });
        })


        //Date & Time View -> Services View
        document.addEventListener('click', function(e) {
            const dtNextButton = document.getElementById('nextdt');
            const dateTimeView = document.querySelector('.date-time');
            const servicesView = document.querySelector('.services');

            dtNextButton.addEventListener('click', function() {
                e.preventDefault();
                dateTimeView.style.display = 'none';
                servicesView.style.display = 'flex';
            });
        })

        //Date & Time View <- Names View
        document.addEventListener('click', function(e) {
            const dtPrevButton = document.getElementById('prevdt');
            const dateTimeView = document.querySelector('.date-time');
            const namesView = document.querySelector('.names');

            dtPrevButton.addEventListener('click', function() {
                e.preventDefault();
                dateTimeView.style.display = 'none';
                namesView.style.display = 'flex';
            });
        })

        //Services View <- Date & Time View
        document.addEventListener('click', function(e) {
            const servicesPrevButton = document.getElementById('prevservices');
            const dateTimeView = document.querySelector('.date-time');
            const namesView = document.querySelector('.names');
            const servicesView = document.querySelector('.services');

            servicesPrevButton.addEventListener('click', function() {
                e.preventDefault();
                servicesView.style.display = 'none';
                dateTimeView.style.display = 'flex';
            });
        })
    </script>
</body>

</html>