function myFunction(txt) 
{
  var decision = false;
  if (confirm(txt)) 
  {
    decision = true;
  }
  else 
  {
    decision = false;
  }
  document.getElementById("demo").innerHTML = txt;
}