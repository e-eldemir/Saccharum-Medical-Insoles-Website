<?php

require 'db_connect.php';

try {
  $sql = "SELECT * FROM `sicakliklar` ORDER BY tarih DESC LIMIT 15;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  $result = $stmt->fetchAll(PDO::FETCH_CLASS);
  //print_r($result);
  $data = [];
  foreach ($result as $row) {
    $data[] = [
      'datetime' => $row->tarih,
      'value1' => (int)$row->s1,
      'value2' => (int)$row->s2,
      'value3' => (int)$row->s3,
      'value4' => (int)$row->s4,
      'value5' => (int)$row->s5,
      'value6' => (int)$row->s6,
    ];
  }
} catch (\PDOException $e) {
}

?>
<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Saccharum.co</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">



  <script src="//cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="//cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>
  <script src="//cdn.jsdelivr.net/npm/date-fns"></script>
  <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">

        <span class="d-none d-lg-block">Saccharum.co</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Ara" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div> -->


  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <?php

    include('layouts/nav.php');
    ?>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Table</h1>

    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">



          <div class="card">
            <div class="card-body py-5">


              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">s1</th>
                    <th scope="col">s2</th>
                    <th scope="col">s3</th>
                    <th scope="col">s4</th>
                    <th scope="col">s5</th>
                    <th scope="col">s6</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  foreach ($result as $row) {
                    echo "<tr>";
                    echo '<td scope="row">' . date('d.m.Y H:s',strtotime($row->tarih)) . "</td>";
                    echo '<td>' . $row->s1 . "</td>";
                    echo '<td>' . $row->s2 . "</td>";
                    echo '<td>' . $row->s3 . "</td>";
                    echo '<td>' . $row->s4 . "</td>";
                    echo '<td>' . $row->s5 . "</td>";
                    echo '<td>' . $row->s6 . "</td>";
                    echo "</tr>";
                  }
                  ?>

                </tbody>
              </table>


            </div>
          </div>


        </div>


      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Saccharum.co</span></strong>
    </div>
    <div class="credits">
      Emre Alp Eldemir
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>



</body>

</html>
