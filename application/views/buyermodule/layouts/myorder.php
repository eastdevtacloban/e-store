<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-cart-plus"></i>My Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">My Order</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <?php foreach ($myorder as $order): ?>
                  <div id="accordion">
                    <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                    <div class="card card-warning">
                      <div class="card-header">
                        <h4 class="card-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Order ID : <?php echo $order['orderID']; ?>
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse">
                        <div class="card-body">
                          <div class="row">
                            <?php foreach ($orders as $items): ?>
                              <?php if ($order['orderID'] == $items['orderID']): ?>
                                <div class="col-6">
                                  <div class="info-box" style="border-style: groove;">
                                    <span class="info-box-icon bg-warning">
                                        <img width="70" height="70" src="<?php echo site_url().$items['prodImage']; ?>">
                                    </span>

                                    <div class="info-box-content">
                                      <span class="info-box-text">&#8369; <?php echo number_format($items['prodPrice'], 2); ?></span>
                                      <span class="info-box-number"><?php echo ucwords($items['productName']); ?></span>
                                      <div align="center">
                                        <?php  
                                          if ($items['parcelStatus'] == 1) {
                                            echo  '<button  style="font-size: 15px;" type="button" class="btn btn-block btn-warning btn-xs">pending...</button>';
                                          }elseif ($items['parcelStatus'] == 2) {
                                            echo  '<a href="'.site_url().'/buyer/received_item?id='.$items['parcelId'].'" style="font-size: 15px;" class="btn btn-block btn-success btn-xs">Received</a>';
                                          }
                                        ?>
                                      </div>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <!-- <div style="border-style: ridge;margin-bottom: 10px;"></div> -->
                              <?php endif ?>
                            <?php endforeach ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>


    </section>
  </div>