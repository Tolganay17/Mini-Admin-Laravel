<!DOCTYPE html>
<html lang="en">

<head> 
    <title>Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class='row'>
        <div class=".col-md-4.col-md-offset-4" style="margin-top: 20px;">
            <h4>Welcome to Dashboard</h4>
           <h6> <a href="/logout" style="float:right">Log Out</a></h6>
            
            <table class="table" border="1">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </thead>
               
            </table>
            <span>{{$users->links()}} </span>
        <style>
            .w-5{
                display:none;
            }
            </style>
           
        </div>
        <br>
        <br>
        </div>
        
    </div>
    <div style="display:flex;justify-content:center">
    <a href="/blog" class="btn btn-outline-primary">Show Blog</a>
    </div>
   
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>