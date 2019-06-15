@extends('layouts.app')
@php
$categories = \App\Category::all();
@endphp
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add News</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('add-news') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="headline" class="col-md-4 col-form-label text-md-right">{{ __('Headline') }}</label>

                                <div class="col-md-6">
                                    <input id="headline" type="text" class="form-control{{ $errors->has('headline') ? ' is-invalid' : '' }}" name="headline" value="{{ old('headline') }}" required autofocus>
                                    @if ($errors->has('headline'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('headline') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="body" class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

                                <div class="col-md-6">
                                    <textarea id="body" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" name="body" required></textarea>

                                    @if ($errors->has('body'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="headline" class="col-md-4 col-form-label text-md-right">{{ __('Select Category') }}</label>

                                <div class="col-md-6">
                                    <select id="category_id" type="text" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}"
                                            name="category_id" required autofocus>
                                        <option value="">--Please select--</option>
                                        @if(isset($categories))
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Post') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
