@extends('errors::layout')
@section('title', __('Gateway Timeout'))
@section('code', '504')
@section('message', __('The server, while acting as a gateway or proxy, did not receive a timely response from an upstream server it needed to access in order to complete the request.'))
