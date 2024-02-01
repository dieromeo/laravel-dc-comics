<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <title>@yield('titolo_pagina')</title>
</head>

<body>
    @include('layouts.header')
    @include('layouts.main')
</body>
