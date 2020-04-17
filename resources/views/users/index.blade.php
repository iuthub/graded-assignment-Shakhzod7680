<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://kit.fontawesome.com/8500f75e5b.js" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style>
            /* Include the padding and border in an element's total width and height */
            * {
              box-sizing: border-box;
              font-family: Nunito, san-serif;
            }

            /* Remove margins and padding from the list */
            ul {
              margin: 0;
              padding: 0;
            }

            /* Style the list items */
            ul li {
              position: relative;
              padding: 12px 8px 12px 40px;
              background: #eee;
              font-size: 18px;
              transition: 0.2s;
              display: flex;
              flex-flow: row nowrap;
              align-items: center;
              justify-content: flex-start;


              /* make the list items unselectable */
              -webkit-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
              user-select: none;
            }

            /* Set all odd list items to a different color (zebra-stripes) */
            ul li:nth-child(odd) {
              background: #f9f9f9;
            }

            /* Darker background-color on hover */
            ul li:hover {
              background: #ddd;
            }

            ul li .task {
                flex-grow: 1;
            }

            ul li .action {
                margin: 5px 15px;
                vertical-align: middle;
            }

            ul li a {
                color: grey;
            }
         
            /* Style the input */
            input {
              margin: 0;
              border: none;
              border-radius: 0;
              width: 75%;
              padding: 10px;
              float: left;
              font-size: 16px;
            }
            
            

           
        </style>
    </head>
    <body>
@extends('layouts.users_layout')

@include('partials.error_block')


@section('content')
      <a  href="{{ route('home')}}">
                    <button type="submit" class="HomeBtn">Home</button>
      </a>
      
      <form id="postForm" action="{{ route('userCreatePost') }}" method="post" >
            @csrf
            <div id="myDIV" class="header">
              
              <h2>My To Do List</h2>
              <input type="text" class="titlee" form="postForm" name="title" placeholder="Title..." >
              <button type="submit" class="addBtn">Add</button>
            </div>
        </form>
              <div class="article-footer">
      <div class="article-meta">
        
      </div>
      <div class="article-actions">
      </div>
    </div>
  </div>


@section('content')


@include('partials.info_block')

@foreach($posts as $post)
    <div class="article">
            <ul id="myUL">   
          <li>
            <div  class="task">
            <h2>{{ $post['title'] }}</h2>
            </div>
          <div class="action">
            <a href="{{ route('userEdit', ['id'=> array_search($post, $posts) ]) }}">Edit<i class="fa fa-edit"></i></a>
          </div>
          <div class="action">
          <a href="{{ route('userDelete', ['id'=>  array_search($post, $posts) ]) }}"><i class="fa fa-trash-alt"></i>Delete</a> 
          </div>
          </li>

        </div>
      </ul>
@endforeach
  

@endsection
    </body>
</html>

<!--
<li>
            <div class="task">
                Hit the gym
            </div>
            
            
          </li>
          -->