@extends('errors::layout')
@section('title', __('Method Not Allowed'))
@section('code', '405')
@section('message', __('The method received in the request-line is known by the origin server but not supported by the target resource.'))
