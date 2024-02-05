<?= $this->extend('layout/dashboard'); ?>

<?= $this->section('content'); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD | Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            Tambah Data
          </div>
          <div class="card-body">
            <form>
              <div class="row mb-3">
                <label for="nama_produk" class="col-sm-4 col-form-label">Nama Produk</label>
                <div class="col-sm-8">
                  <input type="hidden" name="id_produk" id="id_produk">
                  <input type="hidden" name="status" id="status">
                  <input type="text" class="form-control" id="nama_produk">
                </div>

              </div>
              <div class="row mb-3">
                <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="harga">
                </div>
              </div>
              <div class="row mb-3">
                <label for="stok" class="col-sm-4 col-form-label">Stok</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="stok">
                </div>
              </div>
              <button type="submit" class="btn btn-primary float-right" id="simpan">Simpan</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nama Produk</th>
              <th scope="col">Harga</th>
              <th scope="col">Stok</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody id="show_data">
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>

            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="<?= base_url() ?>AdminLTE/plugins/jquery/jquery.min.js"></script>
  <script>
    $(document).ready(function() {

      tampil_data();

      function tampil_data() {
        $.ajax({
          url: 'produk/tampil',
          type: 'get',
          dataType: 'json',
          success: function(data) {
            var HTML = '';
            var i;
            var no = 0;
            if (data.length == 0) {
              HTML += '<tr>' +
                '<td colspan = "5" class="text-center"> Data pada tabel masih kosong </td> ' +
                '</tr>'
              $('#show_data').html(HTML);
            } else {
              for (i = 0; i < data.length; i++) {
                no++;
                HTML += '<tr>' +
                  '<td>' + data[i].id_produk + '</td>' +
                  '<td>' + data[i].nama_produk + '</td>' +
                  '<td>' + data[i].harga + '</td>' +
                  '<td>' + data[i].stok + '</td>' +
                  '<td>' +
                  '<button id="edit" data-id ="' + data[i].id_produk + '" class="btn btn-warning">Edit</button>' + ' ' +
                  '<button id="hapus" data-id ="' + data[i].id_produk + '" class="btn btn-danger">Hapus</button>' +
                  '</td>' +
                  '</tr>'
                $('#show_data').html(HTML);
              }
            }


          }

        });
      }
      //simpan
      $('#simpan').on('click', function(e) {
        e.preventDefault();

        var namaProduk = $('#nama_produk').val();
        var harga = $('#harga').val();
        var stok = $('#stok').val();
        var status = $('#status').val();
        var id = $('#id_produk').val();

        if(status == '') {
          $.ajax({
          url: 'produk/simpan',
          type: 'post',
          data: {
            namaProduk: namaProduk,
            harga: harga,
            stok: stok
          },
          success: function(data) {
            $('#nama_produk').val('');
            $('#harga').val('');
            $('#stok').val('');

            tampil_data();
          }

          })
        } else if(status == 'update'){
          $.ajax({
          url: 'produk/update',
          type: 'post',
          data: {
            id_produk : id,
            namaProduk: namaProduk,
            harga: harga,
            stok: stok
          },
          success: function(data) {
            $('#nama_produk').val('');
            $('#harga').val('');
            $('#stok').val('');
            $('#status').val('');

            tampil_data();
          }

        })
        }

       
      });
      // end simpan

      //edit
      $('#show_data').on('click', '#edit', function(e) {
        e.preventDefault();

        var id = $(this).data('id');
        $.ajax({
          url: 'produk/edit',
          type: 'get',
          dataType: 'json',
          data: {
            id_produk: id
          },
          success: function(data) {
            console.log(data);

            $('#id_produk').val(data.id_produk);
            $('#nama_produk').val(data.nama_produk);
            $('#harga').val(data.harga);
            $('#stok').val(data.stok);
            $('#status').val('update');
          },
        });
      });

      //delete

      $('#show_data').on('click','#hapus', function(e){
        e.preventDefault();

        var id = $(this).data('id');
        console.log('Berhasil Dihapus');
        

        $.ajax({
          method : 'post',
          url : 'produk/delete',
          data : {id_produk:id},
          success : function(data){
            tampil_data();
            $('id_produk').focus();
          }
          
        });

      });
      //end delete

    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
<?= $this->endSection(); ?>