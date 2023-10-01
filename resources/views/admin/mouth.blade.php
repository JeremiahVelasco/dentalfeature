<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Patient Record</title>
</head>
<body>
    <div class="main-content">
            <img src="molar.png" alt="" class="tooth" id = "molar">
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img src="molar.png" alt="Molar Image" class="modal-image" id="modalImage">
            <h2 class = "title">Tooth Information</h2>
            <ul>
                <li>Problem 1</li>
                <li>Problem 2</li>
                <li>Problem 3</li>
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