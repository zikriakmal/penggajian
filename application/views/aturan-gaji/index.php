
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
        <a class="btn btn-success" href="<?= base_url() ?>aturangaji/create"><i class="fa fa-add"></i>Tambah Aturan Gaji</a>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-12">
        <table id="myTable" class="w-100" >
            <thead>
                <tr>
                    <th>id</th>
                    <th>jabatan</th>
                    <th>masa kerja(bulan)</th>
                    <th>insentif</th>
                    <th>bonus</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $dt) { ?>
                    <tr>
                        <td><?= $dt->id ?></td>
                        <td><?= $dt->jabatan ?></td>
                        <td><?= $dt->masa_kerja ?></td>
                        <td><?= $dt->insentif ?></td>
                        <td><?= $dt->bonus ?></td>
                        <td> <a href="<?= base_url() . "aturangaji/delete/" . $dt->id ?>"><i class="fa fa-trash"></i></a>
                            <a class="ml-2" href="<?= base_url() . "aturangaji/edit/" . $dt->id ?>"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>