<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MRC</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Prompt:wght@100;300;400;700&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- Feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Favicon -->
    <link rel="shorcut icon" href="assets/LogoMRC.png" type="image/png" />

    <!-- Preload -->
    <link rel="preload" href="assets/Bg1.jpg" as="image" />
    <link rel="preload" href="assets/Bg2.jpg" as="image" />
    <link rel="preload" href="assets/Bg3.jpg" as="image" />
    <link rel="preload" href="assets/Bg4.jpg" as="image" />
    <link rel="preload" href="assets/Track.mp4" as="video" />
</head>

<body>
    <!-- Navbar start -->
    <nav class="navbar">
        <div class="nav-logo">
            <a href="" class="logo-img" title="Logo MRC"><img src="assets/LogoMRC.png" alt="Logo MRC" /></a>
            <a href="" class="logo-tittle">MRC</a>
        </div>
        <div class="navbar-nav">
            <a href="#Beranda">Beranda</a>
            <a href="#Trackline">Trackline</a>
            <a href="#Linimasa">Linimasa</a>
            <a href="#Rulebook">Rulebook</a>
            <a href="#Tentang">Tentang</a>
        </div>

        <div class="menu">
            <a href="#" id="humberger-menu"><i class="feather" data-feather="menu"></i></a>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- Hero start-->
    <section class="hero" id="Beranda">
        <main class="content">
            <div class="row">
                <div class="tema">
                    <h3>MRC 2024</h3>
                    <h2>WE'RE BACK WITH BETTER EXPERIENCE AND BEST EVOLUTION</h2>
                </div>

                <div class="tombol">
                    <a href="daftar.php" target="_blank" class="daftar">Daftar Lomba</a>
                    <a href="#Tentang" class="tombol-tentang">Tentang Kami</a>
                    <a href="https://twb.nz/twibbonpesertamrcvi" target="_blank" class="tombol-tentang">Twibbon</a>
                </div>
            </div>
        </main>
    </section>
    <!-- Hero end -->

    <!-- Track start -->
    <section class="trackline" id="Trackline">
        <h2>Track<span>line</span></h2>
        <div class="row">
            <video src="assets/Track.mp4" autoplay muted loop></video>
            <div class="tombol-unduh">
                <a href="fungsi.php?jalur=Jalur.png">Unduh .PNG</a>
                <a href="fungsi.php?cdr=Trackline.cdr">Unduh .CDR</a>
            </div>
        </div>
    </section>
    <!-- Track end -->

    <!-- Linimasa start-->
    <section class="linimasa" id="Linimasa">
        <h2><span>Lini</span>masa</h2>
        <div class="row">
            <div class="linimasa-img">
                <img src="assets/Linimasa.svg" alt="" />
            </div>
        </div>
    </section>
    <!-- Linimasa end -->

    <!-- Rulebook start -->
    <section class="rulebook" id="Rulebook">
        <h2>Rule<span>book</span></h2>
        <div class="row">
            <div class="foto1"><img src="assets/rulebook/rulebook1.jpg" alt="" /></div>
            <div class="foto2"><img src="assets/rulebook/rulebook2.jpg" alt="" /></div>
            <div class="foto3"><img src="assets/rulebook/rulebook3.jpg" alt="" /></div>
        </div>
        <div class="rekening">
            <div class="container">
                <h4>Pembayaran Melalui :</h4>
                <div class="btn">
                    <p class="nama">BTN</p>
                    <p class="nomor">0046901610155522</p>
                    <p class="an">an Khafifah Juwi Najah</p>
                </div>
                <div class="bri">
                    <p class="nama">BRI</p>
                    <p class="nomor">6563-01-020386-53-1</p>
                    <p class="an">an Khafifah Juwi Najah</p>
                </div>
                <div class="dana">
                    <p class="nama">Dana</p>
                    <p class="nomor">0857-7477-2023</p>
                    <p class="an">an Khafifah Juwi Najah</p>
                </div>
            </div>
        </div>
        <a href="fungsi.php?rulebook=Rulebook.pdf">Unduh Rulebook</a>
    </section>
    <!-- Rulebook end -->

    <!-- Tentang kami start -->
    <section class="tentang" id="Tentang">
        <h2><span>Tentang</span> Kami</h2>
        <div class="row">
            <div class="foto"></div>
            <div class="keterangan">
                <p><span>Mechatronics Robotic Competition (MRC)</span> merupakan event lomba robot nasional tahunan yang
                    diadakan oleh Himpunan Mahasiswa Mekatronika (HIMAMEKA) Program Studi Teknik Mekatronika Universitas
                    Trunojoyo Madura.</p>
            </div>
        </div>
    </section>
    <!-- Tentang kami end -->

    <!-- Footer start -->
    <footer>
        <div class="sosial">
            <a href=""><i data-feather="instagram"></i></a>
            <a href=""><i data-feather="youtube"></i></a>
            <a href=""><i data-feather="facebook"></i></a>
        </div>

        <div class="link">
            <a href="#Beranda">Beranda</a>
            <a href="#Trackline">Trackline</a>
            <a href="#Linimasa">Linimasa</a>
            <a href="#Rulebook">Rulebook</a>
            <a href="#Tentang">Tentang</a>
        </div>

        <div class="credit">
            <p>Dikembangkan oleh <a href="">MRC</a> | &copy;2023</p>
        </div>
    </footer>
    <!-- Footer end -->

    <script>
        feather.replace();
    </script>
    <script src="js/script.js"></script>
</body>

</html>