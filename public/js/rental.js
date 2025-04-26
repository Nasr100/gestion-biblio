$(document).ready(function(){
    $('.savebtn').on('click',function(e){
        e.preventDefault();

        let memberName=$('#membername').val();
        let bookTitle=$('#booktitle').val();
        
        let form=$('#addForm')[0];
        let formData = new FormData(form);
        formData.append('memberName', memberName);
        formData.append('bookTitle', bookTitle);
        

        $.ajax({
            url:"/rental-store",
            method:'POST',
            data: formData,
            processData: false, 
            contentType: false,
            success:function(res){
                if(res.status =='success'){
                    form.reset();
                    $("#rentalAddModal").hide();
                    $(".modal-backdrop").remove();
                    $('.listRentalsTable').load(location.href+' .listRentalsTable');
                    successMsg('Rental added successfully !');
                }
            },error:function(err){
                let error=err.responseJSON;
                $.each(error.errors,function(index,value){
                    $('.addErrorMsg').append('<div class="alert alert-danger d-flex align-items-center" style="height: 40px;" role="alert">'+value+'</div>');
                })
            }
        })
    })

    $('#membername').on('keyup',function(){
        let searchString=$(this).val();

        if(searchString != ''){
            $.ajax({
                url:"/rental-member-search",
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
    })

    if($('.membersearchli')){
        $(document).on('click', '.membersearchli', function(){  
            $("#membername").val($(this).text());
            $('.ultags').fadeOut();  
    });  
    }

    $('#booktitle').on('keyup',function(){
        let searchString=$(this).val();

        if(searchString != ''){
            $.ajax({
                url:"/rental-book-search",
                method:'post',
                data: {searchString:searchString},
               success:function(res){
                        $("#bookSearchElements").fadeIn();
                        $(".ulbooks").fadeIn();
                        $(".ulbooks").html(res);                    
                },error:function(err){

                }
            })
        }
    })

    if($('.booksearchli')){
        $(document).on('click', '.booksearchli', function(){  
            $("#booktitle").val($(this).text());
            $('.ulbooks').fadeOut();  
        });  
    }

    //update
    $('.editbtn').on('click',function(e){
        e.preventDefault();
        let id=$('#rentalidupdate').val();

        let UPmemberName=$('#UP_membername').val();
        let UPbookTitle=$('#UP_booktitle').val();
        let UPrentaDate=$('#UP_rentdate').val();
        let UPreturnDate=$('#UP_returndate').val();
        let UPactualReturnDate=$('#UP_actualreturndate').val();
        
        
        let form=$('#editForm')[0];
        let formData = new FormData(form);
        if(UPactualReturnDate!="Not Yet"){
            formData.append('actualReturnDate', UPactualReturnDate);

        }
        formData.append('memberName', UPmemberName);
        formData.append('bookTitle', UPbookTitle);
        formData.append('returnDate', UPreturnDate);
        formData.append('rentaDate', UPrentaDate);
        formData.append('id', id);
        

        $.ajax({
            url:"/rental-update",
            method:'POST',
            data: formData,
            processData: false, 
            contentType: false,
            success:function(res){
                if(res.status =='success'){
                    form.reset();
                    $("#rentalUpdateModal").hide();
                    $(".modal-backdrop").remove();
                    $('.listRentalsTable').load(location.href+' .listRentalsTable');
                    successMsg('Rental Updated successfully !');
                }
            },error:function(err){
                let error=err.responseJSON;
                $.each(error.errors,function(index,value){
                    $('.errorMsg').append('<div class="alert alert-danger d-flex align-items-center" style="height: 40px;" role="alert">'+value+'</div>');
                })
            }
        })
    })

    $(document).on('click','.rentalEditBtn',function(){
        let id=$(this).data('id');
        let rentdate=$(this).data('rentdate');
        let actualreturndate=$(this).data('actualdate');
        let returndate=$(this).data('returndate');
        let booktitle=$(this).attr('booktitle');
        let membername=$(this).attr('membername');

   
        if(actualreturndate == null){
            $('#UP_actualreturndate').val("Not Yet");

        }else{
            $('#UP_actualreturndate').val(actualreturndate);
        }

        $('#UP_membername').val(membername);
        $('#UP_booktitle').val(booktitle);
        $('#UP_rentdate').val(rentdate);
        $('#UP_returndate').val(returndate);
        $('#rentalidupdate').val(id);
    })


    $('#search').on('keyup',function(e){
        e.preventDefault();

        let searchString=$(this).val();

        $.ajax({
            url:"/rental-search",
            method:'POST',
            data:{searchString:searchString},
            success:function(res){
               
                    $('.maintable').html(res);
                
            },error:function(err){
                
            }
        })
    })

    $(document).on('click','.deletebtn',function(e){
        e.preventDefault();
        let id=$('#delId').val();
        $.ajax({
            url:"/rental-delete",
            method:'POST',
            data:{id:id},
            success:function(res){
               
                $("#myModal").hide();
                $(".modal-backdrop").remove();
                $('.listRentalsTable').load(location.href+' .listRentalsTable');

                successMsg('Rental deleted successfully !');                
            },error:function(err){
                
            }
        })
  
    })
    
    $(document).on('click','.del',function(){
        let id=$(this).attr('id');

        $('#delId').val(id);
    })


   


})