@extends('layouts.master')

@push('styles')
    @livewireStyles()
@endpush

@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide');
        })

        window.addEventListener('show-delete-modal', event => {
            $('#deleteModal').modal('show');
        })
    </script>
    @livewireScripts
    <script>
        Livewire.on('success', data => {
            console.log(data.pesan);
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
            }
            toastr.success(data.pesan);
        })
    </script>
@endpush

@section('content')
    <div class="row">
        {{-- <div class="col-lg-8 mb-4 order-0">

        </div> --}}
        @livewire('roles.roles')
    </div>
@endsection
