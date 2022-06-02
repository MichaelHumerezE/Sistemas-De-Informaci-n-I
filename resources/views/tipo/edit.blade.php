@extends('layouts.app-master')

@section('content')

    <div id="app" class="wrapper" style="position: absolute; left:0">
        @include('layouts.sidebar')
        <div id="content">

            <form action="{{url('/tipo/'.$tipo->id)}}" method="POST" style="margin: auto; width:200%">
                @csrf
                {{method_field('PATCH')}}
                @include('tipo.form', ['modo' => 'UPDATE'])
            </form>

        </div>
    </div>

@endsection