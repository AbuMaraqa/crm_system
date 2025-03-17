@extends('errors::layout')
@section('title', __('Bad Gateway'))
@section('code', '502')
@section('message', __('The server, while acting as a gateway or proxy, received an invalid response from an inbound server it accessed while attempting to fulfill the request.'))
