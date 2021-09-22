@extends('admin_layout.template')
@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('assets/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">

@endsection
@section('content')
    <form method="" action="">
        @csrf
        <div class="card">
            <div class="card-header" style="justify-content: space-between;">
                <h4>Quality Assurance Form</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-6">
                        <strong CLASS="form-check-inline">Greetings:</strong>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="radio1" > Yes </label>
                            <input class="form-check-input" type="radio" name="radio" id="radio1" value="option1" checked>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="radio2" > No </label>
                            <input class="form-check-input" type="radio" name="radio" id="radio2" value="option2">
                        </div>
                        <p>Used Correct Greetings, Used Assurity Statement</p>
                    </div>
                    <div class="col-6">
                        <textarea class="form-control" id="textarea" rows="2" placeholder="Comments"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <strong CLASS="form-check-inline">Greetings:</strong>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="radio1" > Yes </label>
                            <input class="form-check-input" type="radio" name="radio" id="radio1" value="option1" checked>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="radio2" > No </label>
                            <input class="form-check-input" type="radio" name="radio" id="radio2" value="option2">
                        </div>
                        <p>Used Correct Greetings, Used Assurity Statement</p>
                    </div>
                    <div class="col-6">
                        <textarea class="form-control" id="textarea" rows="2" placeholder="Comments"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('footer_scripts')
    {{-- <script src="{{ asset('assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $( document ).ready(function() {
            if (jQuery().select2) {
                $(".select2").select2();
            }
            //form submission;
            $('#product_form').submit(function (e) {
                e.preventDefault();
                let data = new FormData(this);
                let a = function(){ /*window.location.href = '{{ route('') }}';*/ };
                let arr = [a];
                call_ajax_with_functions('','{{ isset($product) ? route('qa.update', $product->product_id) : route('qa.store') }}',data,arr);
            });
            // Cancel action
            $('#cancel_action').click(function (){
                window.location.href="{{route('qa.index')}}";
            });
        });
    </script> --}}
@endsection
