<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Checkout</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Checkout</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div  class="col-md-8">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body" style="background-color: #f2f2f2;">
              <!-- Table row -->
              <address>
                Name : <b><?php echo ucwords($buyerInfo['first_name'].' '.$buyerInfo['mid_name'][0].'. '.$buyerInfo['last_name']); ?></b>
                <br>
                Phone #: <b><?php if(!empty($buyerInfo['contactNo'])){echo $buyerInfo['contactNo'];}else{ echo '<span class="badge badge-danger"><i class="icon fas fa-exclamation-triangle"></i> Must Have Phone Number Go To Setting</span>'; } ?></b>
                <br>
                email : <b><?php echo $buyerInfo['email']; ?></b>
                <br>
                address: <b><?php if(!empty($buyerInfo['userAddress'])){echo $buyerInfo['userAddress'];}else{ echo '<span class="badge badge-danger"><i class="icon fas fa-exclamation-triangle"></i> Must Have An Address Go To Setting</span>'; } ?></b>
              </address>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th></th>
                      <th>Item Name</th>
                      <th>Qty</th>
                      <th>Color</th>
                      <th>Size</th>
                      <th>Sub amount</th>
                      <th>Shipping Fee</th>
                      <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $shippingFee = 0;
                      $subtotal = 0;
                      foreach ($carts as $item): 
                    ?>
                        <?php 

                          $ok = unserialize($unseritemsId);

                          foreach ($ok as $value): 
                        ?>
                          <?php if ($value == $item['parcelId']): ?>
                            <tr>
                              <td>
                                <img src="<?php echo site_url().$item['prodImage']; ?>" style="width:  67px;height: 67px;border-radius: 35px;">
                              </td>
                              <td><?php echo $item['productName']; ?></td>
                              <td><?php echo $item['is_wantQty']; ?></td>
                              <td><?php echo $item['chooseColor']; ?></td>
                              <td><?php echo $item['chooseSize']; ?></td>
                              <td>&#8369;<?php echo number_format($item['prodPrice'], 2); ?></td>
                              <td>
                                &#8369;
                                <?php 
                                  $shippingFee +=$item['shippingFee'];                                  
                                  echo number_format($item['shippingFee'], 2); 
                                ?>
                              </td>
                              <td>
                                &#8369;
                                <?php 
                                    $amount = $item['prodPrice'] * $item['is_wantQty'];
                                    $subtotal +=$amount;
                                    echo number_format($amount, 2);
                                ?>
                              </td>
                            </tr>
                          <?php endif ?>
                        <?php endforeach ?>
                    <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
        </div>
        <div  class="col-md-4">
          <div class="card">
          <!-- /.card-header -->
            <div class="card-body" style="background-color: #f2f2f2;">
                <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>&#8369; <?php echo number_format($subtotal, 2); ?></td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>&#8369; <?php echo number_format($shippingFee, 2); ?></td>
                      </tr>
                      <tr>
                        <th>
                          <h4>Total:</h4>
                        </th>
                        <td>
                          <h4>
                            &#8369; 
                              <?php  
                                  $total = $subtotal + $shippingFee;
                                  echo number_format($total, 2);
                              ?>
                          </h4>
                        </td>
                      </tr>
                    </table>
                  </div>
            </div>
          </div>
          <form action="<?php echo site_url(); ?>buyer/checkout_cart_item" method="post">
            <input type="text" value='<?php echo $unseritemsId; ?>' name="unseritemsId">
            <button class="btn btn-warning form-control" <?php if (empty($buyerInfo['contactNo']) && empty($buyerInfo['userAddress'])){ echo 'disabled'; } ?>><i class="fas fa-shopping-cart"></i>Checkout</button>
          </form>
        </div>
      </div>
    </section>
  </div>