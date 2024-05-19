    @section('css')
    <link rel="stylesheet" href="/assets/css/Address.css" />
    @endsection
@section('content')


               <div class="page-body-wrapper">
			   		<div class="page-body">
						<div class="col-xl-12">
							<div class="card o-hidden card-hover border border-2">
								<div class="card-header card-header-top card-header--2 px-0 pt-0">
									شماتیک سفارشات
								</div>

								<div class="card-body p-0">
									<div>
										<div class="table-responsive">
											<table class="best-selling-table table border-0 all-package">
												<tbody>

												@foreach($orders as $on)
													<tr>
														<td>
															<div class="best-product-box">
																<div class="product-detail-box">
																	<h5>{{$on->client->name()}}</h5>
																	<h5 style="text-align: right;font-weight: bold !important;">{{$on->id}}#</h5>
																</div>
															</div>
														</td>
													
														<td class="w-3/4">
															<ol class="progtrckr">
																<li class="@if($on->status == 'create-order-step-1' || $on->status == 'create-order-step-2' || $on->status == 'create-order-step-3')progtrckr-todo @else progtrckr-done  @endif">
																	<h5>نماینده</h5>
																</li>

																<li class="@if($on->status == 'reject-order-CEO') progtrckr-cancel @elseif($on->status == 'pending-order-CEO' || $on->status == 'create-order-step-1' || $on->status == 'create-order-step-2' || $on->status == 'create-order-step-3' || $on->status == 'sent-order-agent') progtrckr-todo @else progtrckr-done   @endif">
																	<h5>مدیریت</h5>
																</li>

																<li class="@if($on->status=='create-order-step-1' || $on->status=='create-order-step-2' || $on->status=='create-order-step-3' || $on->status=='sent-order-agent' || $on->status=='reject-order-CEO' || $on->status=='pending-order-CEO')
																	progtrckr-todo
																	@elseif($on->status=='approved-order-CEO' || $on->status=='pending-order-factory')
																	progtrckr-primary
																	@else
																	progtrckr-done
																	@endif">
																	<h5>تایید کارخانه</h5>
																</li>

																<li class="@if($on->status == 'bending-order-factory'||$on->status == 'welding-order-factory' || $on->status == 'coloring-order-factory' || $on->status == 'packing-order-factory' || $on->status == 'sent-order-factory') progtrckr-done @elseif($on->status == 'approved-order-factory') progtrckr-primary @else progtrckr-todo  @endif">
																		<h5>خم کاری</h5>
																</li>


																<li class="@if( $on->status == 'welding-order-factory' || $on->status == 'coloring-order-factory' || $on->status == 'packing-order-factory' || $on->status == 'sent-order-factory') progtrckr-done @elseif($on->status == 'bending-order-factory') progtrckr-primary @else progtrckr-todo  @endif">
																		<h5>جوش کاری</h5>
																</li>

																<li class="@if($on->status == 'coloring-order-factory' || $on->status == 'packing-order-factory' || $on->status == 'sent-order-factory') progtrckr-done @elseif($on->status == 'welding-order-factory') progtrckr-primary @else progtrckr-todo  @endif">
																		<h5>رنگ آمیزی</h5>
																</li>

																<li class="@if($on->status == 'packing-order-factory' || $on->status == 'sent-order-factory') progtrckr-done @elseif($on->status == 'coloring-order-factory') progtrckr-primary @else progtrckr-todo  @endif">
																		<h5>بسته بندی</h5>
																</li>
																<li class="@if($on->status == 'sent-order-factory') progtrckr-done @elseif($on->status == 'packing-order-factory') progtrckr-primary  @else  progtrckr-todo  @endif">
																		<h5>ارسال</h5>
																</li>
															</ol>
																</td>

														<td>
															<div class="product-detail-box">
																<h5>{{$on->created_at->format('Y-m-d')}}</h5>
															</div>

														</td>



														<td>
															<div class="product-detail-box">
																<h5 style="font-size: small !important;">{{json_decode($on->address)->province}} - {{json_decode($on->address)->county}}</h5>
															</div>
														</td>

														<td class="@if($on->status == 'create-order-step-1' || $on->status == 'create-order-step-2' ||$on->status == 'create-order-step-3')order-pending
															@elseif($on->status == 'reject-order-CEO')order-cancle
															@else order-success @endif">

															<span>{{__('status.'.$on->status)}}</span>

														</td>

														<td>
															<ul>
																<li>
																		<a href="{{route('manager.order.detail',$on)}}">
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
				</div>

@endsection
    @section('js')
        <script src="/assets/js/Address.js"></script>
                <script src="/Manager/assets/js/order.js"></script>
    @endsection

@component('Manager.Layout.layout')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >صفحه اصلی</a>
        </div>
    @endslot
@endcomponent
