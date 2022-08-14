
 <section>
       <div class="container">
           <div class="row">
               <div class="col-lg-6 m-auto">
                   <div class="card">
                       <div class="card-header">
                           <h3>Log In Here</h3>
                       </div>
                       <div class="card-body">
                           <form action="login_post.php" method="post">
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Enter Email</label>
                                    <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email"  value="">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Enter Password</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control" name = "password">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-2 m-auto">
                                     <button type="submit" class="btn btn-primary">Log In</button>
                                    </div>
                                </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>



      <?php if(isset($_SESSION['email_wrong'])){?>
            <script>
            Swal.fire({
            position: 'top-center',
            icon: 'warning',
            title: "<?=$_SESSION['email_wrong']?>",
            showConfirmButton: false,
            timer: 1500
            })
            </script>
   <?php } unset($_SESSION['email_wrong']) ?>

   <?php if(isset($_SESSION['password_wrong'])){?>
            <script>
            Swal.fire({
            position: 'top-center',
            icon: 'warning',
            title: "<?=$_SESSION['password_wrong']?>",
            showConfirmButton: false,
            timer: 1500
            })
            </script>
   <?php } unset($_SESSION['password_wrong']) ?>

   <?php if(isset($_SESSION['empty_from'])){?>
            <script>
            Swal.fire({
            position: 'top-center',
            icon: 'warning',
            title: "<?=$_SESSION['empty_from']?>",
            showConfirmButton: false,
            timer: 1500
            })
            </script>
   <?php } unset($_SESSION['empty_from']) ?>

   <?php if(isset($_SESSION['password_empty'])){?>
            <script>
            Swal.fire({
            position: 'top-center',
            icon: 'warning',
            title: "<?=$_SESSION['password_empty']?>",
            showConfirmButton: false,
            timer: 1500
            })
            </script>
   <?php } unset($_SESSION['password_empty']) ?>