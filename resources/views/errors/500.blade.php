@extends('errors::layout')
@section('title', __('Internal Server Error'))
@section('code', '500')
@section('message', __('The server encountered an unexpected condition that prevented it from fulfilling the request.'))
