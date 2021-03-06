@extends('layouts.admin')


@section('title','Profile User')
@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-success font-weight-700">Profile Lembaga {{ auth()->user()->name }}</h1>

@if(session('status'))
@push('scripts')
<script>
    swal({
        title: "Success",
        text: "{{session('status')}}",
        icon: "success",
        button: false,
        timer: 3000
    });

</script>
@endpush
@endif

@if ($errors->any())
<div class="alert alert-danger border-left-danger" role="alert">
    <ul class="pl-4 my-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">

    <div class="col-lg-4 order-lg-2">

        <div class="card shadow mb-4">
            <div class="card-profile-image mt-4">
                @if (Auth::user()->lembaga_id == null)
                <figure class="rounded-circle avatar avatar font-weight-bold bg-success"
                    style="font-size: 60px; height: 180px; width: 180px;" data-initial="{{ Auth::user()->name[0] }}">
                </figure>
                @elseif(Auth::user()->lembaga_id == 1)
                <img src="{{ asset('img/logo/tpa-tpq.jpeg') }}" class="rounded-circle">
                @elseif(Auth::user()->lembaga_id == 2)
                <img src="{{ asset('img/logo/madin.jpeg') }}" class="rounded-circle">
                @else
                <img src="{{ asset('img/logo/taklim.jpeg') }}" class="rounded-circle">
                @endif
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h5 class="font-weight-bold">{{ Auth::user()->name }}</h5>
                            <p>{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="col-lg-8 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="m-0 font-weight-bold text-success">Account {{ auth()->user()->name }}</h6>
                    </div>
                    <div class="col-md-5"></div>
                    <div class="col-md-3">
                        <h6 class="m-0 font-weight-bold"><a href="{{ route('cetak.formulir') }}" class="text-success">
                                <i class="fas fa-print"></i>
                                Cetak Formulir</a></h6>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('profile.update') }}" autocomplete="off">
                    @csrf
                    @method('PUT')

                    <div class="pl-lg-4">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="name">Nama Lembaga<span
                                            class="small text-danger">*</span></label>
                                    <input type="text" id="name"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        placeholder="Nama Lembaga" value="{{ old('name', Auth::user()->name) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="lembaga_id">Jenis Lembaga<span
                                            class="small text-danger">*</span></label>
                                    <select name="lembaga_id" id="lembaga_id"
                                        class="form-control @error('lembaga_id') is-invalid @enderror">
                                        @foreach ($getdata_lembaga as $lembaga)

                                        @if (Auth::user()->lembaga_id != null)
                                        <option value="{{ $lembaga->id }}" @if ($lembaga->id ===
                                            auth()->user()->lembaga->id)
                                            selected
                                            @endif
                                            >
                                            {{ $lembaga->name }}
                                            @else
                                        <option value="{{ $lembaga->id }}">{{ $lembaga->name }}</option>
                                        @endif

                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Alamat Email<span
                                            class="small text-danger">*</span></label>
                                    <input type="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        placeholder="example@example.com"
                                        value="{{ old('email', Auth::user()->email) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="tahun_berdiri">Tahun Berdiri<span
                                            class="small text-danger">*</span></label>
                                    <input id="tahun_berdiri" width="276"
                                        class="form-control @error('tahun_berdiri') is-invalid @enderror"
                                        name="tahun_berdiri"
                                        value="{{ old('tahun_berdiri', Auth::user()->tahun_berdiri) }}">
                                </div>
                            </div>

                        </div>

                        <div class="row">


                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    {{-- <label class="form-control-label" for="susunan_pengurus">Susunan Pengurus<span class="small text-danger">*</span></label>
                                    <input type="file" id="susunan_pengurus" class="form-control-file"
                                        name="susunan_pengurus">
                                    <small>Kosongkan jika tidak mengubah file pdf</small> --}}
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="nama_pendiri">Nama Pendiri<span
                                            class="small text-danger">*</span></label>

                                    <input type="text" id="nama_pendiri"
                                        class="form-control @error('nama_pendiri') is-invalid @enderror"
                                        name="nama_pendiri" placeholder="Nama Pendiri"
                                        value="{{ old('nama_pendiri', Auth::user()->nama_pendiri) }}">

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="nama_pimpinan">Nama Pimpinan<span
                                            class="small text-danger">*</span></label>
                                    <input type="text" id="nama_pimpinan"
                                        class="form-control @error('nama_pimpinan') is-invalid @enderror"
                                        name="nama_pimpinan" placeholder="Nama Pimpinan"
                                        value="{{ old('nama_pimpinan', Auth::user()->nama_pimpinan) }}">
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="jumlah_guru">Jumlah Guru<span
                                            class="small text-danger">*</span></label>
                                    <input type="number" id="jumlah_guru"
                                        class="form-control @error('jumlah_guru') is-invalid @enderror"
                                        name="jumlah_guru" placeholder="Jumlah Guru"
                                        value="{{ old('jumlah_guru', Auth::user()->jumlah_guru) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="jumlah_santri">Jumlah Santri<span
                                            class="small text-danger">*</span></label>
                                    <input type="number" id="jumlah_santri"
                                        class="form-control @error('jumlah_santri') is-invalid @enderror"
                                        name="jumlah_santri" placeholder="Jumlah Santri"
                                        value="{{ old('jumlah_santri', Auth::user()->jumlah_santri) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="tempat_kbm">Tempat KBM<span
                                            class="small text-danger">*</span></label>
                                    <input type="text" id="tempat_kbm"
                                        class="form-control @error('tempat_kbm') is-invalid @enderror" name="tempat_kbm"
                                        placeholder="Tempat KBM"
                                        value="{{ old('tempat_kbm', Auth::user()->tempat_kbm) }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="no_telp">No Telepon<span
                                            class="small text-danger">*</span></label>
                                    <input type="text" id="no_telp"
                                        class="form-control @error('no_telp') is-invalid @enderror" name="no_telp"
                                        placeholder="0xxxxxxxxxxx" value="{{ old('no_telp', Auth::user()->no_telp) }}">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="link_fb">Link Facebook<span
                                            class="small text-danger">*</span></label>
                                    <input type="text" id="link_fb"
                                        class="form-control @error('link_fb') is-invalid @enderror" name="link_fb"
                                        placeholder="Link Facebook" value="{{ old('link_fb', Auth::user()->link_fb) }}">

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="link_website">Link Website<span
                                            class="small text-danger">*</span></label>
                                    <input type="text" id="link_website"
                                        class="form-control @error('link_website') is-invalid @enderror"
                                        name="link_website" placeholder="Link Website"
                                        value="{{ old('link_website', Auth::user()->link_website) }}">

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="link_gmap">Link Google Maps</label>
                                    <input type="text" id="link_gmap"
                                        class="form-control @error('link_gmap') is-invalid @enderror" name="link_gmap"
                                        placeholder="Link Google Maps"
                                        value="{{ old('link_gmap', Auth::user()->link_gmap) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label class="form-control-label" for="alamat">Alamat Lembaga<span
                                            class="small text-danger">*</span></label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                        id="alamat" rows="10">{{ old('alamat',Auth::user()->alamat) }}</textarea>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- Button -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col float-left">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')
<script>
    $('#tahun_berdiri').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy/mm/dd',
        autoclose: true,
        todayHighlight: true
    });
    
</script>
@endpush