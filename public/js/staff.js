$(document).ready(function(){
    //add member
    $('.savebtn').on('click',function(e){
     e.preventDefault();
     let fullname=$('#fullname').val();
     let phonenumber=$('#phonenumber').val();
     let email=$('#email').val();
     let password=$('#password').val();
     let birthdate=$('#birthdate').val();
     let img = $('#memberimginput').prop('files')[0];

     let form=$('#addForm')[0];
     let formData = new FormData(form);
     formData.append('fullname', fullname);
     formData.append('birthdate', birthdate);
     formData.append('phonenumber', phonenumber);
     formData.append('email', email);
     formData.append('password', password);
     formData.append('img', img);

     $.ajax({
         url:"/staff-store",
         method:'POST',
         data: formData,
         processData: false, 
         contentType: false,
         success:function(res){
             if(res.status =='success'){
                 form.reset();
                 $("#staffAddModal").hide();
                 $(".modal-backdrop").remove();
                 $('.listStaffTable').load(location.href+' .listStaffTable');
                 successMsg('Staff added successfully !');
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
     $(document).on('click','.staffEditBtn',function(){
        let id=$(this).data('id');
        let email=$(this).data('email');
        let role=$(this).data('role');
        let fullname=$(this).attr('fullname');
        let birthdate=$(this).data('birthd');
        let phonenumber=$(this).data('phonen');
        
        $('#UP_fullname').val(fullname)
        $('#UP_phonenumber').val(phonenumber)
        $('#UP_email').val(email)
        $('#UP_role').val(role)
        $('#UP_birthdate').val(birthdate)
        $('#staffupId').val(id);
    })

    

    $(document).on('click','.updatebtn',function(e){
        e.preventDefault();
        let up_id =$('#staffupId').val();
        let UPfullname=$('#UP_fullname').val();
        let UPphonenumber=$('#UP_phonenumber').val();
        let UPemail=$('#UP_email').val();
        let UPbirthdate=$('#UP_birthdate').val();
        let UProle=$('#UP_role').val();
        let UPpassword=$('#UP_password').val();
        let img = $('#UP_staffimginput').prop('files')[0];

        let form=$('#editForm')[0];
        let formData = new FormData(form);
        formData.append('fullname', UPfullname);
        formData.append('birthdate', UPbirthdate);
        formData.append('phonenumber', UPphonenumber);
        formData.append('email', UPemail);
        formData.append('role', UProle);
        formData.append('password', UPpassword);
        formData.append('id', up_id);
        formData.append('img', img);

        $.ajax({
            url:"/staff-update",
            method:'POST',
            data: formData,
            processData: false, 
            contentType: false,
            success:function(res){
                if(res.status =='success'){
                    form.reset();
                    $("#staffUpdateModal").hide();
                    $(".modal-backdrop").remove();
                    $('.listStaffTable').load(location.href+' .listStaffTable');
                    successMsg('Staff Updated successfully !');
                }
            },error:function(err){
                let error=err.responseJSON;
                $.each(error.errors,function(index,value){
                    $('.errorMsg').append('<div class="alert alert-danger d-flex align-items-center" style="height: 40px;" role="alert">'+value+'</div>');
                })
            }
        })

    })


    //viewstaff
    $(document).on('click','.viewStaffBtn',function(){
        let Vid=$(this).attr('Vid');
        let Vemail=$(this).attr('Vemail');
        let Vrole=$(this).attr('Vrole');
        let Vfullname=$(this).attr('Vfullname');
        let Vbirthdate=$(this).attr('Vbirthdate');
        let Vphonenumber=$(this).attr('Vphonenumber');
        let Vimg=$(this).attr('Vimg');
        document.getElementById("staffId").innerHTML=Vid;
        document.getElementById("staffName").innerHTML="Name : "+Vfullname;
        document.getElementById("staffPhoneNumber").innerHTML="Phone : "+Vphonenumber;
        document.getElementById("staffEmail").innerHTML="Email : "+Vemail;
        document.getElementById("staffBirthdate").innerHTML="Birth date : "+Vbirthdate;
        document.getElementById('staffImg').src = Vimg;
        document.getElementById("staffRole").innerHTML=Vrole;
// 
    })


    //delete
    $(document).on('click','.staffdelid',function(){
        let id=$(this).attr('id');

        $('#staffid').val(id);
    })

    $(document).on('click','.deletebtn',function(e){
        e.preventDefault();
            let up_id = $('#staffid').val();
            
            
            $.ajax({
                url:"/staff-delete",
                method:'post',
                data: {up_id:up_id},
                success:function(res){
                    if(res.status =='success'){
                        $("#myModal").hide();
                        $(".modal-backdrop").remove();
                        $('.listStaffTable').load(location.href+' .listStaffTable');

                        successMsg('Staff deleted successfully !');
                    }
                },error:function(err){
                    
                }
            })
    })

    //search 
    $('#search').on('keyup',function(e){
        e.preventDefault();
        let searchString = $('#search').val();
        
            $.ajax({
                url:"/staff-search",
                method:'POST',
                data: {searchString:searchString},
                success:function(res){
                    $('.maintable').html(res);
                   
                },error:function(err){
                   
                }
            })
    })

    $(document).on('click','.pagination a',function(e){
        e.preventDefault();
        let page=$(this).attr('href').split('page=')[1];
        paginate(page);
    })
        function paginate(page){
            $.ajax({
                url:"/staff/pagination?page="+page,
                method:'GET',
                success:function(res){
                    $('.maintable').html(res);
                   
                },error:function(err){
                   
                }
            })
        }
})