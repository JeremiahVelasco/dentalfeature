<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="apdicon.png">
    <link rel="stylesheet" href="patients.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Dental Feature: Patients</title>
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
        <div class="header">
            <h1>Patients</h1>
            <button id="add-patient"><i class="fa-solid fa-user-plus"></i>Add Patient</button>
        </div>
        <div class="modal-container">
            <div class="add-patient-modal">
                <form action="" id="addPatientForm">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname">
                    <label for="middlename">Middle Name</label>
                    <input type="text" id="middlename">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname">
                    <label for="email">Email</label>
                    <input type="email" id="email">
                    <label for="address">Address</label>
                    <input type="text" id="address">
                    <label for="age">Age</label>
                    <input type="number" id="age">
                    <label for="email">Sex</label>
                    <select name="sex" id="sex">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <label for="contactno">Contact Number</label>
                    <input type="text" id="contactno">
                    <button type="submit" id="confirmpatient">Confirm</button>
                    <button id="cancelpatient">Cancel</button>
                </form>
            </div>
            <div class="add-record-modal">
                <form action="" id="addRecordForm">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" disabled>
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" disabled>
                    <label for="date">Date</label>
                    <input type="date" id="date">
                    <label for="time">Time</label>
                    <input type="time" id="time">
                    <label for="tooth">Tooth No.</label>
                    <select name="tooth" id="tooth">
                        <option value="N/A">N/A</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="31">31</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                        <option value="46">46</option>
                        <option value="47">47</option>
                        <option value="48">48</option>
                    </select>
                    <label for="description">Description</label>
                    <input type="text" id="description">
                    <label for="amount">Amount</label>
                    <input type="number" id="amount">
                    <button id="confirm">Confirm</button>
                    <button id="cancel">Cancel</button>
                </form>
            </div>
        </div>
        <div class="container">
            <section class="table_body">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td></td>
                            <td>{{ $user['firstname']}}</td>
                            <td>{{ $user['middlename']}}</td>
                            <td>{{ $user['lastname']}}</td>
                            <td>{{ $user['email']}}</td>
                            <td><a href="#" data-patientid="{{ $user['patientid'] }}" data-firstname="{{ $user['firstname'] }}" data-lastname="{{ $user['lastname'] }}" class="add-record"><i class="fa-solid fa-file-circle-plus"></i> Add Record </a></td>
                            <td><a href="#" data-patientid="{{ $user['patientid'] }}" data-firstname="{{ $user['firstname'] }}" data-lastname="{{ $user['lastname'] }}" class="view-records"><i class="fa-regular fa-folder-open"></i> Records </a></td>
                            <td><a href="#" data-patientid="{{ $user['patientid'] }}" data-firstname="{{ $user['firstname'] }}" data-lastname="{{ $user['lastname'] }}" class="delete-patient"><i class="fa-solid fa-trash-can"></i> Delete </a></td>
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

        btn.onclick = function() {
            sidebar.classList.toggle('active');
        }

        document.getElementById('cancel').addEventListener('click', function() {
            // Change the display property of the modal container to 'none'
            document.querySelector('.add-record-modal').style.display = 'none';
        });

        document.getElementById('cancelpatient').addEventListener('click', function() {
            // Change the display property of the modal container to 'none'
            document.querySelector('.add-patient-modal').style.display = 'none';
        });

        const recordModal = document.querySelector('.add-record-modal');
        document.addEventListener('click', function(e) {
            if (e.target !== recordModal && !recordModal.contains(e.target)) {
                recordModal.style.display = 'none';
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const addPatientButton = document.getElementById('add-patient');
            const addPatientModal = document.querySelector('.add-patient-modal');

            addPatientButton.addEventListener('click', function() {
                addPatientModal.style.display = 'flex';
            });

            // Add click event listener to the document
            document.addEventListener('click', function(e) {
                if (!addPatientModal.contains(e.target) && e.target !== addPatientButton) {
                    addPatientModal.style.display = 'none';
                }
            });
        });



        document.addEventListener('click', function(e) {
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
                    success: function(response) {
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
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('AJAX Error:', textStatus, errorThrown);
                    }
                });

            }
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('add-record')) {
                e.preventDefault();
                const firstname = e.target.getAttribute('data-firstname');
                const lastname = e.target.getAttribute('data-lastname');

                // Send an AJAX request to the getRecords function in the controller
                $.ajax({
                    type: 'GET',
                    url: '/getPatients',
                    data: {
                        firstname: firstname,
                        lastname: lastname,
                    },
                    success: function(response) {
                        if (response.success) {
                            const modal = document.querySelector('.add-record-modal');
                            modal.style.display = 'flex';
                            modal.querySelector('#firstname').value = firstname;
                            modal.querySelector('#lastname').value = lastname;
                            console.log('Success: ' + firstname + " " + lastname);
                        } else {
                            console.log("Did not work")
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('AJAX Error:', textStatus, errorThrown);
                    }
                });

            }
        });

        $(document).ready(function() {
            $("#addRecordForm").submit(function(event) {
                event.preventDefault();

                // Ensure that the values from the modal are retrieved properly
                const modal = document.querySelector('.add-record-modal');
                const firstname = modal.querySelector('#firstname').value;
                const lastname = modal.querySelector('#lastname').value;

                var formData = {
                    date: $("#date").val(),
                    time: $("#time").val(),
                    tooth: $("#tooth").val(),
                    description: $("#description").val(),
                    firstname: firstname, // Use the firstname from the modal
                    lastname: lastname, // Use the lastname from the modal
                    amount: $("#amount").val(),
                };

                $.ajax({
                    type: "POST",
                    url: "/storeRecord",
                    data: formData,
                    success: function(response) {
                        Swal.fire("Success!", "Record added successfully.", "success");

                        $("#addRecordForm")[0].reset();
                    },
                    error: function(error) {

                    },
                });
            });
        });



        $(document).ready(function() {
            $("#addPatientForm").submit(function(event) {
                event.preventDefault();

                var formData = {
                    firstname: $("#firstname").val(),
                    middlename: $("#middlename").val(),
                    lastname: $("#lastname").val(),
                    email: $("#email").val(),
                    address: $("#address").val(),
                    age: $("#age").val(),
                    sex: $("#sex").val(),
                    contactno: $("#contactno").val(),
                };

                $.ajax({
                    type: "POST",
                    url: "/storePatient",
                    data: formData,
                    success: function(response) {
                        Swal.fire("Success!", "Patient added successfully.", "success");

                        $("#addPatientForm")[0].reset();
                    },
                    error: function(error) {

                    },
                });
            });
        });


        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('delete-patient')) {
                e.preventDefault();
                const firstname = e.target.getAttribute('data-firstname');
                const lastname = e.target.getAttribute('data-lastname');

                // Send an AJAX request to the getRecords function in the controller
                $.ajax({
                    type: 'POST',
                    url: '/deletePatient',
                    data: {
                        firstname: firstname,
                        lastname: lastname,
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Successfuly Deleted',
                                showConfirmButton: true,
                                confirmButtonColor: '#F27574',
                                timer: 2500
                            })
                        } else {
                            console.log("Did not work")
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('AJAX Error:', textStatus, errorThrown);
                    }
                });

            }
        })
    </script>


</body>

</html>