<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title" style="margin-bottom: 10px">Data Perolehan Suara Calon pilpres</h4>
            </div>
        </div>
        
        <!-- Tabel -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- Div 1 -->
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <!-- Ambil dari generator -->
                            <?php echo anchor(site_url('SuaraCalonPilpres/create'),'Create', 'class="btn btn-primary"'); ?>
                        </div>
                        <div class="col-md-4 text-center">
                            <div style="margin-top: 8px" id="message">
                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Div 2 -->
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable-responsive" class="table table-striped table-bordered nowrap data-list" cellspacing="0" width="100%">
                                <thead>
                                    <!-- Ambil dari generator -->
                                    <tr>
                                        <th>No</th>
                                        <th>Calon pilpres</th>
                                        <th>Kecamatan</th>
                                        <th>Jumlah Suara</th>
                                        <th>Tahun</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- Ambil dari generator -->
                                <?php
                                    foreach ($suaracalonpilpres_data as $no => $suaracalonpilpres){
                                ?>
                                    <tr>
                                        <td width="80px"><?php echo $no+1 ?></td>
                                        <td><?php echo $suaracalonpilpres->id_capres.' dan '.$suaracalonpilpres->id_cawapres ?></td>
                                        <td><?php echo $suaracalonpilpres->nama_kecamatan ?></td>
                                        <td><?php echo $suaracalonpilpres->jumlah_suara ?></td>
                                        <td><?php echo $suaracalonpilpres->tahun ?></td>
                                        <td style="display:table-cell; text-align:center" width="200px">
                                            <?php 
                                            echo anchor(site_url('SuaraCalonPilpres/read/'.$suaracalonpilpres->id_suara_calon_pilpres),' ', 'class="btn btn-info waves-effect waves-light glyphicon glyphicon-eye-open"'); 
                                            echo ' '; 
                                            echo anchor(site_url('SuaraCalonPilpres/update/'.$suaracalonpilpres->id_suara_calon_pilpres),' ', 'class="btn btn-warning waves-effect waves-light glyphicon glyphicon-pencil"'); 
                                            echo ' '; 
                                            echo anchor(site_url('SuaraCalonPilpres/delete/'.$suaracalonpilpres->id_suara_calon_pilpres),' ','class="btn btn-danger waves-effect waves-light glyphicon glyphicon-trash" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        

    </div> 
                
</div>
