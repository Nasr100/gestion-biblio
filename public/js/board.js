$(document).ready(function(){
    //count
    $.ajax({
        url: '/Dashboard-numbers',
        type: 'GET',
        dataType: 'json',
        async:true,
    
     success: function(data) {
        $.each(data, function(index, item)  {

            $('.count-conatiner').append('<div class="count col-2 mt-3 "><h4 class="container mt-2 countName">'+item.name+'</h4><h3 class="me-4 countNumber">'+item.number+'</h3></div>');
        });
       
     },
     error: function () { alert('error'); },
     });


    //bookcountmember
    $.ajax({
        url: '/Dashboard-most-rented-members',
        type: 'GET',
        async:true,
    
     success: function(data) {
       $('.most-members-table').html(data);
       
     },
     error: function () { alert('error'); },
     });

    //bookcountbook
    $.ajax({
        url: '/Dashboard-most-rented-books',
        type: 'GET',
        async:true,
    
     success: function(data) {
       $('.book-chart-table').html(data);
       
     },
     error: function () { alert('error'); },
     });
    
    })




