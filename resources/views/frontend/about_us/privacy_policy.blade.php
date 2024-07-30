@extends('layouts.aboutus')
@section('aboutus-content')

    <div class="blog pt100 pb100">
        <div class="container">
            <div class="row">

                <div class="content" style="padding: 20px">
                    <h1 class="Title pb30">Privacy policy</h1>

                    <p>The privacy policy explains how Edison Real Estate&nbsp;collects, uses, maintains, and discloses
                        information from users of the website.<br />
                        &nbsp;</p>
                    <p>{!!$data->description!!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection