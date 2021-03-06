@extends('panitia.layouts.main')

@section('title')
Panitia &raquo; PMB &raquo; Form Tambah Data Jadwal Ujian
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Form Tambah Data Jadwal Ujian</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <ul class="breadcrumb">
            <li><a href="/dosen">Panitia</a></li>
            <li><a href="/dosen/soal">Data Jadwal Ujian</a></li>
            <li class="active">Form Tambah Data Jadwal Ujian</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Form Data Jadwal Ujian
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        @if(session('notification'))
                            <div class="alert alert-dismissible alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ session('notification') }}
                            </div>
                        @endif
                        <form action="/panitia/pmb/jadwal-ujian/simpan" method="post">
                            @csrf
                            <div class="form-group {{$errors->has('kode') ? ' has-error' : ''}}">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-xs-12">
                                        <label class="control-label">Kode Jadwal Ujian</label>
                                        <input type="text" name="kode" class="form-control" id="kode" value="{{ old('kode') }}" readonly />
                                        <code>
                                            Terisi otomatis sesuai apa yang dipilih
                                        </code>
                                        @if($errors->has('kode'))
                                            <p class="text-danger">
                                                <i>{{ $errors->first('kode') }}</i>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-12">
                                    <div class="form-group {{$errors->has('kode_jurusan') ? ' has-error' : ''}}">
                                        <label class="control-label">Jurusan</label>
                                        <select name="kode_jurusan" class="form-control" id="kode-jurusan">
                                            <option value="">-- Pilih Jurusan --</option>
                                            @foreach($prodi as $item)
                                                <option value="{{ $item->kode }}" {{ ($item->kode == old('kode_jurusan')) ? 'selected' : '' }}>
                                                    {{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('kode_jurusan'))
                                            <p class="text-danger">
                                                <i>{{ $errors->first('kode_jurusan') }}</i>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-xs-12">
                                    <div class="form-group {{$errors->has('kode_gelombang') ? ' has-error' : ''}}">
                                        <label class="control-label">Gelombang</label>
                                        <select name="kode_gelombang" class="form-control" id="kode-gelombang">
                                            <option value="">-- Pilih gelombang --</option>
                                            @foreach($gelombang as $item)
                                                <option value="{{ $item->kode }}" {{ ($item->kode == old('kode_gelombang')) ? 'selected' : '' }}>
                                                    {{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('kode_gelombang'))
                                            <p class="text-danger">
                                                <i>{{ $errors->first('kode_gelombang') }}</i>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-xs-12">
                                    <div class="form-group {{$errors->has('status_pendaftaran') ? ' has-error' : ''}}">
                                        <label class="control-label">Status Pendaftaran *</label>
                                        <select name="status_pendaftaran" class="form-control" id="status-pendaftaran">
                                            <option value="">-- Pilih Status Pendaftaran --</option>
                                            <option value="Baru" {{ (old('status_pendaftaran') == "Baru") ? 'selected' : '' }}>Ujian Baru</option>
                                            <option value="Mengulang" {{ (old('status_pendaftaran') == "Mengulang") ? 'selected' : '' }}>Ujian Mengulang</option>
                                        </select>
                                        @if($errors->has('status_pendaftaran'))
                                            <p class="text-danger">
                                                <i>{{ $errors->first('status_pendaftaran') }}</i>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-xs-12">
                                    <div class="form-group {{$errors->has('kode_soal') ? ' has-error' : ''}}">
                                        <label class="control-label">Soal</label>
                                        <select name="kode_soal" class="form-control" id="kode-soal">
                                            <option value="">-- Pilih Soal --</option>
                                            @foreach($soal as $item)
                                                <option value="{{ $item->kode }}" {{ ($item->kode == old('kode_soal')) ? 'selected' : '' }}>
                                                    {{ $item->kode }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('kode_soal'))
                                            <p class="text-danger">
                                                <i>{{ $errors->first('kode_soal') }}</i>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-12">
                                    <div class="form-group {{$errors->has('tahun') ? ' has-error' : ''}}">
                                        <label class="control-label">Tahun</label>
                                        <select name="tahun" class="form-control">
                                            @for($i=date('Y'); $i>=1950; $i--)
                                                <option value="{{ $i }}" {{ old('tahun') == $i ? "selected" : "" }}>
                                                    {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                        @if($errors->has('tahun'))
                                            <p class="text-danger">
                                                <i>{{ $errors->first('tahun') }}</i>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-xs-12">
                                    <div class="form-group {{$errors->has('ruangan') ? ' has-error' : ''}}">
                                        <label class="control-label">Ruangan *</label>
                                        <input type="text" name="ruangan" class="form-control" />
                                        @if($errors->has('ruangan'))
                                            <p class="text-danger">
                                                <i>{{ $errors->first('ruangan') }}</i>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-xs-12">
                                    <div class="form-group {{$errors->has('tanggal_mulai_ujian') ? ' has-error' : ''}}">
                                        <label class="control-label">Tanggal Mulai Ujian</label>
                                        <div class="input-group date" id="tanggal-mulai-ujian">
                                            <input type="text" name="tanggal_mulai_ujian" class="form-control" value="{{ old('tanggal_mulai_ujian') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                        @if($errors->has('tanggal_mulai_ujian'))
                                            <p class="text-danger">
                                                <i>{{ $errors->first('tanggal_mulai_ujian') }}</i>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <input type="hidden" id="temp-tanggal-mulai-ujian" />
                                <div class="col-lg-3 col-md-3 col-xs-12">
                                    <div class="form-group {{$errors->has('tanggal_selesai_ujian') ? ' has-error' : ''}}">
                                        <label class="control-label">Tanggal Selesai Ujian</label>
                                        <div class="input-group date" id="tanggal-selesai-ujian">
                                            <input type="text" name="tanggal_selesai_ujian" class="form-control" value="{{ old('tanggal_selesai_ujian') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                        @if($errors->has('tanggal_selesai_ujian'))
                                            <p class="text-danger">
                                                <i>{{ $errors->first('tanggal_selesai_ujian') }}</i>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <h2>Calon mahasiswa yang terdaftar</h2>
                            <div class="form-group">
                                <label>Daftar Calon Mahasiswa</label>
                                <div id="notifikasi"></div>
                                <div id="daftar-calon-peserta"></div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Simpan</button>
                            <a href="/dosen/soal" class="btn btn-default"><i class="fa fa-times"></i> Batal</a>
                        </form>
                    </div>
                    <!-- /.col-lg-12 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/locale/id.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script>
$(document).ready(function(){
    var kode_soal = $("#kode-soal").val();
    var kode_jurusan = $("#kode-jurusan").val();
    var kode_gelombang = $("#kode-gelombang").val();
    var status_pendaftaran = $("#status-pendaftaran").val();

    $('#tanggal-mulai-ujian').datetimepicker({
        locale: 'id',
        format: 'DD-MM-YYYY HH:mm:ss',
    }).on('dp.change', function(e){
        var tempDay = e.date._d.getDate();
        var tempMonth = e.date._d.getMonth();
        var year = e.date._d.getFullYear();
        var month;
        var day;

        if (tempMonth == 0) {
            month = '01';
        }else if(tempMonth == 1){
            month = '02';
        }else if(tempMonth == 2){
            month = '03';
        }else if(tempMonth == 3){
            month = '04';
        }else if(tempMonth == 4){
            month = '05';
        }else if(tempMonth == 5){
            month = '06';
        }else if(tempMonth == 6){
            month = '07';
        }else if(tempMonth == 7){
            month = '08';
        }else if(tempMonth == 8){
            month = '09';
        }else if(tempMonth == 9){
            month = '10';
        }else if(tempMonth == 10){
            month = '11';
        }else if(tempMonth == 11){
            month = '12';
        }

        if(tempDay == 1){
            day = '01';
        }else if(tempDay == 2){
            day = '02';
        }else if(tempDay == 3){
            day = '03';
        }else if(tempDay == 4){
            day = '04';
        }else if(tempDay == 5){
            day = '05';
        }else if(tempDay == 6){
            day = '06';
        }else if(tempDay == 7){
            day = '07';
        }else if(tempDay == 8){
            day = '08';
        }else if(tempDay == 9){
            day = '09';
        }else{
            day = e.date._d.getDate();
        }

        var startExam = day+'-'+month+'-'+year;
        $("#temp-tanggal-mulai-ujian").val(startExam);
        var kode_soal = $("#kode-soal").val();
        var kode_gelombang = $("#kode-gelombang").val();
        var status_pendaftaran = $("#status-pendaftaran").val();

        if($("#status-pendaftaran").val() == "Baru"){
            status_pendaftaran = "BARU";
        }else if($("#status-pendaftaran").val() == "Mengulang"){
            status_pendaftaran = "MENGULANG";
        }else{
            status_pendaftaran = "";
        }

        if(kode_soal != '' && kode_gelombang != '' && status_pendaftaran != ''){
            $.ajax({
                url: "/panitia/pmb/jadwal-ujian/cek/"+startExam,
                type: "get",
                dataType: "json",
                success: function(result){
                    var total = result.total;
                    var kode = kode_soal+kode_gelombang+status_pendaftaran+day+month+"SESI"+total;
                    $("#kode").val(kode);
                },
                error: function(errors, errorText){
                    alert(errorText);
                }
            });
        }
    });

    $('#tanggal-selesai-ujian').datetimepicker({
        locale: 'id',
        format:'DD-MM-YYYY HH:mm:ss',
    });

    if(kode_jurusan != '' && kode_gelombang != '' && status_pendaftaran != ''){
            $.ajax({
                url: "/panitia/pmb/jadwal-ujian/cek-peserta/"+kode_jurusan+"/"+kode_gelombang+"/"+status_pendaftaran,
                type: "get",
                dataType: "json",
                success: function(result){
                    var results = result.data;
                    var totals = result.total;
                    if(totals == 0){
                        var div = "<code>Belum ada yang terdaftar</code>";
                        $('#notifikasi').show();
                        $('#notifikasi').empty();
                        $('#notifikasi').append(div);
                        $('#daftar-calon-peserta').hide();
                        $('#daftar-calon-peserta').empty();
                    }else{
                        $('#daftar-calon-peserta').empty();
                        $('#daftar-calon-peserta').show();
                        $('#notifikasi').hide();
                        var i = 0;
                        $.each(results, function () {
                            var div = $(
                                        '<div class="checkbox">'+
                                            '<label>'+
                                                '<input type="checkbox" value="'+this.kode+'" name="kode_pendaftaran[]" id="calon-peserta">'+this.nama+' '+this.kode+
                                            '</label>'+
                                        '</div>'
                                    );
                            $('#daftar-calon-peserta').append(div);
                        });
                    }
                },
                error: function(errors, errorText){
                    alert(errorText);
                }
            });
        }
    $("#kode-soal").change(function(){
        var kode_soal = $("#kode-soal").val();
        var kode_gelombang = $("#kode-gelombang").val();
        var status_pendaftaran = $("#status-pendaftaran").val();
        var startExam = $("#temp-tanggal-mulai-ujian").val();
        var day = startExam.substr(0, 2);
        var month = startExam.substr(3, 2);

        if($("#status-pendaftaran").val() == "Baru"){
            status_pendaftaran = "BARU";
        }else if($("#status-pendaftaran").val() == "Mengulang"){
            status_pendaftaran = "MENGULANG";
        }else{
            status_pendaftaran = "";
        }

        if(kode_soal != '' && kode_gelombang != '' && status_pendaftaran != '' && startExam != ''){
            $.ajax({
                url: "/panitia/pmb/jadwal-ujian/cek/"+startExam,
                type: "get",
                dataType: "json",
                success: function(result){
                    var total = result.total;
                    var kode = kode_soal+kode_gelombang+status_pendaftaran+day+month+"SESI"+total;
                    $("#kode").val(kode);
                },
                error: function(errors, errorText){
                    alert(errorText);
                }
            });
        }
    });

    $("#status-pendaftaran").change(function(){
        var kode_jurusan = $("#kode-jurusan").val();
        var kode_soal = $("#kode-soal").val();
        var kode_gelombang = $("#kode-gelombang").val();
        var status_pendaftaran = $("#status-pendaftaran").val();
        var startExam = $("#temp-tanggal-mulai-ujian").val();
        var day = startExam.substr(0, 2);
        var month = startExam.substr(3, 2);

        if($("#status-pendaftaran").val() == "Baru"){
            status_pendaftaran = "BARU";
        }else if($("#status-pendaftaran").val() == "Mengulang"){
            status_pendaftaran = "MENGULANG";
        }else{
            status_pendaftaran = "";
        }

        if(kode_soal != '' && kode_gelombang != '' && status_pendaftaran != '' && startExam != ''){
            $.ajax({
                url: "/panitia/pmb/jadwal-ujian/cek/"+startExam,
                type: "get",
                dataType: "json",
                success: function(result){
                    var total = result.total;
                    var kode = kode_soal+kode_gelombang+status_pendaftaran+day+month+"SESI"+total;
                    $("#kode").val(kode);
                },
                error: function(errors, errorText){
                    alert(errorText);
                }
            });
        }

        if(kode_jurusan != '' && kode_gelombang != '' && status_pendaftaran != ''){
            $.ajax({
                url: "/panitia/pmb/jadwal-ujian/cek-peserta/"+kode_jurusan+"/"+kode_gelombang+"/"+status_pendaftaran,
                type: "get",
                dataType: "json",
                success: function(result){
                    console.log(result);
                    var results = result.data;
                    var totals = result.total;
                    if(totals == 0){
                        var div = "<code>Belum ada yang terdaftar</code>";
                        $('#notifikasi').show();
                        $('#notifikasi').empty();
                        $('#notifikasi').append(div);
                        $('#daftar-calon-peserta').hide();
                        $('#daftar-calon-peserta').empty();
                    }else{
                        $('#daftar-calon-peserta').empty();
                        $('#daftar-calon-peserta').show();
                        $('#notifikasi').hide();
                        var i = 0;
                        $.each(results, function () {
                            var div = $(
                                        '<div class="checkbox">'+
                                            '<label>'+
                                                '<input type="checkbox" value="'+this.kode+'" name="kode_pendaftaran[]" id="calon-peserta">'+this.nama+' '+this.kode+
                                            '</label>'+
                                        '</div>'
                                    );
                            $('#daftar-calon-peserta').append(div);
                        });
                    }
                },
                error: function(errors, errorText){
                    alert(errorText);
                }
            });
        }
    });
    $("#kode-gelombang").change(function(){
        var kode_jurusan = $("#kode-jurusan").val();
        var kode_soal = $("#kode-soal").val();
        var kode_gelombang = $("#kode-gelombang").val();
        var status_pendaftaran = $("#status-pendaftaran").val();
        var startExam = $("#temp-tanggal-mulai-ujian").val();
        var day = startExam.substr(0, 2);
        var month = startExam.substr(3, 2);

        if($("#status-pendaftaran").val() == "Baru"){
            status_pendaftaran = "BARU";
        }else if($("#status-pendaftaran").val() == "Mengulang"){
            status_pendaftaran = "MENGULANG";
        }else{
            status_pendaftaran = "";
        }

        if(kode_soal != '' && kode_gelombang != '' && status_pendaftaran != '' && startExam != ''){
            $.ajax({
                url: "/panitia/pmb/jadwal-ujian/cek/"+startExam,
                type: "get",
                dataType: "json",
                success: function(result){
                    var total = result.total;
                    var kode = kode_soal+kode_gelombang+status_pendaftaran+day+month+"SESI"+total;
                    $("#kode").val(kode);
                },
                error: function(errors, errorText){
                    alert(errorText);
                }
            });
        }

        if(kode_jurusan != '' && kode_gelombang != '' && status_pendaftaran != ''){
            $.ajax({
                url: "/panitia/pmb/jadwal-ujian/cek-peserta/"+kode_jurusan+"/"+kode_gelombang+"/"+status_pendaftaran,
                type: "get",
                dataType: "json",
                success: function(result){
                    console.log(result);
                    var results = result.data;
                    var totals = result.total;
                    if(totals == 0){
                        var div = "<code>Belum ada yang terdaftar</code>";
                        $('#notifikasi').show();
                        $('#notifikasi').empty();
                        $('#notifikasi').append(div);
                        $('#daftar-calon-peserta').hide();
                        $('#daftar-calon-peserta').empty();
                    }else{
                        $('#daftar-calon-peserta').empty();
                        $('#daftar-calon-peserta').show();
                        $('#notifikasi').hide();
                        var i = 0;
                        $.each(results, function () {
                            var div = $(
                                        '<div class="checkbox">'+
                                            '<label>'+
                                                '<input type="checkbox" value="'+this.kode+'" name="kode_pendaftaran[]" id="calon-peserta">'+this.nama+' '+this.kode+
                                            '</label>'+
                                        '</div>'
                                    );
                            $('#daftar-calon-peserta').append(div);
                        });
                    }
                },
                error: function(errors, errorText){
                    alert(errorText);
                }
            });
        }
    });
    $("#kode-jurusan").change(function(){
        var kode_jurusan = $("#kode-jurusan").val();
        var kode_soal = $("#kode-soal").val();
        var kode_gelombang = $("#kode-gelombang").val();
        var status_pendaftaran = $("#status-pendaftaran").val();
        var startExam = $("#temp-tanggal-mulai-ujian").val();
        var day = startExam.substr(0, 2);
        var month = startExam.substr(3, 2);

        if($("#status-pendaftaran").val() == "Baru"){
            status_pendaftaran = "BARU";
        }else if($("#status-pendaftaran").val() == "Mengulang"){
            status_pendaftaran = "MENGULANG";
        }else{
            status_pendaftaran = "";
        }

        if(kode_soal != '' && kode_gelombang != '' && status_pendaftaran != '' && startExam != ''){
            $.ajax({
                url: "/panitia/pmb/jadwal-ujian/cek/"+startExam,
                type: "get",
                dataType: "json",
                success: function(result){
                    var total = result.total;
                    var kode = kode_soal+kode_gelombang+status_pendaftaran+day+month+"SESI"+total;
                    $("#kode").val(kode);
                },
                error: function(errors, errorText){
                    alert(errorText);
                }
            });
        }

        if(kode_jurusan != '' && kode_gelombang != '' && status_pendaftaran != ''){
            $.ajax({
                url: "/panitia/pmb/jadwal-ujian/cek-peserta/"+kode_jurusan+"/"+kode_gelombang+"/"+status_pendaftaran,
                type: "get",
                dataType: "json",
                success: function(result){
                    var results = result.data;
                    var totals = result.total;
                    if(totals == 0){
                        var div = "<code>Belum ada yang terdaftar</code>";
                        $('#notifikasi').show();
                        $('#notifikasi').empty();
                        $('#notifikasi').append(div);
                        $('#daftar-calon-peserta').hide();
                        $('#daftar-calon-peserta').empty();
                    }else{
                        $('#daftar-calon-peserta').empty();
                        $('#daftar-calon-peserta').show();
                        $('#notifikasi').hide();
                        var i = 0;
                        $.each(results, function () {
                            var div = $(
                                        '<div class="checkbox">'+
                                            '<label>'+
                                                '<input type="checkbox" value="'+this.kode+'" name="kode_pendaftaran[]" id="calon-peserta">'+this.nama+' '+this.kode+
                                            '</label>'+
                                        '</div>'
                                    );
                            $('#daftar-calon-peserta').append(div);
                        });
                    }
                },
                error: function(errors, errorText){
                    alert(errorText);
                }
            });
        }
    });
});
</script>
@endpush

