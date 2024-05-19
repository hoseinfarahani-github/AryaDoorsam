
@section('content')
    @foreach($postions as $postion)
        <section class="team-section section-lg-space">
            <div class="container-fluid-lg">
                <div class="about-us-title text-center">
                    <h4 class="text-content">{{$postion->title}}
                    </h4>
                    <h2 class="center">{{$postion->name}}</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="slider-user product-wrapper">
                            @foreach($postion->staff as $staff)
                                <div>
                                    <div class="team-box">
                                        <div class="team-iamge">
                                            <img src="{{str_replace('public','storage',$staff->gallery->path)}}" class="img-fluid blur-up lazyload"
                                                 alt="">
                                        </div>

                                        <div class="team-name">
                                            <h3>{{$staff->name()}}</h3>
                                            <h5>{{$staff->sub_position}}</h5>
                                            <ul class="team-media">

                                                @php
                                                $contact_to=json_decode($staff->contact_to);
                                                @endphp
                                                @isset($contact_to->phone)
                                                <li>
                                                    <a href="tel:{{$contact_to->phone}}" class="fb-bg">
                                                        <i class="fa fa-phone"></i>
                                                    </a>
                                                </li>
                                                @endisset
                                                @isset($contact_to->email)
                                                <li>
                                                    <a href="mailto:{{$contact_to->email}}" class="pint-bg">
                                                        <i class="fa fa-envelope"></i>
                                                    </a>
                                                </li>
                                                @endisset

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endforeach
@endsection

@extends('Site.Layout.layout')