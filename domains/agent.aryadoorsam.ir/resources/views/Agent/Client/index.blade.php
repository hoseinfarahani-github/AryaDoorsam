@section('content')
    <div class="page-body">
        <!-- All User Table Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table border border-2">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>مشتری ها</h5>
                                <form class="d-inline-flex">
                                    <a href="{{route('agent.client.create')}}" class="align-items-center btn btn-theme d-flex">
                                        <i data-feather="plus"></i>افزودن مشتری
                                    </a>
                                </form>

                            </div>

                        @if(!!request()->query('sort'))
                            <div class="m-b-20" style="display: flex;height: 40px;justify-content: start!important;">

                                <h5 class="align-items-center border border-1" style=" border-radius:0.25rem;display: flex;justify-content: space-between !important;">{{__('sort.client-'.request()->query('sort')['sort_by'])}} : {{__('sort.'.request()->query('sort')['order_by']) }}
                                   <a href="{{request()->fullUrlWithoutQuery('sort')}}"> <i data-feather="x" style="height: 10px"></i> </a>
                                </h5>

                            </div>
                            @endif

                            <div class="table-responsive table-product">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                    <tr>
                                        <th>


                                            @if(!!request()->query('sort') && (request()->query('sort')['order_by'] == 'descending' && request()->query('sort')['sort_by'] == 'id'))

                                                <a href="{{request()->fullUrlWithQuery(['sort'=>['order_by' => 'ascending','sort_by'=> 'id']])}}"> <i class="ri-arrow-down-line w-2 h-2" ></i>شماره مشتری</a>
                                            @elseif(!!request()->query('sort') && (request()->query('sort')['order_by'] == 'ascending' && request()->query('sort')['sort_by'] == 'id'))

                                                <a href="{{request()->fullUrlWithQuery(['sort'=>['order_by' => 'descending','sort_by'=> 'id']])}}"> <i class="ri-arrow-up-line w-2 h-2 "></i>شماره مشتری</a>
                                            @else
                                                <a href="{{request()->fullUrlWithQuery(['sort'=>['order_by' => 'descending','sort_by'=> 'id']])}}">شماره مشتری</a>
                                            @endif

                                        </th>
                                        <th style="color: #4a5568 !important;">مشخصات مشتری</th>
                                        <th style="color: #4a5568 !important;">شماره تماس</th>
                                        <th style="color: #4a5568 !important;">شماره ثبت/شماره ملی</th>
                                        <th style="color: #4a5568 !important;">

                                            @if(!!request()->query('sort') && (request()->query('sort')['order_by'] == 'descending' && request()->query('sort')['sort_by'] == 'created_at'))

                                                <a href="{{request()->fullUrlWithQuery(['sort'=>['order_by' => 'ascending','sort_by'=> 'created_at']])}}"> <i class="ri-arrow-down-line w-2 h-2" ></i>تاریخ عضویت</a>
                                            @elseif(!!request()->query('sort') && (request()->query('sort')['order_by'] == 'ascending' && request()->query('sort')['sort_by'] == 'created_at'))

                                                <a href="{{request()->fullUrlWithQuery(['sort'=>['order_by' => 'descending','sort_by'=> 'created_at']])}}"> <i class="ri-arrow-up-line w-2 h-2 "></i>تاریخ عضویت</a>
                                            @else
                                                <a href="{{request()->fullUrlWithQuery(['sort'=>['order_by' => 'descending','sort_by'=> 'created_at']])}}">تاریخ عضویت</a>
                                            @endif
                                        </th>
                                        <th ></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clients as $client)

                                        <tr>
                                            <td>
                                                <div style="text-align: center !important;">
                                                    {{$client->id}}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="user-name">
                                                    <span>{{$client->name()}}</span>
                                                    <span>({{$client->type()}})</span>
                                                </div>
                                            </td>

                                            <td>{{$client->phone}}</td>

                                            <td>{{$client->nationalNumber()}}</td>
                                            <td>
                                                <div style="text-align: center !important;">
                                                    {{\Morilog\Jalali\Jalalian::fromCarbon($client->created_at)->format('Y-m-d H:i:s')}}
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="left-0">
                                                    <li>
                                                        <a href="{{route('agent.client.show',$client)}}">
                                                            <i class="ri-list-ordered"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="{{route('agent.client.edit',$client)}}">
                                                            <i class="ri-pencil-line"></i>
                                                        </a>
                                                    </li>
                                                    @if($client->order->count() == 0)
                                                        <div class="modal fade" id="deleteClient{{$client->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                             aria-labelledby="deleteClient{{$client->id}}Label" aria-hidden="true">
                                                            <div class="modal-dialog  modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <h5 class="modal-title" id="deleteClient{{$client->id}}Label">حذف سفارش</h5>
                                                                        <p>آیا از حذف کردن مشتری مطمئن هستید؟</p>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        <div class="button-box">
                                                                            <button type="button" class="btn btn--no" data-bs-dismiss="modal">خیر</button>
                                                                            <form method="post" action="{{ route('agent.client.destroy',$client) }}">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" class="btn  btn--yes btn-primary">بله</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <li>
                                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                               data-bs-target="#deleteClient{{$client->id}}">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a class="tooltip-show" title="کاربر {{$client->order->count()}} سفارش دارد">
                                                                <i class="ri-delete-bin-line" style="color: grey!important; text-decoration: line-through !important;"></i>
                                                            </a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </td>
                                        </tr>



                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- All User Table Ends-->
    </div>

@endsection

@extends('Agent.Layout.layout')


