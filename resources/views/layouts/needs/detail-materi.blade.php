<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi Tanggal {{ \Carbon\Carbon::parse($materi->tgl_materi)->translatedFormat('d F Y') }}</title>

    @include('layouts.includes.needs.style')

</head>
<body>

    <div class="container">    

        <h2 class="text-center mt-5 pb-4 pt-5">Detail Materi</h2>

        <div class="card mb-5">
            <div class="card-body">                  
                <div class="table-responsive">
                <table class="table align-items-center table-flush text-center">
                    
                
                    <tr>
                        <td class="text-right" width="20%">Materi</td> 
                        <td width="1%">:</td> 
                        <td width="auto" class="text-justify">
                        {{ $materi->nama_materi }}
                        </td>
                    </tr>
                
                    <tr>
                        <td class="text-right" width="20%">Dosen</td> 
                        <td width="1%">:</td> 
                        <td width="auto" class="text-justify">
                        {{ $materi->dosen }}
                        </td>
                    </tr>
                
                    <tr>
                        <td class="text-right" width="20%">Jurusan</td> 
                        <td width="1%">:</td> 
                        <td width="auto" class="text-justify">
                        @if($materi->jurusan == 'rpl')
                        Rekayasa Perangkat lunak
                        @elseif($materi->jurusan == 'tkj')
                        Teknik Komputer & Jaringan
                        @else
                        Design Multimedia
                        @endif
                        </td>
                    </tr>
                
                    <tr>
                        <td class="text-right" width="20%">Tanggal Materi</td> 
                        <td width="1%">:</td> 
                        <td width="auto" class="text-justify">
                        {{ \Carbon\Carbon::parse($materi->tgl_materi)->translatedFormat('l, d F Y')}}
                        </td>
                    </tr>
                
                    <tr>
                        <td class="text-right" width="20%">Rincian Materi</td> 
                        <td width="1%">:</td> 
                        <td width="auto" class="text-justify">
                        {!! $materi->rincian_materi !!}
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>  

                </table>
                </div>
            </div>
        </div>

    </div>

    <div class="container">    
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
                <b><a href="https://github.com/Febryan1453" target="_blank">febryan1453</a></b>
                </span>
            </div>
            </div>
        </footer>
    </div>

@include('layouts.includes.needs.js')

</body>
</html>