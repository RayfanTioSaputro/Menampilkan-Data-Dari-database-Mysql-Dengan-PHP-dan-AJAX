<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <div class="table-responsive">
        <table id="data" class="table table-striped table-bordered" style="width: 100%">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama Siswa</td>
                    <td>Alamat</td>
                    <td>Jurusan</td>
                    <td>Jenis Kelamin</td>
                    <td>Tanggal Masuk</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'koneksi.php';
                    $no = 1;
                    $query ="SELECT * FROM tbl_siswa  ORDER BY id DESC";
                    $dewan1 = $db1->prepare($query);
                    $dewan1->execute();
                    $res1 = $dewan1->get_result();
                    while ($row = $res1->fetch_assoc()) {
                        $id = $row['id'];
                        $nama_siswa = $row['nama_siswa'];
                        $alamat = $row['alamat'];
                        $jurusan = $row['jurusan'];
                        $jenis_kelamin = $row['jenis_kelamin'];
                        $tgl_masuk = $row['tgl_masuk'];
                    
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $nama_siswa; ?></td>
                        <td><?php echo $alamat; ?></td>
                        <td><?php echo $jurusan; ?></td>
                        <td><?php echo $jenis_kelamin; ?></td>
                        <td><?php echo $tgl_masuk; ?></td>
                        <td><button style="font-size: 11px;" class="bnt btn-primary" id="detail" 
                        name="detail" title="Lihat Detail" data-target="#viewModal  "><i class="fas fa-search"></i></button></td>
                    </tr>
                    <?php }?>
            </tbody>
        </table>
        <div id="viewModal" class="modal fade mr-tp-100" role="dialog">
            <div class="modal-dialog modal-lg flipInx animated">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">View Data</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" id="id" class="form-control" readonly="">
                        </div>
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" id="nama_siswa" class="form-control" readonly="">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" id="alamat" class="form-control" readonly="">
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" id="jurusan" class="form-control" readonly="">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <input type="text" id="jenis_kelamin" class="form-control" readonly="">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Masuk</label>
                            <input type="text" id="tgl_masuk" class="form-control" readonly="">
                        </div>
                    </div>  
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            let table = $('#data').DataTable();

            $('#data tbody').on('click', '#detail', function() {
                var current_row = $(this).parents('tr');
                if(current_row.hasClass('child')) {
                    current_row = current_row.prev();
                }
                var data = table.row(current_row).data();
                console.log(data)

                document.getElementById("id").value = data[0];
                document.getElementById("nama_siswa").value = data[1];
                document.getElementById("alamat").value = data[2];
                document.getElementById("jurusan").value = data[3];
                document.getElementById("jenis_kelamin").value = data[4];
                document.getElementById("tgl_masuk").value = data[5];

                $("#viewModal").modal("show");
            });
        });
    </script>
</body>
</html>