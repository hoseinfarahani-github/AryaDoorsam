

@section('css')
    <link rel="stylesheet" href="/assest/Admin/css/GalleryFileUploader.css" />
@endsection
@section('content')

    <div class="page-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9">
                    <!-- Address Start -->
                    <div class="card border border-1">
                        <div class="card-body">
                            <div class="save-details-box">

                                @foreach($messages as $message)
                                    @if($message->user_id == \Illuminate\Support\Facades\Auth::user()->id)
                                        <div class="row g-4 mt-1" style="justify-content: flex-end !important;">
                                            <div class="col-xl-6 col-md-8">
                                                <div class="save-details border border-1" style="background:#0da487 !important; ">

                                                    <div class="">
                                                        <img class="user-profile rounded-circle" style="width: 10%"
                                                             src="{{str_replace('public','/storage',$message->user->gallery->path)}}" alt="">
                                                        {{__('users.'.$message->user->username)}}
                                                        <span style="position: absolute;left: 20px;right: unset;">{{\Morilog\Jalali\Jalalian::forge($message->created_at)}}</span>
                                                    </div>

                                                    <div class="save-address  p-3 ">
                                                        <p>{!! $message->context !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($message->user_id != \Illuminate\Support\Facades\Auth::user()->id)
                                        <div class="row g-4">
                                        <div class="col-xl-6 col-md-8">
                                            <div class="save-details border border-1">
                                                <div class="" style="right: 20px;left: unset !important;">
                                                    <img class="user-profile rounded-circle" style="width: 10%"
                                                         src="{{str_replace('public','/storage',$message->user->gallery->path)}}" alt="">
                                                    {{__('users.'.$message->user->username)}}
                                                    <span style="position: absolute;left: 20px;right: unset;">{{\Morilog\Jalali\Jalalian::forge($message->created_at)}}</span>
                                                </div>

                                                <div class="save-address  p-3">
                                                    <p>{!! $message->context !!}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>

                        </div>
                        <br>
                        <form method="post" action="{{route('manager.message.send',$ticket)}}">
                            @csrf
                        <div class="input-group">

                            <input name="context" type="text" class="form-control" placeholder="متن خود را اینجا بنویسید">
                            <div class="input-group-prepend border border-1">
                                <button class="btn btn-animation" type="submit"><i class="ri-send-plane-line"></i></button>
                            </div>
                        </div>
                        </form>

                    </div>
                    <!-- Address End -->
                </div>
               <div class="col-sm-3">
                    <!-- Address Start -->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2 mb-3">
                                <h6> عنوان: {{$ticket->title}}  </h6>
                            </div>

                            <div class="save-details-box">
                                <div class="row g-4">
                                    <div class="col-xl-12 col-md-12">
                                        <div class="save-details">
                                            <div class="save-name" style="margin-bottom: 10px!important;">
                                                <h6>وضعیت تیکت </h6>
                                            </div>

                                            <div class="save-position" style="@if($ticket->status['eng']== 'closed') background: #880000!important;  @endif">
                                                <h6>@if($ticket->status['eng'] !='closed')  فعال@else  غیرفعال @endif  </h6>
                                            </div>
                                            <a class="tooltip-show" title="{{$ticket->importance['fa']}}">
                                                <ul class="rating" >
                                                    @for($c=1;$c <6;$c++)
                                                        <li>
                                                            <i class="fas fa-star @if($ticket->importance['num'] >= $c ) theme-color @endif"></i>
                                                        </li>
                                                    @endfor
                                                </ul>
                                            </a>

                                            <div class="save-address">
                                                <?php

                                                    if($ticket->ticketable_type == 'App\Models\Product\Product'){$tmp['type']='محصول';$tmp['id']=$ticket->ticketable_id;}
                                                elseif($ticket->ticketable_type == 'App\Models\Order\OrderDetail'){ $tmp['type']='رکورد سفارش';$tmp['id']=$ticket->ticketable_id;}
                                                elseif($ticket->ticketable_type == 'App\Models\Order\Order'){ $tmp['type']='سفارش';$tmp['id']=$ticket->ticketable_id;}
                                                else $tmp['type']='سایر'
                                                ?>
                                                <p class="mt-2">موضوع تیکت: {{$tmp['type']}}</p>
                                                @if(array_key_exists('id',$tmp))
                                                    <p class="mt-2">شماره موضوع: {{$tmp['id']}}</p>
                                                @endif

                                                <p>شروع کننده: {{__('users.'.$ticket->sender_user->username)}}</p>
                                            </div>

                                            <div class="mobile">
                                                <p class="mobile">تاریخ تیکت</p>
                                            </div>

                                            <?php
                                                $time['date']=\Morilog\Jalali\Jalalian::forge($ticket->created_at)->format('Y/m/d');
                                                $time['time']=\Morilog\Jalali\Jalalian::forge($ticket->created_at)->format('H:i:s');
                                                ?>
                                            <div class="button">
                                                <a  class="btn btn-sm">{{$time['date']}}</a>
                                                <a class="btn btn-sm">{{$time['time']}}</a>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Address End -->
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

