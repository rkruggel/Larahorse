@extends('layouts.master')

@section('file', 'larahorse/resources/views/stammdaten/puser/useredit.blade.php')

@section('title', 'LaraHorse')

@section('sidebar')
    @parent

    <p>larahorse resources views stammdaten puser useredit.blade.php</p>
@endsection



@section('content')
    @parent

    <p class="lead">
        Form: stammdaten puser useredit
    </p>

    <table>
        <tr>
            <th>Label</th>
            <th>Field</th>
        </tr>

        @for($i=0; $i < strlen($users); $i++)
            <tr>
                <td class="data">
                    {{$i}}
                </td>
                <td class="data">
                    <input class="inp" type="text" name="{{$i}}">
                </td>

                <!--
                <td class="btn">
                    <a href="http://localhost:8082/{{$user->id}}"><button class="btn1">del</button></a>
                </td>
                <td class="btn"><button class="btn1">edit</button></td>
                <td class="btn"><button class="btn1">add</button></td>
                -->
            </tr>
        @endfor


    </table>





@endsection


