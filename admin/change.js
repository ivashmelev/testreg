$(document).ready(() => {
  //Изменение данных юзера через админку

  $(".btn").click(e => {
    e.preventDefault();
    let target = $(e.target).parent().children(".form");
    $(target).children().removeClass("hide");
    localStorage.setItem("id", e.target.id); //Костыль =(
  });


  $(".send").click(e =>{
    e.preventDefault();
    $.post("../update_user.php", $("#form-"+localStorage.getItem("id")).serialize(), (data) =>{
      console.log(data);
    });
    location.reload();
  });
    
});