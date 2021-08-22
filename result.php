<?php
$question = $_POST['question'];
if(empty($question)){
  header("location:./admin.php");
}

$q = json_decode($question);
$title = "Result - ".$q->id;
include("partials/header.php");
?>
<script>
  window.q = <?php echo $question; ?> 
</script>
<div id="app">

    <div class="uk-container">
        
        <div class="uk-width-1-2 uk-container uk-margin-top uk-padding-large">
            <form method="post">
                <fieldset class="uk-fieldset">

                    <legend class="uk-legend">Result</legend>

                    <div class="uk-margin uk-margin-medium-bottom">
                        {{ selectedQuestion.question }}
                    </div>

                    <legend class="uk-legend">Options</legend>
                    <div class="uk-margin uk-grid-small uk-child-width-1-1 uk-grid">
                        <label><span class="uk-badge uk-padding-small uk-margin-right">{{ getPercentage(selectedQuestion.option1) }}%</span> {{ selectedQuestion.option1 }}</label>                        
                    </div>
                    <div class="uk-margin uk-grid-small uk-child-1-1 uk-grid">
                        <label><span class="uk-badge uk-padding-small uk-margin-right">{{ getPercentage(selectedQuestion.option2) }}%</span> {{ selectedQuestion.option2 }}</label>                        
                    </div>
                    <div class="uk-margin uk-grid-small uk-child-1-1 uk-grid">
                        <label><span class="uk-badge uk-padding-small uk-margin-right">{{ getPercentage(selectedQuestion.option3) }}%</span> {{ selectedQuestion.option3 }}</label>                        
                    </div>
                    <div class="uk-margin uk-grid-small uk-child-1-1 uk-grid">
                        <label><span class="uk-badge uk-padding-small uk-margin-right">{{ getPercentage(selectedQuestion.option4) }}%</span> {{ selectedQuestion.option4 }}</label>                        
                    </div>
                </fieldset>
            </form>
        </div>
          
    </div>

</div>
<script src="./js/result.js"></script>
<?php
include("partials/footer.php");
?>