$(document).ready(() => {

  $(".btn").click(e => {
    e.preventDefault();
    // let target = $(e.target).parent();
    let target = $(e.target).parent().children(".form");
    $(target).children().removeClass("hide");
    // $(target).children().val("1")
    // $(e.target).parent().children("p, .btn").addClass("hide");
    // $(target+" .form-input, .send").removeClass("hide");
    localStorage.setItem("id", e.target.id);
  });


  $(".send").click(e =>{
    e.preventDefault();
    $.post("../update_user.php", $("#form-"+localStorage.getItem("id")).serialize(), (data) =>{
      console.log(data);
    });
    location.reload();
  });
    
});