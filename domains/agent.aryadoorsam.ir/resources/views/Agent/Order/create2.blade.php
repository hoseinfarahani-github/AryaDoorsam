    @section('css')
    <link rel="stylesheet" href="/assets/css/Address.css" />
    @endsection
@section('content')
    <div class="page-body">

        <!-- New Product Add Start -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-sm-10 m-auto">
                                @if($errors->any())
                                    <div class="alert alert-danger" role="alert">

                                        @foreach($errors->all() as $error)
                                            <li> {{$error}} </li>
                                        @endforeach

                                    </div>
                                @endif
                                <div class="card border border-2">
                                    <div class="card-body">
                                        <ol class="progtrckr">

                                            <li class="progtrckr-done">
                                                <h5 style="font-size: 100% !important;"> اطلاعات خریدار</h5>
                                                <h6 style="font-size: 75% !important;">انجام شده</h6>
                                            </li>
                                            <li class="progtrckr-todo">
                                                <h5 style="font-size: 100% !important;"> اطلاعات محصول</h5>
                                                <h6 style="font-size: 75% !important;">در حال انجام</h6>
                                            </li>
                                            <li class="progtrckr-todo">
                                                <h5 style="font-size: 100% !important;">توضیحات تکمیلی</h5>
                                                <h6 style="font-size: 75% !important;"> درانتظار</h6>
                                            </li>


                                        </ol>
                                        <div class="card-header-2 mt-2">
                                            <h5>سفارش محصول</h5>
                                        </div>

                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card card-table">
                                                        <div class="card-body">
                                                            <div class="title-header option-title d-sm-flex d-block">
                                                                <h5>لیست محصولات</h5>

                                                            </div>
                                                            <div>
                                                                <div class="table-responsive">
                                                                    <table class="table all-package theme-table table-product" id="table_id">
                                                                        <thead>
                                                                        <tr>
                                                                            <th style="color: #4a5568 !important;">عکس محصول</th>
                                                                            <th style="color: #4a5568 !important;">نام محصول</th>
                                                                            <th style="color: #4a5568 !important;">وضعیت</th>
                                                                            <th style="color: #4a5568 !important;">سفارش</th>
                                                                        </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                        @foreach($products as $product)

                                                                        <tr class="border">
                                                                            <td class="">
                                                                                <div class="table-image w-auto" >
                                                                                    <img src="{{str_replace('public','/storage',optional($product->gallery->first())->path)}}" class="img-fluid"
                                                                                         alt="">
                                                                                </div>
                                                                            </td>

                                                                            <td>
                                                                                <div class="user-name">
                                                                                    <span style="font-weight: bold">{{$product->title}}</span>
                                                                                    <br>
                                                                                    <span><small><small>{{$product->category->title}}</small></small></span>
                                                                                </div>
                                                                            </td>


                                                                            <td class="@if($product->status['English'] == 'active') status-close @else status-danger  @endif ">
                                                                                <span>{{$product->status['Persian']}}</span>

                                                                            </td>

                                                                            <td>
                                                                                <ul >
                                                                                    {{--<li>
                                                                                        <a class="tooltip-arrow" title="سفارش تکی"
                                                                                                 data-bs-toggle="modal" data-bs-target="#ModalProductSingle{{$product->id}}">
                                                                                            <i style="width: 20px!important;"  data-feather="plus" class="@if($product->status['English'] == 'deactive') text-danger @endif"></i>
                                                                                        </a>
                                                                                    </li>--}}
                                                                                    <li>
                                                                                        <a class="tooltip-arrow" title="سفارش گروهی"
                                                                                           data-bs-toggle="modal" data-bs-target="#ModalProductMulti{{$product->id}}">
                                                                                            <i style="width: 20px!important;" data-feather="file-plus" class="@if($product->status['English'] == 'deactive') text-danger @endif"></i>
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
                                    </div>

                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card card-table">
                                                        <div class="card-body">
                                                            <div class="title-header option-title d-sm-flex d-block">
                                                                <h5>لیست سفارش</h5>

                                                            </div>
                                                            <div>
                                                                <div class="table-responsive">
																<form action="{{route('agent.order.detail.multi.destroy')}}" method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    <table class="table all-package theme-table table-product" id="table_id">
                                                                        <thead>
                                                                        <tr>
													 <th class="flex  text-center whitespace-no-wrap tooltip-inner" title="انتخاب همه" style="min-width: 0px!important;">
													 <button id="deleteAll" type="submit" name="deleteAll" class=" mr-5 ml-auto  items-center "  style="border: 0px;display: none"> <i  class=" ri-delete-bin-6-line"></i> </button>
                                                                                        <input  class="marked input border border-gray-500" type="checkbox" onClick="toggle(this)">
                                                                                        
                                                                                    </th>

																		    <th style="color: #4a5568 !important; min-width: 20px!important;">ردیف</th>
                                                                            <th style="color: #4a5568 !important; min-width: 20px!important;">عکس محصول</th>
                                                                            <th style="color: #4a5568 !important; min-width: 20px!important;">نام محصول</th>
                                                                            <th style="color: #4a5568 !important; min-width: 20px!important;">ابعاد</th>
                                                                            <th style="color: #4a5568 !important;">مشخصات</th>
                                                                            <th style="color: #4a5568 !important; min-width: 20px!important;">تعداد</th>
																			<th style="color: #4a5568 !important; min-width: 20px!important;">کد خدمات</th>

                                                                            <th style="color: #4a5568 !important;">ویرایش</th>
                                                                        </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                        @if($order_detail->count() !=0)
                                                                        @foreach($order_detail as $od)


                                                                            <tr class="border">
																				<td class="table-report__action w-5">
                                                                                    <input onclick="multidelete(this);" value="{{$od->id}}" name="{{$od->id}}" 																								class="marked input border border-gray-500" type="checkbox">
                                                                                </td>
																			    <td class=" ">
                                                                                    <span>{{$loop->index+1}}</span>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="table-image w-auto">
                                                                                        <img   src="{{str_replace('public','/storage',optional($od->product->gallery->first())->path)}}" class="img-fluid"
                                                                                             alt="">
                                                                                    </div>
                                                                                </td>



                                                                                <td>
                                                                                    {{$od->product->title}}
                                                                                </td>

                                                                                <td class=" status-close  ">
                                                                                    <span>{{$od->width}}cm * {{$od->height}}cm</span>

                                                                                </td>
                                                                                <td>
                                                                                    <ul class="product-info-list product-info-list-2" style="font-size: 75% !important;">

                                                                                        @foreach(json_decode($od->attribute_detail) as $key=>$value)
                                                                                            <li>@if($key=='special_frame' && json_decode($od->attribute_detail)->frame == 'flyable'   )
                                                                                                    میزان پرواز@elseif($key=='special_frame' && json_decode($od->attribute_detail)->frame == 'hide' )
                                                                                                    میزان لغاز@elseif($key=='special_frame' && json_decode($od->attribute_detail)->frame == 'sliding' )
                                                                                                    میزان لغاز
                                                                                                @else

                                                                                                    {{__('attribute.'.$key)}}

                                                                                                @endif : <a href="javascript:void(0)">@if($key == 'size_burial_threshold' || $key == 'size_has_fly_measure') {{$value}}cm @elseif(!!str_contains($key,'special'))
                                                                                                {{$value}} @else{{__('attribute.'.$value)}} @endif</a></li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                </td>

                                                                                <td class=" status-close  ">
                                                                                    <span>{{$od->amount}}</span>

                                                                                </td>

																				<td class="status-danger">
                                                                                    <span data-id="{{$od->id}}" ondblclick="setSupportSerial(event)">{{!is_null($od->support_serial)? $od->support_serial : 'ندارد'}}</span>
                                                                                </td>

                                                                                <td>
                                                                                    <ul>
                                                                                        <li>

                                                                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                                               data-bs-target="#editOrderDetail{{$od->id}}">
                                                                                                <i class="ri-pencil-line"></i>
                                                                                            </a>
                                                                                        </li>

                                                                                        <li>
                                                                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                                               data-bs-target="#deleteOrderDetail{{$od->id}}">
                                                                                                <i class="ri-delete-bin-line"></i>
                                                                                            </a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>

                                                                            </tr>
                                                                            <!-- Modal Start -->
                                                                            <div class="modal fade" id="deleteOrderDetail{{$od->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                                                 aria-labelledby="deleteOrderDetail{{$od->id}}Label" aria-hidden="true">
                                                                                <div class="modal-dialog  modal-dialog-centered">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-body">
                                                                                            <h5 class="modal-title" id="deleteOrderDetail{{$od->id}}Label">حذف سفارش</h5>
                                                                                            <p>آیا از حذف کردن محصول مطمئن هستید؟</p>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                            <div class="button-box">
                                                                                                <button type="button" class="btn btn--no" data-bs-dismiss="modal">خیر</button>
                                                                                                <form method="post" action="{{ route('agent.order.detail.destroy',$od) }}">
                                                                                                    @csrf
                                                                                                    @method('DELETE')
                                                                                                    <button type="submit" class="btn  btn--yes btn-primary">بله</button>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Modal End -->
                                                                            <!-- Modal Start -->

                                                                            <!-- Modal End -->

                                                                        @endforeach
                                                                        @else
                                                                            <tr>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td style="text-align: center !important;">
                                                                                    این سفارش محصولی ندارد

                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                        </tbody>
                                                                    </table>
																	</form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-25">
                                        <a type="button" href="{{route('agent.order.step3',['order'=>$order])}}" data-bs-dismiss="modal" id="submitAddress"
                                           class="btn theme-bg-color btn-md fw-bold text-light w-50">مرحله بعد</a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- New Product Add End -->
            <!-- سفارش جدید Start -->

            @foreach($products as $product)
                <!-- Quick View Modal Box Start -->
				{{--
                <div class="modal fade theme-modal view-modal" id="ModalProductSingle{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
                        <div class="modal-content">
                            <div class="modal-header p-0">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-sm-4 g-2">
                                    <div class="col-lg-4">
                                        <div class="slider-image" id="div-image-{{$product->id}}" >
                                            <img  data-name="{{optional($product->gallery->first())->name}}" src="{{str_replace('public','/storage',optional($product->gallery->first())->path)}}" class="img-fluid blur-up lazyload"
                                                 alt="" id="image{{$product->id}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-8">
                                        <div class="right-sidebar-modal">
                                            <h4  class="title-name">{{$product->title}} <span style="font-size: 75% !important;">
                                                   ( {{$product->name}} )
                                                </span></h4>

                                            <div class="product-detail" style="margin-top: 10px !important;">
                                            @if(!!$product->short_desripiton)<h4>توضیحات محصول</h4> @endif
                                                <p style="margin-top: 5px !important;">{!!$product->short_description!!}</p>
                                            </div>
                                            <form action="{{route('agent.order.addProduct',$product)}}" method="post">
                                            @CSRF
                                                    <input hidden="hidden" name="order_id" value="{{$order->id}}">
                                                <table class="table  table-responsive-sm m-b-5">


                                                    <tr>
                                                        <td>ارتفاع</td>
                                                        <td>
                                                            <input class="form-control" step="0.1" name="height" type="number" placeholder="cm">
                                                        </td>
                                                        <td>عرض</td>
                                                        <td>
                                                            <input class="form-control" name="width" step="0.1" type="number" placeholder="cm">
                                                        </td>
                                                        <td> تعداد</td>
                                                        <td>
                                                            <input class="form-control" name="amount" type="number" placeholder="عدد">
                                                        </td>
														<td>کد خدمات</td>
                                                        <td>
                                                            <input class="form-control" name="support_serial" type="number">
                                                        </td>
                                                    </tr>


                                                </table>

                                                <ul class="brand-list">
                                                @foreach($product->APV as $pa)
                                                <li>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-md-2 mb-0">{{$pa->attribute->title}}</label>
                                                        <div class="col-md-9">
                                                            <div class="radio-section" onchange="selectAttribute(event)" id="{{$pa->attribute->name}}" >


                                                             @foreach(\App\Models\Product\APV::where('attribute_id','=',$pa->attribute->id)->where('product_id','=',$pa->product->id)->get() as $pav)
                                                                 <?php
                                                                     $tmp=0;
                                                                     if ($pav->value->name == 'custom' || $pav->value->name== 'flyable' || $pav->value->name== 'hide'|| $pav->value->name== 'sliding') $tmp=1;
                                                                     ?>

                                                                    <label style="margin-left: 0px !important;">
                                                                        <input type="radio" @if('attribute_'.$pa->attribute->name == 'attribute_color' || 'attribute_'.$pa->attribute->name == 'attribute_frame') onclick="specialAttribute(event,'{{$product->name}}','{{$pav->value->name}}','{{$tmp}}','{{$pa->attribute->name}}')" @endif name="attribute_{{$pa->attribute->name}}"  value="{{$pav->value->name}}" data-id="{{$product->id}}" data-attribute="{{$pa->attribute->name}}"/>
                                                                        <i></i>
                                                                        <span>{{$pav->value->title}}</span>
                                                                    </label>

                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                                <textarea class="form-control" name="orderDetailDescription" placeholder="توضیحات سفارش خود را در این بخش بنویسید" rows="3" >{{$product->description}}</textarea>

                                                    <button type="submit" data-bs-dismiss="modal" id="submitAddress"
                                                            class="btn theme-bg-color btn-md fw-bold text-light" style="margin-top: 50px !important;">افزودن</button>

                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                    <div class="modal fade theme-modal view-modal" id="ModalProductMulti{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
                            <div class="modal-content">
                                <div class="modal-header p-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-sm-4 g-2">
                                        <div class="col-lg-4">
                                            <div class="slider-image" id="div-image-{{$product->id}}" >
                                                <img  data-name="{{optional($product->gallery->first())->name}}" src="{{str_replace('public','/storage',optional($product->gallery->first())->path)}}" class="img-fluid blur-up lazyload"
                                                      alt="" id="image{{$product->id}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-8">
                                            <div class="right-sidebar-modal">
                                                <h4  class="title-name">{{$product->title}} <span style="font-size: 75% !important;">
                                                   ( {{$product->name}} )
                                                </span></h4>

                                                <div class="product-detail" style="margin-top: 10px !important;">
                                                    @if(!!$product->short_desripiton)<h4>توضیحات محصول</h4> @endif
                                                    <p style="margin-top: 5px !important;">{!!$product->short_description!!}</p>
                                                </div>
                                                <form action="{{route('agent.order.addProductMulti',$product)}}" method="post">
                                                    @CSRF
                                                    <input hidden="hidden" name="order_id" value="{{$order->id}}">
                                                    <table class="table  table-responsive-sm m-b-5">


                                                        <tr>
                                                            <td>ارتفاع</td>
                                                            <td>
                                                                <input class="form-control" step="0.1" name="height" type="number" placeholder="cm">
                                                            </td>
                                                            <td>عرض</td>
                                                            <td>
                                                                <input class="form-control" name="width" step="0.1" type="number" placeholder="cm">
                                                            </td>
                                                            <td> تعداد</td>
                                                            <td>
                                                                <input class="form-control" name="amount" type="number" placeholder="عدد" value="1">
                                                            </td>
															<td> کد خدمات</td>
															<td>
                                                                <input class="form-control" name="support_serial" type="number" placeholder="">
                                                            </td>
                                                        </tr>


                                                    </table>

                                                    <ul class="brand-list">
                                                        @foreach($product->APV as $pa)
                                                            <li>
                                                                <div class="mb-4 row align-items-center">
                                                                    <label class="col-md-2 mb-0">{{$pa->attribute->title}}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="radio-section" onchange="selectAttribute(event)" id="{{$pa->attribute->name}}" >


                                                                            @foreach(\App\Models\Product\APV::where('attribute_id','=',$pa->attribute->id)->where('product_id','=',$pa->product->id)->get() as $pav)
                                                                                    <?php
                                                                                    $tmp=0;
                                                                                    if ($pav->value->name == 'custom' || $pav->value->name== 'flyable' || $pav->value->name== 'hide'|| $pav->value->name== 'sliding' || $pav->value->name == 'burial_threshold') $tmp=1;
                                                                                    ?>

                                                                                <label style="margin-left: 0px !important;">
                                                                                    <input type="radio" @if('attribute_'.$pa->attribute->name == 'attribute_color' || 'attribute_'.$pa->attribute->name == 'attribute_frame' || 'attribute_'.$pa->attribute->name == 'door_threshold') onclick="specialAttribute(event,'{{$product->name}}','{{$pav->value->name}}','{{$tmp}}','{{$pa->attribute->name}}')" @endif name="attribute_{{$pa->attribute->name}}"  value="{{$pav->value->name}}" data-id="{{$product->id}}" data-attribute="{{$pa->attribute->name}}"/>
                                                                                    <i></i>
                                                                                    <span>{{$pav->value->title}}</span>
                                                                                </label>

                                                                            @endforeach

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
													                                                <textarea class="form-control" name="orderDetailDescription" placeholder="توضیحات سفارش خود را در این بخش بنویسید" rows="3" >{{$product->description}}</textarea>

                                                    <button type="submit" data-bs-dismiss="modal" id="submitAddress"
                                                            class="btn theme-bg-color btn-md fw-bold text-light" style="margin-top: 50px !important;">افزودن</button>

                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

                @foreach($order_detail as $od)
                    <div class="modal fade theme-modal view-modal" id="editOrderDetail{{$od->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
                            <div class="modal-content">
                                <div class="modal-header p-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-sm-4 g-2">
                                        <div class="col-lg-4">
                                            <div class="slider-image" id="div-image-{{$od->id}}" >
                                                <img  data-name="{{optional($od->product->gallery->first())->name}}" src="{{str_replace('public','/storage',optional($od->product->gallery->first())->path)}}" class="img-fluid blur-up lazyload"
                                                      alt="" id="image{{$od->id}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-8">
                                            <div class="right-sidebar-modal">
                                                <h4  class="title-name">{{$od->product->title}} <span style="font-size: 75% !important;">
                                                   ( {{$od->product->name}} )
                                                </span></h4>

                                                <div class="product-detail" style="margin-top: 10px !important;">
                                                    <h4>توضیحات محصول</h4>
                                                    <p style="margin-top: 5px !important;">{!!$od->product->short_description!!}</p>
                                                </div>
                                                <form action="{{route('agent.order.updateOrderDetail',$od)}}" method="post" enctype="multipart/form-data">
                                                    @CSRF
                                                    @method('PATCH')
                                                    <input hidden="hidden" name="order_id" value="{{$order->id}}">
                                                    <table class="table  table-responsive-sm m-b-5">

                                                        <tbody>
                                                        <tr>
                                                            <td> ارتفاع</td>
                                                            <td>
                                                                <input class="form-control" name="height" type="number" value="{{$od->height}}">
                                                            </td>
                                                            <td> عرض</td>
                                                            <td>
                                                                <input class="form-control" name="width" type="number" value="{{$od->width}}">
                                                            </td>
                                                            <td> تعداد</td>
                                                            <td>
                                                                <input class="form-control" name="amount" type="number" value="{{$od->amount}}">
                                                            </td>
															<td> کد خدمات</td>
                                                            <td>
                                                                <input class="form-control" name="support_serial" type="number" value="{{$od->support_serial}}">
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>

                                                    <ul class="brand-list">
                                                        @foreach($od->product->APV as $pa)
                                                            <li>

                                                                <div class="mb-4 row align-items-center">
                                                                    <label class="col-md-2 mb-0">{{$pa->attribute->title}}</label>
                                                                    <div class="col-md-9">
                                                                        <div class="radio-section" onchange="selectAttribute(event)" id="{{$pa->name}}" >



                                                                            @foreach(\App\Models\Product\APV::where('attribute_id','=',$pa->attribute->id)->where('product_id','=',$pa->product->id)->get() as $pav)
                                                                                <label>
                                                                                    <?php $tmp=$pav->attribute->name
                                                                                    ?>


                                                                                    <input type="radio" name="attribute_{{$pa->attribute->name}}"     value="{{$pav->value->name}}" data-id="{{$od->product->id}}" @if(isset($od->get_attribure()->$tmp) && $od->get_attribure()->$tmp == $pav->value->name )
                                                                                                     checked  @endif  data-attribute="{{$pa->attribute->name}}"/>
                                                                                    <i></i>
                                                                                    <span>{{$pav->value->title}}</span>
                                                                                </label>

                                                                            @endforeach

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
													                                                    @if(isset($od->fileable))
                                                        <a href="{{'http://www.'.$od->fileable->path}}" target="_blank">فایل ضمیمه</a>
                                                    @else
                                                        <input class="form-control form-control-sm" name="file" type="file" accept="image/png, image/jpeg" >
                                                    @endif

                                                        <textarea class="form-control" name="orderDetailDescription" placeholder="توضیحات سفارش خود را در این بخش بنویسید" rows="3" >{{$od->description}}</textarea>
                                                    <div class="modal-button">
                                                        <button type="submit" data-bs-dismiss="modal" id="submitAddress"
                                                                class="btn theme-bg-color btn-md fw-bold text-light" style="margin-top: 50px !important;">ویرایش</button>
                                                    </div>
                                                </form>


                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            <!-- آدرس جدید End -->


        <!-- footer Start -->

        <!-- footer En -->
    </div>
@endsection
    @section('js')
        <script src="/assets/js/Address.js"></script>
                <script src="/agent/assets/js/order.js"></script>
        <script>

		function toggle(source) {
                checkboxes = document.getElementsByClassName('marked');
                for(var i=0, n=checkboxes.length;i<n;i++) {
                    checkboxes[i].checked = source.checked;
                    multidelete(source);
                }
            }
           // $("#deleteAll").hide();

            function multidelete(source) {
				console.log(123)
                ggs = document.getElementsByClassName('marked');
                for(var i=0, n=ggs.length;i<n;i++) {
                    $("#deleteAll").hide();
                    if(ggs[i].checked) {
                        $("#deleteAll").show();
                        break;
                    }
                }
            }

		function setSupportSerial(event){
                var input = document.createElement('input');
                var a= document.createElement('a');
                var i=document.createElement('i');
                i.classList='ri-check-fill';
                a.appendChild(i);
                a.setAttribute('onclick','sendSupportSerial(event)');
                var parent=event.currentTarget.parentNode;
                input.name='supportSerial';
                input.value=event.currentTarget.innerText== 'ندارد' ? '' : event.currentTarget.innerText ;
                input.classList='form-control';

                input.style='width:100px;display:inline';
                parent.appendChild(input);
                parent.appendChild(a);
                event.target.style='display:none';
            }
            function sendSupportSerial(event){
                var span=event.currentTarget.parentNode.firstElementChild;
                var id=span.getAttribute('data-id');

                var input=event.currentTarget.parentNode.getElementsByTagName('input')[0]
                //ajax

                $.ajaxSetup({
                    headers : {
                        'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type' : 'application/json'
                    }
                })

                $.ajax({
                    type : 'POST',
                    url : '/order/set/support_serial',
                    data : JSON.stringify({
                        id : id,
                        value : input.value
                    }),
                    success : function(res) {
                        console.log('success')
                    }
                });


                span.innerHTML=input.value.length==0 ? 'ندارد' : input.value;
                var a=event.currentTarget.parentNode.getElementsByTagName('a')[0];

                input.remove();
                a.remove();
                span.style.display=null;
            }

            function specialAttribute(event,parent,value,bool,attribute){
                console.log('his')
                if(bool == 1){
                    if(!document.getElementById('attribute_special_'+attribute+'_'+ parent))
                    {

                        let input=document.createElement('input')
                        input.type='text'
						input.step='0.1'
                        input.name='attribute_special_'+attribute
                        input.className='form-control'
                        input.style='width:25% !important;'
                        input.id='attribute_special_'+attribute+'_'+ parent
                        event.target.parentElement.parentElement.appendChild(input)
                        // console.log(event.target,input)
                    }
                }
                if(bool==0){
                    document.getElementById('attribute_special_'+attribute+'_'+ parent).remove()
                }


            }

        </script>
    @endsection

@extends('Agent.Layout.layout')

