$.ajax({
    url: "test.php",
    method: "POST",
    data: $("input#txt_name").val(),
    headers: {
        "Content-Type": "application/json"
    },
    success: function(response){
        alert("response is " + response);
    },
    error: function(){
        alert("Error fetching data");
    }
});