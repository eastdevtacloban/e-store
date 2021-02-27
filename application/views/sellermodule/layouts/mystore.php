<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">My Store</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">My Store</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-body">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" height="300" src="<?php echo site_url('/') ?>assets/dist/img/boxed-bg.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" height="300" src="<?php echo site_url('/') ?>assets/dist/img/boxed-bg.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" height="300" src="<?php echo site_url('/') ?>assets/dist/img/boxed-bg.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <div class="row"> 
          <div class="col-md-3">
            <div class="info-box bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Over All Inventory</span>
                <span class="info-box-number"><?php echo count($inventory); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <div class="col-md-3">
            <!-- /.info-box -->
            <div class="info-box bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Off Take</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="fas fa-fax"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3">
            <div class="info-box bg-danger">
              <span class="info-box-icon"><i class="fas fa-"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cancelled</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
      </div>
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Color</th>
                <th>Size</th>
                <th>Categories</th>
                <th>Description</th>
                <th>Shipping Fee</th>
                <th>Condition</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($inventory as $stocks): ?>
                <tr>
                  <td><?php echo $stocks['productName']; ?></td>
                  <td><?php echo $stocks['prodStockQty']; ?></td>
                  <td>&#8369; <?php echo number_format($stocks['prodPrice'], 2); ?></td>
                  <td>
                    <?php
                      $unser = unserialize($stocks['prodColor']); 
                      // dd($unser);
                      if (empty($stocks['prodColor'])) {
                        echo 'N/A';
                      }elseif (!empty($unser)) {
                        foreach ($unser as $value) {
                            echo $value.' ';
                        }  
                      }
                    ?>
                  </td>
                  <td>
                    <?php
                      $unsersize = unserialize($stocks['prodSize']); 
                      // dd($unsersize);
                      if (empty($stocks['prodSize'])) {
                        echo 'N/A';
                      }elseif (!empty($stocks['prodSize'])) {
                        foreach ($unsersize as $key) {
                            echo $key;
                        }  
                      }
                    ?>
                  </td>
                  <td><?php echo $stocks['categoryName']; ?></td>
                  <td><?php echo $stocks['productDescription']; ?></td>
                  <td>&#8369; <?php echo number_format($stocks['shippingFee'], 2); ?></td>
                  <td align="center">
                    <?php 
                      if ($stocks['prodCondiion'] == '1') {
                        echo '<span class="right badge badge-primary">NEW</span>';
                      }elseif ($stocks['prodCondiion'] == '2') {
                        echo '<span class="right badge badge-warning">OLD</span>';
                      }   
                    ?>
                  </td>
                  <td>
                    <table>
                      <tr>
                          <td>
                            <div class="btn-group">
                              <a href="<?php echo site_url('/'); ?>retailer/remove_item?id=<?php echo $stocks['id']; ?>" type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete!" onclick="return confirm('Are you sure you want to Remove this Item ?')"><i class="far fa-trash-alt"></i></a>
                            </div>
                          </td>
                          <td>    
                            <div class="btn-group">
                              <a href="" data-toggle="modal" data-target="#modal-default<?php echo $stocks['id']; ?>" type="button" data-toggle="tooltip" title="Edit!" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                            </div>
                          </td>
                          <div class="modal fade" id="modal-default<?php echo $stocks['id']; ?>">
                            <div class="modal-dialog  modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Default Modal</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                          <!-- Profile Image -->
                                          <div class="card card-primary card-outline">
                                            <div class="card-body box-profile">
                                              <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle" src="<?php echo site_url('/').$stocks['prodImage']; ?>" alt="User profile picture">
                                              </div>
                                            </div>
                                            <!-- /.card-body -->
                                          </div>
                                          <!-- /.card -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-9">
                                            <div class="card card-primary card-outline">
                                              <div class="card-body box-profile">
                                                      <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Product Name</label>
                                                        <div class="col-sm-10">
                                                          <input type="text" class="form-control" value="<?php echo $stocks['productName']; ?>">
                                                        </div>
                                                      </div>
                                                      <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Quantity</label>
                                                        <div class="col-sm-10">
                                                          <input type="text" class="form-control" value="<?php echo $stocks['prodStockQty']; ?>">
                                                        </div>
                                                      </div>
                                                      <div class="row">
                                                        <label for="inputSupllier" class="col-sm-2 col-form-label">Price</label>
                                                        <div class="input-group mb-3 col-sm-10">
                                                          <div class="input-group-prepend">
                                                            <span class="input-group-text">&#8369;</span>
                                                          </div>
                                                          <input type="number" class="form-control" value="<?php echo $stocks['prodPrice']; ?>">
                                                        </div>
                                                      </div>
                                                      <?php
                                                        $unser = unserialize($stocks['prodColor']);   
                                                        if (!empty($stocks['prodColor'])) {
                                                          foreach ($unser as $value) {
                                                              echo '<div class="form-group row">';
                                                              echo    '<label class="col-sm-2 col-form-label">Color</label>';
                                                              echo      '<div class="col-sm-10">';
                                                              echo        '<input type="text" class="form-control" value="'.$value.'" name="prodColor">';
                                                              echo      '</div>';
                                                              echo  '</div>';
                                                              } 
                                                        }
                                                      ?>
                                                       <?php
                                                        $unsersize = unserialize($stocks['prodSize']);   
                                                        if (!empty($stocks['prodSize'])) {
                                                          foreach ($unsersize as $keyvalue) {
                                                              echo '<div class="form-group row">';
                                                              echo    '<label class="col-sm-2 col-form-label">Size</label>';
                                                              echo      '<div class="col-sm-10">';
                                                              echo        '<input type="text" class="form-control" value="'.$keyvalue.'" name="prodSize">';
                                                              echo      '</div>';
                                                              echo  '</div>';
                                                          }
                                                        }
                                                      ?>
                                                      <div class="form-group row">
                                                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Categories</label>
                                                        <select class="form-control col-sm-8" name="catID">
                                                          <?php foreach ($categories as $category): ?>
                                                            <option value="<?php echo $category['cid']; ?>" <?php if ($category['cid'] == $stocks['catID']){ echo 'selected="selected"'; } ?>><?php echo $category['categoryName']; ?></option>
                                                          <?php endforeach ?>
                                                        </select>
                                                      </div>
                                                      
                                              </div>
                                              <!-- /.card-body -->
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <!-- /.modal -->
                      </tr> 
                    </table>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
  </div>