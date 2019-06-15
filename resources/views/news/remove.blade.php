@extends('layouts.app')
@php
    $categories = \App\Category::all();
@endphp
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All News</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <th>Created</th>
                                <th>Headline</th>
                                <th>Body</th>
                                <th>Category</th>
                                <th>Created By</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @if(isset($articles))
                                    @foreach($articles as $article)
                                        <tr>
                                            <td>{{date('d-m-Y', strtotime($article->created))}}</td>
                                            <td>{{$article->headline}}</td>
                                            <td>{{$article->body}}</td>
                                            <td>{{$article->category}}</td>
                                            <td>{{$article->created_by}}</td>
                                            <td>
                                                <form action="" method="post" onsubmit="return confirm('Are you sure you want to delete this news?');">
                                                    @csrf
                                                    <input type="hidden" name="article_id" value="{{$article->article_id}}">
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
