
<div class="row">
    <div class="col-md-12 text-right">
        
<?php if($this->session->flashdata('result')){
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>' .$this->session->flashdata('result').'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
        ';
}
?>
        <a class="btn btn-success" href="<?= base_url() ?>karyawan/create"><i class="fa fa-add"></i>Tambah Karyawan</a>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-12">
        <table id="myTable" class="w-100" >
            <thead>
                <tr>
                    <th>nip</th>
                    <th>nama</th>
                    <th>jenis kelamin</th>
                    <th>tanggal lahir</th>
                    <th>telephone</th>
                    <th>email</th>
                    <th>alamat</th>
                    <th>jabatan</th>
                    <th>masa kerja</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $dt) { ?>
                    <tr>
                        <td><?= $dt->NIP ?></td>
                        <td><?= $dt->nama ?></td>
                        <td><?= $dt->jenis_kelamin ?></td>
                        <td><?= $dt->tgl_lahir ?></td>
                        <td><?= $dt->telp ?></td>
                        <td><?= $dt->email ?></td>
                        <td><?= $dt->alamat ?></td>
                        <td><?= $dt->jabatan ?></td>
                        <td><?= $dt->masa_kerja ?></td>
                        <td> <a href="<?= base_url() . "karyawan/delete/" . $dt->id ?>"><i class="fa fa-trash"></i></a>
                            <a class="ml-2" href="<?= base_url() . "karyawan/edit/" . $dt->id ?>"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>