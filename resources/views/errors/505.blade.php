@extends('errors::layout')
@section('title', __('HTTP Version Not Supported'))
@section('code', '505')
@section('message', __('The server does not support, or refuses to support, the major version of HTTP that was used in the request message.'))
