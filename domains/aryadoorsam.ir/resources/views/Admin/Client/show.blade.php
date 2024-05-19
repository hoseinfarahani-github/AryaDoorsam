{{--TODO input ha roo doros konam bara save admin--}}
@section('css')
    <link rel="stylesheet" href="/assest/Admin/css/GalleryFileUploader.css" />
@endsection
@section('content')
    <div class="content">

        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                {{__('users.'. $user->username)}}
            </h2>
        </div>
        <div class="grid grid-cols-12 gap-6 rtl">
            <!-- BEGIN: Profile Menu -->
            <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
                <div class="intro-y box mt-5">
                    <div class="relative flex items-center p-5">
                        <div class="w-12 h-12 image-fit">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="{{str_replace('public','/storage',$user->gallery->path)}}">
                        </div>
                        <div class="mr-4 ml-auto">
                            <div class="font-medium text-base">{{__('users.'. $user->username)}}</div>
                            <div class="text-gray-600">کارخانه</div>
                        </div>
                    </div>
                    <div class="p-5 border-t border-gray-200">
                        <a class="flex items-center text-theme-1 font-medium" href="">  اطلاعات شخصی<i data-feather="activity" class="w-4 h-4 ml-2"></i>  </a>
                        <a class="flex items-center mt-5" href=""> تنظیمات حساب کاربری <i data-feather="box" class="w-4 h-4 ml-2"></i> </a>
                        <a class="flex items-center mt-5" href=""> تغییر رمز عبور<i data-feather="lock" class="w-4 h-4 ml-2"></i></a>
                        <a class="flex items-center mt-5" href="">تنظیمات کاربر <i data-feather="settings" class="w-4 h-4 ml-2"></i> </a>
                    </div>
                    <div class="p-5 border-t border-gray-200">
                        <a class="flex items-center" href=""> تنظیمات ایمیل<i data-feather="activity" class="w-4 h-4 ml-2"></i></a>
                        <a class="flex items-center mt-5" href="">  حساب های ذخیره شده پرداخت<i data-feather="box" class="w-4 h-4 ml-2"></i>    </a>
                    </div>
                </div>
                <div class="intro-y box p-5 bg-theme-1 text-white mt-5">
                    <div class="flex items-center">
                        <div class="font-medium text-lg">Important Update</div>
                        <div class="text-xs bg-white text-gray-800 px-1 rounded-md ml-auto">New</div>
                    </div>
                    <div class="mt-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                    <div class="font-medium flex mt-5">
                        <button type="button" class="button button--sm border border-white text-white">Take Action</button>
                        <button type="button" class="button button--sm ml-auto">Dismiss</button>
                    </div>
                </div>
            </div>
            <!-- END: Profile Menu -->
            <div class="col-span-12 lg:col-span-8 xxl:col-span-9">

                <!-- BEGIN: New Authors -->
                <div class="intro-y box col-span-12">
                    <div class="flex items-center px-5 py-3 border-b border-gray-200">
                        <h2 class="font-medium text-base mr-auto">
                            New Authors
                        </h2>
                        <button data-carousel="new-authors" data-target="prev" class="slick-navigator button px-2 border text-white relative flex items-center text-gray-700 mr-2"> <i data-feather="chevron-left" class="w-4 h-4"></i> </button>
                        <button data-carousel="new-authors" data-target="next" class="slick-navigator button px-2 border text-white relative flex items-center text-gray-700"> <i data-feather="chevron-right" class="w-4 h-4"></i> </button>
                    </div>
                    <div class="slick-carousel py-5" id="new-authors">
                        <div class="px-5">
                            <div class="flex flex-col lg:flex-row items-center pb-5">
                                <div class="flex-1 flex flex-col sm:flex-row items-center pr-5 lg:border-r border-gray-200">
                                    <div class="sm:mr-5">
                                        <div class="w-20 h-20 image-fit">
                                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-10.jpg">
                                        </div>
                                    </div>
                                    <div class="mr-auto text-center sm:text-left mt-3 sm:mt-0">
                                        <a href="" class="font-medium text-lg">John Travolta</a>
                                        <div class="text-gray-600 mt-1 sm:mt-0">Software Engineer</div>
                                    </div>
                                </div>
                                <div class="w-full lg:w-auto mt-6 lg:mt-0 pt-4 lg:pt-0 flex-1 flex flex-col justify-center items-center lg:items-start px-5 border-t lg:border-t-0 border-gray-200">
                                    <div class="flex items-center">
                                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-gray-500"> <i class="w-3 h-3 fill-current" data-feather="facebook"></i> </a>
                                        johntravolta@left4code.com
                                    </div>
                                    <div class="flex items-center mt-2">
                                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-gray-500"> <i class="w-3 h-3 fill-current" data-feather="twitter"></i> </a>
                                        John Travolta
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row items-center border-t border-gray-200 pt-5">
                                <div class="w-full sm:w-auto flex justify-center sm:justify-start items-center border-b sm:border-b-0 border-gray-200 pb-5 sm:pb-0">
                                    <div class="px-3 py-2 bg-theme-14 text-theme-10 rounded font-medium mr-3">25 September 2022</div>
                                    <div class="text-gray-600">Joined Date</div>
                                </div>
                                <div class="flex sm:ml-auto mt-5 sm:mt-0">
                                    <button class="button w-20 justify-center block bg-gray-200 text-gray-600 ml-auto">Message</button>
                                    <button class="button w-20 justify-center block bg-gray-200 text-gray-600 ml-2">Profile</button>
                                </div>
                            </div>
                        </div>
                        <div class="px-5">
                            <div class="flex flex-col lg:flex-row items-center pb-5">
                                <div class="flex-1 flex flex-col sm:flex-row items-center pr-5 lg:border-r border-gray-200">
                                    <div class="sm:mr-5">
                                        <div class="w-20 h-20 image-fit">
                                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-7.jpg">
                                        </div>
                                    </div>
                                    <div class="mr-auto text-center sm:text-left mt-3 sm:mt-0">
                                        <a href="" class="font-medium text-lg">Al Pacino</a>
                                        <div class="text-gray-600 mt-1 sm:mt-0">Backend Engineer</div>
                                    </div>
                                </div>
                                <div class="w-full lg:w-auto mt-6 lg:mt-0 pt-4 lg:pt-0 flex-1 flex flex-col justify-center items-center lg:items-start px-5 border-t lg:border-t-0 border-gray-200">
                                    <div class="flex items-center">
                                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-gray-500"> <i class="w-3 h-3 fill-current" data-feather="facebook"></i> </a>
                                        alpacino@left4code.com
                                    </div>
                                    <div class="flex items-center mt-2">
                                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-gray-500"> <i class="w-3 h-3 fill-current" data-feather="twitter"></i> </a>
                                        Al Pacino
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row items-center border-t border-gray-200 pt-5">
                                <div class="w-full sm:w-auto flex justify-center sm:justify-start items-center border-b sm:border-b-0 border-gray-200 pb-5 sm:pb-0">
                                    <div class="px-3 py-2 bg-theme-14 text-theme-10 rounded font-medium mr-3">25 September 2022</div>
                                    <div class="text-gray-600">Joined Date</div>
                                </div>
                                <div class="flex sm:ml-auto mt-5 sm:mt-0">
                                    <button class="button w-20 justify-center block bg-gray-200 text-gray-600 ml-auto">Message</button>
                                    <button class="button w-20 justify-center block bg-gray-200 text-gray-600 ml-2">Profile</button>
                                </div>
                            </div>
                        </div>
                        <div class="px-5">
                            <div class="flex flex-col lg:flex-row items-center pb-5">
                                <div class="flex-1 flex flex-col sm:flex-row items-center pr-5 lg:border-r border-gray-200">
                                    <div class="sm:mr-5">
                                        <div class="w-20 h-20 image-fit">
                                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-10.jpg">
                                        </div>
                                    </div>
                                    <div class="mr-auto text-center sm:text-left mt-3 sm:mt-0">
                                        <a href="" class="font-medium text-lg">Morgan Freeman</a>
                                        <div class="text-gray-600 mt-1 sm:mt-0">DevOps Engineer</div>
                                    </div>
                                </div>
                                <div class="w-full lg:w-auto mt-6 lg:mt-0 pt-4 lg:pt-0 flex-1 flex flex-col justify-center items-center lg:items-start px-5 border-t lg:border-t-0 border-gray-200">
                                    <div class="flex items-center">
                                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-gray-500"> <i class="w-3 h-3 fill-current" data-feather="facebook"></i> </a>
                                        morganfreeman@left4code.com
                                    </div>
                                    <div class="flex items-center mt-2">
                                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-gray-500"> <i class="w-3 h-3 fill-current" data-feather="twitter"></i> </a>
                                        Morgan Freeman
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row items-center border-t border-gray-200 pt-5">
                                <div class="w-full sm:w-auto flex justify-center sm:justify-start items-center border-b sm:border-b-0 border-gray-200 pb-5 sm:pb-0">
                                    <div class="px-3 py-2 bg-theme-14 text-theme-10 rounded font-medium mr-3">23 February 2022</div>
                                    <div class="text-gray-600">Joined Date</div>
                                </div>
                                <div class="flex sm:ml-auto mt-5 sm:mt-0">
                                    <button class="button w-20 justify-center block bg-gray-200 text-gray-600 ml-auto">Message</button>
                                    <button class="button w-20 justify-center block bg-gray-200 text-gray-600 ml-2">Profile</button>
                                </div>
                            </div>
                        </div>
                        <div class="px-5">
                            <div class="flex flex-col lg:flex-row items-center pb-5">
                                <div class="flex-1 flex flex-col sm:flex-row items-center pr-5 lg:border-r border-gray-200">
                                    <div class="sm:mr-5">
                                        <div class="w-20 h-20 image-fit">
                                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-8.jpg">
                                        </div>
                                    </div>
                                    <div class="mr-auto text-center sm:text-left mt-3 sm:mt-0">
                                        <a href="" class="font-medium text-lg">Brad Pitt</a>
                                        <div class="text-gray-600 mt-1 sm:mt-0">Backend Engineer</div>
                                    </div>
                                </div>
                                <div class="w-full lg:w-auto mt-6 lg:mt-0 pt-4 lg:pt-0 flex-1 flex flex-col justify-center items-center lg:items-start px-5 border-t lg:border-t-0 border-gray-200">
                                    <div class="flex items-center">
                                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-gray-500"> <i class="w-3 h-3 fill-current" data-feather="facebook"></i> </a>
                                        bradpitt@left4code.com
                                    </div>
                                    <div class="flex items-center mt-2">
                                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-gray-500"> <i class="w-3 h-3 fill-current" data-feather="twitter"></i> </a>
                                        Brad Pitt
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row items-center border-t border-gray-200 pt-5">
                                <div class="w-full sm:w-auto flex justify-center sm:justify-start items-center border-b sm:border-b-0 border-gray-200 pb-5 sm:pb-0">
                                    <div class="px-3 py-2 bg-theme-14 text-theme-10 rounded font-medium mr-3">12 October 2022</div>
                                    <div class="text-gray-600">Joined Date</div>
                                </div>
                                <div class="flex sm:ml-auto mt-5 sm:mt-0">
                                    <button class="button w-20 justify-center block bg-gray-200 text-gray-600 ml-auto">Message</button>
                                    <button class="button w-20 justify-center block bg-gray-200 text-gray-600 ml-2">Profile</button>
                                </div>
                            </div>
                        </div>
                        <div class="px-5">
                            <div class="flex flex-col lg:flex-row items-center pb-5">
                                <div class="flex-1 flex flex-col sm:flex-row items-center pr-5 lg:border-r border-gray-200">
                                    <div class="sm:mr-5">
                                        <div class="w-20 h-20 image-fit">
                                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-2.jpg">
                                        </div>
                                    </div>
                                    <div class="mr-auto text-center sm:text-left mt-3 sm:mt-0">
                                        <a href="" class="font-medium text-lg">Al Pacino</a>
                                        <div class="text-gray-600 mt-1 sm:mt-0">Software Engineer</div>
                                    </div>
                                </div>
                                <div class="w-full lg:w-auto mt-6 lg:mt-0 pt-4 lg:pt-0 flex-1 flex flex-col justify-center items-center lg:items-start px-5 border-t lg:border-t-0 border-gray-200">
                                    <div class="flex items-center">
                                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-gray-500"> <i class="w-3 h-3 fill-current" data-feather="facebook"></i> </a>
                                        alpacino@left4code.com
                                    </div>
                                    <div class="flex items-center mt-2">
                                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-gray-500"> <i class="w-3 h-3 fill-current" data-feather="twitter"></i> </a>
                                        Al Pacino
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row items-center border-t border-gray-200 pt-5">
                                <div class="w-full sm:w-auto flex justify-center sm:justify-start items-center border-b sm:border-b-0 border-gray-200 pb-5 sm:pb-0">
                                    <div class="px-3 py-2 bg-theme-14 text-theme-10 rounded font-medium mr-3">2 April 2022</div>
                                    <div class="text-gray-600">Joined Date</div>
                                </div>
                                <div class="flex sm:ml-auto mt-5 sm:mt-0">
                                    <button class="button w-20 justify-center block bg-gray-200 text-gray-600 ml-auto">Message</button>
                                    <button class="button w-20 justify-center block bg-gray-200 text-gray-600 ml-2">Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: New Authors -->
                <!-- BEGIN: Top Products -->
                <div class="intro-y box mt-5" id="topProduct">
                    <div class="flex items-center p-5 border-b border-gray-200">
                        <h2 class="font-medium text-base mr-auto">
                            Top Products
                        </h2>
                        <div class="dropdown relative ml-auto">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                            <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                                <div class="dropdown-box__content box p-2">
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> New Chat </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="boxed-tabs nav-tabs justify-center flex flex-col sm:flex-row text-gray-700">
                            <a data-toggle="tab" data-target="#laravel" href="javascript:;" class="w-full sm:w-20 mb-2 sm:mb-0 py-2 rounded-md box text-center sm:mx-2 active"> <i data-feather="box" class="w-6 h-6 mb-2 mx-auto"></i> Laravel </a>
                            <a data-toggle="tab" data-target="#symfony" href="javascript:;" class="w-full sm:w-20 mb-2 sm:mb-0 py-2 rounded-md box text-center sm:mx-2"> <i data-feather="inbox" class="w-6 h-6 mb-2 mx-auto"></i> Symfony </a>
                            <a data-toggle="tab" data-target="#bootstrap" href="javascript:;" class="w-full sm:w-20 mb-2 sm:mb-0 py-2 rounded-md box text-center sm:mx-2"> <i data-feather="activity" class="w-6 h-6 mb-2 mx-auto"></i> Bootstrap </a>
                        </div>
                        <div class="tab-content mt-8">
                            <div class="tab-content__pane active" id="laravel">
                                <div class="flex flex-col sm:flex-row items-center">
                                    <div class="mr-auto">
                                        <a href="" class="font-medium">Wordpress Template</a>
                                        <div class="text-gray-600 mt-1">HTML, PHP, Mysql</div>
                                    </div>
                                    <div class="w-full sm:w-auto flex items-center mt-3 sm:mt-0">
                                        <div class="bg-theme-18 text-theme-9 rounded px-2 mr-5">+20%</div>
                                        <div class="w-full sm:w-40 h-1 bg-gray-400 rounded-full">
                                            <div class="w-1/2 h-full bg-theme-1 rounded-full"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row items-center mt-5">
                                    <div class="mr-auto">
                                        <a href="" class="font-medium">Laravel Template</a>
                                        <div class="text-gray-600 mt-1">PHP, Mysql</div>
                                    </div>
                                    <div class="w-full sm:w-auto flex items-center mt-3 sm:mt-0">
                                        <div class="bg-theme-18 text-theme-9 rounded px-2 mr-5">+55%</div>
                                        <div class="w-full sm:w-40 h-1 bg-gray-400 rounded-full">
                                            <div class="w-2/3 h-full bg-theme-1 rounded-full"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row items-center mt-5">
                                    <div class="mr-auto">
                                        <a href="" class="font-medium">Tailwind HTML Template</a>
                                        <div class="text-gray-600 mt-1">HTML, CSS, JS</div>
                                    </div>
                                    <div class="w-full sm:w-auto flex items-center mt-3 sm:mt-0">
                                        <div class="bg-theme-18 text-theme-9 rounded px-2 mr-5">+40%</div>
                                        <div class="w-full sm:w-40 h-1 bg-gray-400 rounded-full">
                                            <div class="w-3/4 h-full bg-theme-1 rounded-full"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Top Products -->
                <!-- BEGIN: Work In Progress -->
                <div class="intro-y box mt-5">
                    <div class="flex items-center px-5 py-5 sm:py-0 border-b border-gray-200">
                        <h2 class="font-medium text-base mr-auto">
                            Work In Progress
                        </h2>
                        <div class="dropdown relative ml-auto sm:hidden">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                            <div class="nav-tabs dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                                <div class="dropdown-box__content box p-2"> <a href="javascript:;" data-toggle="tab" data-target="#new" class="block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">New</a> <a href="javascript:;" data-toggle="tab" data-target="#last-week" class="block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Last Week</a> </div>
                            </div>
                        </div>
                        <div class="nav-tabs ml-auto hidden sm:flex"> <a data-toggle="tab" data-target="#work-in-progress-new" href="javascript:;" class="py-5 ml-6 active">New</a> <a data-toggle="tab" data-target="#work-in-progress-last-week" href="javascript:;" class="py-5 ml-6">Last Week</a> </div>
                    </div>
                    <div class="p-5">
                        <div class="tab-content">
                            <div class="tab-content__pane active" id="work-in-progress-new">
                                <div>
                                    <div class="flex">
                                        <div class="text-gray-700 mr-auto">Pending Tasks</div>
                                        <div class="font-medium">20%</div>
                                    </div>
                                    <div class="w-full h-1 mt-2 bg-gray-400 rounded-full">
                                        <div class="w-1/2 h-full bg-theme-1 rounded-full"></div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <div class="flex">
                                        <div class="text-gray-700 mr-auto">Completed Tasks</div>
                                        <div class="font-medium">2 / <span class="text-gray-600">20</span></div>
                                    </div>
                                    <div class="w-full h-1 mt-2 bg-gray-400 rounded-full">
                                        <div class="w-1/4 h-full bg-theme-1 rounded-full"></div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <div class="flex">
                                        <div class="text-gray-700 mr-auto">Tasks In Progress</div>
                                        <div class="font-medium">42</div>
                                    </div>
                                    <div class="w-full h-1 mt-2 bg-gray-400 rounded-full">
                                        <div class="w-3/4 h-full bg-theme-1 rounded-full"></div>
                                    </div>
                                </div>
                                <a href="" class="button w-40 mx-auto justify-center block bg-gray-200 text-gray-600 mt-5">View More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Work In Progress -->
                <!-- BEGIN: Latest Tasks -->
                <div class="intro-y box mt-5">
                    <div class="flex items-center px-5 py-5 sm:py-0 border-b border-gray-200">
                        <h2 class="font-medium text-base mr-auto">
                            Latest Tasks
                        </h2>
                        <div class="dropdown relative ml-auto sm:hidden">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                            <div class="nav-tabs dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                                <div class="dropdown-box__content box p-2"> <a href="javascript:;" data-toggle="tab" data-target="#new" class="block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">New</a> <a href="javascript:;" data-toggle="tab" data-target="#last-week" class="block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Last Week</a> </div>
                            </div>
                        </div>
                        <div class="nav-tabs ml-auto hidden sm:flex"> <a data-toggle="tab" data-target="#latest-tasks-new" href="javascript:;" class="py-5 ml-6 active">New</a> <a data-toggle="tab" data-target="#latest-tasks-last-week" href="javascript:;" class="py-5 ml-6">Last Week</a> </div>
                    </div>
                    <div class="p-5">
                        <div class="tab-content">
                            <div class="tab-content__pane active" id="latest-tasks-new">
                                <div class="flex items-center">
                                    <div class="border-l-2 border-theme-1 pl-4">
                                        <a href="" class="font-medium">Create New Campaign</a>
                                        <div class="text-gray-600">10:00 AM</div>
                                    </div>
                                    <input class="input input--switch ml-auto border" type="checkbox">
                                </div>
                                <div class="flex items-center mt-5">
                                    <div class="border-l-2 border-theme-1 pl-4">
                                        <a href="" class="font-medium">Meeting With Client</a>
                                        <div class="text-gray-600">02:00 PM</div>
                                    </div>
                                    <input class="input input--switch ml-auto border" type="checkbox">
                                </div>
                                <div class="flex items-center mt-5">
                                    <div class="border-l-2 border-theme-1 pl-4">
                                        <a href="" class="font-medium">Create New Repository</a>
                                        <div class="text-gray-600">04:00 PM</div>
                                    </div>
                                    <input class="input input--switch ml-auto border" type="checkbox">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Latest Tasks -->
                <!-- BEGIN: General Statistics -->
                <div class="intro-y box mt-5">
                    <div class="flex items-center px-5 py-3 border-b border-gray-200">
                        <h2 class="font-medium text-base mr-auto">
                            General Statistics
                        </h2>
                        <div class="dropdown relative ml-auto">
                            <a class="dropdown-toggle w-5 h-5 block sm:hidden" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                            <button class="dropdown-toggle button font-normal border text-white relative items-center text-gray-700 hidden sm:flex"> Export <i data-feather="chevron-down" class="w-4 h-4 ml-2"></i> </button>
                            <div class="dropdown-box mt-5 sm:mt-12 absolute w-40 top-0 right-0 z-20">
                                <div class="dropdown-box__content box">
                                    <div class="px-4 py-2 border-b border-gray-200 font-medium">Export Tools</div>
                                    <div class="p-2">
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="printer" class="w-4 h-4 text-gray-700 mr-2"></i> Print </a>
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="external-link" class="w-4 h-4 text-gray-700 mr-2"></i> Excel </a>
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 text-gray-700 mr-2"></i> CSV </a>
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="archive" class="w-4 h-4 text-gray-700 mr-2"></i> PDF </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex flex-col sm:flex-row items-center">
                            <div class="flex flex-wrap sm:flex-no-wrap mr-auto">
                                <div class="flex items-center mr-5 mb-1 sm:mb-0">
                                    <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div>
                                    <span>Author Sales</span>
                                </div>
                                <div class="flex items-center mr-5 mb-1 sm:mb-0">
                                    <div class="w-2 h-2 bg-theme-1 rounded-full mr-3"></div>
                                    <span>Product Profit</span>
                                </div>
                            </div>
                            <div class="dropdown relative mt-3 sm:mt-0 mr-auto sm:mr-0">
                                <button class="dropdown-toggle button font-normal border text-white relative flex items-center text-gray-700"> Filter by Month <i data-feather="chevron-down" class="w-4 h-4 ml-2"></i> </button>
                                <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                                    <div class="dropdown-box__content box p-2 overflow-y-auto h-32"> <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">January</a> <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">February</a> <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">March</a> <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">June</a> <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">July</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="report-chart mt-8">
                            <canvas id="report-line-chart" height="130"></canvas>
                        </div>
                    </div>
                </div>
                <!-- END: General Statistics -->
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="/assest/Admin/js/GallertFileUploader.js"></script>
    <script src="/assest/Admin/js/Address.js"></script>
    <script src="/Admin/js/CategoryImageUploader.js"> </script>
    <script>

        function select(authentication){
            document.getElementById('AuthenticationUser').value=authentication
        }

        $('#s1next').click(function() {
            $('#s2').addClass('active');
            $('#s1').removeClass('active');
            $('#s1').addClass('text-gray-600');
            $('#s2').addClass('text-white');
            $('#s2').addClass('bg-theme-1');
            $('#s2').removeClass('text-gray-600');
            $('#s2').removeClass('bg-gray-200');
            $('#s1').removeClass('text-white');
            $('#s1').removeClass('bg-theme-1');
            $('#s1').addClass('text-gray-600');
            $('#s1').addClass('bg-gray-200');

        });
        $('#s2next').click(function() {
            $('#s3').addClass('active');
            $('#s3').removeClass('text-gray-600');
            $('#s3').removeClass('bg-gray-200');
            $('#s3').addClass('text-white');
            $('#s3').addClass('bg-theme-1');

            $('#s2').removeClass('active');
            $('#s2').addClass('text-gray-600');
            $('#s2').removeClass('bg-theme-1');
            $('#s2').removeClass('text-white');
            $('#s2').addClass('bg-gray-200');
            $('#s2').addClass('text-gray-600');
        });
        $('#s3next').click(function() {
            $('#s4').addClass('active');
            $('#s3').removeClass('active');
            $('#s3').addClass('text-gray-600');
            $('#s4').addClass('text-white');
            $('#s4').addClass('bg-theme-1');
            $('#s4').removeClass('text-gray-600');
            $('#s4').removeClass('bg-gray-200');
            $('#s3').removeClass('bg-theme-1');
            $('#s3').removeClass('text-white');
            $('#s3').addClass('bg-gray-200');
            $('#s3').addClass('text-gray-600');

        });
        $('#s2perv').click(function() {
            $('#s1').addClass('active');
            $('#s2').removeClass('active');
            $('#s2').addClass('text-gray-600');
            $('#s2').removeClass('text-white');
            $('#s2').removeClass('bg-theme-1');
            $('#s2').addClass('bg-gray-200')
            $('#s2').addClass('text-gray-600');
            $('#s1').addClass('text-white');
            $('#s1').addClass('bg-theme-1',);
            $('#s1').removeClass('text-gray-600');
            $('#s1').removeClass('bg-gray-200');
        });
        $('#s3perv').click(function() {
            $('#s2').addClass('active');
            $('#s3').removeClass('active');
            $('#s3').addClass('text-gray-600');
            $('#s2').removeClass('text-gray-600');
            $('#s2').removeClass('bg-gray-200');
            $('#s2').addClass('text-white');
            $('#s2').addClass('bg-theme-1');
            $('#s3').removeClass('text-white');
            $('#s3').removeClass('bg-theme-1');
            $('#s3').addClass('bg-gray-200');
            $('#s3').addClass('bg-gray-200');
        });
        $('#s4perv').click(function() {
            $('#s3').addClass('active');
            $('#s4').removeClass('active');
            $('#s4').addClass('text-gray-600');
            $('#s3').removeClass('text-gray-600');
            $('#s3').removeClass('bg-gray-200');
            $('#s3').addClass('text-white');
            $('#s3').addClass('bg-theme-1');

        });
        $('#s1').click(function() {
            $('#s1').addClass('text-white');
            $('#s1').addClass('bg-theme-1');
            $('#s1').removeClass('bg-gray-200');
            $('#s1').removeClass('text-gray-600');

            $('#s2').removeClass('text-white');
            $('#s2').removeClass('bg-theme-1');

            $('#s3').removeClass('text-white');
            $('#s3').removeClass('bg-theme-1');

            $('#s2').addClass('text-gray-600');
            $('#s2').addClass('bg-gray-200');

            $('#s3').addClass('bg-gray-200');
            $('#s3').addClass('text-gray-600');

        });
        $('#s2').click(function() {
            $('#s2').addClass('bg-theme-1');
            $('#s2').addClass('text-white');
            $('#s2').removeClass('bg-gray-200');
            $('#s2').removeClass('text-gray-600');
            $('#s1').removeClass('bg-theme-1');
            $('#s1').removeClass('text-white');
            $('#s3').removeClass('bg-theme-1');
            $('#s3').removeClass('text-white');
            $('#s3').addClass('text-gray-600');
            $('#s3').addClass('bg-gray-200');
            $('#s1').addClass('bg-gray-200');
            $('#s1').addClass('text-gray-600');

        });
        $('#s3').click(function() {
            $('#s3').addClass('bg-theme-1');
            $('#s3').addClass('text-white');
            $('#s3').removeClass('bg-gray-200');
            $('#s3').removeClass('text-gray-600');
            $('#s2').removeClass('text-white');
            $('#s2').removeClass('bg-theme-1');

            $('#s1').removeClass('text-white');
            $('#s1').removeClass('bg-theme-1');



            $('#s2').addClass('text-gray-600');
            $('#s2').addClass('bg-gray-200');

            $('#s1').addClass('text-gray-600');
            $('#s1').addClass('bg-gray-200');



        });
        // document.getElementById('s1next').disabled = true;

        var check = function() {
            if (document.getElementById('password').value ===
                document.getElementById('verifyPassword').value && document.getElementById('password').value != '' && document.getElementById('verifyPassword').value != '')
            {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'درست زدی';
                document.getElementById('s1next').classList.remove("disabled");
                document.getElementById('s1next').classList.remove("bg-gray-600");
                document.getElementById('s1next').classList.add("bg-theme-1");
                document.getElementById('step2').classList.remove("disabled");
                document.getElementById('step3').classList.remove("disabled");
            }
            else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = ' پسورد را صحیح وارد کنید';
                document.getElementById('s1next').classList.add("disabled");
                document.getElementById('step2').classList.add("disabled");
                document.getElementById('step3').classList.add("disabled");
                document.getElementById('s1next').style.backgroundColor = "gray";
            }
            if(document.getElementById('password').value === null ||
                document.getElementById('verifyPassword').value === null){
                document.getElementById('message').innerHTML = '';
            }
        }
    </script>
@endsection

@component('Admin.Layout.layout')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >{{__('users.'.$user->username)}}</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('admin.user.index')}}" class="breadcrumb--active">لیست کاربران</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('admin.dashboard.index')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
