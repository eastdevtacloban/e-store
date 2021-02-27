<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-cog"></i>Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <form action="" method="post">
          <div class="card-body" style="background-color: #f2f2f2;">
              <div class="row">
                <div class="col-md-3">
                  <!-- Profile Image -->
                  <div class="card card-warning card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="<?php echo site_url(); ?>assets/dist/img/avatar-profile.png" alt="User profile picture">
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div  class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" class="form-control" value="<?php echo ucwords($buyerInfo['first_name']); ?>" id="exampleInputEmail1" placeholder="First Name" name="first_name">
                          </div>
                        </div>
                        <div  class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" class="form-control" value="<?php echo ucwords($buyerInfo['last_name']); ?>" id="exampleInputEmail1" placeholder="Last Name" name="last_name">
                          </div>
                        </div>
                        <div  class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Middle Name</label>
                            <input type="text" class="form-control" value="<?php echo ucwords($buyerInfo['mid_name']); ?>" id="exampleInputEmail1" placeholder="Middle Name" name="mid_name">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Phone #</label>
                            <input type="text" class="form-control" value="<?php echo ucwords($buyerInfo['contactNo']); ?>" id="exampleInputEmail1" placeholder="Phone #" name="contactNo">

                            <?php if(empty($buyerInfo['contactNo'])){echo '<span class="badge badge-danger"><i class="icon fas fa-exclamation-triangle"></i> Must Have Phone Number</span>'; } ?>
                          
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" value="<?php echo ucwords($buyerInfo['email']); ?>" id="exampleInputEmail1" placeholder="Email" name="email">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" class="form-control" value="<?php echo ucwords($buyerInfo['userAddress']); ?>" id="exampleInputEmail1" placeholder="Address" name="userAddress">

                            <?php if(empty($buyerInfo['userAddress'])){ echo '<span class="badge badge-danger"><i class="icon fas fa-exclamation-triangle"></i> Must Have An Address</span>'; } ?>

                      </div>
                    </div><!-- /.card-body -->
                  </div>
                  <button type="submit" class="btn btn-warning btn-flot form-control" name="Ssavechanges">Save Changes</button>  
                </div>
                <!-- /.col -->
              </div>
          </div>
        </form>
      </div>
    </section>
  </div>