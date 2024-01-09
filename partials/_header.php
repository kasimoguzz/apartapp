<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css">
    <title>Apart App</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        #carouselExampleControls {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .carousel-inner {
            text-align: center;
        }

        .carousel-caption {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }
        .carousel-item img {
            
            object-fit: cover;
            height: 100vh;
        }
        .payment-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-check {
            margin-top: 15px;
        }

        .btn-pay {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>