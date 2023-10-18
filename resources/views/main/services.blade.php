<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logo</title>
    <link rel="stylesheet" href="services.css">
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
                    <li><a href="/">Home</a></li>
                    <li><a href="/services">Services</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
        </div>

        <div class="main-content">
            <div class="title">
                <h2>Our Services</h2>
            </div>

            <div class="invisalign">
                <div class="text">
                    <h2>Invisalign</h2>
                    <p>
                        Invisalign is a popular treatment that uses clear, removable
                        aligners to straighten teeth. It offers a discreet and comfortable
                        alternative to traditional metal braces, allowing individuals
                        to achieve a confident smile without the visible appearance of
                        wires and brackets.
                    </p>
                    <ul>
                        <li>It is removable for regular brushing and flossing, preventing tooth decay and gum disease during treatment. You can enjoy your favorite foods and drinks as usual too.</li>
                        <li>It is nearly invisible, so people won't notice you're straightening your teeth. Feel free to smile more while undergoing treatment.</li>
                        <li>It is comfortable because there is no metal or wires to cause gum irritations during treatment.</li>
                        <li>We use the iTero 3D scanner to diagnose malocclusion and record accurate digital models of our patients' teeth. </li>
                    </ul>
                    <button id="invi-learn-more">Learn More</button>
                </div>

                <div class="invisalign-photo">
                    <img src="invisalign.jpg" alt="">
                </div>
            </div>
        </div>

        <div class="section1">
            <div class="service-card" id="preventive">
                <img class="card-bg" src="assets/preventive.jpg" alt="">
                <img class="card-icon" src="assets/preventive-icon.png" alt="">
                <h2 class="card-title">Preventive Dentistry</h2>
            </div>

            <div class="service-card" id="restorative">
                <img class="card-bg" src="assets/restorative.jpg" alt="">
                <img class="card-icon" src="assets/restorative-icon.png" alt="">
                <h2 class="card-title">Restorative Dentistry</h2>
            </div>

            <div class="service-card" id="cosmetic">
                <img class="card-bg" src="assets/cosmetic.jpg" alt="">
                <img class="card-icon" src="assets/cosmetic-icon.png" alt="">
                <h2 class="card-title">Cosmetic Dentistry</h2>
            </div>
        </div>
    </header>


    <script>
        document.getElementById('preventive').addEventListener('click', function() {
            window.location.href = '/preventive';
        });

        document.getElementById('restorative').addEventListener('click', function() {
            window.location.href = '/restorative';
        });

        document.getElementById('cosmetic').addEventListener('click', function() {
            window.location.href = '/cosmetic';
        });
    </script>
</body>

</html>