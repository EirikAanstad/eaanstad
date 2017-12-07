    $(document).ready(function() {
        $("#search").click(function() { displaySearched() });
    });
    function displaySearched() {
        $( "#mainBody" ).empty();
        var sort = $('input[name=optradio]:checked').val();
        console.log(sort);

        $.ajax({
            type: "GET",
            url: "api/searchApi.php",
            dataType: "json",
            data: {"name":$("#keyword").val(), "sort":sort},
            success:function(data) {
                if (data == false) {
                    $("#mainBody").html("nah son");
                    $("#searchBox").css({ 'margin-top': '150px' });
                } else {
                    $("#searchBox").css({ 'margin-top': '10px' });
                    for(var i = 0; i < data.length; i++) {
                        console.log(data[i]);
                        createDiv(i, data);
                    }   
                }
            }
        });
    }
    
    $(document).ready(function() {
        $("#displayAll").click(function() { displayAll() });
    });
    function displayAll() {
        $( "#mainBody" ).empty();
        $.ajax({
            type: "GET",
            url: "api/searchApi.php",
            dataType: "json",
            data: {"name":''},
            success:function(data) {
                if (data == false) {
                    $("#mainBody").html("nah son");
                    $("#searchBox").css({ 'margin-top': '150px' });
                } else {
                    $("#searchBox").css({ 'margin-top': '10px' });
                    for(var i = 0; i < data.length; i++) {
                        console.log(data[i]);
                        createDiv(i, data);
                    }   
                }
            }
        });
    }
    
    
    
    function createDiv(i, data){
        console.log(data);
        $("#mainBody").append("<div class='pokemonDisplay'>" +
            "<h1 id='name"+i+"'>"+data.name+"</h1>" +
            "<img id='image"+i+"' src='"+data.image+"'></img>" +
            "<table class='table table-striped table-bordered'>" +
            "<tr><th>National №</th><td id='dexId"+i+"'>"+data.dexId+"</td></tr>" +
            "<tr><th>Japanese Name</th><td id='jName"+i+"'>"+data.jName+"</td></tr>" +
            "<tr><th>Primary Type</th><td id='primaryType"+i+"'>"+data.PrimaryType+"</td></tr>" +
            "<tr><th>Secondary Type</th><td id='secondaryType"+i+"'>"+data.SecondaryType+"</td></tr>" +
            "<tr><th>Notes</th><td id='info"+i+"'>"+data.notes+"</td></tr>" +
            "</table>" +
        "</div>");
        $("#name"+ i).html(data[i].name);
        $("#dexId"+ i).html(data[i].dexId);
        $("#jName"+ i).html(data[i].jName);
        $("#image"+ i).attr("src", data[i].image);
        $("#info"+ i).html(data[i].notes);
        $("#primaryType"+ i).html(data[i].PrimaryType);
        $("#secondaryType"+ i).html(data[i].SecondaryType);

    }
    
    function confirmAction(){
      var confirmed = confirm("Are you sure? This will remove this entry forever.");
      return confirmed;
    }
  
  
  
    $(document).ready(function() {
        $("#showTotal").click(function() { displayCount() });
    });
    
    function displayCount() {
        $('#agg').html("");
        $.ajax({
            type: "GET",
            url: "api/countApi.php",
            dataType: "json",
            data: {},
            success:function(data) {
                $('#agg').html("There are " + data.total + " entries in the database!");
            }
        });
    }
    
    $(document).ready(function() {
        $("#showMostFrequentGen").click(function() { displayFrequency() });
    });
    
    function displayFrequency() {
        $('#agg').html("");
        $.ajax({
            type: "GET",
            url: "api/frequencyApi.php",
            dataType: "json",
            data: {},
            success:function(data) {
                $('#agg').html("The most frequent generation is " + data.generation + 
                " with " + data.generationCount + " entries in the database!");

            }
        });
    }