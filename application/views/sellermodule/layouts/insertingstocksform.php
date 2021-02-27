<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Insert New Stocks</li>
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
          <h4 align="center"><i class="fas fa-shopping-cart"></i> Insert Stock</h4>
        </div>
      </div>
<form action="<?php echo site_url(); ?>retailer/savestock" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">

              <?php if ($this->session->flashdata('successmessage')): ?>
                  <input type="hidden" value="1" id="alerttoastrmessage" name="">
              <?php endif ?>

              <?php if ($this->session->flashdata('errormessage')): ?>
                  <input type="hidden" value="2" id="alerttoastrmessage" name="">
              <?php endif ?>

                <div align="center">
                  <img id="output" style="width: 100px;height: auto;" src=""/>

                  <br>
                  <label for="exampleInputFile">Input Image</label>
                                      
                    <input type="file" name="prodImage" accept="image/gif, image/jpg, image/png, image/jpeg" onchange="loadFile(event)"  required="">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Prodcut Name</label>
                  <input type="text" name="productName" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name" required="">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Prodcut Description</label>
                  <textarea class="form-control" placeholder="Description..." name="productDescription" required=""></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Categories</label>
                  <select class="form-control" name="catID" required="">
                    <?php foreach ($categories as $category): ?>
                      <option value="<?php echo $category['cid']; ?>"><?php echo $category['categoryName']; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Price</label>
                  <input type="number" name="prodPrice" class="form-control" id="exampleInputEmail1" placeholder="" required="">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Shipping Fee</label>
                  <input type="number" name="shippingFee" class="form-control" id="exampleInputEmail1" placeholder="" required="">
                </div>
            
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Codition</label>
                  <select class="form-control" name="prodCondiion" required="">
                    <option value="1">New</option>
                    <option value="2">Old</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Stock</label>
                  <input type="number" name="prodStockQty" class="form-control" id="" placeholder="Enter Stocks" required="">
                </div>

                <div class="form-group">
                    <h3 for="">Variation</h3>
                      <label>Color <a class="btn btn-info btn-sm" id="addcolor"><i class="fas fa-plus"></i></a></label> 
                        <div id="colorcontainer"></div>
                        <br>
                      <label>Size <a class="btn btn-info btn-sm" id="addsize"><i class="fas fa-plus"></i></a></label>
                        <div id="sizecontainer"></div>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <button type="submit" class="btn btn-flat btn-success form-control">Insert Stocks</button>
        </div>
      </div>
</form>
          <!-- <button type="button" class="btn btn-success toastrDefaultSuccess">Launch Success Toast</button> -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->