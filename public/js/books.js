$(document).ready(function(){
    //addbook
  
        
     $(document).on('click','.savebtn',function(e){
        // if($( ".tagli" )){
        //     $(".tagli" ).remove();
           
        // }
        e.preventDefault();
        let tags=[];
            $( ".tagli" ).each(function( index ) {
            tags[index]=($( this ).text() );
            console.log($(tags[index]));
            });
            

        let title=$('#title').val();
        let isbn=$('#isbn').val();
        let pubYear=$('#pubyear').val();
        let edition=$('#edition').val();
        let author=$('#author').val();

        let form=$('#addForm')[0];
        let formData = new FormData(form);
        formData.append('title', title);
        formData.append('isbn', isbn);
        formData.append('pubYear', pubYear);
        formData.append('edition', edition);
        formData.append('author', author);
        formData.append('tags', tags );

        $.ajax({
            url:"/book-store",
            method:'POST',
            data: formData,
            processData: false, 
            contentType: false,
            success:function(res){
                if(res.status =='success'){
                    form.reset();
                    $("#bookAddModal").hide();
                    $(".modal-backdrop").remove();
                     $( ".tagli" ).remove();
                    $('.listBooksTable').load(location.href+' .listBooksTable');
                    successMsg('book added successfully !');
                }
            },error:function(err){
                let error=err.responseJSON;
                $.each(error.errors,function(value){
                    $('.errorMsg').append('<div class="alert alert-danger d-flex align-items-center" style="height: 40px;" role="alert">'+value+'</div>');
                })
            }
        })
    })



    $('#categories').on('keyup',function(e){
        let searchString=$(this).val();
        // console.log(searchString);
        if(searchString != ''){
            $.ajax({
                url:"/category-search",
                method:'post',
                data: {searchString:searchString},
               success:function(res){
                        $(".tagSearchElements").fadeIn();
                        $(".ultags").fadeIn();
                        $(".ultags").html(res);                    
                },error:function(err){

                }
            })
        }
   } )
    $('#UP_categories').on('keyup',function(e){
        let searchString=$(this).val();
        // console.log(searchString);
        if(searchString != ''){
            $.ajax({
                url:"/category-search",
                method:'post',
                data: {searchString:searchString},
               success:function(res){
                        $("#tagSearchElements").fadeIn();
                        $(".ultags").fadeIn();
                        $(".ultags").html(res);                    
                },error:function(err){

                }
            })
        }
   } )
       
      
   //search category
//    if($('.searchli').ready()){
        $(document).on('click', '.searchli', function(){  
            

            
           
            let liTag='<li type="button" class="badge rounded-pill me-2 bg-warning text-dark tagli">'+
            $(this).text()+'</li>';
          
            $(".categoryTags").fadeIn();
            $(".categoryTags").append(liTag);
            $('.ultags').fadeOut();  
            $("#categories").val(null);
    });  
    // }
    if($('.tagli'))
    {
        $(document).on('click', '.tagli', function()
        {  
            $('.tagli').fadeOut('normal', function()
            {
                $(this).remove();
            });
        }
        );  
    }

    //viewMember
    // $(document).on('click','.memberViewBtn',function(){
    //     let id=$(this).attr('id');
    //     let isbn=$(this).attr('isbn');
    //     let author=$(this).attr('author');
    //     let title=$(this).attr('btitle');
    //     let pubyear=$(this).attr('pubyear');
    //     let edition=$(this).attr('edition');

    //     document.getElementById("bookId").innerHTML=id;
    //     document.getElementById("booktisbn").innerHTML="ISBN : "+isbn;
    //     document.getElementById("bookauthor").innerHTML="Auhtor : "+author;
    //     document.getElementById("booktitle").innerHTML="Title : "+title;
    //     document.getElementById("bookpubyear").innerHTML="Published Year : "+pubyear;
    //     document.getElementById("bookedition").innerHTML="Edition : "+edition;
    // })
    //delete modal

    $(document).on('click','.bookdelid',function(){
        let id=$(this).attr('id');

        $('#bookid').val(id);
    })

    $(document).on('click','.deletebtn',function(e){
        e.preventDefault();
            let up_id = $('#bookid').val();
            
            $.ajax({
                url:"/book-delete",
                method:'post',
                data: {up_id:up_id},
                success:function(res){
                    if(res.status =='success'){
                        
                        $(".modal-backdrop").remove();
                        $("#myModal").hide();
                        $('.listBooksTable').load(location.href+' .listBooksTable');
                        successMsg('Book deleted successfully !');
                    }
                },error:function(err){
                    
                }
            })
    })

     //editbook
     $(document).on('click','.bookEditBtn',function(e){
        e.preventDefault();
        let up_id = $(this).data('id');
        let up_isbn = $(this).data('isbn');
        let up_author = $(this).data('author');
        let up_title = $(this).attr('btitle');
        let up_pubyear = $(this).data('pubyear');
        let up_edition = $(this).data('edition');
        
        $('#UP_title').val(up_title);
        $('#UP_isbn').val(up_isbn);
        $('#UP_pubyear').val(up_pubyear);
        $('#UP_author').val(up_author);
        $('#UP_edition').val(up_edition);
        $('#UP_id').val(up_id);

        

        
    })
    
     $(document).on('click','.updatebtn',function(e){
        e.preventDefault();
        let up_id = $('#UP_id').val();
        let UP_title=$('#UP_title').val();
        let UP_isbn=$('#UP_isbn').val();
        let UP_pubyear=$('#UP_pubyear').val();
        let UP_edition=$('#UP_edition').val();
        let UP_author=$('#UP_author').val();

        let form=$('#editForm')[0];
        let formData = new FormData(form);
        formData.append('title', UP_title);
        formData.append('isbn', UP_isbn);
        formData.append('pubyear', UP_pubyear);
        formData.append('edition', UP_edition);
        formData.append('author', UP_author);
        formData.append('id', up_id);


        $.ajax({
            url:"/book-update",
            method:'POST',
            data: formData,
            processData: false, 
            contentType: false,
            success:function(res){
                if(res.status =='success'){
                    form.reset();
                    $("#BookUpdateModal").hide();
                    $(".modal-backdrop").remove();
                    $('.listBooksTable').load(location.href+' .listBooksTable');
                    successMsg('Member Updated successfully !');
                }
            },error:function(err){
                let error=err.responseJSON;
                $.each(error.errors,function(index,value){
                    $('.errorMsg').append('<div class="alert alert-danger d-flex align-items-center" style="height: 40px;" role="alert">'+value+'</div>');
                })
            }
        })
    })

     //live-search
        
     $('#search').on('keyup',function(e){
        e.preventDefault();
        
        let searchString = $('#search').val();
        
            $.ajax({
                url:"/book-search",
                method:'POST',
                data: {searchString:searchString},
                success:function(res){
                    $('.maintable').html(res);
                   
                    
                    
                },error:function(err){
                   
                }
            })
        
   
    })
    //pagination
    $(document).on('click','.pagination a',function(e){
        e.preventDefault();
        let page=$(this).attr('href').split('page=')[1];
        paginate(page);
    })
        function paginate(page){
            $.ajax({
                url:"/books/pagination?page="+page,
                method:'GET',
                success:function(res){
                    $('.maintable').html(res);
                   
                },error:function(err){
                   
                }
            })
        }
    
})