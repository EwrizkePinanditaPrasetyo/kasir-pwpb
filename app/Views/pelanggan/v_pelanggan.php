<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD | Customer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

  <div class="container mt-2">
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            Tambah Data Pelanggan
          </div>
          <div class="card-body">
            <form>
              <div class="row mb-3">
                <label for="nama_produk" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                <div class="col-sm-8">
                  <input type="hidden" name="id_pelanggan" id="id_pelanggan">
                  <input type="hidden" name="status" id="status">
                  <input type="text" class="form-control" id="nama_pelanggan">
                </div>

              </div>
              <div class="row mb-3">
                <label for="harga" class="col-sm-4 col-form-label">Alamat</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="alamat">
                </div>
              </div>
              <div class="row mb-3">
                <label for="stok" class="col-sm-4 col-form-label">Nomor Telepon</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="no_telp">
                </div>
              </div>

              <button type="submit" class="btn btn-primary float-right" id="simpan">Simpan</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="card card-info">
          <div class="card-header">
            Daftar Pelanggan
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nama Pelanggan</th>
                  <th>Alamat</th>
                  <th>No Telepon</th>
                  <th>Aksi</th>
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
    </div>
  </div>
  <script src="<?= base_url() ?>AdminLTE/plugins/jquery/jquery.min.js"></script>
  <script>
    $(document).ready(function() {

      tampil_data();

      function tampil_data() {
        $.ajax({
          url: 'pelanggan/tampil',
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
                  '<td>' + data[i].id_pelanggan + '</td>' +
                  '<td>' + data[i].nama_pelanggan + '</td>' +
                  '<td>' + data[i].alamat + '</td>' +
                  '<td>' + data[i].no_telp + '</td>' +
                  '<td>' +
                  '<button id="edit" data-id ="' + data[i].id_pelanggan + '" class="btn btn-warning">Edit</button>' + ' ' +
                  '<button id="hapus" data-id ="' + data[i].id_pelanggan + '" class="btn btn-danger">Hapus</button>' +
                  '</td>' +
                  '</tr>'
                $('#show_data').html(HTML);
              }
            }
          } //tutup success
        }); //tuutp ajax
      } //tutup fungsi tampil

      $('#simpan').on('click', function(e) {
        e.preventDefault();

        var namaPelanggan = $('#nama_pelanggan').val();
        var alamat = $('#alamat').val();
        var no_telp = $('#no_telp').val();
        var status = $('#status').val();
        var id = $('#id_pelanggan').val();

        if (status == '') {
          $.ajax({
            url: 'pelanggan/simpan',
            type: 'post',
            data: {
              namaPelanggan: namaPelanggan,
              alamat: alamat,
              no_telp: no_telp
            },
            success: function(data) {
              $('#nama_pelanggan').val('');
              $('#alamat').val('');
              $('#no_telp').val('');

              tampil_data();
            }

          })
        } else if (status == 'update') {
          $.ajax({
            url: 'pelanggan/update',
            type: 'post',
            data: {
              id_pelanggan: id,
              namaPelanggan: namaPelanggan,
              alamat: alamat,
              no_telp: no_telp
            },
            success: function(data) {
              $('#nama_pelanggan').val('');
              $('#alamat').val('');
              $('#no_telp').val('');
              $('#status').val('');

              tampil_data();
            }

          })
        }
      }); // tutup fungsi simpan

      //edit
      $('#show_data').on('click', '#edit', function(e) {
        e.preventDefault();

        var id = $(this).data('id');
        $.ajax({
          url: 'pelanggan/edit',
          type: 'get',
          dataType: 'json',
          data: {
            id_pelanggan: id
          },
          success: function(data) {
            console.log(data);

            $('#id_pelanggan').val(data.id_pelanggan);
            $('#nama_pelanggan').val(data.nama_pelanggan);
            $('#alamat').val(data.alamat);
            $('#no_telp').val(data.no_telp);
            $('#status').val('update');
          },
        }); //tutup ajax edit
      }); //tutup fungsi edit

      $('#show_data').on('click', '#hapus', function(e) {
        e.preventDefault();

        var id = $(this).data('id');
        console.log('Berhasil Dihapus');
        $.ajax({
          method: 'post',
          url: 'pelanggan/delete',
          data: {
            id_pelanggan: id
          },
          success: function(data) {
            tampil_data();
            $('id_pelanggan').focus();
          }

        });

      });
      //end delete
    }); // tutup $document
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>