@extends('app')

@section('content')

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#8f8574" fill-opacity="1" d="M0,320L60,298.7C120,277,240,235,360,218.7C480,203,600,213,720,234.7C840,256,960,288,1080,282.7C1200,277,1320,235,1380,213.3L1440,192L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>

    <div  class="login-div">
        <div class="logo"> <h1> لــــــرن </h1></div>
        <div class="title"> ایجاد پست </div>
        <div class="fields">
            <form @submit.prevent="checkform" method="post" enctype="multipart/form-data" action="{{route('posts.store')}}">
                @csrf
                <div class="subtitle">
                    <i class="fa fa-user"></i>
                    <input type="text" name="title" class="user-input @error("title") is-invalid @enderror;" placeholder="عنوان" v-model="username" >
                </div>
                @error('title')
                <span class="invalid-feedback " role="alert">
                     <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="content">
                    <label for="content" class="form-label">متن</label>
                    <textarea name="body" id="content" class="email-input @error('body') is-invalid @enderror" id="content" cols="30" rows="3"></textarea>
                </div>
                @error('body')
                <span class="invalid-feedback " role="alert">
                     <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="file">
                    <label for="file" class="form-label">انتخاب فایل</label>
                    <input type="file" name="img" id="file" class="file-input @error('img') is-invalid @enderror">

                </div>
                @error('img')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button class="signin-button" type="submit">ایجاد پست </button>
            </form>
        </div>
    </div>

@endsection
