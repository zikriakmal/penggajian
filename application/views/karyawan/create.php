
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
    
<form action="<?= base_url() ?>karyawan/add" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputPassword1">NIP</label>
                <input type="text" class="form-control" name="nip" placeholder="NIP">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" id="">
                    <option value="pria">pria</option>
                    <option value="wanita">wanita</option>
                </select>
            </div>
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
                <label for="exampleInputPassword1">Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="Alamat">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputPassword1">Tanggal lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal lahir">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Telephone</label>
                <input type="text" class="form-control" name="telephone" placeholder="Telephone">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Masa Kerja</label>
                <input type="text" class="form-control" name="masa_kerja" placeholder="Masa Kerja">
            </div>
        </div>
    </div>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-success">Simpan</button>
    </div>
</form>