$(function) {

  //ボタンのクリックイベント
  $('"btn').on('click', getData);

  //Ajaxを実行するユーザー定義関数
  function getData() {

    //Ajax処理
    $.ajax({

      /* --- */

    }).fail(function (jqXHR, textStatus, errorThrown) {

      /* --- */

    }).done(function (data, textStatus, jqXHR) {

      /* --- */

    });
  }//ここまでがgetData()
}