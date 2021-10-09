<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        

        <title>Info KPU</title>

        <link href="<?= base_url('libraries/ubold/') ?>assets/css/yearpicker.css" rel="stylesheet" type="text/css"/>
        
        <!-- DataTables -->
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>

        <!--Form Advance-->
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" />
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

        <!-- Date -->
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        
        <!--calendar css-->
        <link href="<?= base_url('libraries/ubold/') ?>assets/plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet" />

        <link href="<?= base_url('libraries/ubold/') ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <link href="<?= base_url('libraries/custom/') ?>css/style.css" rel="stylesheet" type="text/css" />
        
        <link href="<?= base_url('libraries/leaflet/') ?>leaflet.css" rel="stylesheet" type="text/css" />
        <script src="<?= base_url('libraries/leaflet/') ?>leaflet.js"></script>

        <script src='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />

        <script src="<?= base_url('libraries/ubold/') ?>assets/js/modernizr.min.js"></script>
        
        <!--  -->
        <style type="text/css">
            #sidebar-menu{
                padding-top:0;
            }
            .data-list th, .data-list td {
                text-align: center;
            }
            .data-list .pinggir{
                text-align: left;
            }
            #mapid {
                height: 200px;
            }
        </style>

    </head>

    <body class="fixed-left">

<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Kecamatan</h4>
                <div id='map' style='height: 500px; width: 100%;'></div>
                
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Dapil</h4>
                <div id='map_dapil' style='height: 500px; width: 100%;'></div>
                </div>
        </div>

    </div> <!-- container -->
                
</div>


<!-- jQuery  -->
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.min.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/yearpicker.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/detect.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/fastclick.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.blockUI.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/waves.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/wow.min.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.scrollTo.min.js"></script>

        

        <script type="text/javascript">

            var resizefunc = [];

            function capitalize_Words(str){
                return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
            }

            $(document).ready(function () {
                var list_kecamatan = [];
                var list_dapil = [];
                var jumlah_dpt_dapil = [];
                var daftar_kecamatan_dapil = [];

                // Get data dapil
                $.ajax({
                    type:"ajax",
                    url: "<?= base_url('Gis/getDapil') ?>",
                    dataType:'JSON',
                    success : function(result){
                        //console.log(result);
                        for (var [index, dapil] of result.entries()){
                            var nama_dapil = dapil.nama_dapil.toLowerCase().trim();
                            var alokasi_kursi = parseInt(dapil.alokasi_kursi);
                                /*
                                list_dapil[nama_dapil] = [];
                                list_dapil[nama_dapil]['alokasi_kursi'] = alokasi_kursi;  
                                list_dapil[nama_dapil]['jumlah_dpt'] = 0; */
                                list_dapil[nama_dapil] = {
                                    "alokasi_kursi" : alokasi_kursi,
                                    "jumlah_dpt" : 0                                    
                                };
                                /*
                                list_dapil[nama_dapil] = {
                                    alokasi_kursi : alokasi_kursi,
                                    jumlah_dpt :    0
                                };*/
                            
                        }
                    }
                });
                        //console.log(list_dapil);


                // Get data kecamatan
                $.ajax({
                    type:"ajax",
                    url: "<?= base_url('Gis/getDataKecamatan') ?>",
                    dataType:'JSON',
                    success : function(result){
                        for(var [index, kecamatan] of result.entries()){
                            var nama_kecamatan = kecamatan.nama_kecamatan.toLowerCase().trim();
                            var nama_dapil = kecamatan.nama_dapil.toLowerCase().trim();
                            var jumlah = parseInt(kecamatan.jumlah_dpt_lk) + parseInt(kecamatan.jumlah_dpt_pr);

                            // Set data kecamatan from database
                            list_kecamatan[nama_kecamatan] = {
                                jumlah_penduduk:    kecamatan.jumlah_penduduk,
                                jumlah_dpt:         jumlah
                            };
                            
                            // Set data dapil from database
                            if(!jumlah_dpt_dapil[nama_dapil]){
                                jumlah_dpt_dapil[nama_dapil] = jumlah;
                            } else {
                                jumlah_dpt_dapil[nama_dapil] += jumlah;
                            }
                            //console.log(jumlah_dpt_dapil);

                                //list_dapil[nama_dapil].jumlah_dpt += jumlah;
                            if(!daftar_kecamatan_dapil[nama_dapil]){
                                daftar_kecamatan_dapil[nama_dapil] = kecamatan['nama_kecamatan'];
                            } else {
                                daftar_kecamatan_dapil[nama_dapil] += ', ' + kecamatan['nama_kecamatan'];
                            }
                        }
                        console.log(jumlah_dpt_dapil);

                        // Set map kecamatan
                            var mymap = L.map('map').setView([0.506566, 101.437790], 11);

                            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                maxZoom: 18,
                                id: 'mapbox/streets-v11',
                                tileSize: 512,
                                zoomOffset: -1,
                                accessToken: 'pk.eyJ1IjoibWhyZGtrIiwiYSI6ImNrYThiM3liYjBkdmEyem1yZHFjZXFiYzQifQ.-HSSet2KQSmW2hGh03UBYA'
                            }).addTo(mymap);
                            
                            $.getJSON('<?= base_url() ?>' + 'libraries/leaflet/data_kecamatan/kecamatan.geojson', function(data){
                                geoLayer = L.geoJSON(data, {
                                    style: function(feature){
                                        var bg_color = feature.properties.fill;
                                        return {
                                            color: bg_color
                                        };
                                    },
                                    onEachFeature: function(feature, layer2){
                                        var nama_kecamatan = feature.properties.name;

                                        var lowerKecamatan = nama_kecamatan.toLowerCase().trim();
                                        
                                        // Jika di database terdapat kecamatan yang terdaftar pada geojson
                                        if (list_kecamatan[lowerKecamatan]) {
                                            var info_kecamatan = `
                                                <h5>Kecamatan = ${nama_kecamatan}</h5>
                                                <h5>Jumlah Penduduk = ${list_kecamatan[lowerKecamatan].jumlah_penduduk}</h5>
                                                <h5>Jumlah DPT = ${list_kecamatan[lowerKecamatan].jumlah_dpt}</h5>
                                            `;

                                            layer2.bindPopup(info_kecamatan, {
                                                maxWidth : 300,
                                                closeButton: true,
                                                offset: L.point(0, -20)
                                            });

                                            layer2.on('click', function(){
                                                layer2.openPopup();
                                            });
                                        }
                                        
                                    }
                                }).addTo(mymap);
                            }); 

                        // Set map dapil
                            var dapil_map = L.map('map_dapil').setView([0.506566, 101.437790], 11);

                            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                maxZoom: 18,
                                id: 'mapbox/streets-v11',
                                tileSize: 512,
                                zoomOffset: -1,
                                accessToken: 'pk.eyJ1IjoibWhyZGtrIiwiYSI6ImNrYThiM3liYjBkdmEyem1yZHFjZXFiYzQifQ.-HSSet2KQSmW2hGh03UBYA'
                            }).addTo(dapil_map);

                            $.getJSON('<?= base_url() ?>' + 'libraries/leaflet/data_kecamatan/dapil.geojson', function(data){
                                geoLayer = L.geoJSON(data, {
                                    style: function(feature){
                                        var bg_color = feature.properties.fill;
                                        return {
                                            color: bg_color
                                        };
                                    },
                                    onEachFeature: function(feature, layer){
                                        var nama_dapil = feature.properties.name;

                                        var lowerDapil = nama_dapil.toLowerCase().trim();
                                        //console.log(jumlah_dpt_dapil[lowerDapil]);

                                        // Jika daftar dapil di database ada di file geojson
                                        if (list_dapil[lowerDapil]) {
                                            var info_kecamatan = `
                                                <h5>${nama_dapil}</h5>
                                                <h5>Jumlah DPT = ${jumlah_dpt_dapil[lowerDapil]}</h5>
                                                <h5>Alokasi Kursi = ${list_dapil[lowerDapil].alokasi_kursi}</h5>
                                                <h5>Kecamatan = ${daftar_kecamatan_dapil[lowerDapil]}</h5>
                                            `;
                                            
                                            layer.bindPopup(info_kecamatan, {
                                                maxWidth : 300,
                                                closeButton: true,
                                                offset: L.point(0, -20)
                                            });

                                            layer.on('click', function(){
                                                layer.openPopup();
                                            });
                                        }
                                        
                                        
                                    }
                                }).addTo(dapil_map);
                            }); 

                    }
                });


                
                
                

                

            });
        </script>
    </body>
</html>