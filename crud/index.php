<?php 
  require_once ('dbcontroller.php');
  
  $db = new dbController();
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <title>Document</title>

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top ">
  <div class="container">
    <a class="navbar-brand" href="#">Arkan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#guru">Guru</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#guru">Murid</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<!-- Navbar -->

 
<!-- card -->
<div class="container mt-3">
  <div class=" row text-center justify-content-center ">
    <?php 
    $sql = "SELECT * FROM t_jurusan";
    $row = $db->getALL($sql);
    foreach($row as $value) :
    ?>
    
    <div class="col-md-4 mb-5 ">
      <div class="card">
        <img src="img/kelas/<?php echo $value['f_nama']; ?>.jpg " class="card-img-top" style="height: 200px;">
        <div class="card-body">
          <h5 class="card-title">
            <?php echo $value['f_nama']; ?>
          </h5>

          <p><?= $value['f_deksripsi'] ?></p>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
<!-- card -->

<!-- card guru -->
<div class="container" id="guru">
  <h1 class=" text-center mb-5 ">Guru SMKN 40</h1>
  <div class="row text-center justify-content-center ">
     <?php 
    $sql2 = "SELECT * FROM t_guru";
    $row2 = $db->getALL($sql2);
    foreach($row2 as $guru) :
    ?>
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="img/guru/<?php echo $guru['f_nama']; ?>.jpg " class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?= $guru['f_nama']; ?></h5>
            <p >Guru SMKN 40</p>
             <p class="card-text"><small class="text-body-secondary">Jalan Nanas 2 RT. 09 RW 010, Utan Kayu Utara, Matraman, Jakarta Timur, DKI Jakarta, Indonesia</small></p>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
<!-- card guru -->

<!-- table siswa -->
<div class="container  w-75  ">
<h1 class=" text-center mt-5 ">Guru SMKN 40</h1>
  <table class="table mt-5">
    <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Kelas</th>
      <th scope="col">Jurusan</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php
      $i = 1;
      $sql = "SELECT t_siswa.f_nama,
                     t_kelas.f_nama AS f_kelas,
                     t_jurusan.f_nama AS f_jurusan 
                     FROM t_siswa
                      INNER JOIN t_kelas
                        ON t_siswa . f_idkelas = t_kelas.f_idkelas
                      INNER JOIN t_jurusan
                        ON t_siswa . f_idjurusan = t_jurusan.f_idjurusan
              ORDER BY t_jurusan . f_idjurusan, t_kelas . f_idkelas, t_siswa . f_idsiswa;";
      $row = $db->getALL($sql);
      foreach($row as $murid) :
    ?>
    <tr>
      <th scope="row"><?= $i++ ?></th>

      <td>
        <?php echo $murid['f_nama']; ?>
      </td>
      <td>
        <?php echo $murid['f_kelas']; ?>
      </td>
      <td>
        <?php echo $murid['f_jurusan']; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
<!-- table siswa -->

<!-- start footer -->
<footer>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#000" fill-opacity="1" d="M0,128L18.5,112C36.9,96,74,64,111,58.7C147.7,53,185,75,222,96C258.5,117,295,139,332,176C369.2,213,406,267,443,272C480,277,517,235,554,202.7C590.8,171,628,149,665,133.3C701.5,117,738,107,775,122.7C812.3,139,849,181,886,165.3C923.1,149,960,75,997,69.3C1033.8,64,1071,128,1108,160C1144.6,192,1182,192,1218,181.3C1255.4,171,1292,149,1329,133.3C1366.2,117,1403,107,1422,101.3L1440,96L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z"></path></svg>
  <div class="container-fluid  text-center bg-black ">
    <div class="row">
      <p class="mb-4 text-white ">&copy; copyright 2023 | built with PHP</p>
    </div>
  </div>
</footer>
<!-- akhir footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>