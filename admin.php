<?php
$title = "Admin";
include("partials/functions.php");
include("partials/header.php");
if(isset($_POST['question'])){
  $id = time().rand();
  $payload = [
    "id" => $id,
    "question" => @$_POST['question'],
    "option1" => @$_POST['option1'],
    "option2" => @$_POST['option2'],
    "option3" => @$_POST['option3'],
    "option4" => @$_POST['option4']
  ];
  sendMessage("question", $payload); 
  echo '
    <form method="post" action="result.php" target="_blank">
    <div class="uk-alert"><span class="uk-margin-small-right" uk-icon="info"></span> Question has been pushed to connected team members!
        <input type="hidden" name="question" value=\''.json_encode($payload).'\'/>
        <button type="submit" class="uk-button  uk-margin-left uk-button-primary">View results</button>
    </div>
    </form>
  ';
}
?>
<div id="app">

<div class="uk-container">
  <div class="uk-width-1-2 uk-container uk-margin-large-top uk-padding-large">
    <form method="post">
        <fieldset class="uk-fieldset">

            <legend class="uk-legend">Question</legend>

            <div class="uk-margin uk-margin-medium-bottom">
              <input class="uk-input" name="question" type="text" placeholder="Ask something?">
            </div>

            <legend class="uk-legend">Options</legend>
            <div class="uk-margin uk-grid-small uk-child-width-1-1 uk-grid">
              <input class="uk-input uk-margin-left" name="option1" type="text" placeholder="Option 1">
            </div>
            <div class="uk-margin uk-grid-small uk-child-1-1 uk-grid">
              <input class="uk-input uk-margin-left" name="option2" type="text" placeholder="Option 2">
            </div>
            <div class="uk-margin uk-grid-small uk-child-1-1 uk-grid">
              <input class="uk-input uk-margin-left" name="option3" type="text" placeholder="Option 3">
            </div>
            <div class="uk-margin uk-grid-small uk-child-1-1 uk-grid">
              <input class="uk-input uk-margin-left" name="option4" type="text" placeholder="Option 4">
            </div>

            <div>
              <button type="submit" class="uk-button uk-button-primary">Push Question</button>
            </div>
        </fieldset>
    </form>
  </div>
</div>

</div>
<?php
include("partials/footer.php");
?>