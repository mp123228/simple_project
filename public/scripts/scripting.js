$(document).ready(function(){

    // alert('hello display clone');

    $.ajax({
            processing:true,
            serveSide:true,
            url:'/getdata',
            method:'get',
            dataType : 'json',
            success : function(response)
            {

                var ddd=response.data;
                // alert(stf);

                for(var i=0; i<ddd.length; i++)
                {
                    var id = ddd[i].id;
                    var firstname = ddd[i].firstname;
                    var lastname=ddd[i].lastname;
                    var email=ddd[i].email;
                    var pass=ddd[i].password;
                    var type=ddd[i].types;
                    var originalImage=ddd[i].image_path;
                    var lowImage=ddd[i].imagelowpx_path;
                    var thumbnailImage=ddd[i].thumbnail;
                //    alert(firstname+" "+lastname+" "+email+" "+pass);
                   $('#tbdy').append(`<tr><td>${id}</td><td>${firstname}</td><td>${lastname}</td><td>${email}</td><td>${pass}</td><td>${type}</td><td><img src='${originalImage}'></img></td><td><img src='${lowImage}'></img></td><td><img src='${thumbnailImage}'/></td><td><a href='/deleterecord/${id}'>Delete</a></td><td><a href='/updateform/${id}'>Update</a></td></tr>`);
                }
            },
            error : function(error)
            {
                console.log(error);
            }
    });


});