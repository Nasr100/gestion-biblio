$(document).ready(function(){
    $('.savebtn').on('click',function(e){
        e.preventDefault();
        let categoryName=$('#categoryname').val();
        $.ajax({
            url:"/category-store",
            data:{categoryName:categoryName},
            method:'POST',
            success:function(res){
                 if(res.status =='success'){
                    $("#categoryAddModal").hide();
                    $(".modal-backdrop").remove();
                    $('.listCategoriesTable').load(location.href+' .listCategoriesTable');
                    successMsg('Category added successfully !');
                }
            },error:function(err){
                let error=err.responseJSON;
                $.each(error.errors,function(index,value){
                    $('.errorMsg').append('<div class="alert alert-danger d-flex align-items-center" style="height: 40px;" role="alert">'+value+'</div>');
                })
            }
        })
    })
    $(document).on('click','.categoryEditBtn',function(e){
        e.preventDefault();
        let id = $(this).data('id');
        let catname=$(this).data("catname");
        $('#UP_categoryname').val(catname);
        $('#catupdateid').val(id);
        console.log(id)

    })

    $(document).on('click',".editbtn",function(e){
        e.preventDefault();
        
        let categoryName=$('#UP_categoryname').val();
        let id=$('#catupdateid').val();
        $.ajax({
            url:"/category-update",
            data:{categoryName:categoryName,id:id},
            method:'POST',
            success:function(res){
                 if(res.status =='success'){
                    $("#categoryUpdateModal").hide();
                    $(".modal-backdrop").remove();
                    $('.listCategoriesTable').load(location.href+' .listCategoriesTable');
                    successMsg('Category added successfully !');
                }
            },error:function(err){
                let error=err.responseJSON;
                $.each(error.errors,function(index,value){
                    $('.errorMsg').append('<div class="alert alert-danger d-flex align-items-center" style="height: 40px;" role="alert">'+value+'</div>');
                })
            }
        })

    })

     //delete cat

     $(document).on('click','.catdelid',function(){
        let id=$(this).attr('id');

        $('#catid').val(id);
    })

     $(document).on('click','.deletebtn',function(e){
        e.preventDefault();
            let up_id =$('#catid').val();
            
            $.ajax({
                url:"/category-delete",
                method:'post',
                data: {up_id:up_id},
                success:function(res){
                    if(res.status =='success'){
                        $("#myModal").hide();
                        $(".modal-backdrop").remove();
                        $('.listCategoriesTable').load(location.href+' .listCategoriesTable');

                        successMsg('Category deleted successfully !');
                    }
                },error:function(err){
                    
                }
            })
    })
})