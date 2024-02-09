@extends('layouts.client')


@include(sprintf('templates.navbar.%s', $paramsArray[0]))
@include(sprintf('templates.main.%s', $paramsArray[1]))
@include(sprintf('templates.footer.%s', $paramsArray[2]))