@extends('frontend.frontend-master')


@includeIf('frontend.frontend-navbar')
<!-- title  -->
@section('title')
Home
@endsection




@section('frontend-content')


<div class="container">
    <div class="row mt-5">
        <div class="owl-carousel owl-theme">


            @foreach ($categories as $category)
            <div class="item">
                <div class="card-body shadow m-1">

                    <img src="{{asset('uploads/category/')}}/{{$category->image }} " alt="" style="height: 120px;">
                    <a href="/tutorial/{{ $category->name }}" style='text-decoration:none;'>
                        <h3 class="mt-2 mb-2">{{$category->name}}</h3>
                    </a>
                    <a href="#" class="btn btn-block" style="background-color: red;color:white">Watch Video </a>
                    <a href="#" class="btn btn-block" style="background-color: darkblue;color:white">Start Course </a>
                </div>
            </div>

            @endforeach



        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
            <img src="{{asset('assets/image/2.jpg')}}" class="w-100" alt="">
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 mt-5">
            <h3 class="underline">Funda of Web IT</h3>
            <p class="about-text">Funda of Web IT provides a collection of tutorials about PHP, Mysql, Laravel, Python Django, ASP.Net, VB.Net, Codeigniter, Bootstrap v3,v4,4+, jQuery, Ajax, Laravel APIs, Composer Packages, Git, Heroku, etc. You will find the best example and tutorials about PHP and laravel.</p>
        </div>

        <div class="col-md-4 mt-5 about-right">
            <h3 class="underline">Hire a Web Developer</h3>
            <p>Do you want to build a modern, lightweight and responsive website?</p>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Hire Me
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-black">
                            <h5 class="modal-title" id="exampleModalLabel">About Me</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-dark">
                            <h4>SHAWON HRIDOY</h4>
                            <h5>Interactive Designer</h5>
                            <p class="about-text">Hi! My name is Shawon Hridoy. I am a Web Developer, and I'm very passionate and dedicated to my work. With 2 years experience as a professional Web developer, I have acquired the skills and knowledge necessary to make your project a success. I enjoy every step of the design process, from discussion and collaboration to concept and execution, but I find the most satisfaction in seeing the finished product do everything for you that it was created to do.</p>
                            <span class="mobile"> +880-1871136148</span><br>
                            <span class="email"> shawon.creativecoder@gmail.com</span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-8 ">
            <h3>All Category</h3>
            <div class="owl-theme owl-carousel">


                @foreach ($categories as $category)

                <div class="item">

                    <div class="card-body shadow m-1">

                        <img src="{{asset('uploads/category/')}}/{{$category->image }} " alt="" style="height: 120px;">
                        <a href="/tutorial/{{ $category->name }}" style='text-decoration:none;'>
                            <h5 class="mt-2 mb-2 text-center">{{$category->name}}</h5>
                        </a>

                    </div>
                </div>

                @endforeach

            </div>
        </div>
        <div class="col-md-4">
            <img src="{{asset('assets/image/1.jpg')}}" alt="">
        </div>
    </div>


    <div class="row">
        <div class="col-md-8">
            <h3 class="mb-5">Latest Post</h3>

            @forelse ($posts as $post)

            <div class="card shadow m-3">
            <a href="/tutorial/{{ $post->category->slug }}/{{$post->slug}}" style="text-decoration: none;">
            <div class="card-body mb-2">
                <h3 class="mt-2 mb-2">{{$post->name}}</h3>
                <h6 class="mt-2 mb-2">{{$post->created_at}}</h6>
            </div>
        </a>
    </div>
        @empty
        <h3>No Latest Post </h3>
        @endforelse


        </div>
        <div class="col-md-4">
            <img src="{{asset('assets/image/1.jpg')}}" alt="">
        </div>
    </div>
</div>
@endsection
