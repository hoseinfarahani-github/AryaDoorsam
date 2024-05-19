@section('content')
    <div class="page-body">
        <!-- All User Table Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">


                            <div class="table-responsive table-product">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                    <tr>
                                        <th style="color: #4a5568 !important;">شماره مشتری</th>
                                        <th style="color: #4a5568 !important;">مشخصات مشتری</th>
                                        <th style="color: #4a5568 !important;">نماینده</th>
                                        <th style="color: #4a5568 !important;">شماره تماس</th>
                                        <th style="color: #4a5568 !important;">شماره ثبت/شماره ملی</th>
                                        <th style="color: #4a5568 !important;">تاریخ عضویت</th>
                                        <th style="color: #4a5568 !important;"></th>
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
                                                    <span>{{$client->type()}}</span>
                                                </div>
                                            </td>

                                            <td>
                                               <span style="font-weight: bold !important;"> {{$client->agent->code}} </span>
                                                ({{$client->agent->user->username}})
                                            </td>

                                            <td>{{$client->phone()}}</td>

                                            <td>{{$client->nationalNumber()}}</td>
                                            <td>
                                                <div style="text-align: center !important;">
                                                    {{\Morilog\Jalali\Jalalian::fromCarbon($client->created_at)->format('Y-m-d H:i:s')}}
                                                </div>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="{{route('manager.client.show',$client)}}">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                    </li>

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

@extends('Manager.Layout.layout')


