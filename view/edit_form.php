<header class="p-3 text-bg-dark">
    <div class="container-fluid ">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start ">
        <a href="https://getbootstrap.com/" class="mx-5">
          <img src="web-uts-vercel/assets/logo-white.png" width="100">
        </a>
        
        <ul class="nav col-13 col-lg-4 mx-lg-auto mb-2 justify-content-center mb-md-0 fs-5">
          <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Profile</a></li>
          <li><a href="#" class="nav-link px-2 text-white">E - Ticket</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Kontak Kami</a></li>
          <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
        </ul>

            <div class="text-end">
                <a href="/view/login.html" rel="noopener noreferrer">
                    <button type="button" class="btn btn-outline-light me-2">Login</button>
                </a> 
            </div>
      </div>
    </div>
  </header>


  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Taman Nasional</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <link rel="stylesheet" href="styling/index.css">
  </head>
  <body>
  
      
  
      <section>
          <div class="container ariq-container">
              <form action="./controller/book_controller.php" method="POST">
              <div class="judul">
                  <h1 class="display-5">Form Booking</h1>
                  <div class="underline"></div>
              </div>
  
              <div class="container-s mt-4">
                  <div class="row">
                      <div class="col">
                      <div class="lokasi">
                      <h3>Lokasi</h3>
                      <div class="lokasi-form">
                          <div class="form-outline w-100 mt-3">
                              <div class="form-outline w-100">
                                  <label for="tempat-masuk"  class="form-label ">Tempat Masuk</label>
  
                                  <select id="tempat-masuk" name="tempat-masuk" class="form-select" aria-label="Default select example">
                                  <?php include __DIR__.'/../controller/book_controller.php'?>
                                  <?php $book_controller = new book_controller()?>
                                  <?php $result = $book_controller->getAllLokasiMasuk()?>
                                  <?php foreach ($result as $value) { ?>
                                      <option value='<?php echo $value->getIdLokasiMasuk() ?>'><?php echo $value->getNamaLokasi() ?></option>
                  
                                  <?php }?>   
                                  </select>   
                              </div>
                          </div>
                          <!-- <div class="row kendaraan mt-3">
                              <div class="col-9">
                                  <div class="form-outline w-100">
                                      <label for="tempat-masuk" class="form-label ">Kendaraan</label>
      
                                      <select id="tempat-masuk" class="form-select" aria-label="Default select example">
                                          <option selected>Pilih</option>
                                          <option value="1">Place 1</option>
                                          <option value="2">Place 2</option>
                                          <option value="3">Place 3</option>
                                      </select>
      
                                  </div>
                              </div>
                              <div class="col">
                                  <div class="mb-3">
                                      <label for="Jumlah-kendaraan" class="form-label ">Jumlah :</label>
                                      <input type="number" class="form-control" min="0" id="Jumlah-kendaraan" placeholder="0" name="jumlah-kendaraan">
  
                                  </div>
                              </div>
                          </div> -->
                      </div>
                  </div>
                      </div>
  
                      <div class="col-1"></div>
                      <div class="col">
                          <div class="kunjungan">
                              <h3>Kunjungan</h3>
                              <div class="kunjungan-form">
                                  <div class="form-outline w-100">
                                      <div class="mb-3">
                                          <label for="Tanggal-Berangkat" class="form-label ">Tanggal Berangkat</label>
                                          <input type="date"  name="tanggal-berangkat" class="form-control" id="Tanggal-Berangkat" placeholder="DD-MM-YYYY">
                                      </div>
                                  </div>
          
                                  <div class="form-outline w-100">
                                          <div class="mb-3">
                                              <label for="Tanggal-Pulang" class="form-label ">Tanggal Pulang</label>
                                              <input type="date"  name="Tanggal-Pulang" class="form-control" id="Tanggal-Pulang" placeholder="DD-MM-YYYY">
                                          </div>
                                  </div>
          
                              </div>
                          </div>
                      </div>
                  </div>
                  
              </div>
  
              <div class="container-s mt-4">
                  <div class="row">
                      <div class="col">
                          <div class="Pemesanan">
                              <h3 class="mb-4">Pemesanan</h3>
                              <div class="Pemesanan-form">
                                  <div class="row nama">
                                      <div class="col">
                                          <div class="form-outline w-100">
                                              <div class="mb-3">
                                                  <label for="Nama-depan" class="form-label ">Nama Depan</label>
                                                  <input type="input" name="nama-depan" class="form-control" id="Nama-depan" placeholder="Megumin">
                                              </div>
                                          </div>
                          
                                      </div>
          
                                      <div class="col">
                                          <div class="form-outline w-100">
                                              <div class="mb-3">
                                                  <label for="Nama-Belakang" class="form-label ">Nama Belakang</label>
                                                  <input type="input" name="nama-belakang" class="form-control" id="Nama-Belakang" placeholder="Faridzki">
                                              </div>
                                          </div>
                                      </div>
                                     
                                      
                                  </div>
                                  
                                  <div class="form-outline w-100">
                                      <div class="mb-3">
                                          <label for="email" class="form-label ">Email</label>
                                          <input type="email" name="email" class="form-control" id="email" placeholder="megumin@domain">
                                      </div>
                                  </div>
  
                                  <div class="form-outline w-100">
                                      <div class="mb-3">
                                          <label for="no-telp" class="form-label ">No Telp</label>
                                          <input type="text" maxlength="15" name="nomor-telp" class="form-control" id="no-telp" placeholder="megumin@domain">
                                      </div>
                                  </div>
  
                                  <div class="form-outline w-100">
                                      <div class="mb-3">
                                          <label for="Alamat" class="form-label ">Alamat</label>
                                          <textarea name="alamat" class="form-control" id="Alamat" rows="4" placeholder="In Another Worldly Beautiful places"></textarea>
                                      </div>
                                  </div>
  
  
                                  <div class="row">
                                      <div class="col">
                                          <div class="form-outline w-100">
                                              <label for="Gender" class="form-label ">Gender Pemesan</label>
                                              <select id="Gender" name="gender" class="form-select" aria-label="Default select example">
                                                  <option selected>Pilih</option>
                                                  <option value="Laki">Laki - Laki</option>
                                                  <option value="Perempuan">Perempuan</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-outline w-100">
                                              <div class="mb-3">
                                                  <label for="Umur" class="form-label ">Umur Pemesan</label>
                                                  <input type="number" name="umur" class="form-control" id="Umur" placeholder="0">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
  
                      <div class="col-1"></div>
  
                      <div class="col">
                          <div class="kunjungan">
                              <h3>Keterangan</h3>
                              <div class="form-outline w-100">
                                  <div class="mb-5">
                                      <label for="Jumlah" class="form-label ">Jumlah Pengunjung</label>
                                      <input type="number" name="jumlah-pengunjung" class="form-control" id="Jumlah" placeholder="10.000 / orang">
  
                                      <div id="Jumlah" class="form-text text-opacity-75 text-danger">
                                          <p class="text">*Anak berumur lebih dari 7 tahun dikenakan biaya</p>
                                        </div>
                                  </div>
                              </div>
  
                              <div class="konfirmasi">
                                  <!-- <div class="form-outline w-100 mb-4">
                                      <div class="mb-3">
                                          <label for="harga" class="form-label fw-bold fs-5 f">Total Harga</label>
                                          <input type="input" name="harga" class="form-control" name="harga" id="harga" placeholder="<?php  ?>" aria-label="Disabled input example" disabled readonly>
                                      </div>
                                  </div> -->
  
                                  <div class=" w-100">
                                      <button type="submit" class="btn btn-lg btn-success w-100">Submit Booking</button>
                                      <div id="Jumlah" class="form-text text-opacity-50 text-black mt-3">
                                          <p class="text">Untuk Pembayaran akan dilakukan ditempat</p>
                                        </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  
                  
              </div>
          </form>
          </div>
      </section>
  
  
  
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
  </html>