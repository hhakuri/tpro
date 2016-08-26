<?php
require_once 'header.php';
?>

<div class="container">
  <eiv class="row">
    <div class="col-md-3">
      <h2>ひだりめにゅー</h2>
    </div>
    <div class="col-md-6">
      <h2>めいんこんてんつ</h2>
      <p>tanyao Projectへようこそ！</p>
      実装されているハッシュは<?php var_dump(hash_algos());?>です。
    </div>
    <div class="col-md-3">
      <h2>みぎめにゅー</h2>
    </div>
  </div>
</div>

<?php
require_once 'footer.php';
?>