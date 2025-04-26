$(document).ready(function(){
       //add member
       $('.savebtn').on('click',function(e){
        e.preventDefault();
        let address=$('#address').val();
        let fullname=$('#fullname').val();
        let phonenumber=$('#phonenumber').val();
        let email=$('#email').val();
        let birthdate=$('#birthdate').val();
        let img = $('#memberimginput').prop('files')[0];

        let form=$('#addForm')[0];
        let formData = new FormData(form);
        formData.append('fullname', fullname);
        formData.append('birthdate', birthdate);
        formData.append('address', address);
        formData.append('phonenumber', phonenumber);
        formData.append('email', email);
        formData.append('img', img);

        $.ajax({
            url:"/member-store",
            method:'POST',
            data: formData,
            processData: false, 
            contentType: false,
            success:function(res){
                if(res.status =='success'){
                    form.reset();
                    $("#memberAddModal").hide();
                    $(".modal-backdrop").remove();
                    $('.listMembersTable').load(location.href+' .listMembersTable');
                    successMsg('Member added successfully !');
                }
            },error:function(err){
                let error=err.responseJSON;
                $.each(error.errors,function(index,value){
                    $('.errorMsg').append('<div class="alert alert-danger d-flex align-items-center" style="height: 40px;" role="alert">'+value+'</div>');
                })
            }
        })
        
    })

    //update-input value
    $(document).on('click','.memberEditBtn',function(){
        let id=$(this).data('id');
        let email=$(this).data('email');
        let address=$(this).data('address');
        // let fullname=$(this).data('fullname');
        let fullname=$(this).attr('fullname');
        let birthdate=$(this).data('birthdate');
        let phonenumber=$(this).data('phonenumber');
        
        $('#UP_fullname').val(fullname)
        $('#UP_phonenumber').val(phonenumber)
        $('#UP_email').val(email)
        $('#UP_birthdate').val(birthdate)
        $('#UP_address').val(address)
        $('#memberidupdate').val(id)
    })
    //viewMember
    $(document).on('click','.viewMemberBtn',function(){
        let Vid=$(this).attr('Vid');
        let Vemail=$(this).attr('Vemail');
        let Vaddress=$(this).attr('Vaddress');
        let Vfullname=$(this).attr('Vfullname');
        let Vbirthdate=$(this).attr('Vbirthdate');
        let Vphonenumber=$(this).attr('Vphonenumber');
        let Vimg=$(this).attr('Vimg');
        document.getElementById("memberId").innerHTML=Vid;
        document.getElementById("memberName").innerHTML=Vfullname;
        document.getElementById("memberAddress").innerHTML=Vaddress;
        document.getElementById("memberPhoneNumber").innerHTML=Vphonenumber;
        document.getElementById("memberEmail").innerHTML=Vemail;
        document.getElementById("memberBirthdate").innerHTML=Vbirthdate;
        document.getElementById('memberImg').src = Vimg;

        $.ajax({
            url:"/member-bookStatus",
            method:'post',
            data: {Vid:Vid},
            success:function(res){
                $('.bookStatusTable').html(res);

            },error:function(err){
                
            }
        })
       
    })
    //deleteModal

    $(document).on('click','.delmemberid',function(){
        let id=$(this).attr('id');
        $('#delid').val(id);
    })
    $(document).on('click','.deletebtn',function(e){
        e.preventDefault();
            let up_id = $('#delid').val();
            // console.log(up_id)
            
            
            $.ajax({
                url:"/member-delete",
                method:'post',
                data: {up_id:up_id},
                success:function(res){
                    if(res.status =='success'){
                        $("#myModal").hide();
                        $(".modal-backdrop").remove();
                        $('.listMembersTable').load(location.href+' .listMembersTable');

                        successMsg('Member deleted successfully !');
                    }
                },error:function(err){
                    
                }
            })
    })
    //uodateMember
    $(document).on('click','.updatebtn',function(e){
        e.preventDefault();
        let up_id =$('#memberidupdate').val();
        let UPaddress=$('#UP_address').val();
        let UPfullname=$('#UP_fullname').val();
        let UPphonenumber=$('#UP_phonenumber').val();
        let UPemail=$('#UP_email').val();
        let UPbirthdate=$('#UP_birthdate').val();
        let img = $('#memberimginput').prop('files')[0];

        let form=$('#editForm')[0];
        let formData = new FormData(form);
        formData.append('fullname', UPfullname);
        formData.append('birthdate', UPbirthdate);
        formData.append('address', UPaddress);
        formData.append('phonenumber', UPphonenumber);
        formData.append('email', UPemail);
        formData.append('id', up_id);
        formData.append('img', img);


        $.ajax({
            url:"/member-update",
            method:'POST',
            data: formData,
            processData: false, 
            contentType: false,
            success:function(res){
                if(res.status =='success'){
                    form.reset();
                    $("#memberUpdateModal").hide();
                    $(".modal-backdrop").remove();
                    $('.listMembersTable').load(location.href+' .listMembersTable');
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
    
      //pagination
      $(document).on('click','.pagination a',function(e){
        e.preventDefault();
        let page=$(this).attr('href').split('page=')[1];
        paginate(page);
    })
        function paginate(page){
            $.ajax({
                url:"/pagination?page="+page,
                method:'GET',
                success:function(res){
                    $('.maintable').html(res);
                   
                },error:function(err){
                   
                }
            })
        }
         //live-search
        
         $('#search').on('keyup',function(e){
            e.preventDefault();
            
            let searchString = $('#search').val();
            
                $.ajax({
                    url:"/member-search",
                    method:'POST',
                    data: {searchString:searchString},
                    success:function(res){
                        $('.maintable').html(res);
                       
                        
                        
                    },error:function(err){
                       
                    }
                })
            
       
        })
})
 
    


