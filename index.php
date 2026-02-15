<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Market - Kasir</title>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta content="Market Dashboard" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="./assets/images/favicon.ico" />

    <link
      href="./plugins/jvectormap/jquery-jvectormap-2.0.2.css"
      rel="stylesheet"
    />
    <link href="./plugins/lightpick/lightpick.css" rel="stylesheet" />

    <!-- App css -->
    <link
      href="./assets/css/bootstrap.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link href="./assets/css/jquery-ui.min.css" rel="stylesheet" />
    <link href="./assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link
      href="./assets/css/metisMenu.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link href="./assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- DataTables Bootstrap 4 CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css"
    />
  </head>

  <body>
    <!-- Top Bar Start -->
    <div class="topbar">
      <!-- LOGO -->
      <div class="topbar-left">
        <a href="./dashboard/crm-index.html" class="logo">
          <span>
            <img
              src="./assets/images/logo-sm.png"
              alt="logo-small"
              class="logo-sm"
            />
          </span>
          <span>
            <img
              src="./assets/images/logo.png"
              alt="logo-large"
              class="logo-lg logo-light"
            />
            <img
              src="./assets/images/logo-dark.png"
              alt="logo-large"
              class="logo-lg"
            />
          </span>
        </a>
      </div>
      <!--end logo-->
      <!-- Navbar -->
      <nav class="navbar-custom">
        <ul class="list-unstyled topbar-nav float-right mb-0">
          <li class="dropdown">
            <a
              class="nav-link dropdown-toggle waves-effect waves-light nav-user"
              data-toggle="dropdown"
              href="#"
              role="button"
              aria-haspopup="false"
              aria-expanded="false"
            >
              <img
                src="./assets/images/users/user-1.png"
                alt="profile-user"
                class="rounded-circle"
              />
              <span class="ml-1 nav-user-name hidden-sm">Mulyono</span>
            </a>
          </li>
        </ul>
        <!--end topbar-nav-->
      </nav>
      <!-- end navbar-->
    </div>
    <!-- Top Bar End -->

    <div class="page-wrapper">
      <!-- Page Content-->
      <div class="page-content">
        <div class="container-fluid">
          <!-- Page-Title -->
          <div class="row">
            <div class="col-sm-12">
              <div class="page-title-box">
                <div class="float-right">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Kasir</li>
                  </ol>
                </div>
                <h4 class="page-title">Kasir</h4>
              </div>
              <!--end page-title-box-->
            </div>
            <!--end col-->
          </div>
          <!-- end page title end breadcrumb -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="mt-0 header-title">Pencarian</h4>
                  
                  <form action="">
                    <div class="form-group">
                      <label for="cari"
                        >Cari berdasarkan nama produk atau barcode</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="cari"
                        placeholder="Masukkan nama produk atau barcode"
                      />
                    </div>
                    <button type="button" class="btn btn-gradient-primary" onclick="tambahManual()">
                      Tambah
                    </button>
                  </form>
                  <div id="scanner" style="width:100%; max-width:400px;" class="mt-4"></div>
                  <audio id="scanSound" src="assets/mp3/beep.mp3" preload="auto"></audio>
                </div>
              </div>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->

          <div class="row">
            <div class="col-lg-8">
              <div class="card">
                <div class="card-body">
                  <h4 class="header-title mt-0 mb-3">Detail Pesanan</h4>

                  <table
                    id="datatable"
                    class="table dt-responsive nowrap"
                    style="
                      border-collapse: collapse;
                      border-spacing: 0;
                      width: 100%;
                    "
                  >
                    <thead>
                      <tr>
                        <th>Barcode</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Hapus</th>
                      </tr>
                    </thead>

                    <tbody id="cartTable"></tbody>
                  </table>
                </div>
                <!--end card-body-->
              </div>
              <!--end card-->
            </div>
            <!--end col-->
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <h4 class="header-title mt-0 mb-3">Tagihan</h4>

                  <!-- Payment summary start -->
                  <h5>Ringkasan Pembayaran</h5>

                  <!-- Table start -->
                  <table
                    class="table table-borderless"
                    style="
                      border-collapse: collapse;
                      border-spacing: 0;
                      width: 100%;
                    "
                  >
                    <tbody>
                      <tr>
                        <td><strong>Subtotal</strong></td>
                        <td id="subtotal">Rp. 0</td>
                      </tr>
                      <tr>
                        <td><strong>Total</strong></td>
                        <td id="total">Rp. 0</td>
                      </tr>
                      <tr>
                        <td><strong>Diskon</strong></td>
                        <td>Rp. 0</td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- Table end -->
                  <hr />
                  <!-- Table start -->
                  <table
                    class="table table-borderless"
                    style="
                      border-collapse: collapse;
                      border-spacing: 0;
                      width: 100%;
                    "
                  >
                    <tbody>
                      <tr>
                        <td><strong>Total Bayar</strong></td>
                        <td id="totalBayar">Rp. 0</td>
                      </tr>
                      <tr>
                        <td><strong>Kembalian</strong></td>
                        <td id="kembalian">Rp. 0</td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- Table end -->
                </div>
                <!-- Payment summary end -->
                <!--end card-body-->
              </div>
              <!--end card-->

              <div class="card">
                <div class="card-body">
                  <h4 class="header-title mt-0 mb-3">
                    Input Nominal Pembayaran
                  </h4>

                  <form onsubmit="return false;">
                    <div class="form-group">
                      <label for="nominal_bayar">Nominal Bayar</label>
                      <input
                        type="text"
                        class="form-control"
                        id="nominal_bayar"
                        placeholder="Masukkan nominal pembayaran"
                        autocomplete="off"
                      />
                    </div>
                    <button
                      class="btn btn-gradient-primary btn-sm"
                      type="button"
                      onclick="checkout()"
                    >
                      Cetak Struk
                    </button>
                  </form>
                </div>
                <!--end card-body-->
              </div>
              <!--end card-->
            </div>
            <!--end col-->
          </div>
          <!--end row-->
        </div>
        <!-- container -->

        <footer class="footer text-center text-sm-left">
          &copy; 2026 Market
          <span class="text-muted d-none d-sm-inline-block float-right"
            >Crafted with <i class="mdi mdi-heart text-danger"></i
          ></span>
        </footer>
        <!--end footer-->
      </div>
      <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- jQuery  -->
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/metismenu.min.js"></script>
    <script src="./assets/js/waves.js"></script>
    <script src="./assets/js/feather.min.js"></script>
    <script src="./assets/js/jquery.slimscroll.min.js"></script>
    <script src="./assets/js/jquery-ui.min.js"></script>

    <script src="./plugins/moment/moment.js"></script>
    <script src="./plugins/apexcharts/apexcharts.min.js"></script>
    <script src="./plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="./plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="./plugins/chartjs/chart.min.js"></script>
    <script src="./plugins/chartjs/roundedBar.min.js"></script>
    <script src="./plugins/lightpick/lightpick.js"></script>
    <script src="./assets/pages/jquery.sales_dashboard.init.js"></script>

    <!-- App js -->
    <script src="./assets/js/app.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Bootstrap 4 JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <!-- Sweat Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- HTML5Qr Code -->
    <script src="https://unpkg.com/html5-qrcode"></script>

    <script>
      // Stack cart
      let cart = {};
      let scanLock = false;

      function onScanSuccess(decodedText){
          if(scanLock) return;

          scanLock = true;

          tambahKeCart(decodedText);

          setTimeout(()=>{
              scanLock = false;
          }, 1000);

      }


      // Inisialisasi kamera dan automatis mulai
      let html5QrCode;

      $(document).ready(function(){

          html5QrCode = new Html5Qrcode("scanner");

          html5QrCode.start(
              { facingMode: "environment" },
              {
                  fps: 15,
                  qrbox: { width: 300, height: 150 },
                  formatsToSupport: [
                      Html5QrcodeSupportedFormats.EAN_13,
                      Html5QrcodeSupportedFormats.CODE_128,
                      Html5QrcodeSupportedFormats.QR_CODE
                  ]
              },
              onScanSuccess
          );

      });

      // cek barcode
      function tambahKeCart(barcode){
        $.ajax({
          url:"cek_barcode_ajax.php",
          method:"POST",
          data:{ barcode: barcode },
          dataType:"json",
          success:function(data){

              if(data.status === "exists"){

                  if(cart[barcode]){
                      cart[barcode].qty++;
                  }else{
                      cart[barcode] = {
                          id_barang : data.id_barang,
                          nama : data.nama_barang,
                          harga : parseInt(data.harga_jual),
                          qty : 1
                      };
                  }

                  playScanSound();
                  renderCart();

              }else{
                  Swal.fire({
                      icon:"error",
                      title:"Produk tidak ditemukan"
                  });
              }
          },
          error:function(){
              Swal.fire("Gagal koneksi server");
          }
        });
      }


      function renderCart(){
        let html = "";
        let subtotal = 0;

        for(let barcode in cart){

            let item = cart[barcode];
            let total = item.harga * item.qty;

            subtotal += total;

            html += `
                <tr>
                    <td>${barcode}</td>
                    <td>${item.nama}</td>
                    <td>Rp. ${formatRupiah(item.harga)}</td>
                    <td>${formatRupiah(item.qty)}</td>
                    <td>
                        <button onclick="hapusItem('${barcode}')" class="btn btn-sm btn-danger">
                            Hapus
                        </button>
                    </td>
                </tr>
            `;
        }

        $("#cartTable").html(html);
        updateTagihan(subtotal);
      }

      function hapusItem(barcode){
        delete cart[barcode];
        renderCart();
      }

      function updateTagihan(subtotal){
        $("#subtotal").text("Rp. " + formatRupiah(subtotal));
        $("#total").text("Rp. " + formatRupiah(subtotal));
        $("#totalBayar").text("Rp. " + formatRupiah(subtotal));
      }

      // Tambah produk manual
      function tambahManual() {
        let input = $("#cari").val().trim();

        if(input === ""){
            Swal.fire({
                icon: "warning",
                title: "Masukkan barcode / nama produk"
            });
            return;
        }

        tambahKeCart(input);

        $("#cari").val("");
    }

    // Checkout barang
    function checkout(){
      if(Object.keys(cart).length === 0){
        Swal.fire("Cart kosong");
        return;
      }

      let totalBayar = parseInt(
          $("#totalBayar").text().replace(/[^\d]/g, "")
      );

      let nominal = parseInt(
        $("#nominal_bayar").val().replace(/[^\d]/g, "")
      ) || 0;


      if(nominal < totalBayar){
          Swal.fire({
              icon: "warning",
              title: "Nominal kurang",
              text: "Nominal pembayaran belum mencukupi"
          });
          return;
      }

      Swal.fire({
          title: "Konfirmasi Transaksi",
          text: "Lanjutkan pembayaran?",
          icon: "question",
          showCancelButton: true,
          confirmButtonText: "Ya, Cetak Struk",
          cancelButtonText: "Batal"
      }).then((result) => {
          if(result.isConfirmed){
              $.ajax({
                  url:"checkout_ajax.php",
                  method:"POST",
                  data:{ cart: JSON.stringify(cart) },
                  success:function(data){

                      if(data.status === "success"){

                          Swal.fire({
                              icon:"success",
                              title:"Transaksi selesai",
                              text:"Struk berhasil dicetak"
                          }).then(()=>{

                              cart = {};
                              renderCart();

                              $("#nominal_bayar").val("");
                              $("#kembalian").text("Rp. 0");

                          });

                      }else{
                          Swal.fire("Transaksi gagal");
                      }
                  },
                  error:function(){
                      Swal.fire("Gagal koneksi server");
                  }
              });
          }
      });
    }

    // Play sound
    function playScanSound() {
      const sound = document.getElementById("scanSound");
      sound.currentTime = 0; // reset supaya bisa diputar cepat berulang
      sound.play();
    }

    // Hitung kembalian
    function hitungKembalian() {
      let totalBayar = parseInt(
          $("#totalBayar").text().replace(/[^\d]/g, "")
      ) || 0;

      let nominal = parseInt(
          $("#nominal_bayar").val().replace(/[^\d]/g, "")
      ) || 0;

      let kembalian = 0;

      if (nominal >= totalBayar) {
          kembalian = nominal - totalBayar;
      }

      $("#kembalian").text("Rp. " + formatRupiah(kembalian));
    }


    // Cek kembalian secara real time
    $("#nominal_bayar").on("input", function () {
      this.value = formatRupiahInput(this.value);

      hitungKembalian();
    });

    function formatRupiah(angka){
      return Number(angka).toLocaleString("id-ID");
    }

    function formatRupiahInput(angka) {
      let number_string = angka.replace(/[^,\d]/g, "").toString();
      let split = number_string.split(",");
      let sisa = split[0].length % 3;
      let rupiah = split[0].substr(0, sisa);
      let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      if (ribuan) {
          let separator = sisa ? "." : "";
          rupiah += separator + ribuan.join(".");
      }

      return rupiah;
    }
    </script>

    <!-- Datatables -->
    <script>
      $(document).ready(function () {
        $("#datatable").DataTable({
          lengthMenu: [
            [100, 500],
            [100, 500],
          ],
          pageLength: 500,
          responsive: true,
        });
      });
    </script>
  </body>
</html>
