var app = new Vue({
  el: '#app',
  data: {
    selectedQuestion: null,
    questions: []
  },
  mounted(){

    //Initialize PieSocket
    var piesocket = new PieSocket({
      clusterId: 'us-nyc-1',
      apiKey: 'QMYLBfoA7rAevSiYhQUcKUfgKS4CkUTR87um8uTV'
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

