<?php
$title = "Team member";
include("partials/functions.php");
include("partials/header.php");
if(isset($_POST['qid'])){
    sendMessage("answer", [
        "qid" => @$_POST['qid'],
        "answer" => @$_POST['answer'],
      ]); 
    echo '<div class="uk-alert"><span class="uk-margin-small-right" uk-icon="info"></span> Answer has been pushed back to admin!</div>';    
}
?>


<div id="app">

    <div class="uk-container">
        
        <div class="uk-width-1-2 uk-container uk-margin-top uk-padding-large">
            <form v-if="selectedQuestion" method="post">
                <fieldset class="uk-fieldset">

                    <legend class="uk-legend">Question</legend>

                    <div class="uk-margin uk-margin-medium-bottom">
                        {{ selectedQuestion.question }}
                        <input type="hidden" name="qid" :value="selectedQuestion.id"/>
                    </div>

                    <legend class="uk-legend">Options</legend>
                    <div class="uk-margin uk-grid-small uk-child-width-1-1 uk-grid">
                        <label><input :value="selectedQuestion.option1" value="" class="uk-radio" type="radio" name="answer"> {{ selectedQuestion.option1 }}</label>                        
                    </div>
                    <div class="uk-margin uk-grid-small uk-child-1-1 uk-grid">
                        <label><input :value="selectedQuestion.option2" required class="uk-radio" type="radio" name="answer"> {{ selectedQuestion.option2 }}</label>                        
                    </div>
                    <div class="uk-margin uk-grid-small uk-child-1-1 uk-grid">
                        <label><input :value="selectedQuestion.option3" required class="uk-radio" type="radio" name="answer"> {{ selectedQuestion.option3 }}</label>                        
                    </div>
                    <div class="uk-margin uk-grid-small uk-child-1-1 uk-grid">
                        <label><input :value="selectedQuestion.option4" required class="uk-radio" type="radio" name="answer"> {{ selectedQuestion.option4 }}</label>                        
                    </div>

                    <div>
                    <button type="submit" class="uk-button uk-button-primary">Push Answer</button>
                    </div>
                </fieldset>
            </form>
        </div>
            

        <div class="uk-width-1-2 uk-container">
            <legend class="uk-legend uk-margin-bottom">Queue</legend>
            <div v-if="!selectedQuestion" class="uk-alert"><span class="uk-margin-small-right" uk-icon="clock"></span> Waiting for questions</div>
            <div>
                <div @click="selectedQuestion=q" style="cursor:pointer"  class="uk-alert" v-for="q in questions">
                    <span class="uk-margin-small-right" uk-icon="question"></span> {{ q.question }}
                </div>
            </div>
        </div>
    </div>

</div>
<script src="./js/voter.js"></script>
<?php
include("partials/footer.php");
?>