// 削除時
$(function () {
  $('#delete').on("click", function () {
    if (confirm('削除しますか？')) {
    } else {
      return false;
    }
  });
});

// 編集時
$(function () {
  $('#complete').on("click", function () {
    if (confirm('送信しますか？')) {
    } else {
      return false;
    }
  });
});
