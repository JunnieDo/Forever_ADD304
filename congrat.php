<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.typekit.net/cfk5sas.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mate:ital@0;1&family=Rowdies:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<style>
    body{
        background-color: rgba(174, 207, 237, 1);
    }

    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        margin: 50px auto 20px auto;
        width: max-content;
    }
    .card-img {
        width: 30%;
        object-fit: cover;
        border-radius: 5px;
        transform: translateY(-60px);
    }
    .container * {
        text-align: center;
    }
    .container-footer {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }
    .Circle {
        width: 100px;
        height: 100px;
        background-color: #555;
        border-radius: 50%;
        display: inline-block;
        float: right;
    }
    .mate-regular {
        font-family: "Mate", serif;
        font-weight: 400;
        font-style: normal;
    }
    .rowdies-light {
        font-family: "Rowdies", sans-serif;
        font-weight: 300;
        font-style: normal;
    }

    .rowdies-regular {
        font-family: "Rowdies", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

    .rowdies-bold {
        font-family: "Rowdies", sans-serif;
        font-weight: 700;
        font-style: normal;
    }

    h2 {
        font-size: 3.5em;
    }
    h3 {
        font-size: 2em;
    }
</style>
<body>
    <?php
        session_start();
        include 'navbar.php'; 
    ?>
    <div class="container">
        <?php 
            include 'connection.php';
            $conn = checkConnectionDb();
            $petId = $_GET['pet_id'];
            $sql = "SELECT image FROM pet_info WHERE id = $petId";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<img src='data:image/jpeg;base64,".base64_encode(stripslashes($row['image']))."' alt='Cat' class='card-img'>";
            }
        ?>
        <h2 class="rowdies-regular">Congratulations!</h2>
        <?php echo "<h3 class='rowdies-light'>" . $_SESSION['fullname'] . "</h3>"; ?>
        <h4 class="rowdies-light">Your application has been successfully submitted!</h4>
        <p class="mate-regular">Thank you for extending your support to a delightful furry friend. Your kindness makes a big difference!</p>
        <hr>
        <div class="container-footer">
            <div>
                <?php echo "<p class='mate-regular'>" . date("Y-m-d") . "</p>"; ?>
                <p class="mate-regular">The Furever Team</p>
            </div>
            <svg class="animated_badge_svg" width="84" height="99" viewBox="0 0 84 99" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="badge_ribbon" d="M0.761166 82.9447L17.3041 50.8886C17.5574 50.3979 18.1606 50.2053 18.6513 50.4586L43.875 63.4756C44.3658 63.7289 44.5583 64.332 44.305 64.8228L27.7788 96.8466C27.4294 97.5236 26.4817 97.5769 26.0586 96.9435L17.8756 84.694C17.6881 84.4133 17.3716 84.2461 17.0341 84.2495L1.65981 84.4033C0.906487 84.4108 0.415676 83.6142 0.761166 82.9447Z" fill="#F04152"></path>
                <path class="badge_ribbon" d="M0.761166 82.9447L17.3041 50.8886C17.5574 50.3979 18.1606 50.2053 18.6513 50.4586L43.875 63.4756C44.3658 63.7289 44.5583 64.332 44.305 64.8228L27.7788 96.8466C27.4294 97.5236 26.4817 97.5769 26.0586 96.9435L17.8756 84.694C17.6881 84.4133 17.3716 84.2461 17.0341 84.2495L1.65981 84.4033C0.906487 84.4108 0.415676 83.6142 0.761166 82.9447Z" fill="url(#paint0_linear)"></path>
                <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="1" y="50" width="44" height="46">
                    <path d="M3.80623 77.0441L15.4697 54.4432C16.7361 51.9893 19.752 51.0266 22.2059 52.293L40.3204 61.6412C42.7743 62.9076 43.737 65.9235 42.4707 68.3774L30.8904 90.817C29.1437 94.2016 24.4052 94.4685 22.2895 91.3014L19.0777 86.4935C18.1402 85.09 16.5578 84.2543 14.8701 84.2712L8.29946 84.3369C4.53283 84.3745 2.07879 80.3915 3.80623 77.0441Z" fill="#71A1F4"></path>
                    <path d="M3.80623 77.0441L15.4697 54.4432C16.7361 51.9893 19.752 51.0266 22.2059 52.293L40.3204 61.6412C42.7743 62.9076 43.737 65.9235 42.4707 68.3774L30.8904 90.817C29.1437 94.2016 24.4052 94.4685 22.2895 91.3014L19.0777 86.4935C18.1402 85.09 16.5578 84.2543 14.8701 84.2712L8.29946 84.3369C4.53283 84.3745 2.07879 80.3915 3.80623 77.0441Z" fill="url(#paint1_linear)"></path>
                </mask>
                <g class="badge_ribbon" mask="url(#mask0)">
                    <rect width="9.73445" height="46.9502" transform="matrix(0.894023 0.448022 -0.445194 0.895434 24.272 60.4499)" fill="#FCD977"></rect>
                </g>
                <path class="badge_ribbon right" d="M56.5365 97.1074L38.5 65.8673C38.2239 65.389 38.3877 64.7774 38.866 64.5013L63.4476 50.3091C63.9259 50.0329 64.5375 50.1968 64.8137 50.6751L82.832 81.8838C83.2129 82.5435 82.7458 83.3698 81.9841 83.3836L67.2552 83.6511C66.9177 83.6572 66.6061 83.8332 66.4266 84.1191L58.2494 97.1392C57.8487 97.7772 56.9132 97.7598 56.5365 97.1074Z" fill="#F04152"></path>
                <path class="badge_ribbon right" d="M56.5365 97.1074L38.5 65.8673C38.2239 65.389 38.3877 64.7774 38.866 64.5013L63.4476 50.3091C63.9259 50.0329 64.5375 50.1968 64.8137 50.6751L82.832 81.8838C83.2129 82.5435 82.7458 83.3698 81.9841 83.3836L67.2552 83.6511C66.9177 83.6572 66.6061 83.8332 66.4266 84.1191L58.2494 97.1392C57.8487 97.7772 56.9132 97.7598 56.5365 97.1074Z" fill="url(#paint2_linear)"></path>
                <mask id="mask1" mask-type="alpha" maskUnits="userSpaceOnUse" x="38" y="49" width="45" height="47">
                    <path d="M53.2165 91.357L40.5 69.3314C39.1193 66.9399 39.9387 63.882 42.3301 62.5013L59.9835 52.3091C62.375 50.9283 65.4329 51.7477 66.8137 54.1392L79.4394 76.0076C81.3438 79.3061 79.0082 83.4376 75.2001 83.5068L69.419 83.6118C67.7314 83.6424 66.1732 84.5224 65.2756 85.9517L61.7808 91.5162C59.7774 94.7061 55.0999 94.6192 53.2165 91.357Z" fill="#71A1F4"></path>
                    <path d="M53.2165 91.357L40.5 69.3314C39.1193 66.9399 39.9387 63.882 42.3301 62.5013L59.9835 52.3091C62.375 50.9283 65.4329 51.7477 66.8137 54.1392L79.4394 76.0076C81.3438 79.3061 79.0082 83.4376 75.2001 83.5068L69.419 83.6118C67.7314 83.6424 66.1732 84.5224 65.2756 85.9517L61.7808 91.5162C59.7774 94.7061 55.0999 94.6192 53.2165 91.357Z" fill="url(#paint3_linear)"></path>
                </mask>
                <g class="badge_ribbon right" mask="url(#mask1)">
                    <rect width="9.73445" height="46.9502" transform="matrix(0.860033 -0.510239 0.512954 0.858416 50.3103 65.1699)" fill="#FCD977"></rect>
                </g>
                <circle cx="40.5" cy="37.5" r="33.5" fill="#DBDFE7" stroke="#FCD977" stroke-width="8"></circle>
                <circle class="badge_circle" cx="40.5" cy="37.5" r="29.5" fill="#FCD977" stroke="#FFA826" stroke-width="4"></circle>
                <defs>
                    <linearGradient id="paint0_linear" x1="31.2632" y1="56.9671" x2="13.7695" y2="90.8654" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#A31523"></stop>
                        <stop offset="1" stop-color="#F04152" stop-opacity="0"></stop>
                    </linearGradient>
                    <linearGradient id="paint1_linear" x1="31.2632" y1="56.9671" x2="13.7695" y2="90.8654" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#27539F"></stop>
                        <stop offset="1" stop-color="#71A1F4" stop-opacity="0"></stop>
                    </linearGradient>
                    <linearGradient id="paint2_linear" x1="51.1568" y1="57.4052" x2="70.2299" y2="90.4407" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#A31523"></stop>
                        <stop offset="1" stop-color="#F04152" stop-opacity="0"></stop>
                    </linearGradient>
                    <linearGradient id="paint3_linear" x1="51.1568" y1="57.4052" x2="70.2299" y2="90.4407" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#27539F"></stop>
                        <stop offset="1" stop-color="#71A1F4" stop-opacity="0"></stop>
                    </linearGradient>
                </defs>
            </svg>
        </div>
    </div>
</body>
<script src="https://kit.fontawesome.com/8115f5ec82.js" crossorigin="anonymous"></script>
</html>