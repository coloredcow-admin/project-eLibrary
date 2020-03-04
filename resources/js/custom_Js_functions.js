$(".js-tilt").tilt({
  scale: 1.1
});
function passwordMatch(id1,id2){
  var fieldId1=document.getElementById(id1);
  var fieldId2=document.getElementById(id2);
  var errorId='error'+id2;  
  errorId=document.getElementById(errorId);
  if(fieldId2.value==''){
    errorId.innerHTML="<div class='text-danger'>Please Enter Password</div>";
    fieldId2.classList.remove("is-valid");
    fieldId2.classList.add("is-invalid");
    return false;
  } else if(fieldId1.value!=fieldId2.value){
    errorId.innerHTML="<div class='text-danger'>Confirm Password doesn't match with Password Field</div>";
    fieldId2.classList.remove("is-valid");
    fieldId2.classList.add("is-invalid");
    return false;
  }
  else{
    errorId.innerHTML="";
    fieldId2.classList.remove("is-invalid");
    fieldId2.classList.add("is-valid");
    return true;
  }
}
function checkFileInput(id){
  var fieldId=document.getElementById(id);
  var errorId='error'+id;
  errorId=document.getElementById(errorId);
  var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
  var sFileName = fieldId.value;
  if (sFileName.length > 0) {
    var blnValid = false;
    for (var j = 0; j < _validFileExtensions.length; j++) {
      var sCurExtension = _validFileExtensions[j];
      if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
        blnValid = true;
        break;
      }
    }
    if (!blnValid) {
     errorId.innerHTML="<div class='text-danger'>Invalid File Type</div>";
     fieldId.classList.remove("is-valid");
     fieldId.classList.add("is-invalid");
     return false; 
   }
 }
 if(fieldId.value==''){
  errorId.innerHTML="<div class='text-danger'>Image is required</div>";
  fieldId.classList.remove("is-valid");
  fieldId.classList.add("is-invalid");
  return false;
}
else if(fieldId.files[0].size > 1048576){
  errorId.innerHTML="<div class='text-danger'>Image Size is greater then required</div>";
  fieldId.classList.remove("is-valid");
  fieldId.classList.add("is-invalid");
  return false;
}
else{
 errorId.innerHTML="";
 fieldId.classList.remove("is-invalid");
 fieldId.classList.add("is-valid");
 return true;
}
}
function checkFieldName(id){
  var fieldId=document.getElementById(id);
  var errorId='error'+id;
  errorId=document.getElementById(errorId);
  if(fieldId.value==''){
    errorId.innerHTML="<div class='text-danger'>Entry is required</div>";
    fieldId.classList.remove("is-valid");
    fieldId.classList.add("is-invalid");
    return false;
  }   else{
    errorId.innerHTML="";
    fieldId.classList.remove("is-invalid");
    fieldId.classList.add("is-valid");
    return true;
  }  
}
function checkFieldEmail(id){
  var fieldId=document.getElementById(id);
  var errorId='error'+id;
  errorId=document.getElementById(errorId);
  if(fieldId.value==''){
    errorId.innerHTML="<div class='text-danger'>Email is required</div>";
    fieldId.classList.remove("is-valid");
    fieldId.classList.add("is-invalid");
    return false;
  } else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(fieldId.value)){
    errorId.innerHTML="<div class='text-danger'>Invalid Email Address</div>";
    fieldId.classList.remove("is-valid");
    fieldId.classList.add("is-invalid");
    return false;
  }
  else{
    errorId.innerHTML="";
    fieldId.classList.remove("is-invalid");
    fieldId.classList.add("is-valid");
    return true;
  }
}
function checkFieldPassword(id){
  var fieldId=document.getElementById(id);
  var errorId='error'+id;
  errorId=document.getElementById(errorId);
  if (fieldId.value.length<8){
    errorId.innerHTML="<div class='text-danger'>Password must be greater than equal to 8</div>";
    fieldId.classList.add("is-invalid");
    fieldId.classList.remove("is-valid");
    return false;
  }
  else{
    errorId.innerHTML="";
    fieldId.classList.add("is-valid");
    fieldId.classList.remove("is-invalid"); 
    return true;
  }
}
$('#deleteCategoryModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var category_name = button.data('cname') 
  var cid = button.data('cid')
  var modal = $(this)
  modal.find('.modal-body #category_name').html(category_name)
  modal.find('.modal-body #cid').val(cid)
})
$('#deleteUserModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var user_name = button.data('uname') 
  var uid = button.data('uid')
  var modal = $(this)
  modal.find('.modal-body #user_name').html(user_name)
  modal.find('.modal-body #uid').val(uid)
})
$('#deleteBookModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var book_name = button.data('bname') 
  var bid = button.data('bid')
  var modal = $(this)
  modal.find('.modal-body #book_name').html(book_name)
  modal.find('.modal-body #bid').val(bid)
})
$('#editCategoryModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var category_name = button.data('cname') 
  var cid = button.data('cid')
  var modal = $(this)
  modal.find('.modal-body #category_name1').val(category_name)
  modal.find('.modal-body #cid').val(cid)
})
$('#editBookModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var book_name = button.data('bookname') 
  var bid = button.data('bid') 
  var author_name = button.data('authorname') 
  var edition = button.data('edition') 
  var modal = $(this)
  modal.find('.modal-body #book_name').val(book_name)
  modal.find('.modal-body #bid').val(bid)
  modal.find('.modal-body #author_name').val(author_name)
  modal.find('.modal-body #edition').val(edition)
})
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#cover_image').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#book_cover").change(function() {
  readURL(this);
});

$(function () {
  $('[data-toggle="popover"]').popover()
})

function readBook(bid){
  var xhttp= new XMLHttpRequest();
  xhttp.onreadystatechange=function(){
    if(this.readyState==4&&this.status==200){
      var stat=this.responseText;
      if(stat){
       var str="<a  class='mx-auto badge badge-primary badge-pill p-2'";
       str+="title='Uncheck from read list' href='javascript:void(0);'";
       str+=" onclick='unreadBook("+bid;
       str+=");' style='font-size: 0.9rem;'>Read <i class='fa fa-times'></i></a>";
       var bookid='read_type'+bid;
       document.getElementById(bookid).innerHTML=str;
     }
   }
 };
 xhttp.open("POST","readbook",true);
 xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 var str_send="&bid="+bid;
 xhttp.send(str_send);
}
function unreadBook(bid){
  var xhttp= new XMLHttpRequest();
  xhttp.onreadystatechange=function(){
    if(this.readyState==4&&this.status==200){
      var stat=this.responseText;
      if(stat){
       var str="<a  class='mx-auto badge badge-light badge-pill p-2 text-muted'";
       str+="title='mark as read' href='javascript:void(0);'";
       str+=" onclick='readBook("+bid;
       str+=");' style='font-size: 0.9rem;'>Read <i class='fa fa-book-reader'></i></a>";
       var bookid='read_type'+bid;
       document.getElementById(bookid).innerHTML=str;
     }
   }
 };
 xhttp.open("POST","readbook",true);
 xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 var str_send="&dbid="+bid;
 xhttp.send(str_send);
}

var moveToTopBtn= document.getElementById("top");
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 450 || document.documentElement.scrollTop > 450) {
    moveToTopBtn.style.display = "block";
  } else {
    moveToTopBtn.style.display = "none";
  }
}
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
function addCategory(){
  if(checkFieldName('category_name')){
    var cname=document.getElementById('category_name').value;
    var view=document.getElementById('randdata').value;
    var xhttp= new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
      if(this.readyState==4&&this.status==200){
        var stat=this.responseText;
        if(stat){
         if(view=="reload"){
           location.reload(); 
         }
         else{
          var id= "li_"+stat;
          var countno=document.getElementById("listAll").childElementCount;
          var makeId="cid"+(countno+1);
          var onclick="selectMe('"+stat+"','"+cname+"','"+makeId+"')";
          var node = document.createElement("LI");  
          node.setAttribute("id", id);  
          node.setAttribute("onclick",onclick);          
          var textnode = document.createTextNode(cname);        
          node.appendChild(textnode);                              
          document.getElementById("listAll").appendChild(node);  
          $('#addCategoryModal').modal('hide');
        }

      }
    }
  };
  xhttp.open("POST","addcat",true);
  xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  var str_send="&category_name="+cname;
  xhttp.send(str_send);
}
}
$('#addCategoryModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var custDisp = button.data("randdata") 
  var modal = $(this)
  modal.find('.modal-body #randdata').val(custDisp)
})
function hideAllCategories(){
  var listAll=document.getElementById('listAll');
  listAll.classList.add('cust-hide');
}
function dropAllCategories(){
  var listAll=document.getElementById('listAll');
  listAll.classList.toggle('cust-hide');
}
function selectMe(cid,cname,makeId){
  document.getElementById('li_'+cid).classList.toggle('cust-hide');
  var selectedOption=document.getElementById('selected');
  if(selectedOption.innerHTML=='Select from here'){
    selectedOption.innerHTML="<label for='"+makeId+"' id='l"+makeId+"' class='badge badge-secondary my-auto mx-1'>"+cname+" <i class='fa fa-times' onclick='deselect(\""+makeId+"\",\""+cid+"\")'></i><input name='"+makeId+"' id='"+makeId+"' value='"+cid+"' type='checkbox' class='cust-hide' checked></label>";
  }
  else{
    var list=selectedOption.children;
    for (var i = 0; i < list.length; i++) {
      var element = list[i];
      var elementid=element.children[1].id;
      if(elementid==makeId){
        deselect(makeId,cid);
        return;
      }
    }
    selectedOption.innerHTML+="<label for='"+makeId+"'  id='l"+makeId+"' class='badge badge-secondary my-auto mx-1'>"+cname+" <i  class='fa fa-times'  onclick='deselect(\""+makeId+"\",\""+cid+"\")'></i><input name='"+makeId+"'  value='"+cid+"' id='"+makeId+"' type='checkbox'  class='cust-hide'  checked></label>";
  }
}
function deselect(id,cid){
 document.getElementById('li_'+cid).classList.toggle('cust-hide');
 var selectedOption=document.getElementById('selected');
 var removeMe=document.getElementById('l'+id);
 selectedOption.removeChild(removeMe);
 if(selectedOption.children.length==0)
  selectedOption.innerHTML='Select from here';
}