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
    var list = document.getElementById("ft_list");
    var newitem = document.createElement("DIV");
    newitem.setAttribute("class", "newTask");
    newitem.setAttribute("onclick", "todoDelete(this)");
    newitem.setAttribute("index", index);
    //create text node of elem, prep it to put it up on html
    var textnode = document.createTextNode(todo);
    tab[index] = todo;
    index++;
    newitem.appendChild(textnode);
    list.insertBefore(newitem, list.childNodes[0]);
    if (flag == 0)
    {
      update_cookies();
    }
  }
}

function todoDelete(obj)
{
  if (confirm("Are you sure you want to delete this task?") == true)
  {
    var ind = obj.getAttribute("index");
    tab.splice(ind, 1);
    obj.parentNode.removeChild(obj);
    update_cookies();
  }
}

function update_cookies()
{
  var json_str = JSON.stringify(tab);
  document.cookie = "todos="+json_str;
}

window.onload = function()
{
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
}
