var app = new Vue({
  el: '#app',
  data: {
    selectedQuestion: window.q || null,
    answers:[]
  },
  mounted(){

    //Initialize PieSocket
    var piesocket = new PieSocket({
      clusterId: 'YOU_CLUSTER_ID',
      apiKey: 'YOU_API_KEY'
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

