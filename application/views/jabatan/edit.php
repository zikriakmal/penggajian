
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
    
<form action="<?= base_url() ?>jabatan/update/<?= $data[0]->id ?>" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputPassword1">Nama Jabatan</label>
                <input type="text" class="form-control" value="<?= $data[0]->jabatan?>" name="jabatan" placeholder="Nama Jabatan">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Standar Gaji</label>
                <input type="text" class="form-control" value="<?= $data[0]->standar_gaji?>" name="standar_gaji" placeholder="Standar Gaji">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Keterangan</label>
                <input type="text" class="form-control" value="<?= $data[0]->keterangan?>" name="keterangan" placeholder="keterangan">
            </div>
        </div>
    </div>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-success">Simpan</button>
    </div>
</form>