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
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
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
                        <li><a class="dropdown-item" href="login.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
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
                                    <a class="nav-link" href="absensi/absensi_datang.php">Absensi Masuk</a>
                                    <a class="nav-link" href="absensi/absensi_pulang.php">Absensi Keluar</a>
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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Kehadiran Pegawai
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID Pegawai</th>
                                            <th>Tanggal</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Pulang</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID Pegawai</th>
                                            <th>Tanggal</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Pulang</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            // Lakukan koneksi ke database
                                            $localhost = "localhost"; // Ganti dengan nama host database Anda
                                            $username = "root"; // Ganti dengan nama pengguna database Anda
                                            $password = ""; // Ganti dengan kata sandi database Anda
                                            $database = "absensi"; // Ganti dengan nama database Anda

                                            $conn = new mysqli($localhost, $username, $password, $database);

                                            if ($conn->connect_error) {
                                                die("Koneksi gagal: " . $conn->connect_error);
                                            }

                                            // Query untuk mendapatkan data absensi pegawai
                                            $query_absensi = "SELECT * FROM presensi";
                                            $result_absensi = $conn->query($query_absensi);
                                           
                                            if ($result_absensi->num_rows > 0) {
                                                while ($row = $result_absensi->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['id_pegawai'] . "</td>";
                                                    echo "<td>" . $row['tgl'] . "</td>";
                                                    echo "<td>" . $row['jam_masuk'] . "</td>";
                                                    echo "<td>" . $row['jam_pulang'] . "</td>";
                                                    echo "<td>";
                                                    echo "<a href='absensi/edit_absensi.php?id=" . $row['id_presensi'] . "' class='btn btn-secondary btn-sm'>Edit</a>";
                                                    echo "<button class='btn btn-danger btn-sm delete-button' data-id='" . $row['id_presensi'] . "'>Delete</button>";
                                                    echo "</td>";


                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='4'>Tidak ada data absensi.</td></tr>";
                                            }
                                            $conn->close();
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Anik Sutariani</div>
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
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
        <script>
             $(document).ready(function() {
            $('.delete-button').on('click', function() {
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    var idPresensi = $(this).data('id');
                    
                    // Kirim permintaan AJAX ke skrip hapus_absensi.php
                    $.ajax({
                        type: 'POST',
                        url: 'absensi/hapus_absensi.php',
                        data: {
                            id_presensi: idPresensi
                        },
                        success: function(response) {
                            alert(response); // Tampilkan pesan dari server setelah penghapusan berhasil
                            location.reload(); // Refresh halaman setelah penghapusan berhasil
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText); // Tampilkan pesan kesalahan jika terjadi kesalahan
                        }
                    });
                }
            });
        });
        </script>

    </body>
</html>
