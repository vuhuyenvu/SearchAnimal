
    
    $('#cb_search').on('change', function() {
  alert( this.value );
});
       
$(document).ready(function(){
  
 $('#country_name').keyup(function(){
     
    //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
  var query = $(this).val(); //lấy gía trị ng dùng gõ
  if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
  {
      
    document. getElementsByTagName("countryList").innerHtml ='';
   var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
   $.ajax({
    url:"{{ route('search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
    method:"POST", // phương thức gửi dữ liệu.
    data:{query:query, _token:_token},
    success:function(data){ //dữ liệu nhận về
        if(data == '<div class="row"></div>'|| data=='') {
                        
            $("#countryList").html(`<div class="product__discount">
                            <div class="section-title product__discount__title">
                                <h4>Không tìm thấy thông tin! Vui lòng nhập lại từ khóa !</h4>
                            </div>
                        </div>`);
            // document. getElementsByTagName("countryList").innerHtml ='';

        }
     
     else {
                    $('#countryList').fadeIn(); 
                
                $('#countryList').html(data);
     }
     
      //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
   }
 });
 }
});

 $(document).on('click', 'li', function(){  
  $('#country_name').val($(this).text());  
  $('#countryList').fadeOut();  
});  

});

