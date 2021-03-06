@extends('layouts.admin')

@section('title','Kemenag Bantul - Dashboard User')
@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-success font-weight-700">{{ __('Dashboard') }} {{ Auth::user()->name }}</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status'))
<div class="alert alert-success border-left-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="row">

    <div class="jumbotron text-success font-weight-700">
        <div class="container">
            <h1 class="display-6 text-capitalize">Selamat Datang Di Aplikasi Pendaftaran Online TPA/TPQ, Madin & Majelis
                Taklim Kemenag Bantul</h1>


            @if (Auth::user()->lembaga_id != null)
            @if (Auth::user()->status != '1')
            <div class="alert alert-warning font-weight-700 my-3 py-3" role="alert">
                <div style="font-size: 16px">
                    <strong>Silahkan menunggu verifikasi berkas dari admin, jika sudah ter-verifikasi maka akan dikirim
                        berkas lanjutan</strong>
                </div>
            </div>
            @else
            <div class="alert alert-success font-weight-700 my-3 py-3" role="alert">
                <div style="font-size: 16px">
                    <strong>selamat berkas anda telah diverifikasi oleh admin, silahkan unduh <a
                            href="/storage/file/{{ Auth::user()->surat->file }}" target="_blank">disini</a></strong>
                </div>
            </div>
            @endif
            @else
            <div class="alert alert-warning font-weight-700 my-3 py-3" role="alert">
                <div style="font-size: 16px">
                    <strong>Silahkan terlebih dahulu melengkapi profil data diri & berkas file setelah itu bisa
                        diverifikasi oleh admin</strong>
                </div>
            </div>
            @endif


            <hr class="my-2">
            <p class="lead">
                @if (Auth::user()->lembaga_id != null)
                <a class="btn btn-success btn-lg" href="{{ route('profile') }}" role="button">Lihat Profil</a>
                @else
                <a class="btn btn-success btn-lg" href="{{ route('profile') }}" role="button">Lengkapi Profil</a>
                @endif
            </p>
        </div>
    </div>

</div>


@endsection