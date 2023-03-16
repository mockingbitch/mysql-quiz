<!DOCTYPE html>
<html>
<body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .text-error {
            color: red;
        }
    </style>
<div class="container">
    <h2 class="mt-4" style="text-align: center">SQL Execute</h2>

    <form method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Tên: @if ($errors->has('name'))<p class="text-error">*{{$errors->first('name')}}</p>@endif</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Câu số: @if ($errors->has('quiz_number'))<p class="text-error">*{{$errors->first('quiz_number')}}</p>@endif</label>
            <input type="text" class="form-control" name="quiz_number" id="exampleInputPassword1" placeholder="Câu số">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Kiểu:</label>
            <select name="type" class="form-control" id="">
                <option value="insert">Insert</option>
                <option value="update">Update</option>
                <option value="delete">Delete</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Câu truy vấn: @if ($errors->has('answer'))<p class="text-error">*{{$errors->first('answer')}}</p>@endif</label>
            <textarea class="form-control" name="answer" id="exampleInputPassword2" placeholder="Câu truy vấn"></textarea>
        </div>
        <button type="submit" style="margin-left: auto; margin-right: auto; display: block" class="btn btn-primary">Xác nhận</button>
    </form>
</div>
@if (Session::has('msg'))
    <script>
        swal("Thành công!", "{{Session::get('msg')}}", "success");
    </script>
@endif
@if (Session::has('errMsg'))
    <script>
        swal("Thất bại!", "{{Session::get('errMsg')}}", "warning");
    </script>
@endif
</body>
</html>
