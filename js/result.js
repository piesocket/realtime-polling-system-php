var app = new Vue({
  el: '#app',
  data: {
    selectedQuestion: window.q || null,
    answers:[]
  },
  mounted(){

    //Initialize PieSocket
    var piesocket = new PieSocket({
      clusterId: 'us-nyc-1',
      apiKey: 'QMYLBfoA7rAevSiYhQUcKUfgKS4CkUTR87um8uTV'
    });
    
    //Subscribe
    var channel = piesocket.subscribe("answer"); 

    //Handle messages
    channel.on('message', (msg) => {
      var data = JSON.parse(msg.data);

      if(data.qid == this.selectedQuestion.id){
        console.log("New answer:", data.answer);
        this.answers.push(data.answer);
      }
    });
    
  },
  methods:{
    getPercentage(option){
      if(this.answers.length > 0){
        var answerCount = this.answers.filter((ans) => ans ==  option).length;
        
        return (answerCount / this.answers.length) * 100
      }
      return 0;
    }
  }
})

