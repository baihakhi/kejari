<?= $this->extend('template/admin') ?>
<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Kasus</h1>
        <div class="col">
            <button class="btn btn-primary" onclick="addKasus()">
                <i class="ion ion-plus-circled"></i> Tambah
            </button>
            <a href="" class="btn btn-primary" data-toggle="dropdown">
                <i class="ion ion-ios-cloud-upload"></i> Excel
            </a>
            <ul class="dropdown-menu">
                <a class="nav-link Umum" onclick="btnUmum()" href="#">Pidana Umum</a>
                <a class="nav-link Khusus" onclick="btnKhusus()" href="#">Pidana Khusus</a>
                <a class="nav-link Perdata" onclick="btnPerdata()" href="#">Perdata dan Tata Usaha Negara </a>
            </ul>
            <a href="/download_excel" class="btn btn-primary" target="_blank">
                <span class="ion ion-archive" data-pack="android" data-tags="plus, include, invite">
                    Contoh
                </span>
            </a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('/dashboard'); ?>">Dashboard</a></div>
            <div class="breadcrumb-item">Master Data</div>
            <div class="breadcrumb-item">Kasus</div>
        </div>
    </div>

    <?php if (session()->getFlashdata('message') != null) :  ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                <?php echo session()->getFlashdata('message')  ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="section-body">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Kasus</h4>
                        <div class="card-header-action">
                            <select name="kategori" id="filterKategori" onclick="filterData()" class="form-control kategori">
                                <option value="">Filter</option>
                                <option value="Pidana Umum">Pidana Umum</option>
                                <option value="Pidana Khusus">Pidana Khusus</option>
                                <option value="Perdata Dan Tata Usaha Negara">Perdata Dan Tata Usaha Negara</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="tableKasus" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>No Perkara</th>
                                        <th>Nama Terdakwa</th>
                                        <th>Nama Hakim</th>
                                        <th>Nama Jaksa</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" data-backdrop="false" role="dialog" id="modalKasus">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" onclick="reset()" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body form_kasus">
                    <div class="card-body Proses ">
                        <form action="#" id="formKasus" class="form-horizontal">
                            <div class="card-body Method">
                                <input type="hidden" value="" name="id_kasus" />
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="tanggal">Tanggal</label>
                                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="">
                                        <div class="invalid-feedback errorTanggal">

                                        </div>
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="no_perkara">Nomor Perkara</label>
                                        <input id="no_perkara" type="text" class="form-control" value="" name="no_perkara">
                                        <div class="invalid-feedback erorrNomor">

                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="agenda">Agenda</label>
                                        <input id="agenda" type="text" class="form-control" value="" name="agenda">
                                        <div class="invalid-feedback errorAgenda">

                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="nama_jaksa">Penuntut Umum</label>
                                        <input id="nama_jaksa" type="text" class="form-control" value="" name="nama_jaksa">
                                        <div class="invalid-feedback errorJaksa">

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="nama_terdakwa">Nama Terdakwa</label>
                                        <input id="nama_terdakwa" type="text" class="form-control" value="" name="nama_terdakwa">
                                        <div class="invalid-feedback errorNama">

                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="nama_hakim">Majelis Hakim</label>
                                        <input id="nama_hakim" type="text" class="form-control" value="" name="nama_hakim">
                                        <div class="invalid-feedback errorHakim">

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="panitia_pengganti">Panitia Pengganti</label>
                                        <input id="panitia_pengganti" type="text" class="form-control" value="" name="panitia_pengganti">
                                        <div class="invalid-feedback errorPengganti">

                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="kategori">Kategori</label>
                                        <select class="form-control" name="kategori" id="kategori">
                                            <option value="" hidden>== Kategori ==</option>
                                            <option value="Pidana Umum">Pidana Umum</option>
                                            <option value="Pidana Khusus">Pidana Khusus</option>
                                            <option value="Perdata Dan Tata Usaha Negara">Perdata Dan Tata Usaha Negara</option>
                                        </select>
                                        <div class="invalid-feedback errorKategori">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body Detail">
                        <div class="row">
                            <div class="col">
                                <h6 id="nama">
                                    AA
                                </h6>
                            </div>
                            <div class="col">
                                <h6 id="no">

                                </h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6 id="tgl">

                                </h6>
                            </div>
                            <div class="col">
                                <h6 id="agendaSidang">

                                </h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6 id="hakim">

                                </h6>
                            </div>
                            <div class="col">
                                <h6 id="jaksa">

                                </h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6 id="pengganti">

                                </h6>
                            </div>
                            <div class="col">
                                <h6 id="ket">

                                </h6>
                            </div>
                        </div>
                        <div class="row">


                            <div class="col">
                                <h6 id="kategori_terdakwa">

                                </h6>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal-footer Foot">
                    <button type="submit" id="btnSave" onclick="save()" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-light" onclick="reset()" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" id="modalImport">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('', ['class' => 'formImport']); ?>
                    <div class="form-group">
                        <label>Masukan File</label>
                        <input type="file" class="form-control-file" name="file_excel" id="file_excel" accept=".xls,.xlsx">
                        <div class="invalid-feedback errorFile">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-sm btnImport">Tambah</button>
                        <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Batal</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>



</section>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    var save_method;
    var table;
    var excel;
    $(document).ready(function() {
        table = $('#tableKasus').DataTable({
            "processing": true,
            "serverSide": true,
            'destroy': true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('kasus/getKasus'); ?>",
                "type": "POST",
                "data": function(data) {
                    data.kategori = $('#filterKategori').val();
                }
            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });

        $('#filterKategori').click(function() {
            table.draw();
        })


        $('.btnImport').click(function(e) {
            e.preventDefault();
            let form = $('.formImport')[0];
            let data = new FormData(form);
            if (excel == 'umum') {
                url = "<?= site_url('kasus/import_umum'); ?>";
            }
            if (excel == 'khusus') {
                url = "<?= site_url('kasus/import_khusus'); ?>";
            }
            if (excel == 'perdata') {
                url = "<?= site_url('kasus/import_perdata'); ?>";
            }
            Swal.fire({
                title: 'Apakah anda akan Menginput?',
                showDenyButton: true,
                icon: 'warning',
                confirmButtonText: 'Yakin?',
                denyButtonText: `Kembali`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: data,
                        enctype: 'multipart/form-data',
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        beforeSend: function(e) {
                            $('.btnImport').prop('disabled', 'disabled');
                            $('.btnImport').html('<i class ="fa fa-spin fa-spinne"></i>');
                        },
                        complete: function(e) {
                            $('.btnImport').removeAttr('disabled');
                            $('.btnImport').html('Import');
                        },
                        success: function(response) {
                            if (response.error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    html: `Data File Harus Di isi/ Bukan Excel !!!`,
                                }).then((result) => {
                                    if (result.value) {

                                    }
                                })
                            }
                            if (response.sukses) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    html: `Data Berhasil Di tambahkan`,
                                }).then((result) => {
                                    if (result.value) {
                                        $('#modalImport').modal('hide');
                                        $("#file_excel").val("");
                                        reload_table();
                                    }
                                })
                            }
                        }
                    });
                }
            })
        })

    });


    function btnUmum() {
        excel = 'umum';
        $('#modalImport').modal('show');
        $('.modal-title').text('Import Data Pidana Umum');
    }

    function btnKhusus() {
        excel = 'khusus';
        $('#modalImport').modal('show');
        $('.modal-title').text('Import Data Pidana Khusus');
    }

    function btnPerdata() {
        excel = 'perdata';
        $('#modalImport').modal('show');
        $('.modal-title').text('Import Data Perdata dan Tata Usaha Negara');
    }



    function reload_table() {
        table.ajax.reload(null, false);
    }

    function reset() {
        $('#nama_terdakwa').removeClass('is-invalid');
        $('#nama_terdakwa').removeClass('is-valid');
        $('#no_perkara').removeClass('is-invalid');
        $('#no_perkara').removeClass('is-valid');
        $('#keterangan').removeClass('is-invalid');
        $('#keterangan').removeClass('is-valid');
        $('#nama_hakim').removeClass('is-invalid');
        $('#nama_hakim').removeClass('is-valid');
        $('#nama_jaksa').removeClass('is-invalid');
        $('#nama_jaksa').removeClass('is-valid');
        $('#panitia_pengganti').removeClass('is-invalid');
        $('#panitia_pengganti').removeClass('is-valid');
        $('#tanggal').removeClass('is-invalid');
        $('#tanggal').removeClass('is-valid');
        $('#agenda').removeClass('is-invalid');
        $('#agenda').removeClass('is-valid');
        $('#kategori').removeClass('is-invalid');
        $('#kategori').removeClass('is-valid');
    }

    function addKasus() {
        save_method = 'add';
        $('#formKasus')[0].reset();
        $('#modalKasus').modal('show');
        $('.modal-title').text('Tambah Kasus Terbaru');
        $('.Foot').show();
        $('.Proses').show();
        $('.Detail').hide();
        $('.keterangan').show();
    }

    function editKasus(id_kasus) {
        save_method = 'edit';
        $('#formKasus')[0].reset();
        $('.Foot').show();
        $('.Proses').show();
        $('.Detail').hide();
        $('.keterangan').hide();
        $.ajax({
            url: "<?= site_url('kasus/get_id/'); ?>" + id_kasus,
            type: "GET",
            dataType: "json",
            success: function(data) {
                $('[name=id_kasus]').val(data.id_kasus);
                $('[name=nama_terdakwa]').val(data.nama_terdakwa);
                $('[name=no_perkara]').val(data.no_perkara);
                $('[name=keterangan]').val(data.keterangan);
                $('[name=nama_hakim]').val(data.nama_hakim);
                $('[name=nama_jaksa]').val(data.nama_jaksa);
                $('[name=panitia_pengganti]').val(data.panitia_pengganti);
                $('[name=kategori]').val(data.kategori);
                $('[name=agenda]').val(data.agenda);
                $('[name=tanggal]').val(data.tanggal);
                $('#modalKasus').modal('show');
                $('.modal-title').text('Edit Kasus');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function save() {
        if (save_method == 'add') {
            url = "<?= site_url('kasus/tambah_kasus'); ?>";
        } else {
            url = "<?= site_url('kasus/edit_kasus'); ?>";
        }
        $.ajax({
            type: "POST",
            url: url,
            data: $('#formKasus').serialize(),
            dataType: "json",
            beforeSend: function() {
                $('#btnSave').prop('disabled', true);
                $('#btnSave').html('Tunggu');
            },
            complete: function() {
                $('#btnSave').prop('disabled', false);
                $('#btnSave').html('Simpan');
            },
            success: function(response) {
                if (response.error) {
                    let data = response.error;
                    if (data.errorNama) {
                        $('#nama_terdakwa').addClass('is-invalid');
                        $('.errorNama').html(data.errorNama);
                    } else {
                        $('#nama_terdakwa').removeClass('is-invalid');
                        $('#nama_terdakwa').addClass('is-valid');
                    }
                    if (data.erorrNomor) {
                        $('#no_perkara').addClass('is-invalid');
                        $('.erorrNomor').html(data.erorrNomor);
                    } else {
                        $('#no_perkara').removeClass('is-invalid');
                        $('#no_perkara').addClass('is-valid');
                    }
                    if (data.errorHakim) {
                        $('#nama_hakim').addClass('is-invalid');
                        $('.errorHakim').html(data.errorHakim);
                    } else {
                        $('#nama_hakim').removeClass('is-invalid');
                        $('#nama_hakim').addClass('is-valid');
                    }
                    if (data.errorJaksa) {
                        $('#nama_jaksa').addClass('is-invalid');
                        $('.errorJaksa').html(data.errorJaksa);
                    } else {
                        $('#nama_jaksa').removeClass('is-invalid');
                        $('#nama_jaksa').addClass('is-valid');
                    }
                    if (data.errorPengganti) {
                        $('#panitia_pengganti').addClass('is-invalid');
                        $('.errorPengganti').html(data.errorPengganti);
                    } else {
                        $('#panitia_pengganti').removeClass('is-invalid');
                        $('#panitia_pengganti').addClass('is-valid');
                    }
                    if (data.errorKeterangan) {
                        $('#keterangan').addClass('is-invalid');
                        $('.errorKeterangan').html(data.errorKeterangan);
                    } else {
                        $('#keterangan').removeClass('is-invalid');
                        $('#keterangan').addClass('is-valid');
                    }
                    if (data.errorKategori) {
                        $('#kategori').addClass('is-invalid');
                        $('.errorKategori').html(data.errorKategori);
                    } else {
                        $('#kategori').removeClass('is-invalid');
                        $('#kategori').addClass('is-valid');
                    }
                    if (data.errorAgenda) {
                        $('#agenda').addClass('is-invalid');
                        $('.errorAgenda').html(data.errorAgenda);
                    } else {
                        $('#agenda').removeClass('is-invalid');
                        $('#agenda').addClass('is-valid');
                    }
                    if (data.errorTanggal) {
                        $('#tanggal').addClass('is-invalid');
                        $('.errorTanggal').html(data.errorTanggal);
                    } else {
                        $('#tanggal').removeClass('is-invalid');
                        $('#tanggal').addClass('is-valid');
                    }
                }
                if (response.sukses) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        html: `Data Berhasil Di tambahkan`,
                    }).then((result) => {
                        if (result.value) {
                            $('#modalKasus').modal('hide');
                            $('#filterKategori').val("");
                            reload_table();
                        }
                    })
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function delKasus(id_kasus) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Apakah Anda Yakin?',
            text: "Anda Akan Menghapus Data Ini!",
            icon: 'warning',
            reverseButtons: true,
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "<?= site_url('kasus/del_kasus/'); ?>/" + id_kasus,
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                'Data Berhasil Di Hapus',
                                'success'
                            ).then((result) => {
                                if (result.value) {
                                    reload_table();
                                }
                            })
                        }
                    }
                });

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Data Tidak Jadi Di Hapus :)',
                    'error'
                )
            }
        })
    }

    function detailKasus(id_kasus) {
        $('#formKasus')[0].reset();
        $('.Foot').hide();
        $('.Proses').hide();
        $('.Detail').show();
        $.ajax({
            url: "<?= site_url('kasus/get_id/'); ?>" + id_kasus,
            type: "GET",
            dataType: "json",
            success: function(data) {
                $('#nama').html("Nama terdakwa :" + data.nama_terdakwa);
                $('#no').html("Nomor Perkara :" + data.no_perkara);
                $('#ket').html("Keterangan :" + data.keterangan);
                $('#hakim').html("Nama Hakim :" + data.nama_hakim);
                $('#jaksa').html("Nama Jaksa :" + data.nama_jaksa);
                $('#pengganti').html("Panitia Pengganti :" + data.panitia_pengganti);
                $('#kategori_terdakwa').html("Kategori :" + data.kategori);
                $('#agendaSidang').html("Agenda :" + data.agenda);
                $('#tgl').html("Tanggal :" + data.tanggal);
                $('#modalKasus').modal('show');
                $('.modal-title').text('Detail Kasus');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function kasusSelesai(id_kasus) {

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data Ini Telah Selesai?",
            icon: 'warning',
            reverseButtons: true,
            showCancelButton: true,
            confirmButtonText: 'Ya, Data Selesai ',
            cancelButtonText: 'Tidak, Data Belum Selesai!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "<?= site_url('kasus/kasus_selesai/'); ?>/" + id_kasus,
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                'Data Telah Selesai (Incraht)',
                                'success'
                            ).then((result) => {
                                if (result.value) {
                                    reload_table();
                                }
                            })
                        }
                    }
                });

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Data Tidak Jadi Di Update :)',
                    'error'
                )
            }
        })
    }
</script>
<?= $this->endsection(); ?>