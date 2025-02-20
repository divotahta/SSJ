<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Konsultasi</title>
</head>

<body class="bg-primary">
    <header class="absolute inset-x-0 top-0 z-50">
        @include ('peternak.navbar')
    </header>
    <section class="h-full">
        <div class="bg-primary pt-20 mt-6 h-full pb-1">
            <div class="px-6 py-10 mx-auto h-full flex justify-center">
                <div class="container bg-secondary rounded-lg shadow-lg min-h-[80vh] p-24 relative">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded absolute top-0 left-0 alert-message z-50" role="alert" style="position: absolute; width: 100%;">
                            <strong class="font-bold">Berhasil!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                            <span id="close-button" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.697z"/></svg>
                            </span>
                        </div>
                    @endif
                    @if($laporan->id_dokter==$user->id)
                        <button type="button" class="inline-block rounded rounded-lg text-center py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-primary hover:bg-primary-light min-w-32 absolute right-4 top-4 z-10" type="button"
                        id="add-profile-button"
                        onclick="window.location='{{route('dokter.editlaporan',['id' => $laporan->id])}}'"
                        data-twe-ripple-init
                        data-twe-ripple-color="light">
                        EDIT
                        </button> 
                    @endif
                        <div class="">
                            <div class="font-semibold text-4xl text-center">{{$laporan->judul_laporan}}</div>
                            <div class="flex gap-2 my-4 text-lg justify-center">
                                <div class="">Penulis : {{$laporan->pengguna['dokterhewan']->dokterhewan->nama}}  ||  Sapi Milik : {{ $laporan->pengguna['peternak']->peternak->nama }}  ||  Tanggal : {{$laporan->created_at->format('d/m/Y')}}</div>
                            </div>
                        </div>
                    {{-- @endif --}}

                    <div class="text-sm">{!! $laporan->isi_laporan !!}</div>
                </div>
            </div>
        </div>
    </section>
    <script>
        const closeButton = document.getElementById('close-button');
      
        closeButton.addEventListener('click', function() {
          const alertMessage = document.querySelector('.alert-message');
          alertMessage.style.display = 'none';
        });
    </script>
</body>

</html>
