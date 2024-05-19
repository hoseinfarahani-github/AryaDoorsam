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
                                                                            <th style="color: #4a5568 !important;">دسته بندی</th>
                                                                            <th style="color: #4a5568 !important;">وضعیت</th>
                                                                            <th style="color: #4a5568 !important;">سفارش</th>
                                                                        </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                        @foreach($products as $product)

                                                                        <tr class="border">
                                                                            <td>
                                                                                <div class="table-image">
                                                                                    <img src="{{str_replace('public','/storage',optional($product->gallery->first())->path)}}" class="img-fluid"
                                                                                         alt="">
                                                                                </div>
                                                                            </td>

                                                                            <td>{{$product->title}}</td>

                                                                            <td>{{$product->category->title}}</td>

                                                                            <td class="@if($product->status['English'] == 'active') status-close @else status-danger  @endif ">
                                                                                <span>{{$product->status['Persian']}}</span>

                                                                            </td>

                                                                            <td>
                                                                                <ul>
                                                                                    <li>
                                                                                        <a class=""
                                                                                                 data-bs-toggle="modal" data-bs-target="#ModalProduct{{$product->id}}">
                                                                                            <i data-feather="shopping-cart" class="@if($product->status['English'] == 'deactive') text-danger @endif"></i>
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
                                                                    <table class="table all-package theme-table table-product" id="table_id">
                                                                        <thead>
                                                                        <tr>
                                                                            <th style="color: #4a5568 !important;">عکس محصول</th>
                                                                            <th style="color: #4a5568 !important;">نام محصول</th>
                                                                            <th style="color: #4a5568 !important;">دسته بندی</th>
                                                                            <th style="color: #4a5568 !important;">تعداد</th>
                                                                            <th style="color: #4a5568 !important;">ابعاد</th>
                                                                            <th style="color: #4a5568 !important;">مشخصات</th>
                                                                        </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                        @if($order_detail->count() !=0)
                                                                        @foreach($order_detail as $od)


                                                                            <tr class="border">
                                                                                <td>
                                                                                    <div class="table-image">
                                                                                        <img   src="{{str_replace('public','/storage',optional($od->product->gallery->first())->path)}}" class="img-fluid"
                                                                                             alt="">
                                                                                    </div>
                                                                                </td>



                                                                                <td>
                                                                                    {{$od->product->title}}
                                                                                    <ul class="product-info-list product-info-list-2" style="font-size: 75% !important;">
                                                                                        @foreach(json_decode($od->attribute_detail) as $key=>$value)
                                                                                            <li>{{__('attribute.'.$key)}} : <a href="javascript:void(0)">@if($key == 'size_burial_threshold' || $key == 'size_has_fly_measure') {{$value}}cm @else{{__('attribute.'.$value)}} @endif</a></li>
                                                                                        @endforeach

                                                                                    </ul>
                                                                                </td>

                                                                                <td>{{$od->product->category->title}}</td>

                                                                                <td class=" status-close  ">
                                                                                    <span>{{$od->amount}}</span>

                                                                                </td>

                                                                                <td class=" status-close  ">
                                                                                    <span>{{$od->width}}cm * {{$od->height}}cm</span>

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
                <div class="modal fade theme-modal view-modal" id="ModalProduct{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
                        <div class="modal-content">
                            <div class="modal-header p-0">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa-solid fa-xmark"></i>
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
                                                <h4>توضیحات محصول</h4>
                                                <p style="margin-top: 5px !important;">{!!$product->short_description!!}</p>
                                            </div>
                                            <form action="{{route('agent.order.addProduct',$product)}}" method="post">
                                            @CSRF
                                                    <input hidden="hidden" name="order_id" value="{{$order->id}}">
                                                <table class="table variation-table table-responsive-sm m-b-5">

                                                    <tbody>
                                                    <tr>
                                                        <td> طول</td>
                                                        <td>
                                                            <input class="form-control" name="height" type="number" placeholder="cm">
                                                        </td>
                                                        <td> عرض</td>
                                                        <td>
                                                            <input class="form-control" name="width" type="number" placeholder="cm">
                                                        </td>
                                                        <td> تعداد</td>
                                                        <td>
                                                            <input class="form-control" name="amount" type="number" placeholder="cm">
                                                        </td>
                                                    </tr>

                                                    </tbody>
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
                                                                     if ($pav->value->name == 'burial_threshold' || $pav->value->name== 'has_fly_measure') $tmp=1;
                                                                     ?>

                                                                    <label style="margin-left: 0px !important;">
                                                                        <input type="radio" @if('attribute_'.$pa->attribute->name == 'attribute_door_threshold' || 'attribute_'.$pa->attribute->name == 'attribute_fly_measure') onclick="specialAttribute(event,'{{$product->name}}','{{$pav->value->name}}','{{$tmp}}')" @endif name="attribute_{{$pa->attribute->name}}"  value="{{$pav->value->name}}" data-id="{{$product->id}}" data-attribute="{{$pa->attribute->name}}"/>
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
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-sm-4 g-2">
                                        <div class="col-lg-6">
                                            <div class="slider-image" id="div-image-{{$od->id}}" >
                                                <img  data-name="{{optional($od->product->gallery->first())->name}}" src="{{str_replace('public','/storage',optional($od->product->gallery->first())->path)}}" class="img-fluid blur-up lazyload"
                                                      alt="" id="image{{$od->id}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="right-sidebar-modal">
                                                <h4  class="title-name">{{$od->product->title}} <span style="font-size: 75% !important;">
                                                   ( {{$od->product->name}} )
                                                </span></h4>

                                                <div class="product-detail" style="margin-top: 10px !important;">
                                                    <h4>توضیحات محصول</h4>
                                                    <p style="margin-top: 5px !important;">{!!$od->product->short_description!!}</p>
                                                </div>
                                                <form action="{{route('agent.order.updateOrderDetail',$od)}}" method="post">
                                                    @CSRF
                                                    @method('PATCH')
                                                    <input hidden="hidden" name="order_id" value="{{$order->id}}">
                                                    <table class="table variation-table table-responsive-sm m-b-5">

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


                                                                                    <input type="radio" name="attribute_{{$pa->attribute->name}}"     value="{{$pav->value->name}}" data-id="{{$od->product->id}}" @if($od->get_attribure()->$tmp == $pav->value->name )
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

            function specialAttribute(event,parent,value,bool){

                if(bool == 1){
                    if(!document.getElementById('special_attribute'+ parent))
                    {
                        let input=document.createElement('input')
                        input.type='number'
                        input.name='attribute_size_'+value
                        input.className='form-control'
                        input.placeholder='cm'
                        input.style='width:25% !important;'
                        input.id='special_attribute_'+ parent
                        event.target.parentElement.parentElement.appendChild(input)
                        // console.log(event.target,input)
                    }
                }
                if(bool==0){
                    document.getElementById('special_attribute_'+ parent).remove()
                }


            }

        </script>
    @endsection

@component('Agent.Layout.layout')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >صفحه اصلی</a>
        </div>
    @endslot
@endcomponent
