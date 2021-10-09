
<!DOCTYPE html>
<!--
    24 News by FreeHTML5.co
    Twitter: https://twitter.com/fh5co
    Facebook: https://fb.com/fh5co
    URL: https://freehtml5.co
-->
<html lang="en" class="no-js">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>KPU KOTA PEKANBARU</title>
    <link href="<?= base_url('libraries/frontend/') ?>css/media_query.css" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('libraries/frontend/') ?>css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="<?= base_url('libraries/frontend/') ?>css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="<?= base_url('libraries/frontend/') ?>css/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('libraries/frontend/') ?>css/owl.theme.default.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap CSS -->
    <link href="<?= base_url('libraries/frontend/') ?>css/style_1.css" rel="stylesheet" type="text/css"/>
    <!-- Modernizr JS -->
    <script src="<?= base_url('libraries/frontend/') ?>js/modernizr-3.5.0.min.js"></script>
</head>

<body class="single">
<!-- HEADER -->
<div class="container-fluid" style="background-image: url('<?= base_url('libraries/frontend/') ?>images/headbg.jpg'); size: 100%;">
    <div class="container" >
        <div class="row">
            <div class="col-12 col-md-3 fh5co_padding_menu">
                <a href="#>"><img src="<?= base_url('libraries/frontend/') ?>images/logokpu.png" alt="img" class="fh5co_logo_width"/></a>
            </div>
            <div class="col-12 col-md-6 align-self-center fh5co_mediya_left" style="text-align: center;">
                
                <h1><b>KOMISI PEMILIHAN UMUM</b></h1>
                <h1><b>KOTA PEKANBARU</b></h1>
                
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<!-- nav-bar -->
<?php $this->load->view('frontend/nav-bar'); ?>

<!--Fetch data dari database-->
<?php foreach ($berita_selengkapnya as $b) {?>
<div id="fh5co-title-box" style="background-image: url('<?= base_url('libraries/ubold/assets/') ?>images/<?php echo $b->gambar_berita; ?>'); background-position: 50% 90.5px;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="page-title">
        <h2><?php echo $b->judul_berita; ?></h2>
        <span><?php echo date('d-m-Y', strtotime($b->waktu)); ?></span>
        
    </div>
</div>
<div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <p>
                    <?php echo $b->isi_berita; ?>
                </p>
            </div>

            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                </div>
                <div class="clearfix"></div>
                <div class="fh5co_tags_all">
                    <a href="<?= site_url('BeritaPilkada') ?>" class="fh5co_tagg">Pilkada</a>
                    <a href="<?= site_url('BeritaPileg') ?>" class="fh5co_tagg">Pileg</a>
                    <a href="<?= site_url('BeritaPilpres') ?>" class="fh5co_tagg">Pilpres</a>
                </div>
                
            </div>
        </div>
    </div>
</div>
<?php } ?>

<div class="container-fluid pb-3">
    <div class="container animate-box">
        <div class="row">
            <div class="col-12 spdp_right py-5"></div>
            <div class="clearfix"></div>
            <!--komentar-->
            <hr>
            <?php foreach ($komentar as $k) {?>
            <div class="col-12 col-md-12 col-lg-12 ">
            <div class="media">
                <div class="media-body" style="background-color: silver; padding: 20px; color: black;">
                    <h4 class="media-heading"`><?php echo $k->nama_pengguna; ?></h4>
                    <p><?php echo $k->waktu; ?></p>
                    <p><?php echo $k->isi_komentar; ?></p>
                    <?php if ($this->session->userdata('username')==''){ ?>
                        <div class="input-group">
                            <input type="hidden" name="id_komentar" value="<?php echo $k->id_komentar; ?>">
                            <input type="text" style="width: 50%;height: 40px;" placeholder="Balas..." aria-describedby="basic-addon1" name='isi_reply'>
                            <a href="<?= site_url('Login') ?>" type="submit" class="btn btn-danger"> <i class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;Reply</a>
                        </div><br>
                    <?php }else { ?>
                        <div class="input-group">
                            <form style="width: 100%;" class="form-horizontal group-border-dashed"  method="post" action="<?=base_url('Frontend/tambahReply/'.$k->id_komentar);?>">
                            <input type="hidden" name="id_komentar" value="<?php echo $k->id_komentar; ?>">
                            <input type="hidden" name="id_berita" value="<?php echo $b->id_berita; ?>">
                            <input type="text" style="width: 50%;height: 40px;" placeholder="Reply..." aria-describedby="basic-addon1" name='isi_reply'>
                            <button type="submit" class="btn btn-danger"> <i class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;Reply</button>
                            </form>
                        </div><br>
                    <?php } ?>
                    <?php foreach ($reply as $c){ 
                        if ($k->id_komentar == $c->id_komentar) { ?>
                        <div style="margin-left: 100px; background-color: white; padding: 20px; color: black;">
                        <h4 class="media-heading" ><?php echo $c->nama_pengguna; ?></h4>
                        <p ><?php echo $c->waktu; ?></p>
                        <p ><?php echo $c->isi_reply; ?></p>
                        </div><hr>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
            <?php }?>
        </div>

        <?php if ($this->session->userdata('username')==''){ ?>
        <div class="row justify-content-center pt-2 pb-4">
            <div class="col-12 col-md-8 col-lg-7 ">
                <div class="input-group">
                    <input type="hidden" name="id_berita" value="<?php echo $b->id_berita; ?>">
                    <input type="text" style="width: 500px;height: 40px;" placeholder="Silahkan Ketik Komentar Anda..." aria-describedby="basic-addon1" name='isi_komentar'>
                    <a href="<?= site_url('Login') ?>"><button type="submit" class="btn btn-primary"> <i class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;Komen</button></a>
                </div>
            </div>
        </div>
        <?php }else { ?>
        <div class="row justify-content-center pt-2 pb-4">
            <div class="col-12 col-md-8 col-lg-7 ">
                <div class="input-group">
                    <form class="form-horizontal group-border-dashed"  method="post" action="<?=base_url('Frontend/tambahKomentar/'.$b->id_berita);?>">
                    
                    <input type="hidden" name="id_berita" value="<?php echo $b->id_berita; ?>">
                    <input type="text" style="width: 500px;height: 40px;" placeholder="Silahkan Ketik Komentar Anda..." aria-describedby="basic-addon1" name='isi_komentar'>
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;Komen</button>
                </form>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<div class="container-fluid fh5co_footer_right_reserved">
    <div class="container">
        <div class="row  ">
            <div class="col-12 col-md-6 py-4 Reserved"> © 2020, All rights reserved.</div>
        </div>
    </div>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
</div>

<script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.min.js"></script>


<script src="<?= base_url('libraries/frontend/') ?>js/owl.carousel.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>-->

<!-- Waypoints -->
<script src="<?= base_url('libraries/frontend/') ?>js/jquery.waypoints.min.js"></script>
<!-- Parallax -->
<script src="<?= base_url('libraries/frontend/') ?>js/jquery.stellar.min.js"></script>
<!-- Main -->
<script src="<?= base_url('libraries/frontend/') ?>js/main.js"></script>
<script>if (!navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i)){$(window).stellar();}</script>

</body>
</html>