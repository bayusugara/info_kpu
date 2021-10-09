<div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
    <div class="container padding_786">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
            <a class="navbar-brand" href="#"><img src="<?= base_url('libraries/frontend/') ?>images/logokpu.png" alt="img" class="mobile_logo_width"/></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url('') ?>">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton2" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">BERITA <span class="sr-only">(current)</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                            <a class="dropdown-item" href="<?= site_url('BeritaPilkada') ?>">PILKADA</a>
                            <a class="dropdown-item" href="<?= site_url('BeritaPileg') ?>">PILEG</a>
                            <a class="dropdown-item" href="<?= site_url('BeritaPilpres') ?>">PILPRES</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton3" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">INFORMASI UMUM<span class="sr-only">(current)</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                            <a class="dropdown-item" href="<?= site_url('InformasiUmumPilkada') ?>">PILKADA</a>
                            <a class="dropdown-item" href="<?= site_url('InformasiUmumPileg') ?>">PILEG</a>
                            <a class="dropdown-item" href="<?= site_url('InformasiUmumPilpres') ?>">PILPRES</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton3" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">DATA KPU<span class="sr-only">(current)</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                            
                            <a class="dropdown-item" href="<?= site_url('DatakpuPileg') ?>">PILEG</a>
                            <a class="dropdown-item" href="<?= site_url('DatakpuPilpres') ?>">PILPRES</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('Gis') ?>">GIS <span class="sr-only">(current)</span></a>
                    </li>
                    
                    <?php if ($this->session->userdata('username')==''){ ?>
                    <li class="nav-item navbar-toggler-right" >
                        <a class="nav-link" href="<?= site_url('Login') ?>">LOGIN <span class="sr-only">(current)</span></a>
                    </li>
                    <?php }else { ?>
                    <li class="nav-item navbar-toggler-right" >
                        <a class="nav-link" href="<?=base_url('Login/logout');?>">LOGOUT<span class="sr-only">(current)</span></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>
</div>