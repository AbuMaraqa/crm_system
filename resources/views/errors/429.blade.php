@extends('errors::layout')
@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too many requests have been sent in a given amount of time and the request has been rate limited. Wait and try again later.'))
