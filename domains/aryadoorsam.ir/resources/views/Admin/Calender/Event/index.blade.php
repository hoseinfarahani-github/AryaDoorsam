

@section('css')
{{--
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />

@endsection

@section('content')


    <div id='calendar'></div>


@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="/Admin/assets/js/moment-jalaali.js"></script>

    {{--
        <script src="/assest/Admin/js/moment.js"></script>
    --}}

    {{--
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.js"></script>
    --}}
    <script src="/Admin/assets/js/fullcalendar.js"></script>
    <script src="/Admin/assets/js/fa.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>

        $(document).ready(function (e) {
            var SITEURL = "/dashboard/event";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                }
            });
            var calendar = $('#calendar').fullCalendar({
                editable: true,
                events: SITEURL ,
                displayEventTime: false,
                editable: true,
                eventRender: function (event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,
                select: function (start, end, allDay) {
                    console.log(moment(start).format('YYYY-MM-DD'))
                    var title = prompt('عنوان رویداد : ');
                    if (title) {
                        var start = moment(start).format('YYYY-MM-DD')
                        var end = moment(start).format('YYYY-MM-DD')

                        $.ajax({
                            url: SITEURL + "/edit",
                            data: {
                                title: title,
                                start: start,
                                end: end,
                                type: 'add'
                            },
                            type: "POST",
                            success: function (data) {
                                displayMessage("رویداد موردنظر با موفقیت ایجاد شد");

                                calendar.fullCalendar('renderEvent',
                                    {
                                        id: data.id,
                                        title: title,
                                        start: start,
                                        end: end,
                                        allDay: allDay
                                    },true);

                                calendar.fullCalendar('unselect');
//                                location.reload();
                            }
                        });
                    }
                },
                eventDrop: function (event, delta) {
                    var start = moment(event.start).format('YYYY-MM-DD')
                    var end = moment(event.start).format('YYYY-MM-DD')

                    $.ajax({
                        url: SITEURL + '/edit',
                        data: {
                            title: event.title,
                            start: start,
                            end: end,
                            id: event.id,
                            type: 'update'
                        },
                        type: "POST",
                        success: function (response) {
                            displayMessage("رویداد با موفقیت ویرایش شد");
                            location.reload();
                        }
                    });
                },
                eventClick: function (event) {
                    var deleteMsg = confirm("آیا میخواهید رویداد حذف شود؟");
                    if (deleteMsg) {
                        $.ajax({
                            type: "POST",
                            url: SITEURL + '/edit',
                            data: {
                                id: event.id,
                                type: 'delete'
                            },
                            success: function (response) {

                                calendar.fullCalendar('removeEvents', event.id);
                                displayMessage("رویداد با موفقیت حذف شذ");
//                                location.reload();
                            }
                        });
                    }
                }

            });

        });

        function displayMessage(message) {
            toastr.success(message, 'Event');
        }

    </script>

@endsection

@component('Admin.Layout.layout')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >رویدادها</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('admin.dashboard.index')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
