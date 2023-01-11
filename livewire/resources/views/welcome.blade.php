<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Laravel Livewire </title>

    @livewireStyles()
</head>
<body>

    @livewire('home' ['name' => 'Shawon Hossain'])
    @livewire('service.home',['name' => 'Shawon Hossain'])
    <h1 style='text-align:center; background:red'>Welcome My First New Page in Laravel Livewire </h1>



    @livewireScripts()
</body>
</html>
