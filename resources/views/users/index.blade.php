@extends('layouts.master')

@push('styles')
    @livewireStyles()
@endpush

@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#studentModal').modal('hide');
            $('#updateStudentModal').modal('hide');
            $('#deleteStudentModal').modal('hide');
        })

        window.addEventListener('show-add-modal', event => {
            $('#studentModal').modal('show');
        })
        window.addEventListener('show-edit-modal', event => {
            $('#updateStudentModal').modal('show');
        })
        window.addEventListener('show-delete-modal', event => {
            $('#deleteStudentModal').modal('show');
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
        @livewire('users.index')
    </div>
@endsection
