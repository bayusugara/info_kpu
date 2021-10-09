<?php
$data_calon_pilpres = $this->PaslonPilpresModel->get_all();
$data_kecamatan = $this->KecamatanModel->get_all();

$map_calon_pilpres = ['' => 'Pilih Calon'];
$map_kecamatan = ['' => 'Pilih Kecamatan'];

foreach ($data_calon_pilpres as $key => $value) {
    $id = $value->id_paslon_pilpres;
    $map_calon_pilpres[$id] = $value->id_capres.' dan '.$value->id_cawapres;
}
foreach ($data_kecamatan as $key => $value) {
    $id = $value->id_kecamatan;
    $map_kecamatan[$id] = $value->nama_kecamatan;
}


?>
<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Judul halaman -->
                <h4 class="page-title" style="margin-bottom: 10px">Suara Calon pilpres <?php echo $button ?></h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- Isi content -->
                    <form action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                            <label for="int">Calon pilpres <?php echo form_error('id_paslon_pilpres') ?></label>
                            <?= form_dropdown('id_paslon_pilpres', $map_calon_pilpres, $id_paslon_pilpres, ['class' => 'form-control', 'id' => 'select-id_paslon_pilpres']) ?>
                        </div>
                        <div class="form-group" id="testes">
                            <label for="int">Kecamatan <?php echo form_error('id_kecamatan') ?></label>
                            <?= form_dropdown('id_kecamatan', $map_kecamatan, $id_kecamatan, ['class' => 'form-control', 'id' => 'select-id_kecamatan']) ?>
                        </div>
                        <div class="form-group">
                            <label for="int">Jumlah Suara <?php echo form_error('jumlah_suara') ?></label>
                            <input type="number" min="0" class="form-control" name="jumlah_suara" id="jumlah_suara" placeholder="Jumlah Suara" value="<?php echo $jumlah_suara; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Tahun <?php echo form_error('tahun') ?></label>
                            <input type="number" min="2015" max="2020"  class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" />
                        </div>
                        <input type="hidden" name="id_suara_calon_pilpres" value="<?php echo $id_suara_calon_pilpres; ?>" /> 
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                        <a href="<?php echo site_url('SuaraCalonPilpres') ?>" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>        

    </div> 
                
</div>
<script type="text/javascript">

</script>