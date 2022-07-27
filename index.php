<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bootstrap 5 Responsive Landing Page Design</title>

  <!-- All CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Koulen&family=Roboto+Flex&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
  <style>
    .bi-youtube {
      color: white;
    }

    .bi-instagram {
      color: white;
    }

    .bi-twitter {
      color: white;
    }

    .bi-facebook {
      color: white;
    }

    .bi-envelope {
      color: white;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#"><i class="bi bi-envelope mr-2"></i> <span class="text-white">mapar.nb@gmail.com</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#Activity"><i class="bi bi-twitter"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about"><i class="bi bi-instagram"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Contact"><i class="bi bi-facebook"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-youtube "></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-lg-top">
    <div class="container">
      <a class="navbar-brand" href="#"><span class="text-warning">Logo </span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Activity">Activity</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img alt="..." class="d-block w-100" src="img/gate.jpg">
        <div class="carousel-caption text-start">
          <h5 class="head font">Your Dream House</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
          <p><a class="btn btn-warning mt-3" href="#">Learn More</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img alt="..." class="d-block w-100" src="img/gate.jpg">
        <div class="carousel-caption text-start">
          <h5 class="head font">Ini Bebas</h5>
          <p>asdasd.</p>
          <p><a class="btn btn-warning mt-3" href="#">Learn More</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img alt="..." class="d-block w-100" src="img/gate.jpg">
        <div class="carousel-caption text-start">
          <h5 class="head font">Ini Sama</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
          <p><a class="btn btn-warning mt-3" href="#">Learn More</a></p>
        </div>
      </div>


    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  </div>

  <!-- about section starts -->
  <section id="about" class="about section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-12 col-12">
          <div class="about-img">
            <img src="img/ngc2237_400.jpg" alt="" class="img-fluid" />
          </div>
        </div>
        <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
          <div class="about-text">
            <h2 class="font">Jaya Rimba Wibawa Kota</h2>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam,
              labore reiciendis. Assumenda eos quod animi! Soluta nesciunt
              inventore dolores excepturi provident, culpa beatae tempora,
              explicabo corporis quibusdam corrupti. Autem, quaerat. Assumenda
              quo aliquam vel, nostrum explicabo ipsum dolor, ipsa perferendis
              porro doloribus obcaecati placeat natus iste odio est non earum?
            </p>
            <a href="#" class="btn btn-warning">Learn More</a>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt-4">
      <div class="row justify-content-between">
        <div class="mt-md-5 bg-warning p-4 rounded mt-5">
          <div class="about-text">
            <h2 class="font">Visi</h2>
            <p>
              Terwujudnya pengelolaan Sumber Daya (SDA) dan lingkungan yang bermanfaat, bermatabat dan lestari

            </p>
            <a href="#" class="btn btn-light">Learn More</a>
          </div>
        </div>
        <div class="mt-md-5 bg-warning p-4 rounded mt-5">
          <div class="about-text">
            <h2 class="font">Misi</h2>
            <p>
            <ol type="A">
              <li>Mewujudkan penglolaan Sumber Daya Alam dan lingkungan yang lestari dengan meningkatkan
                peran serta masyarakat dan kualitas Sumber Daya Manusia
              </li>
              <li>Terwujudnya pengelolaan Sumber Daya Alam dan lingkungan yang berhasil guna dengan mengedepankan
                kemafaatan untuk seluruh lapisan masyarakat secara berkesinambungan
              </li>
            </ol>
            </p>
            <a href="#" class="btn btn-light">Learn More</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- slider -->
  <div class="container my-5 mt-4">
    <h1 id="Activity" class="mt-4 font">Aktivitas </h1>
    <div>
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio veniam quibusdam repudiandae nisi fuga corrupti molestias voluptate numquam autem doloremque?
    </div>
    <div class="row">
      <div class="col-12 m-auto mt-4">
        <div class="owl-carousel owl-theme">
          <!-- item -->
          <?php
          include 'admin/config/database.php';
          $query = mysqli_query($mysqli, "SELECT * FROM artikel ORDER BY id_artikel DESC")
            or die('Ada kesalahan pada query tampil Data artikel: ' . mysqli_error($mysqli));

          // tampilkan data
          while ($data = mysqli_fetch_assoc($query)) {
          ?>
            <div class="item mb-4">
              <div class="card border-0 shadow p-2">
                <img src="admin/images/<?= $data['foto'] ?>" alt="" class="card-img-top" style="width:400px; height:300px;" />
                <div class="card-body">
                  <div class="card-title text-center">
                    <h3 class="font"><?= $data['judul'] ?></h3>
                    <p class="text-right">
                      <?= $data['deskripsi'] ?>
                    </p>
                  </div>
                  <a href="read_artikel.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">More Info</a>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
          <!--  -->
        </div>
      </div>
    </div>
  </div>
  <!-- end of slider -->
  <section class="team section-padding" id="Contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-header text-center pb-5">
            <h2 class="font">Contact</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur <br />adipisicing elit.
              Non, quo.
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Item-->
        <?php
        include 'admin/config/database.php';
        $query = mysqli_query($mysqli, "SELECT * FROM contact ORDER BY id_contact DESC limit 4")
          or die('Ada kesalahan pada query tampil Data artikel: ' . mysqli_error($mysqli));

        // tampilkan data
        while ($data = mysqli_fetch_assoc($query)) {
        ?>
          <div class="col-12 col-md-6 col-lg-3">
            <div class="card text-center">
              <div class="card-body">
                <img src="img/team-1.jpg" alt="" class="img-fluid rounded-circle" />
                <h3 class="card-title py-2 font"><?= $data['nama_contact'] ?></h3>
                <p class="card-text">
                  <?= $data['keterangan'] ?>
                </p>

                <p class="socials">
                  <a href="tel:+<?= $data['no_telp'] ?>"><i class="bi bi-telephone-fill text-dark mx-1"></i></a>
                  <a href="mailto:<?= $data['email'] ?>"><i class="bi bi-envelope text-dark mx-1"></i></a>
                  <a href="<?= $data['instagram'] ?>"><i class="bi bi-instagram text-dark mx-1"></i></a>
                </p>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </section>
  <!-- team ends -->
  <!-- footer starts -->
  <footer class="bg-dark p-2 text-center">
    <div class="container">
      <p class="text-white">All Right Reserved By @website Name</p>
    </div>
  </footer>
  <!-- footer ends -->

  <!-- All Js -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
  <script>
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 15,
      nav: true,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 2,
        },
        1000: {
          items: 3,
        },
      },
    })
  </script>
</body>

</html>

<!--for getting the form download the code from download button-->