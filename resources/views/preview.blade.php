@extends('layouts.preview')

@if($_GET["navbar"] == "burger")
@include('templates.navbar.burger')
@elseif($_GET["navbar"] == "modern")
@include('templates.navbar.modern')
@elseif($_GET["navbar"] == "classic")
@include('templates.navbar.classic')
@else
@include('templates.navbar.burger')
@endif



@if($_GET["main"] == "complex")
@include('templates.main.complex')
@elseif($_GET["main"] == "modern")
@include('templates.main.modern')
@elseif($_GET["main"] == "simple")
@include('templates.main.simple')
@else
@include('templates.main.simple')
@endif



@if($_GET["footer"] == "complex")
@include('templates.footer.complex')
@elseif($_GET["footer"] == "modern")
@include('templates.footer.modern')
@elseif($_GET["footer"] == "simple")
@include('templates.footer.simple')
@else
@include('templates.footer.simple')
@endif