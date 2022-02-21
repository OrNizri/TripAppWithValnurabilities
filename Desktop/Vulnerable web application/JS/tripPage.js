function ValidateContactForm()
{
  var selected = document.ContactForm.selections_travel;
	if (selected.selectedIndex < 1)
    {
        alert("אנא בחר קוד טיול");
        selected.focus();
        return false;
    }
	
	else{
		return true;
	}
}


function calculate ()
{

	var code=document.getElementById("code").value;
   console.log(code);
	var num =document.getElementById("number").value;
   console.log(num);

	var price=0;
	var totalprice=0;

	if (code == "A1")
		price=100;
	if (code == "A2")
		price=50;
	if (code == "A3")
		price=30;
	if (code == "A4")
		price=50;
	if (code == "A5")
		price=220;
	if (code == "A6")
		price=80;

	totalprice=price*num;
	
	alert("המחיר בעבור בחירתך : "+totalprice+ ' ש"ח בלבד '  );
   
}

