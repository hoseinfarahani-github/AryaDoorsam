
@section('content')
    <div class="page-body">

        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            @if($errors->any())
                                <div class="alert alert-danger" role="alert">

                                @foreach($errors->all() as $error)
                                       <li> {{$error}} </li>
                                @endforeach

                                </div>
                            @endif
                            <div class="card border border-2">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>مشخصات کاربری</h5>
                                    </div>
                                     <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">نام کاربری نماینده</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" disabled type="text"
                                                        value="{{\Illuminate\Support\Facades\Auth::user()->username}}">
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">ایمیل نماینده</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" disabled type="text"
                                                       value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                                            </div>
                                        </div>

                                </div>
                            </div>

                            <div class="card border border-2">
                                <form action="{{route('agent.setting.change_password')}}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="card-header-2">
                                            <h5>تنظیمات امنیتی</h5>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <div class="col-sm-4">
                                                <input name="current_password" class="form-control" type="password" placeholder="رمز عبور فعلی" value="{{old('current_password')}}">
                                            </div>
                                            <div class="col-sm-4">
                                                <input name="password" class="form-control" type="password" placeholder="رمز عبور جدید" value="{{old('password')}}">
                                            </div>
                                            <div class="col-sm-4">
                                                <input name="password_confirmation" class="form-control" type="password" placeholder="تکرار رمز عبور جدید" value="{{old('password_confirmation')}}">
                                            </div>

                                        </div>



                                    </div>
                                    <button type="submit"
                                       class="btn theme-bg-color btn-md fw-bold text-light w-25">تغییر رمز</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Product Add End -->
    </div>

@endsection

@extends('Agent.Layout.layout')


