const searchBar = document.querySelector(".search input"),
searchIcon = document.querySelector(".search button"),
usersList = document.querySelector(".box__img");
searchIcon.onclick = ()=>{
 
  searchBar.classList.toggle("active");
 
}

searchBar.onkeyup = ()=>{
  let searchTerm = searchBar.value;
  if(searchTerm != ""){
    searchBar.classList.remove("active");
  }else{
    searchBar.classList.add("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "search1.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          usersList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}


setInterval(() =>{
  let xhr = new XMLHttpRequest();
  
  xhr.open("GET","index1.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          if(searchBar.classList.contains("active")){
            usersList.innerHTML = data;
          }
      
        }
    }
  }
  
  xhr.send();
}, 500);



