function ValidateBlogForm()
{
	 if (document.BlogForm.selections_area.value == "-1")
    {
        alert("אנא בחר את האזור בארץ בו טיילת");
        return false;
    }
else if(document.getElementById("textArea").value==null || document.getElementById("textArea").value==""){
		alert("יש לכתוב את הבלוג")
		return false;}

	return true;
}

