<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Laravel</title>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
   
   <script>
        // $(document).ready(function(){
        //     $('#tbl').DataTable({
        //         processing:true,
        //         serverSide:true,
        //         url:"/getuser",      
        //                   columns :[
        //             { data : 'id',name:'id'},
        //             { data : 'firstname',name:'firstname'},
        //             { data : 'lastname',name:'lastname'},
        //             { data : 'email',name:'email'},
        //             { data : 'password',name:'password'}
        //             { data : 'image_path',name:'OriginalImage'}
        //             { data : 'imagelowpx_path',name:'128px Image'},
        //             { data : 'thumbnail',name:'Thumbnail'},
        //             { data : 'types',name:'types'},
        //             { data : 'status',name:'status'}
        //             ,

        //         ]

        //     });
        // });
       </script>
    </head>
    <body>
        <section sytyle="padding-top:50px">
    <div class="container"> 
    <div class="row">
         {!!  $dataTable->table() !!}
    </div>  
    </div>
</section>
{!! $dataTable->scripts() !!}

        <div class="flex-center position-ref full-height">
          
            <div class="content">
             
        
                <br></br>
                <div><a href='/save'>Add</a>


            </div>

        </div>

    </body>
</html>
