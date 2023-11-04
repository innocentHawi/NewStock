<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylehome.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Small Scale Stock Market</title>
</head>
<body>
    <div class= "header">
        <div class="logo">
            <img src="Sol_Invictus.webp" alt="Company Logo" height="50">
        </div>
        <div class="navigation">
            <a style="margin-top: 10px" href="#">Home </a>
            <a style="margin-top: 10px" href="#">About</a>
            <a href="{{ route('register.dashboard') }}" class="btn btn-info">Register</a>
            <a href="{{ route('login.dashboard') }}" class="btn btn-info">Log in</a>
        </div>
    </div>

    <div class= "info">
        <div class="info-photo">
            <img class="image" src= "bw.jpg" alt="Stock Photo">
        </div>

        <div style="color:white" class="info-text">
            <h2>SMALL SCALE STOCK MARKET<h2>
                <p style="color:white">
                Welcome to StockMarketWeb, your gateway to the exciting world of investing in Kenya! Whether you are an investor looking to grow your portfolio or a small business seeking capital, we've got you covered.
                </p>
                
        </div>
        
        <div class= "side-content">

            <div class="inv-content">
                <img class="img" src= "inv.jpg" alt="Stock Photo">
                <p style="color:white">
                INVESTOR<br>
                <br>Discover a wide range of investment options tailored to your preferences and risk appetite. From stocks and bonds to real estate and startups, our platform offers a diverse array of investment opportunities to suit every investor's goals.
                </p>
            </div>

            <div class="biz-content">
                <img class="img" src= "biz.jpg" alt="Stock Photo">
                <p style="color:white">
                SMALL BUSINESS<br>
                <br>For small businesses, our platform acts as a bridge between entrepreneurs and investors. Showcase your business and attract potential investors who believe in your vision. Secure the funding necessary to fuel your growth and take your business to new heights.
                </p>
            </div>
        </div>

        
    </div>


</body>

</html>