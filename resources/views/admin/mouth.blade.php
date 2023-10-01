<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Patients Mouth</title>
</head>
<body>
    <div class="main-content">
        <img src="molar.png" alt="" class="tooth" id = "molar">
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
                    @if ($success)
                        <p>Records found successfully!</p>
                    @else
                        <p>No records found.</p>
                    @endif

                    <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>{{ $record->date }}</td>
                            <td>{{ $record->time }}</td>
                            <td>{{ $record->tooth }}</td>
                            <td>{{ $record->description }}</td>
                            <td>{{ $record->amount }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>

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