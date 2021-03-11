$('#account').keyup(function(){
    
    var account = $('#account').val(); 
    
    if(account!=''){
        $.post('includes/checkDetails.php',{sAccount:account}, function(data){
            $('#accountStatus').html(data);
        });
    }else if(account===''){
        $('#accountStatus').html('');
    }  
});

$('#pancard').keyup(function(){
    
    var pancard = $('#pancard').val(); 
    
    if(pancard!=''){
        $.post('includes/checkDetails.php',{sPan:pancard}, function(data){
            $('#panStatus').html(data);
        });
    }else if(pancard===''){
        $('#panStatus').html('');
    }  
});


$('#sEmail').keyup(function(){
    
    var email = $('#sEmail').val(); 
    
    if(email!=''){
        $.post('includes/checkDetails.php',{sEmail:email}, function(data){
            $('#emailStatus').html(data);
        });
    }else if(email===''){
        $('#emailStatus').html('');
    }  
});

$('#cEmail').keyup(function(){
    
    var email = $('#cEmail').val(); 
    
    if(email!=''){
        $.post('includes/checkDetails.php',{cEmail:email}, function(data){
            $('#emailStatus').html(data);
        });
    }else if(email===''){
        $('#emailStatus').html('');
    }  
});


$('#mobile').keyup(function(){
    
    var cMobile = $('#mobile').val(); 
    
    if(cMobile!=''){
        $.post('includes/checkDetails.php',{cMobile:cMobile}, function(data){
            $('#mobileStatus').html(data);
        });
    }else{
        $('#mobileStatus').html('');
    }    
});


$('#username').keyup(function(){
    
    var username = $('#username').val(); 
    
    if(username!=''){
        $.post('includes/checkDetails.php',{username:username}, function(data){
            $('#status').html(data);
        });
    }else if(username===''){
        $('#status').html('');
    }  
});


$("#newPassword,#confirmPassword").keyup(function(){
    var password = $("#newPassword").val();
    var confirmPassword = $("#confirmPassword").val();
        
    if(confirmPassword!=''){
        $.post('includes/checkDetails.php',{confirmPassword:confirmPassword, newPassword:password}, function(data){
            $('#status').html(data);
        });
    }else if(confirmPassword===''){
        $('#status').html('');
    }  
});


$('#price').keyup(function(){
    
    var p_price = $('#price').val(); 
    
    if(p_price!=''){
        $.post('includes/checkDetails.php',{p_price:p_price}, function(data){
            $('#priceStatus').html(data);
        });
    }else{
        $('#priceStatus').html('');
    }    
});