

@section('css')
    <link rel="stylesheet" href="/assest/Admin/css/GalleryFileUploader.css" />
@endsection
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <!-- Table Start -->
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>تیکت ها</h5>
                            </div>
                            <div class="col-1">
                                <a href="{{route('manager.ticket.create')}}" class="btn theme-bg-color text-white btn-sm fw-bold mt-lg-0 mt-3">
                                    <i data-feather="plus" class="me-2"></i>  تیکت جدید </a>
                            </div>
                            <br>
                            <div>

                                <div class="table-responsive">

                                    @if($tickets->count() > 0 )
                                        <table class="user-table ticket-table review-table theme-table table"
                                               id="table_id">
                                            <thead>
                                            <tr>
                                                <th>شماره تیکت</th>
                                                <th>فرستنده</th>
                                                <th>گیرنده</th>
                                                <th>درجه اهمیت</th>
                                                <th>آخرین پیام</th>
                                                <th>وضعیت</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($tickets as $ticket)

                                                <tr>
                                                    <td>{{strlen($ticket->id) == 1 ? '#0'.$ticket->id+1 : '#'.$ticket->id+1}}</td>
                                                    <td>{{$ticket->sender_user->username}}</td>
                                                    <td>{{$ticket->receiver_user->username}}</td>
                                                    <td>
                                                        <ul class="rating">
                                                            @for($c=1;$c <6;$c++)
                                                                <li>
                                                                    <i class="fas fa-star @if($ticket->importance['num'] >= $c ) theme-color @endif"></i>
                                                                </li>
                                                            @endfor
                                                        </ul>
                                                    </td>
                                                    <td>{{\Illuminate\Support\Str::limit($ticket->lastMessage()->context,25)}}</td>
                                                    <td class="td-check">
                                                         <i class="ri-checkbox-circle-line"></i>
                                                        <a href="{{route('manager.ticket.show',$ticket)}}"> <i class="ri-eye-line"></i> </a>
                                                    </td>

                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                    @else

                                    @endif

                                </div>
                            </div>
                        </div>
                        <!-- Table End -->
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script language="JavaScript">
        function toggle(source) {
            checkboxes = document.getElementsByClassName('marked');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
                multidelete(source);
            }
        }
        $("#deleteAll").hide();
        function multidelete(source) {
            ggs = document.getElementsByClassName('marked');
            for(var i=0, n=ggs.length;i<n;i++) {
                $("#deleteAll").hide();
                if(ggs[i].checked) {
                    $("#deleteAll").show();
                    break;
                }
            }
        }
    </script>
@endsection

@extends('Manager.Layout.layout')

