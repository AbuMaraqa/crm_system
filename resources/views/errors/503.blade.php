@extends('errors::layout')
@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('The server is currently unable to handle the request due to a temporary overload or scheduled maintenance, which will likely be alleviated after some delay.'))
