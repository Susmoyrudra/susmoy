function Datainsert(){
    var sub_cat_name=document.getElementById("sub_cat_name").value;
    var sub_cat_code=document.getElementById("sub_cat_code").value;
//    else{
    $.ajax({
        type:"POST",
        url:"index.php",
        data:{
             name:sub_cat_name,
             code:sub_cat_code
        },
        success: function(data){
            // $('#show_data').html(data);
            //     document.getElementById("show_table_div").style.display="block";
             alert("successfuly");
            }
            
            
        }
    });

}
//  function ShowData(data){
//      alert("show");
//  }