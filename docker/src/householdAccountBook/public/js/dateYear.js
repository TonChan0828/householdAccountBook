function setYear(){
  const now = new Date();
  const nowYear = now.getFullYear();
  const lastYear = nowYear + 30;
  const yearEl = document.querySelector("#year");
  for(let i =2010;i<=lastYear;i++){
    let newOption = document.createElement("option");
    newOption.textContent = i;
    newOption.value = i;
    yearEl.appendChild(newOption);
    if(i===nowYear){
      newOption.setAttribute("selected",true);
    }
  }
}

setYear();
