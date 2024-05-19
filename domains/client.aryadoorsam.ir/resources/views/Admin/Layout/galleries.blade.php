<div class=" box grid grid-cols-12 p-3 mt-5">
    <div class=" col-span-4  mr-2">
        <div class=" p-5 mt-5">
            <div class="col-span-12 lg:col-span-6">
                <div class="intro-y ">
                    <div id="uploadArea" class="upload-area ">
                        <!-- Headedd -->
                        <div class="upload-area__header">
                            <h1 class="upload-area__title">بارگزاری فایل</h1>
                            <p class="upload-area__paragraph">
                                <strong class="upload-area__tooltip">
                                    فرمت مجاز فایل ها
                                    <span class="upload-area__tooltip-data"></span> <!-- Data Will be Comes From Js -->
                                </strong>
                            </p>
                        </div>
                        <!-- End Header -->
                        <!-- Drop Zoon -->
                        <div id="dropZoon" class="upload-area__drop-zoon drop-zoon" >
                                <span class="drop-zoon__icon" >
                                  <i class='bx bxs-file-image'></i>
                                </span>
                            <p class="drop-zoon__paragraph" onclick="addOrSelectGallery()" style="height: inherit; line-height: 10;">عکس خود را به انجا بکشید یا بارگزاری کنید </p>
                            <span id="loadingText" class="drop-zoon__loading-text">Please Wait</span>
                            <img src="" alt="Preview Image" id="previewImage" class="drop-zoon__preview-image" draggable="false" >
                            <input type="file" id="fileInput" name="image" class="drop-zoon__file-input" accept="image/*" >
                        </div>
                        <!-- End Drop Zoon -->

                        <!-- File Details -->
                        <div id="fileDetails" class="upload-area__file-details file-details">

                            <div id="uploadedFile" class="uploaded-file">
                                <div class="uploaded-file__icon-container">
                                    <i class='bx bxs-file-blank uploaded-file__icon'></i>
                                    <span class="uploaded-file__icon-text"></span> <!-- Data Will be Comes From Js -->
                                </div>

                                <div id="uploadedFileInfo" class="uploaded-file__info">
                                    <span class="uploaded-file__name">Proejct 1</span>
                                    <span class="uploaded-file__counter">0%</span>
                                </div>
                            </div>
                        </div>
                        <!-- End File Details -->
                        <div class="mt-4 hidden" id="changeDetails">
                            <label class="  w-full h-full text-right float-right ml-2 text-blue-400" id="labelFileName">نام عکس </label>
                            <input class="  input w-full rtl border mt-2 align-right" value="" id="FileName" name="title">
                            <label class="  w-full h-full text-right float-right ml-2 mt-2 text-blue-400" id="labelFileَAlt">َمتن جایگزین</label>
                            <input class="  input w-full rtl border mt-2 align-right" value="" id="FileAlt" name="alt" placeholder="alt عکس را وارد کنید ">
                        </div>

                    </div>                                    <!-- End Upload Area -->
                </div>
            </div>
        </div>
    </div>
    <div class=" col-span-8 rtl mb-4" >
        <div class="grid grid-cols-12 gap-1">
            <div class="col-span-2 dropdown relative">
                <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                </button>
                <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-50">
                    <div class="dropdown-box__content box p-2">
                        <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Share Files </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                    </div>
                </div>
            </div>
            <div class="col-span-8 relative text-gray-700">
                <input  type="text" class="input input--lg w-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="جست و جو میان تصاویر">
                <i class="w-4 h-4 hidden sm:absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
            </div>
        </div>
        <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5 relative overflow-x-auto scrollbar-hidden h-128" id="showGallery">
            @foreach($galleries as $gallery)
                <div class="intro-y col-span-6 sm:col-span-4 md:col-span-4 xxl:col-span-2">
                    <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                        <div class="absolute left-0 top-0 mt-3 ml-3">
                            <input class="input border border-gray-500 marked"  @if(isset($selectedGalleryId)) @if($selectedGalleryId == $gallery->id)checked  @endif  @endif  id="{{$gallery->id}}" value="{{$gallery->id}}" name="selectedImage" type="radio">
                        </div>
                        <a href="" class="  mx-auto my-auto">
                            <div class="file__icon__gallerys m-auto justify-center items-center">
                                <img src="{{str_replace('public','/storage',$gallery->path)}}" class="gallery_image ">
                            </div>
                        </a>
                        <a href="" class="block font-medium mt-4 text-center truncate">{{$gallery->title}}</a>
                        <div class="text-gray-600 text-xs text-center"></div>
                        <a class=" w-5 h-5 block tooltip " title="15 محصول ثبت شده  در سایت" data-theme="dark" href="javascript:;"> <i data-feather="activity" class="w-5 h-5 text-gray-500"></i> </a>
                        <div class="absolute top-0 right-0 mr-2 mt-2 dropdown ml-auto">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-vertical" class="w-5 h-5 text-gray-500"></i> </a>
                            <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-10">
                                <div class="dropdown-box__content box p-2">
                                    <a href="javascript:;" data-toggle="modal" id="submit" data-target="#galleryDelete{{$gallery->id}}" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> حذف </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
