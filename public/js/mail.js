//  //mail
// $(document).ready(function(){
//     var today = new Date();
//     console.log(today);
   
//     var dd = String(today.getDate()).padStart(2, '0');
//     var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
//     var yyyy = today.getFullYear();
   
//     $('.Returndate').each(function( index ) {
//         var acRdate = new Date($( this ).text());
        
//         if(today > acRdate){
//            let email= $('.memberEmail').eq(index).text();
//             let memberName=$('.memberName').eq(index).text();
//         let prix=($('.prix').eq(index).text())*1.2;

//             $.ajax({
//                 url:"/mail",
//                 method:'get',
//                 data:{email:email,memberName:memberName,prix:prix},
//                 success:function(res){
//                    if (status=='success'){
//                     alert('mail sent seccessufuly');
//                    }
                   
    
                           
//                 },error:function(err){
//                     alert('EROOOOOOOOOOOOOR');

//                 }
//             })
      

//         }
//       });
// })
 