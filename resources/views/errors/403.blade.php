@extends('errors::layout')
@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __('The server understood the request, but the user does not have the necessary permissions.'))
