<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List Of Items To Be Approved</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Color</th>
                <th>Size</th>
                <th>Shipping Fee</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($requestItems as $value): ?>
                <tr>
                  <td><?php echo ucwords($value['productName']); ?></td>
                  <td><?php echo ucwords($value['is_wantQty']); ?></td>
                  <td><?php echo ucwords($value['prodPrice']); ?></td>
                  <td><?php echo ucwords($value['chooseColor']); ?></td>
                  <td><?php echo ucwords($value['chooseSize']); ?></td>
                  <td><?php echo ucwords($value['shippingFee']); ?></td>
                  <td><a  href="<?php echo site_url(); ?>retailer/approved_requestitems?id=<?php echo $value['parcelId']; ?>" class="btn btn-block btn-outline-warning btn-xs">Approve</a></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
