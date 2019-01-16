$(document).ready(() => {

  $(".btn").click(e => {
    e.preventDefault();
    $(".form-input, .send").removeClass("hide");
  });


  $(".send").click(e =>{
    e.preventDefault();
    $.post("../update_user.php", $(".form").serialize(), (data) =>{
      console.log(data);
    });
    location.reload();
  });
    
});