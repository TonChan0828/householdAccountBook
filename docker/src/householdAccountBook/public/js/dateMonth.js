function setMonth(){
  const now = new Date();
  const nowMonth = now.getMonth();
  const monthEl = document.querySelector("#month");
  for(let i =1;i<=12;i++){
    let newOption = document.createElement("option");
    newOption.textContent = i;
    newOption.value = i;
    monthEl.appendChild(newOption);
    if(i===nowMonth+1){
      newOption.setAttribute("selected",true);
    }
  }
}

setMonth();
