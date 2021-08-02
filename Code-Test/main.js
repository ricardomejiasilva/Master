let arr  = [1, 2 , 3 , 4]

 function index(arr, val){
    for (let i = 0; i < arr.length; i++){
      if (val === arr[i]){
        return i
      }
    }
  }

