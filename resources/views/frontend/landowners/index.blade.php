@extends('layouts.landowner')
@section('landowner-content')
    <!--inner banner start-->
    <div class="innerBanner Loader">
        <img class="modify-img " data-image-small="{{asset('landowner-banners/'.$banner->image)}}"
            data-image-large="{{asset('landowner-banners/'.$banner->image)}}"
            data-image-standard="{{asset('landowner-banners/'.$banner->image)}}" alt=""> <!--1366x400-->

        <div class="container">
            <div class="row">
                <h1 class="anim textOver"><span><span>{{$banner->title}}</span></span></h1>
            </div>
        </div>
    </div>
    <!--inner banner end-->
    <!--================================ landowner text section start ==========================-->
    <section class="ListingFour asLandOwnerText">
        <div class="container-fluid">
            <div class="row ">

                <!--  single-->
                <div class="ListingFour__single col-md-12 p0 Flex">
                    <div class="col-sm-5 p0 ListingFour__single__right col-sm-push-7">
                        <div class="ListingFour__single__right__bg Loader">
                            <img class=" modify-img" data-image-small="{{asset('landowner-description/'.$description->image)}}"
                                data-image-large="{{asset('landowner-description/'.$description->image)}}"
                                data-image-standard="{{asset('landowner-description/'.$description->image)}}" data-src=""
                                src="{{asset('landowner-description/'.$description->image)}}" alt=""> <!-- 568x500 -->
                        </div>
                    </div>

                    <div class="col-sm-7 ListingFour__single__left col-sm-pull-5">
                        <h2 class="Title anim textOver">
                            <span><span>{{$description->title}}</span></span>
                        </h2>
                        {!!$description->description!!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================================ landowner text section end ============================-->


    <!--========landowner form section start ========-->

    <section class="landowner-from pt100 pb100">
        <div class="container">
            <div class="">
                <h2 class="Title anim textOver"> <span><span>MEET THE PROFESSIONALS</span></span></h2>





                <form id="landowner" class="dynamic_form " action="https://edisonrealestatebd.com/site/dynamic_form"
                    method="post" data-pjax="false">
                    <input type="hidden" name="_csrf-frontend"
                        value="2n8H0M9DNlSavCSg8BJXEPfFm7knW-G27SzCM0UA8vCREla7pBEDMPf4afKodwhmgaP3gGE4mdicabB9F3aatQ==">
                    <input type="hidden" id="landowner" class="form-control" name="form_id" value="landowner">



                    <div class="form-message-container success_wrapper hide success_wrapper_landowner">
                        <div class="form-message-body">
                            <span class="success_container_landowner"></span>
                        </div>
                    </div>
                    <div class="form-message-container error_wrapper hide error_wrapper_landowner">
                        <div class="form-message-body">
                            <span class="error_container_landowner"></span>
                        </div>
                    </div>
                    <input type="text" name="Dynamicform[spam_protector]" style="display:none;">
                    <div class="topForm">
                        <p>Land Information</p>
                        <div class="formInline Three">
                            <div class="form-group">
                                <input type="text" class="form-control" name="Dynamicform[locality]"
                                    placeholder="Locality">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="Dynamicform[address]"
                                    placeholder="Address*">
                            </div>
                            <div class="form-group">
                                <input type="text" id="land_size" name="Dynamicform[land_size]" class="form-control"
                                    placeholder="Size of the land in Kathas*">
                            </div>
                            <div class="form-group">
                                <input type="text" id="front_road_width" name="Dynamicform[front_road_width]"
                                    class="form-control" placeholder="Width of the road in front (In Feet)*">
                            </div>

                            <div class="form-group Select">
                                <select name="Dynamicform[land_category]" id="land_category">
                                    <option value="''"> Select Category</option>
                                    <option value="Freehold"> Freehold</option>
                                    <option value="Leasehold"> Leasehold</option>
                                </select>
                            </div>
                            <div class="form-group Select">
                                <input type="text" class="form-control" name="Dynamicform[land_facing]"
                                    placeholder="Facing*">
                            </div>
                        </div>

                        <div class="form-group Select">
                            <select name="Dynamicform[attractive_features ]" id="attractive_features ">
                                <option value="""">Attractive features (if any)</option>
                                <option value="Lakeside">Lakeside</option>
                                <option value="Corner Plot">Corner Plot</option>
                                <option value="Park View">Park View</option>
                                <option value="Main Road">Main Road</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>

                    </div>
                    <div class="bottomForm">
                        <p>Landowners Information</p>

                        <div class="formInline Three">
                            <div class="form-group">
                                <input type="text" id="landowner_name" name="Dynamicform[landowner_name]"
                                    class="form-control" placeholder="Name of the landowner*">
                            </div>
                            <div class="form-group">
                                <input type="email" id="email" name="Dynamicform[email]" class="form-control"
                                    placeholder="Email ID*">
                            </div>
                            <div class="form-group">
                                <input type="text" id="contact_number" name="Dynamicform[contact_number]"
                                    class="form-control" placeholder="Contact number*">
                            </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class=" dynamic_submit_btn dcBtn"><span>submit</span></button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
        </div>
    </section>
@endsection
