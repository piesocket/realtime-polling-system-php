var app = new Vue({
  el: '#app',
  data: {
    selectedQuestion: null,
    questions: []
  },
  mounted(){

    //Initialize PieSocket
    var piesocket = new PieSocket({
      clusterId: 'YOU_CLUSTER_ID',
      apiKey: 'YOU_API_KEY'
    });
    
    //Subscribe
    var channel = piesocket.subscribe("question"); 

    //Handle messages
    channel.on('message', (msg) => {
      var data = JSON.parse(msg.data);

      this.questions.push(data);
      this.selectedQuestion = data;
    });
    
  }
})

