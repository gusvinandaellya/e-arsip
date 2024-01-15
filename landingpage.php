<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI-TUMPOL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-xxx" crossorigin="anonymous" />
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Nunito", "Segoe UI", arial, serif;
            overflow: hidden;
            /* Tambahkan baris ini */
        }

        nav .left-section,
        nav .right-section {
            display: flex;
            align-items: center;
        }

        nav .left-section {
            width: 50%;
            margin-left: 40px;
        }

        nav .right-section {
            width: 50%;
            display: flex;
            justify-content: flex-end;
            margin-right: 40px;
        }

        nav .system-name {
            margin-left: 1rem;
            font-size: 1rem;
            color: #fff;
        }

        .social-media-buttons {
            display: flex;
        }

        nav {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            width: 100%;
            background-color: #6777ef;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-around;
            margin-top: 0rem;
            color: #fff;
        }

        nav .logo {
            font-size: 1 . rem;
            width: 30%;
        }

        nav .logo img {
            padding-top: 0px;
            width: 80px;
        }

        .nav-links {
            list-style-type: none;
            display: flex;
        }

        .nav-links li a {
            color: inherit;
            margin-left: 1rem;
            cursor: pointer;
            text-decoration: none;
        }

        .contents {
            min-height: 100vh;
            background-color: #ffffff;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            width: 80%;
            padding-top: 1rem;
            margin: 0 auto;
        }

        .content-wrapper {
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-width: 50%;
        }

        .btn {
            padding: 18px 34px;
            font-size: 18px;
            font-weight: 700;
            display: inline-block;
            margin-right: 24px;
            margin-bottom: 24px;
            color: #fff;
            background-color: #6777ef;
            border-color: #6777ef;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            line-height: 1.5;
            border-radius: 0.25;
        }

        a {
            color: #fff;
            text-decoration: none;
            background-color: transparent;
        }

        .content-wrapper img {
            width: 90%;
            margin: 0 auto;
            padding-left: 60px;
        }

        /* responsive */

        @media screen and (max-width: 768px) {
            nav {
                flex-direction: initial;
                margin: 0rem;
            }

            nav .logo {
                margin-top: 2rem;
                text-align: left;
                width: 100%;
            }

            nav ul {
                padding-inline-start: 0;
                margin: 3rem;
            }

            h1 {
                margin-top: 0px;
            }

            .content-wrapper {
                max-width: 100% !important;
                margin-top: auto;
            }

            img {
                width: 60%;
                margin: 0 auto;
                padding: 2rem 0 2rem 0;
            }
        }


        @media screen and (min-width: 100px) {
            .contents {
                padding-top: 6rem;
            }
        }
    </style>
</head>

<body>
    <nav>
        <div class="left-section">
            <!--        <div class="logo">-->
            <!--            <img src="assets/img/logo_demak.png" alt="">-->
            <!--        </div>-->
            <div class="system-name" style="font-weight: bold">
                SI-TUMPOL
            </div>
        </div>

        <div class="right-section">
            <div class="system-name">
                <a href="login.php">Masuk</a>
            </div>
        </div>
    </nav>

    <main class="contents">
        <div class="row">
            <div class="content-wrapper">
                <h1>Si tumpol</h1>
                <p style="line-height: 1.5; font-weight:bold">Arsip Sekretariat Umum Kepolisian Daerah Jawa Tengah</p>
                <p style="line-height: 1.5;">Sistem pendataan & temu balik arsip dinamis inaktif Sekretariat Umum Kepolisian Daerah Jawa Tengah oleh mahasiswa D4 Informasi dan Hubungan Masyarakat Universitas Diponegoro.</p>
                <a href="login.php" class="btn">Masuk Sekarang</a>
            </div>

            <div class="content-wrapper">
                <img src="assets/img/landing2.png" alt="" srcset="">
            </div>

        </div>
    </main>
</body>

</html>