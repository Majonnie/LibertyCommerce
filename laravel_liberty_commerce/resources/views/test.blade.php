@include('layout.header')

<form action="/test" enctype="multipart/form-data" method="post">
    @csrf
    <input type="file" name="avatar">
    <input type="submit">

    <img src="storage/avatars/1"/>
</form>