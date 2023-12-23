<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Sistem Absensi</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../login.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="../index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Absensi</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Sistem Absensi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="absensi_datang.php">Absensi Masuk</a>
                                    <a class="nav-link" href="absensi_pulang.php">Absensi Keluar</a>
                                </nav>
                            </div>
                           

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Anik Sutariani 2305551030
                    </div>
                </nav>
            </div>


            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                        <h2 class="mt-4">Absensi Datang</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Absensi Datang</li>
                        </ol>
                <div class="row justify-content-space-between">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body ">
                                                        <form method="POST" action="absensi_datang.php">
                                                            <div class="form-group">
                                                                <label for="id_pegawai">ID Pegawai</label>
                                                                <input type="text" class="form-control" id="id_pegawai" name="id_pegawai" placeholder="Masukkan ID Pegawai" required>
                                                            </div>
                                                            <button type="submit" class="btn btn-dark w-100" name="submit">Cari Pegawai</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="card">
                                                    <div class="card-body ">
                                                        <form method="POST" action="absensi_datang.php">
                                                            <div class="form-group">
                                                            <?php
                                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                            $localhost = "localhost"; 
                                                            $username = "root"; 
                                                            $password = ""; 
                                                            $database = "absensi"; 

                                                            // Membuat koneksi ke database
                                                            $conn = new mysqli($localhost, $username, $password, $database);

                                                            // Periksa koneksi
                                                            if ($conn->connect_error) {
                                                                die("Koneksi gagal: " . $conn->connect_error);
                                                            }

                                                            $id_pegawai = $_POST['id_pegawai'];

                                                            // Query untuk mendapatkan data pegawai dan jabatan
                                                            $query = "SELECT pegawai.nama_pegawai, jabatan.nama_jabatan FROM pegawai 
                                                                    INNER JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan 
                                                                    WHERE pegawai.id_pegawai = '".$id_pegawai."'";
                                                            $result = $conn->query($query);

                                                            if ($result->num_rows > 0) {
                                                                // Jika data pegawai ditemukan
                                                                $row = $result->fetch_assoc();
                                                                $nama_pegawai = $row['nama_pegawai'];
                                                                $nama_jabatan = $row['nama_jabatan'];

                                                                // Tampilkan nama pegawai dan jabatan
                                                                echo "<h6>Data Pegawai:</h6>";
                                                                echo "Nama Pegawai: " . $nama_pegawai . "<br>";
                                                                echo "Jabatan: " . $nama_jabatan . "<br>";

                                                                // Tampilkan form absensi jika data pegawai valid
                                                                echo "<form method='POST' action='absensi_datang.php'>";
                                                                echo "<input type='hidden' name='id_pegawai' value='$id_pegawai'>";
                                                                echo "<input type='hidden' name='nama_pegawai' value='$nama_pegawai'>";
                                                                echo "<input type='hidden' name='nama_jabatan' value='$nama_jabatan'>";
                                                                echo "<input type='submit' name='tambah' value='Simpan Absensi'>";
                                                                echo "</form>";
                                                            } else {
                                                                echo "Pegawai tidak ditemukan.";
                                                            }}

                                                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tambah'])) {
                                                                $id_pegawai = $_POST['id_pegawai'];
                                                                $nama_pegawai = $_POST['nama_pegawai'];
                                                                $nama_jabatan = $_POST['nama_jabatan'];
  
                                                                $today_date = date('Y-m-d');
                                                                $query_check_absensi = "SELECT * FROM presensi WHERE id_pegawai = '$id_pegawai' AND tgl = '$today_date'";
                                                                $result_check_absensi = $conn->query($query_check_absensi);

                                                                if ($result_check_absensi->num_rows > 0) {
                                                                    // Jika sudah ada absensi pada tanggal yang sama
                                                                    echo "<p> Anda sudah melakukan absensi pada hari ini. </p>";
                                                                } else {
                                                                    // Jika belum ada absensi pada tanggal yang sama, lakukan absensi masuk
                                                                    date_default_timezone_set('Asia/Kuala_Lumpur');
                                                                    $tgl = date('Y-m-d');
                                                                    $jam_masuk = date('H:i:s');
                                                            
                                                                // Query untuk menyimpan absensi
                                                                $query_absensi = "INSERT INTO presensi (id_pegawai, tgl, jam_masuk) VALUES ('$id_pegawai', '$tgl', '$jam_masuk')";
                                                                    
                                                                if ($conn->query($query_absensi) === TRUE) {
                                                                    echo "<p>Absensi datang berhasil disimpan pada tanggal $tgl jam $jam_masuk.</p>";
                                                                } else {
                                                                    echo "Error: " . $query_absensi . "<br>" . $conn->error;
                                                                }
                                                            }
                                                            $conn->close();
                                                        } 
                                                        
                                                        ?>
                                                            </div>
                                                        
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="card mb-4">
                                            <div class="card-header">
                                                <i class="fas fa-table me-1"></i>
                                                Data Absensi Masuk Pegawai
                                            </div>
                                            
                                                    <div class="card-body">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID Pegawai</th>
                                                                    <th>Nama Pegawai</th>
                                                                    <th>Tanggal</th>
                                                                    <th>Jam Masuk</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                // Lakukan koneksi ke database
                                                                $koneksi = new mysqli("localhost", "root", "", "absensi");
                                                                if ($koneksi->connect_error) {
                                                                    die("Koneksi gagal: " . $koneksi->connect_error);
                                                                }

                                                                // Query untuk mendapatkan data absensi masuk
                                                                $query_absensi = $query_absensi = "SELECT pegawai.id_pegawai, pegawai.nama_pegawai, presensi.tgl, presensi.jam_masuk 
                                                                FROM pegawai 
                                                                INNER JOIN presensi ON presensi.id_pegawai = pegawai.id_pegawai";        
                                                                $result_absensi = $koneksi->query($query_absensi);

                                                                if ($result_absensi->num_rows > 0) {
                                                                    while ($row = $result_absensi->fetch_assoc()) {
                                                                        echo "<tr>";
                                                                        echo "<td>" . $row['id_pegawai'] . "</td>";
                                                                        echo "<td>" . $row['nama_pegawai'] . "</td>";
                                                                        echo "<td>" . $row['tgl'] . "</td>";
                                                                        echo "<td>" . $row['jam_masuk'] . "</td>";
                                                                        echo "</tr>";
                                                                    }
                                                                } else {
                                                                    echo "<tr><td colspan='4'>Tidak ada data absensi masuk.</td></tr>";
                                                                }
                                                                $koneksi->close();
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        </div>
                                        </div>
                                    </div>
                        
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy;Anik Sutariani </div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
