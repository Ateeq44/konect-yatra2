@extends('layouts.app')
@section('content')
<style>
    .listt {
        scrollbar-width: thin;
        scrollbar-color: #BBB #EEE;
    }

    .listt::-webkit-scrollbar {
      width: 10px;
  }

  .listt::-webkit-scrollbar-track {
      background: #C0C3C6;
  }

  .listt::-webkit-scrollbar-thumb {
      background-color: #888;
      border-radius: 10px;
      border: 3px solid #C0C3C6;
  }
  input[list]:focus {
    outline: none;
}
input[list] + div[list] {
    display: none;
    position: absolute;
    width: 100%;
    max-height: 164px;
    overflow-y: auto;
    max-width: 538px;
    background: #FFFFFF;
    border: var(--border);
    border-top: none;
    border-radius: 0 0 5px 5px;
    box-shadow: 0 3px 3px -3px #333;
    z-index: 100;
}
input[list] + div[list] span {
    display: block;
    padding: 7px 5px 7px 20px;
    color: black;
    background-color: #F7F7F7;
    text-decoration: none;
    cursor: pointer;
}
input[list] + div[list] span:not(:last-child) {
  border-bottom: 1px solid #EEE;
}
input[list] + div[list] span:hover {
    background-color: #4c1864;
    color:white;
}
.dropdown-toggle:hover, .dropdown-toggle:focus {
    color: black !important;
}
.back-to-top {
    background-color: #f54e18 !important;
    color: #fff !important;
}
.owl-prev, .owl-next, .back-to-top, .btn {
    background-color: #f54e18 !important;
    color: #fff !important;
}
.title-head {
    border-color: #f54e18 !important;
}
.btn.dropdown-toggle.btn-default {
    color: #000 !important;
}

</style>



<script src="{{asset('assets/js/iternary.js')}}"></script>
@endsection