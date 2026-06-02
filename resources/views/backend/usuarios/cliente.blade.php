@extends('layouts.app')

@section('content')

<div class = "comtainer mt-5">
  

<p> usuario: {{Auth::user()-> nombre }} </p>
    <p> Role: {{Auth::user()-> role }} </p>
</div>
@endsection

