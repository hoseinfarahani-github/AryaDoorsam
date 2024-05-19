<link rel="stylesheet" href="{{asset('admin-assets/jalalidatepicker/persian-datepicker.min.css')}}">

{{--    jalali babakhani css CDN--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/babakhani-jalali-datepicker/dist/css/jquery.feranick-datepicker.min.css">--}}


    <section class="col-12 mt-2">
        <div class="form-group">
            <label for="published_at" class="mt-2">تاریخ  شروع</label>
            <input type="text" class="form-control form-control-sm d-none" name="started_at"
                   id="published_at">
            <input type="text" class="form-control form-control-sm" id="started_at_view">
        </div>
        @error('published_at')
        <span class="alert-required bg-danger color-white m-2 p-1 rounded-1" role="alert">
                                    <strong>{{$message}} </strong>
                                </span>
        @enderror
    </section>




    <section class="col-12 mt-2">
        <div class="form-group">
            <label for="published_at" class="mt-2">تاریخ پایان</label>
            <input type="text" class="form-control form-control-sm d-none" name="end_at"
                   id="published_at">
            <input type="text" class="form-control form-control-sm" id="end_at_view">
        </div>
        @error('published_at')
        <span class="alert-required bg-danger color-white m-2 p-1 rounded-1" role="alert">
                                    <strong>{{$message}} </strong>
                                </span>
        @enderror
    </section>


    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    {{--    jalali babakhani js CDN --}}
    {{--    <script src="https://cdn.jsdelivr.net/npm/babakhani-jalali-datepicker/dist/js/jquery.feranick-datepicker.min.js"></script>--}}
    <script type="text/javascript">
        $(document).ready(function () {
            $("#started_at_view").persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#started_at'
            });
            $("#end_at_view").persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#end_at'
            });
        });
    </script>