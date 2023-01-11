<div class="container mt-1">
    <div class="row" style="justify-content: center; align-items: center;">
        <div class="col-md-3">
            <img src="{{asset('assets/image/logo.png')}}" class="w-100" alt="logo">
        </div>
        <div class="col-md-9 " >
            <img src="{{asset('assets/image/adds.jpg')}}" style="width: 100%;" alt="">
        </div>

        <div class="row">

        </div>
    </div>

</div>


<div class="sticky-top">
<nav class="navbar navbar-expand-lg navbar-light navbar-bg">
    <div class="container">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>

                @php
                $categories = App\Models\Category::where('status','0')->where('navbar_status','0')->get();
            
                @endphp

                @foreach ($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" href="/tutorial/{{$category->slug }}">{{$category->name}}</a>
                </li>

                @endforeach




                <li class="nav-item">
                    <a class="nav-link btn btn-danger course-btn" href="#">Course</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
</div>
