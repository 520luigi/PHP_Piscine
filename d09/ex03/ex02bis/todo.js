var tab = [];
var index = 0;
var flag = 0;

function todoAdd(elem)
{
  var todo;
  if (flag == 0)
  {
    todo = prompt("Enter a new task to do : ");
  }
  else {
    todo = elem;
  }
  if (todo)
  { //add html elements if element input has something
    var list = $("#ft_list");
    list.prepend("<div class='newTask' onclick='todoDelete(this)' index=" + index + ">" + todo + "</div>");
    tab[index] = todo;
    index++;
    if (flag == 0)
      update_cookies();
  }
}

function todoDelete(obj)
{
  if (confirm("Are you sure you want to delete this task?") == true)
  {
    var ind = $(obj).attr("index");
    $(obj).remove();
    tab.splice(ind, 1);
    update_cookies();
  }
}

function update_cookies()
{
  var json_str = JSON.stringify(tab);
  document.cookie = "todos="+json_str;
}

$(document).ready(function(){
    if (document.cookie)
    {
      flag = 1;
      var cook = document.cookie;
      var newtab = cook.split("=");
      var test = JSON.parse(newtab[1]);
      for (elem in test)
      {
        todoAdd(test[elem]);
      }
      flag = 0;
    }
    $('#new').on('click', todoAdd);
});
