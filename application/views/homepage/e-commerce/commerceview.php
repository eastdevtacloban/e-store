<section style="margin-top: 10px;">
  <div class="container">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <a href="<?php echo site_url('/'); ?>">
            <button type="button" class="btn btn-secondary btn-flat"><i class="fas fa-arrow-left"></i> Back</button>
          </a>
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"><?php echo ucwords($discovered['productName']); ?></h3>
              <div class="col-12">
                <img src="<?php echo site_url().$discovered['prodImage']; ?>" width="520" height="471" class="product-image" alt="Product Image">
              </div>              
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?php echo ucwords($discovered['productName']); ?></h3>
              <hr>
<form  action="<?php echo site_url(); ?>buyer/addcart?itemId=<?php echo $discovered['id']; ?>" method="post">              
              <input type="hidden" value="<?php echo $discovered['userId']; ?>" name="sellerId">
              <h4>Available Colors</h4>
              <div class="btn-group btn-flot btn-group-toggle" data-toggle="buttons">
                <?php 
                  $unsercolor = unserialize($discovered['prodColor']);
                  if (!empty($unsercolor)): 
                ?>
                    <?php 
                      $inc = 0;                  
                      foreach ($unsercolor as $colors): 
                        $option = 1;  
                        $inc += $option; 
                    ?>
                        <label class="btn btn-secondary">
                          <input type="radio" value="<?php echo ucwords($colors); ?>" name="chooseColor" id="option<?php echo $inc; ?>"> <?php echo ucwords($colors); ?>
                        </label>
                    <?php endforeach ?>
                <?php endif ?>
              </div>

              <h4 class="mt-3">Size <small>Please select one</small></h4>
              <div class="btn-group btn-flot btn-group-toggle" data-toggle="buttons">
                <?php 
                    $unsersize = unserialize($discovered['prodSize']);
                    if (!empty($unsersize)):
                ?>
                    <?php 
                      $inc2 = 0;    
                        foreach ($unsersize as $size): 
                          $option2 = 1;  
                          $inc2 += $option2; 
                    ?>
                            <label class="btn btn-secondary">
                              <input type="radio" value="<?php echo ucwords($size); ?>" name="chooseSize" id="option<?php echo $inc2; ?>"> <?php echo ucwords($size); ?>
                            </label>
                    <?php endforeach ?>
                <?php endif ?>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Quantity</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Quantity" name="is_wantQty" required="">
              </div>

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  &#8369; <?php echo number_format($discovered['prodPrice'], 2); ?>
                </h2>
                <h4 class="mt-0">
                  <small>Shipping Fee: &#8369; <?php echo number_format($discovered['shippingFee'], 2); ?> </small>
                </h4>
              </div>

              <div class="mt-4">
                <button type="submit" class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                  Add to Cart
                </button>
</form>
                <!-- <div class="btn btn-default btn-lg btn-flat">
                  <i class="fas fa-heart fa-lg mr-2"></i> 
                  Add to Wishlist
                </div> -->
              </div>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                <?php echo ucwords($discovered['productDescription']); ?>
              </div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> 
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

  </div>
</section>