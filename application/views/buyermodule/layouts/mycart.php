<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-cart-plus"></i>My Cart</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">My Cart</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body" style="background-color: #f2f2f2;">
<form action="<?php echo site_url(); ?>buyer/checkout" method="post">          
          <div class="row">
            <?php foreach ($carts as $cart): ?>
              <div  class="col-md-4">
                <div class="card card-warning card-outline">
                  <div class="card-header">
                    <h3 class="card-title">
                      <div class="icheck-primary" align="center">
                          <input type="checkbox" value="<?php echo $cart['parcelId']; ?>" name="parcelId[]" id="check<?php echo $cart['parcelId']; ?>">
                          <label for="check<?php echo $cart['parcelId']; ?>"></label>
                      </div>
                    </h3>
                    <div class="card-tools">
                      <a href="<?php echo site_url(); ?>buyer/removed_item_to_cart?id=<?php echo $cart['parcelId']; ?>" class="btn btn-tool"><i class="fas fa-trash" style="color: #dc3545;"></i>
                      </a>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <div class="card-body info-box" style="margin-top: 5px;">
                    <span class="info-box-icon">
                      <img src="<?php echo site_url().$cart['prodImage']; ?>" width="70" height="82">
                    </span>

                    <div class="info-box-content">
                      <span class="info-box-text"><?php echo $cart['productName']; ?></span>
                      <span class="info-box-number">
                        <input type="number" value="<?php echo $cart['is_wantQty']; ?>" name="" style="width: 80px;text-align: center;">
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>
          <button type="submit" class="btn btn-block btn-warning btn-flat">
            <h4><i class="nav-icon fa fa-shopping-cart"></i> Place Order</h4>
          </button>
</form>
        </div>
      </div>
    </section>
  </div>