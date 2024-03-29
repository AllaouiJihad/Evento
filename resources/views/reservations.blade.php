@extends('layouts.main')
@section('content')
    <style>
        .tickets-container .tickets-list .ticket-item .ticket-state i {
            font-size: 13px;
            color: #fff;
            line-height: 20px;
        }

        .tickets-container .tickets-list .ticket-item .ticket-state {
            position: absolute;
            top: 13px;
            right: -12px;
            height: 24px;
            width: 24px;
            -webkit-border-radius: 50%;
            -webkit-background-clip: padding-box;
            -moz-border-radius: 50%;
            -moz-background-clip: padding;
            border-radius: 50%;
            background-clip: padding-box;
            background-color: #e5e5e5;
            text-align: center;
            -webkit-box-shadow: 0 0 3px rgba(0, 0, 0, .2);
            -moz-box-shadow: 0 0 3px rgba(0, 0, 0, .2);
            box-shadow: 0 0 3px rgba(0, 0, 0, .2);
            border: 2px solid #fff;
        }

        .bg-palegreen {
            background-color: #a0d468 !important;
        }

        .tickets-container .tickets-list .ticket-item .ticket-type .type {
            color: #999;
            font-size: 11px;
            text-transform: uppercase;
        }

        .tickets-container .tickets-list .ticket-item .ticket-type {
            line-height: 30px;
            height: 50px;
            padding: 10px;
        }

        .tickets-container .tickets-list .ticket-item .ticket-time i {
            color: #ccc;
            width: 50px;
        }

        .tickets-container .tickets-list .ticket-item .divider {
            position: absolute;
            top: 0;
            left: 0;
            height: 50px;
            width: 1px;
            background-color: #eee;
            display: inline-block;
        }

        .tickets-container .tickets-list .ticket-item .ticket-time {
            line-height: 30px;
            height: 50px;
            padding: 10px;
        }

        .tickets-container .tickets-list .ticket-item .ticket-user .user-company {
            margin-left: 2px;
            color: #999;
        }

        .tickets-container .tickets-list .ticket-item .ticket-user .user-at {
            margin-left: 2px;
            color: #ccc;
            font-size: 13px;
        }

        .tickets-container .tickets-list .ticket-item .ticket-user .user-name {
            margin-left: 5px;
            font-size: 13px;
        }

        .tickets-container .tickets-list .ticket-item .ticket-user .user-avatar {
            width: 30px;
            height: 30px;
            -webkit-border-radius: 3px;
            -webkit-background-clip: padding-box;
            -moz-border-radius: 3px;
            -moz-background-clip: padding;
            border-radius: 3px;
            background-clip: padding-box;
        }

        .tickets-container .tickets-list .ticket-item .ticket-user {
            height: 50px;
            padding: 10px;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .tickets-container .tickets-list .ticket-item {
            position: relative;
            background-color: #fff;
            -webkit-box-shadow: 0 0 3px rgba(0, 0, 0, .2);
            -moz-box-shadow: 0 0 3px rgba(0, 0, 0, .2);
            box-shadow: 0 0 3px rgba(0, 0, 0, .2);
            -webkit-border-radius: 3px;
            -webkit-background-clip: padding-box;
            -moz-border-radius: 3px;
            -moz-background-clip: padding;
            border-radius: 3px;
            background-clip: padding-box;
            margin-bottom: 8px;
            padding: 0 15px;
            vertical-align: top;
        }

        .tickets-container .tickets-list {
            list-style: none;
            padding: 0;
            margin-bottom: 0;
        }

        .tickets-container {
            position: relative;
            padding: 25px 25px;
            background-color: #f5f5f5;
        }

        .widget-main.no-padding {
            padding: 0;
        }

        .widget-main {
            padding: 12px;
        }

        .no-padding {
            padding: 0 !important;
        }

        .widget-body {
            background-color: #fbfbfb;
            -webkit-box-shadow: 1px 0 10px 1px rgba(0, 0, 0, .3);
            -moz-box-shadow: 1px 0 10px 1px rgba(0, 0, 0, .3);
            box-shadow: 1px 0 10px 1px rgba(0, 0, 0, .3);
        }

        .widget-header>.widget-caption {
            line-height: 33px;
            padding: 0;
            margin: 0;
            float: left;
            text-align: left;
            font-weight: 400 !important;
            font-size: 13px;
        }

        .widget-header .widget-icon {
            display: block;
            width: 30px;
            height: 32px;
            position: relative;
            float: left;
            font-size: 111%;
            line-height: 32px;
            text-align: center;
            margin-left: -10px;
        }

        .themesecondary {
            color: #5bc0de !important;
        }

        .widget-header.bordered-bottom {
            border-bottom: 3px solid #fff;
        }

        .widget-header {
            position: relative;
            min-height: 35px;
            background: #fff;
            -webkit-box-shadow: 0 0 4px rgba(0, 0, 0, .3);
            -moz-box-shadow: 0 0 4px rgba(0, 0, 0, .3);
            box-shadow: 0 0 4px rgba(0, 0, 0, .3);
            color: #555;
            padding-left: 12px;
            text-align: right;
        }

        .bordered-themesecondary {
            border-color: #5bc0de !important;
        }

        .widget-box {
            padding: 0;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            margin: 3px 0 30px 0;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <div class="container bootstrap snippets bootdey">
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget-box">
                        @if ($reservations == null)
                            <div class="widget-header bordered-bottom bordered-themesecondary">
                                <i class="widget-icon fa fa-tags themesecondary"></i>
                                <h5 class="widget-caption themesecondary"> Aucune réservation pour l'instant</h5>
                            </div><!--Widget Header-->
                        @elseif ($reservations != null)
                            <div class="widget-header bordered-bottom bordered-themesecondary">
                                <i class="widget-icon fa fa-tags themesecondary"></i>
                                <h5 class="widget-caption themesecondary"> Ticket Board</h5>
                            </div><!--Widget Header-->



                            <div class="widget-body">
                                <div class="widget-main no-padding">
                                    <div class="tickets-container">
                                        <ul class="tickets-list">

                                            @foreach ($reservations as $reservation)
                                                <li class="ticket-item">
                                                    <div class="row">
                                                        <div class="ticket-user col-md-6 col-sm-12">
                                                            <img src="https://bootdey.com/img/Content/user_1.jpg"
                                                                class="user-avatar">
                                                            <span class="user-company">{{ $reservation->name }}</span>
                                                        </div>
                                                        <div class="ticket-time  col-md-4 col-sm-6 col-xs-12">
                                                            <div class="divider hidden-md hidden-sm hidden-xs"></div>
                                                            <i class="fa fa-clock-o"></i>
                                                            <span
                                                                class="time">{{ \Carbon\Carbon::parse($reservation->created_at)->diffForHumans() }}</span>
                                                        </div>
                                                        <div class="ticket-type  col-md-2 col-sm-6 col-xs-12">
                                                            <span class="divider hidden-xs"></span>
                                                            @if ($reservation->status == 1)
                                                                <span class="type" style="color: #80af4e">Confirmé</span>
                                                            @else
                                                                <span class="type" style="color: #316ec2">en-cours</span>
                                                            @endif

                                                        </div>
                                                        @if ($reservation->status == 0)
                                                            <div
                                                                class="ticket-state  bg-palegreen col-md-4 col-sm-6 col-xs-12">
                                                                <form action="route('conferme.reservation')" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="id_reservation"
                                                                        value="{{ $reservation->id }}">
                                                                    <button type="submit" style="color: #80af4e"
                                                                        class="btn  btn-circle">
                                                                        <i class="fas fa-check"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        @endif

                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
