<div class="row">
    <div class="col-md-12 text-right">

        <?php if ($this->session->flashdata('result')) {
            echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>' . $this->session->flashdata('result') . '</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
        ';
        }
        ?>
        <div class="alert alert-warning alert-dismissible text-center fade show" role="alert">
            <strong>Perhatian sebelum pilih karyawan harus isi data master aturan gaji jabatan dan karyawan</strong>
        </div>
    </div>
</div>
<form action="<?= base_url() ?>gaji/add" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputPassword1">Pilih karyawan</label>
                <select class="js-example-basic-single form-control" name="nama_karyawan" id="karyawan">
                    <option value="">pilih karyawan</option>
                    <?php foreach ($allKaryawan as $krywn) { ?>
                        <option value="<?= $krywn->id ?>">
                            <?= $krywn->nama ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tanggal</label>
                <input class="form-control" type="date" name="tanggal_penerimaan">
            </div>

        </div>
        <div class="col-md-6">
            <div id="dataKar"></div>

        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Gaji</button>
    </div>
</form>



<div class="row mt-2">
    <div class="col-md-12">
        <table id="myTable" class="w-100">
            <thead>
                <tr>
                    <th>Kode Penggajian</th>
                    <th>NIP</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal Penerimaan</th>
                    <th>Nominal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $dt) { ?>
                    <tr>
                        <td><?= $dt->kode_penggajian ?></td>
                        <td><?= $dt->nip ?></td>
                        <td><?= $dt->nama_karyawan ?></td>
                        <td><?= $dt->tanggal_penerimaan ?></td>
                        <td><?= $dt->nominal ?></td>
                        <td>
                            <a href="<?= base_url() . "gaji/print/" . $dt->id ?>"><i class="fa fa-print"></i></a>
                            <a class="ml-2" href="<?= base_url() . "gaji/delete/" . $dt->id ?>"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $('#karyawan').change(function() {
        var optionSelected = $(this).find("option:selected");
        var valueSelected = optionSelected.val();

        $.ajax({
            url: "<?= base_url() ?>gaji/getpegawai",
            type: "POST",
            data: {
                "id": valueSelected
            },
            success: function(result) {
                $("#dataKar").html(result);
            }
        });
        console.log(valueSelected);
    });
</script>