<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="studentsdata" method="post">
            @csrf
            <label for="">Student Name :</label> 
            <input type="text" name="student_nm">
            <label for=""> student id:</label>  
            <input type="text">
            <input type="submit" value="submit" name="student_id">
        </form>

    </div>
</body>
</html>