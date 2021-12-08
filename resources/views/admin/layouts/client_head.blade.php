<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Forw3b') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    
    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/favicon.png') }}" rel="apple-touch-icon">

    <!-- Custom Css -->
    <link href="{{ asset('css/lib/build/css/custom.min.css') }}" rel="stylesheet">
    
    <!-- Bootstrap -->
    <!--<link href="{{ asset('client/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet">-->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="{{ asset('client/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    
    <!-- Datatables -->
    <link href="{{ asset('client/datatables.net-bs/css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('client/datatables.net-buttons-bs/css/buttons.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('client/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('client/datatables.net-responsive-bs/css/responsive.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('client/datatables.net-scroller-bs/css/scroller.bootstrap.css') }}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{ asset('client/css/client.css') }}" rel="stylesheet">
    
  </head>
@yield('content')
@extends('admin.layouts.client_foot')