function getAnswers(){

}

$(document).ready(function(){
  var url = window.location.pathname;

  if($('#btn_start').length){
    $('#btn_start').click(function(e){
      e.preventDefault();

      $.ajax({
        method: "POST",
        url: "../answers/start"
      })
      .done(function( result ) {
        window.location = 'etapa1';
      });
    });
  }

  if($('#restart').length){
    $.ajax({
      method: "POST",
      url: "../answers/finish"
    })
    .done(function( result ) {
      var arrayResult = JSON.parse(result);

      $('.title').text(arrayResult.title);
      $('.desc').text(arrayResult.desc);
      $('.result-img').attr('src', arrayResult.img);
    });

    $('#restart').click(function(e){
      e.preventDefault();

      $.ajax({
        method: "POST",
        url: "../answers/restart"
      })
      .done(function( result ) {
        window.location = 'inicio';
      });
    });
  }

  var urlArray = url.split('page/');

  $('.etapas li').each(function(){
    if(!$(this).hasClass(urlArray[1])){
      $(this).addClass('finish');
      $(this).find('i').removeClass('fa-square-o').addClass('fa-check-square-o');
    }else{
      return false;
    }
  });

  if(url.indexOf("etapa") != -1){
    $.ajax({
      method: "POST",
      url: "../answers/get",
      data: {etapa: urlArray[1]}
    })
    .done(function( result ) {
      var arrayResult = JSON.parse(result);

      for(var i in arrayResult){
        $('.answers').append('<div class="form-control">'
              + '<input type="radio" name="answer" value="' + i + '" class="ans" />'
              + '<label>&nbsp;' + arrayResult[i] + '</label>'
          + '</div>');
      }
    });

    $(document).on('submit','.form-etapas', function(e){
      e.preventDefault();

      var answers = $('.form-etapas').serialize();
      $.ajax({
        method: "POST",
        url: "../answers/set",
        data: answers
      })
      .done(function( result ) {
        var arrayResult = JSON.parse(result);

        if(arrayResult.msg !== ''){
          $('#modal .modal-body p').text(arrayResult['msg']);
          $('#modal').modal('show');
          return false;
        }else{
          window.location = $('.form-etapas').attr('action');
        }
      });
    });
  }
});
