

@section('css')
    <link rel="stylesheet" href="/assest/Admin/css/GalleryFileUploader.css" />
@endsection
@section('content')
    <div class="page-body">
        <!-- New User start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="card  border border-1">
                                <div class="card-body">
                                    <form method="POST" action="{{route('agent.ticket.store')}}" class="theme-form theme-form-2 mega-form">
                                        @csrf
                                                <div class="card-header-1 mt-2 mb-6">
                                                    <h5>تیکت جدید</h5>
                                                </div>

                                        <div class="row g-4">



                                            <div class="col-xxl-9">
                                                <div class="form-floating theme-form-floating">
                                                    <input class="form-control" type="text" name="ticketTitle" id="ticketTitle" placeholder="عنوان تیکت">
                                                    <label class="right-0" for="ticketTitle">عنوان تیکت</label>
                                                </div>
                                            </div>

                                            <div class="col-xxl-3">
                                                <div class=" mb-4 row align-items-center">

                                                    <select class="js-example-basic-single w-100" name="receiver_id">
                                                        <option disabled selected>گیرنده</option>
                                                        @foreach($users as $user)
                                                            <option value="{{$user->id}}">{{__('users.'.$user->username)}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col-xxl-4">
                                                <div class=" mb-4 row align-items-center">

                                                    <label class="form-label-title ">درجه اهمیت تیکت</label>
                                                        <select class="js-example-basic-single w-100" name="importanceTicket">
                                                            <option value="1" selected>کم</option>
                                                            <option value="2">متوسط</option>
                                                            <option value="3">زیاد</option>
                                                            <option value="4">خیلی زیاد</option>
                                                        </select>
                                                    </label>
                                                </div>

                                            </div>

                                            <div class="col-xxl-4">
                                                <div class=" mb-4 row align-items-center">

                                                    <label for="type" class="form-label-title ">موضوع تیکت</label>
                                                    <select id="typeTicket" name="typeTicket" class="js-example-basic-single w-100" onchange="selectObject()">
													  <option selected disabled>موضوع تیکت را انتخاب کنید</option>
                                                        @foreach($types as $type)
                                                            <option value="{{$type[0]}}">{{$type[1]}}</option>

                                                        @endforeach
                                                    </select>
                                                    </label>
                                                </div>

                                            </div>


                                            <div class="col-xxl-4">
                                                <div class=" mb-4 row align-items-center">

                                                    <label class="form-label-title "> شماره موضوع </label>
                                                    <select name="typeIdTicket" id="typeIdTicket" class="js-example-basic-single w-100">

                                                    </select>
                                                    </label>
                                                </div>

                                            </div>


                                            <div class="col-xxl-12 mt-0">
                                                <div class="">
                                                    <label class="form-label-title " for="editor">متن تیکت</label>

                                                    <textarea class="form-control" rows="3" name="context"></textarea>

                                                </div>
                                            </div>

                                            <div class="col-xxl-6">
                                                <button type="submit" class="btn theme-bg-color btn-md fw-bold text-light w-25">ارسال تیکت</button>
                                            </div>

                                        </div>

                                            </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New User End -->

    </div>

@endsection

@section('js')
    <script language="JavaScript">
        function selectObject(){
            var typeTicket= document.getElementById('typeTicket').value

            $.ajaxSetup({
                headers : {
					'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type' : 'application/json'
                }
            })

            $.ajax({
                type : 'POST',
                url : '/ticket/gettype_id',
                data : JSON.stringify({
                    type : typeTicket
                }),
                success : function(res) {
                   // console.log(res.items)
                    var select=document.getElementById('typeIdTicket')
                    while (select.firstChild){
                        select.firstChild.remove()
                    }
                    if(res.items != 'other')
                    {
                        for(var count=0;count<res.items.length;count++) {
                            var option=document.createElement("option")
                            option.value=res.items[count].id
                            option.innerText=res.items[count].id+'- '+res.items[count].title
                            select.appendChild(option)
                        }
                    }
                }
            });



        }

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

@extends('Agent.Layout.layout')

