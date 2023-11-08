<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Taman Nasional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styling/table_pesanan.css">
  </head>
  <body>

    <!-- navbar -->
    <header class="p-3 text-bg-dark">
        <div class="container-fluid ">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start ">
            <a href="https://getbootstrap.com/" class="mx-5">
              <img src="../assets/Logo-white.png" width="100">
            </a>
            
            <ul class="nav col-13 col-lg-4 mx-lg-auto mb-2 justify-content-center mb-md-0 fs-5">
              <li><a href="#" class="nav-link px-2 text-secondary">Booking</a></li>
              <li><a href="#" class="nav-link px-2 text-white">Member</a></li>
              <li><a href="#" class="nav-link px-2 text-white">Admin</a></li>
              <!-- <li><a href="#" class="nav-link px-2 text-white"></a></li>
              <li><a href="#" class="nav-link px-2 text-white"></a></li> -->
            </ul>
    
                <div class="text-end">
                    <a href="./view/login.html" rel="noopener noreferrer">
                        <button type="button" class="btn btn-outline-light me-2">Logout</button>
                    </a> 
                </div>
          </div>
        </div>
      </header>
    <?php include __DIR__.'/../controller/list_pesanan_controller.php' ?>

    <!-- navbar -->

    <div class="container mt-5">
        <p class="display-6 ">List Booking</p>
        <div class="underline"></div>
        
    <form action="" method="get">
        <div class="row mt-4 ">
            <div class="col-2">
                <h3 class="fw-light"># Order Found</h3>
            </div>


            <div class="col-2">
                <div class="d-flex align-content-center ">
                    <p class="sort-by fw-light text-black-75 ">Sort By : </p>
                    <div class="dropdown">
                        <a class="btn btn-sm dropdown-toggle btn-ariq" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Book ID
                        </a>
                      
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="d-flex align-content-center ">
                    <p class="sort-by fw-light text-black-75 ">Filter : </p>
                    <div class="dropdown">
                        <a class="btn btn-sm dropdown-toggle btn-ariq" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Semua Booking
                        </a>
                      
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col d-flex justify-content-end ">
                <div class="input-group mb-3 w-50">
                    <span class="input-group-text" id="basic-addon1">#</span>
                    <input type="text" class="form-control" placeholder="Book ID" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                  <button type="button" class="btn btn-sm btn-dark cari fw-bold ">Cari</button>
            
            </div>
        </div>
    </form>

        <div class="row mt-4">
            <div class="col">
                <table class="table table-hover table-striped ">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pemesan</th>
                        <th scope="col">Destinasi Tempat</th>
                        <th scope="col">Jumlah Orang</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $object_pesanan = new List_pesanan_controller()?>
                      <?php $result = $object_pesanan->getAllBook(10)?>
            
                      <?php foreach ($result as $row) { ?>
                      <tr>
                        <th scope="row"><?php echo $row->getIdPesanan()?></th>
                        <td><?php echo $object_pesanan->getUserById($row->getIdUser())->getNamaDepan()  ?></td>
                        <td><?php echo $object_pesanan->getLokasiById($row->getIdLokasiMasuk())->getNamaLokasi()  ?></td>
                        <td><?php echo $row->getJmlPengujung()  ?></td>
                        <td><?php echo $row->getTglMasuk()  ?></td>
                        <td colspan="2">
                          <a href="edit_form.php?id_pesanan=<?php echo $row->getIdPesanan(); ?>" class="btn btn-info">Edit</a>
                          <a href="./pesanan_table.php?id_pesanan=<?php echo $row->getIdPesanan(); ?>" class="btn btn-danger">Delete</a>
                        </td>
                        

                      </tr>
                     <?php  }?>
                    </tbody>
                  </table>
            </div>
        </div>
    
    </div>
    <div class="container d-flex justify-content-center mt-4 ">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
