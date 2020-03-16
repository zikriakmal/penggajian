
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
    
<form action="<?= base_url() ?>aturangaji/add" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputPassword1">Jabatan</label>
                <select class="form-control" name="jabatan" id="">
                    <?php foreach($dataJabatan as $dtJb){
                    ?>
                         <option value="<?= $dtJb->id?>"><?= $dtJb->jabatan?></option>
                    <?php }?>    
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Masa Kerja(bulan)</label>
                <input type="text" class="form-control" name="masa_kerja" placeholder="Masa Kerja">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Insentif</label>
                <input type="text" class="form-control" name="insentif" placeholder="Insentif">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Bonus</label>
                <input type="text" class="form-control" name="bonus" placeholder="Bonus">
            </div>
        </div>
    </div>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-success">Simpan</button>
    </div>
</form>