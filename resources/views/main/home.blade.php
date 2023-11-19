<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caroline C. Daligues, D.M.D., Inc.</title>
    <link rel="icon" href="icon.png">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <header>
        <div class="nav">
            <div class="logo">
                <h1><i class="fa-solid fa-tooth"></i> Caroline C. Daligues, D.M.D., Inc.</h1>
            </div>

            <div class="nav-links">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/services">Services</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
        </div>

        <div class="main-content">
            <div class="default">
                <button class="btn book" type="button">Book Appointment</button>
                <h3 id="tag">Schedule Your Visit for a Dental Service!</h3>
            </div>



            <form action="" class="appointment-form" onsubmit="sendEmail(); reset(); return false;">
                <div class="form-section names">
                    <label for="email">Email</label>
                    <input id="email" type="email" placeholder="Your Email">
                    <label for="fullname">Full Name</label>
                    <input id="fullname" type="text" placeholder="Full Name">
                    <div class="row">
                        <button id="prevnames" type="button">Previous</button>
                        <button id="nextnames" type="button">Next</button>
                    </div>
                </div>

                <div class="form-section date-time">
                    <label for="date">Date</label>
                    <input id="date" type="date" placeholder="First Name">
                    <label for="time">Time</label>
                    <input id="time" type="time" placeholder="Time">

                    <button id="prevdt" type="button">Previous</button>
                    <button id="nextdt" type="button">Next</button>
                </div>

                <div class="form-section service-doctor">
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
                    <button type="click" id="bookbtn">Book</button>
                </div>
            </form>
        </div>
    </header>

    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script>
        //Book Appointment Button -> Names View
        document.addEventListener('DOMContentLoaded', function() {
            const bookButton = document.querySelector('.book');
            const appointmentForm = document.querySelector('.appointment-form');
            const namesView = document.querySelector('.names');
            const dateTimeView = document.querySelector('.date-time');
            const servicesView = document.querySelector('.service-doctor');
            const tag = document.getElementById('tag');

            bookButton.addEventListener('click', function(e) {
                e.preventDefault();
                bookButton.style.display = 'none';
                tag.style.display = 'none';
                appointmentForm.style.display = 'flex';
                namesView.style.display = 'flex';
            });

            //Names View <- Book Appointment Button
            const namesPrevButton = document.getElementById('prevnames');
            namesPrevButton.addEventListener('click', function(e) {
                e.preventDefault();
                namesView.style.display = 'none';
                bookButton.style.display = 'flex';
                tag.style.display = 'flex';
            });

            //Names View -> Date & Time View
            const namesNextButton = document.getElementById('nextnames');
            //const dateTimeView = document.querySelector('.date-time');
            namesNextButton.addEventListener('click', function(e) {
                e.preventDefault();
                namesView.style.display = 'none';
                dateTimeView.style.display = 'flex';
            });

            //Date & Time View -> Services View
            const dtNextButton = document.getElementById('nextdt');
            //const servicesView = document.getElementById('service-doctor');
            dtNextButton.addEventListener('click', function(e) {
                e.preventDefault();
                dateTimeView.style.display = 'none';
                servicesView.style.display = 'flex';
                appointmentForm.style.display = 'flex';
            });

            //Date & Time View <- Names View
            const dtPrevButton = document.getElementById('prevdt');
            dtPrevButton.addEventListener('click', function(e) {
                e.preventDefault();
                dateTimeView.style.display = 'none';
                namesView.style.display = 'flex';
            });

            //Services View <- Date & Time View
            const servicesPrevButton = document.getElementById('prevservices');
            servicesPrevButton.addEventListener('click', function(e) {
                e.preventDefault();
                servicesView.style.display = 'none';
                dateTimeView.style.display = 'flex';
            });
        });




        //EMAIL SENDING
        function sendEmail() {
            Email.send({
                SecureToken: "b17686cd-ab51-498c-816c-0998d4d7d2aa",
                To: 'velascojeremiahd@gmail.com',
                From: document.getElementById("email").value,
                Subject: "Appointment",
                Body: "Email: " + document.getElementById("email").value +
                    "<br> Full Name: " + document.getElementById("fullname").value +
                    "<br> Preffered Date: " + document.getElementById("date").value +
                    "<br> Preffered Time: " + document.getElementById("time").value +
                    "<br> Service: " + document.getElementById("service").value +
                    "<br> Preffered Doctor: " + document.getElementById("doctor").value +
                    "<br> Message: " + document.getElementById("message").value
            }).then(
                message => alert("Message Sent Succesfully")
            );
        }
    </script>

</body>

</html>