
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
	
			<div class="card-body">
				<form action="koneksi/proses_login.php" method="POST">
					<?php
					// Memeriksa apakah ada pesan kesalahan
					if (isset($_GET['error'])) {
						echo '<p class="error-message">Email atau Password salah!</p>';
					}
					?>

					 <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="container mt-5">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-6">
                                        <div class="card px-5 py-5" id="form1">
                                            <div class="form-data" v-if="!submitted">
                                                <div class="forms-inputs mb-4"> <span> username</span> <input autocomplete="off" type="text" v-model="email" name="username" v-bind:class="{'form-control':true, 'is-invalid' : !validEmail(email) && emailBlured}" v-on:blur="emailBlured = true">
                                                    <div class="invalid-feedback">A valid email is required!</div>
                                                </div>
                                                <div class="forms-inputs mb-4"> <span>Password</span> <input autocomplete="off" type="password" v-model="password" name="password"  v-bind:class="{'form-control':true, 'is-invalid' : !validPassword(password) && passwordBlured}" v-on:blur="passwordBlured = true">
                                                    <div class="invalid-feedback">Password must be 8 character!</div>
                                                </div>
                                                <div class="mb-3"> <button v-on:click.stop.prevent="submit" class="btn btn-dark w-100">Login</button> </div>
                                            </div>
                                            <div class="success-data" v-else>
                                                <div class="text-center d-flex flex-column"> <i class='bx bxs-badge-check'></i> <span class="text-center fs-1">You have been logged in <br> Successfully</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                    
</div>
</body>
</html>