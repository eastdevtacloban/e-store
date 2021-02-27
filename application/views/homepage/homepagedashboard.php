

<section style="margin-top: 10px;">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><b>Categories</b></h3>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-sm-2">
            <a href="<?php echo site_url(); ?>assets/dist/img/mens_apparel.jpg" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
              <img src="<?php echo site_url(); ?>assets/dist/img/mens_apparel.jpg" class="img-fluid mb-2" alt="white sample"/>
              <label>Men Apparel</label>
            </a>
          </div>
          <div class="col-sm-2">
            <a href="<?php echo site_url(); ?>assets/dist/img/women_aparel.jpg" data-toggle="lightbox" data-title="sample 2 - black" data-gallery="gallery">
              <img style="width: 168px;height: 168px;" src="<?php echo site_url(); ?>assets/dist/img/women_aparel.jpg" class="img-fluid mb-2" alt="black sample"/>
              <label>Women Apparel</label>
            </a>
          </div>
          <div class="col-sm-2">
            <a href="<?php echo site_url(); ?>assets/dist/img/gadget.jpg" data-toggle="lightbox" data-title="sample 3 - red" data-gallery="gallery">
              <img style="width: 168px;height: 168px;" src="<?php echo site_url(); ?>assets/dist/img/gadget.jpg" class="img-fluid mb-2" alt="red sample"/>
              <label>Gadget</label>
            </a>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->   
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><b><i class="fas fa-heart"></i> Discovery</b></h3>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
    </div>

    <!--  -->
    <div class="row">
      <?php foreach ($discoveries as $discovery): ?>
        <a href="<?php echo site_url('/'); ?>welcome/e_commerce?itemId=<?php echo  $discovery['id']; ?>">
          <div class="col-md-3">
            <div class="card" style="width: 15rem;height: 343px;">
              <img src="<?php echo site_url().$discovery['prodImage']; ?>" width="240" height="200" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">&#8369; 201.00</p>
                <p class="card-text" align="center">adasdasjbjb</p>
                <?php if (empty($this->session->userdata('userId'))): ?>
                  <div class="btn btn-primary btn-sm btn-flat disabled">
                    <i class="fas fa-cart-plus fa-sm mr-2"></i> Add to Cart
                  </div>
                <?php else: ?>
                  <a href="<?php echo site_url('/'); ?>welcome/e_commerce?itemId=<?php echo  $discovery['id']; ?>" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-cart-plus fa-sm mr-2"></i> Add to Cart</a>
                <?php endif ?>
              </div>
            </div>
          </div>
        </a>
      <?php endforeach ?>
    </div>
    <!--  -->
    
  </div>
</section>